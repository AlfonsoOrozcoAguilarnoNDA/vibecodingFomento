<?php include 'header.php'; ?>

<div class="row">
    <div class="col-12 mb-4">
        <div class="bg-white p-4 shadow-sm rounded border-left border-primary">
            <h2 class="text-dark">Arena de Transparencia Social</h2>
            <p class="text-muted mb-0">
                Monitoreo de verosimilitud de vacantes mediante Analistas de IA. 
                Sección: <strong>Viernes Social</strong> para <em>vibecodingmexico.com</em>
            </p>
        </div>
    </div>

    <?php if ($es_lider): ?>
    <div class="col-12 mb-4">
        <div class="card border-success shadow-sm">
            <div class="card-body d-flex justify-content-around align-items-center">
                <span class="text-success font-weight-bold"><i class="fas fa-user-shield"></i> Panel del Líder:</span>
                <a href="capturar_vacante.php" class="btn btn-outline-primary btn-sm">
                    <i class="fas fa-plus"></i> Nueva Vacante
                </a>
                <a href="capturar_evaluacion.php" class="btn btn-outline-success btn-sm">
                    <i class="fas fa-clipboard-check"></i> Registrar Evaluación
                </a>
                <button class="btn btn-outline-secondary btn-sm" onclick="location.reload();">
                    <i class="fas fa-sync"></i> Actualizar Arena
                </button>
            </div>
        </div>
    </div>
    <?php endif; ?>

    <div class="col-12">
        <div class="card shadow-sm">
            <div class="card-header bg-white d-flex justify-content-between align-items-center">
                <h5 class="mb-0 text-secondary">Historial de Evaluaciones Recientes</h5>
                <span class="badge badge-pill badge-info">Vista Pública</span>
            </div>
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead class="thead-light">
                        <tr>
                            <th>ID</th>
                            <th>Vacante / Experimento</th>
                            <th>Analista (Griego)</th>
                            <th>Ronda</th>
                            <th>Semáforo</th>
                            <th>Puntaje</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT e.*, v.nombre_vacante, v.experimento 
                                FROM vacantes_evaluaciones e 
                                JOIN vacantes v ON e.id_vacante = v.id_vacante 
                                ORDER BY e.fecha_registro DESC LIMIT 20";
                        $res = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($res) > 0):
                            while($row = mysqli_fetch_assoc($res)):
                                // Color del badge del semáforo
                                $badge_class = 'badge-secondary';
                                if($row['semaforo'] == 'Verde') $badge_class = 'badge-success';
                                if($row['semaforo'] == 'Amarillo') $badge_class = 'badge-warning';
                                if($row['semaforo'] == 'Rojo') $badge_class = 'badge-danger';
                        ?>
                        <tr>
                            <td><?php echo $row['id_evaluacion']; ?></td>
                            <td>
                                <strong><?php echo $row['nombre_vacante']; ?></strong><br>
                                <small class="text-muted"><?php echo $row['experimento']; ?></small>
                            </td>
                            <td>
                                <span class="badge badge-dark"><?php echo $row['nombre_griego']; ?></span>
                                <small class="d-block text-muted">Perfil: <?php echo $row['letra_perfil']; ?></small>
                            </td>
                            <td><span class="badge badge-light border">R<?php echo $row['ronda']; ?></span></td>
                            <td><span class="badge <?php echo $badge_class; ?>"><?php echo $row['semaforo']; ?></span></td>
                            <td class="font-italic"><?php echo number_format($row['puntuacion'], 2); ?></td>
                            <td>
                                <a href="detalle_evaluacion.php?id=<?php echo $row['id_evaluacion']; ?>" class="btn btn-sm btn-info text-white">
                                    <i class="fas fa-eye"></i> Ver Análisis
                                </a>
                            </td>
                        </tr>
                        <?php 
                            endwhile; 
                        else:
                        ?>
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <i class="fas fa-inbox fa-3x mb-3"></i><br>
                                No hay evaluaciones registradas aún.
                            </td>
                        </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
