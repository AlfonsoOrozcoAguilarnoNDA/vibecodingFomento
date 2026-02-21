<?php include 'header.php'; ?>

<?php
// Consultas para llenar los selectores
$sql_vacantes = "SELECT id_vacante, nombre_vacante, experimento FROM vacantes ORDER BY id_vacante DESC";
$res_vacantes = mysqli_query($conn, $sql_vacantes);

$sql_analistas = "SELECT nombre_griego, letra_perfil, nombre_humano FROM analistasIA WHERE activo = 'SI' ORDER BY nombre_griego ASC";
$res_analistas = mysqli_query($conn, $sql_analistas);
?>

<div class="row justify-content-center">
    <div class="col-md-10">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fas fa-microchip"></i> Captura de Evaluación (Arena)</h4>
                <span class="badge badge-light">Paso Final: Copiar y Pegar</span>
            </div>
            <div class="card-body bg-light">
                <?php if (!$es_lider): ?>
                    <div class="alert alert-danger">
                        <i class="fas fa-lock"></i> Acceso restringido. Solo la IP autorizada puede registrar evaluaciones.
                    </div>
                <?php else: ?>
                    <form action="guardar_evaluacion.php" method="POST">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold">1. Seleccionar Vacante</label>
                                <select name="id_vacante" class="form-control" required>
                                    <option value="">-- Seleccione Vacante --</option>
                                    <?php while($v = mysqli_fetch_assoc($res_vacantes)): ?>
                                        <option value="<?php echo $v['id_vacante']; ?>">
                                            <?php echo "[".$v['experimento']."] ".$v['nombre_vacante']; ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="col-md-6 form-group">
                                <label class="font-weight-bold">2. Analista (Nombre Griego)</label>
                                <select name="nombre_griego" id="analista_select" class="form-control" required onchange="actualizarPerfil()">
                                    <option value="">-- Seleccione Analista --</option>
                                    <?php while($a = mysqli_fetch_assoc($res_analistas)): ?>
                                        <option value="<?php echo $a['nombre_griego']; ?>" data-perfil="<?php echo $a['letra_perfil']; ?>">
                                            <?php echo $a['nombre_griego']." (".$a['nombre_humano'].")"; ?>
                                        </option>
                                    <?php endwhile; ?>
                                </select>
                                <input type="hidden" name="letra_perfil" id="letra_perfil_input">
                            </div>
                        </div>

                        <hr>

                        <div class="row">
                            <div class="col-md-4 form-group">
                                <label class="font-weight-bold">Ronda</label>
                                <select name="ronda" class="form-control" required>
                                    <option value="1">Ronda 1 (Inicial)</option>
                                    <option value="2">Ronda 2 (Con Dato Real)</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="font-weight-bold">Semáforo</label>
                                <select name="semaforo" class="form-control" required>
                                    <option value="Verde" class="text-success">Verde (Confiable)</option>
                                    <option value="Amarillo" class="text-warning">Amarillo (Dudosa)</option>
                                    <option value="Rojo" class="text-danger">Rojo (Fraude/Riesgo)</option>
                                </select>
                            </div>
                            <div class="col-md-4 form-group">
                                <label class="font-weight-bold">Puntuación (1-10)</label>
                                <input type="number" step="0.000001" name="puntuacion" class="form-control" min="0" max="10" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Respuesta Literal de la IA (LONGTEXT)</label>
                            <textarea name="respuesta_llm" class="form-control" rows="10" placeholder="Pegue aquí el chat completo..." required></textarea>
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Link de Evidencia (Auditoría Pública)</label>
                            <input type="text" name="evidencia_link" class="form-control" placeholder="https://...">
                        </div>

                        <div class="form-group">
                            <label class="font-weight-bold">Comentarios del Evaluador</label>
                            <textarea name="comentario_evaluador" class="form-control" rows="2"></textarea>
                        </div>

                        <div class="form-check mb-3">
                            <input type="checkbox" name="cambio_criterio" class="form-check-input" id="cambioCheck">
                            <label class="form-check-label" for="cambioCheck">Hubo cambio de criterio respecto a la ronda anterior</label>
                        </div>

                        <button type="submit" class="btn btn-success btn-lg btn-block shadow">
                            <i class="fas fa-check-circle"></i> Registrar Evaluación en la Arena
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<script>
// Pequeña función para que al elegir al analista, se guarde automáticamente su perfil
function actualizarPerfil() {
    var select = document.getElementById('analista_select');
    var perfil = select.options[select.selectedIndex].getAttribute('data-perfil');
    document.getElementById('letra_perfil_input').value = perfil;
}
</script>

<?php include 'footer.php'; ?>
