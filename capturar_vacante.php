<?php include 'header.php'; ?>

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-white">
                <h4 class="mb-0 text-primary"><i class="fas fa-briefcase"></i> Registrar Nueva Vacante</h4>
            </div>
            <div class="card-body">
                <?php if (!$es_lider): ?>
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle"></i> Solo el Líder del proyecto puede registrar vacantes.
                    </div>
                <?php else: ?>
                    <form action="procesar_vacante.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Nombre de la Vacante</label>
                                <input type="text" name="nombre_vacante" class="form-control" required>
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Experimento (ID)</label>
                                <input type="text" name="experimento" class="form-control" placeholder="Ej: EXP-01" required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 form-group">
                                <label>Empresa</label>
                                <input type="text" name="empresa_vacante" class="form-control">
                            </div>
                            <div class="col-md-6 form-group">
                                <label>Bolsa de Trabajo (Origen)</label>
                                <input type="text" name="bolsa_trabajo" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Link o PDF de Referencia</label>
                            <input type="text" name="link_pdf" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Imagen de la Vacante (Evidencia Visual)</label>
                            <input type="file" name="imagen_vacante" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label>Descripción Completa (Longtext)</label>
                            <textarea name="descripcion" class="form-control" rows="6" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>Dato Real del Líder (Para Ronda 2)</label>
                            <textarea name="dato_real_lider" class="form-control" rows="3" placeholder="Información verídica que se revelará después..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">
                            <i class="fas fa-save"></i> Guardar Vacante en Sistema
                        </button>
                    </form>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
