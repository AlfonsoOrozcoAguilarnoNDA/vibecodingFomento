<?php include 'config.php'; 
// interfaz superior fija
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simulador Social - Vibecoding México</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; padding-top: 70px; padding-bottom: 60px; }
        .navbar-custom { background-color: #003366; } /* Azul Empresarial */
        .navbar-brand, .nav-link { color: #ffffff !important; }
        .footer-fijo { position: fixed; bottom: 0; width: 100%; height: 50px; background-color: #e9ecef; border-top: 1px solid #dee2e6; line-height: 50px; text-align: center; font-size: 0.9rem; }
        .badge-ip { font-size: 0.7rem; margin-left: 10px; }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-custom fixed-top shadow-sm">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">
            <i class="fas fa-university"></i> Arena de Transparencia
        </a>
        <div class="ml-auto">
            <?php if($es_lider): ?>
                <span class="badge badge-success"><i class="fas fa-key"></i> LÍDER AUTORIZADO</span>
            <?php else: ?>
                <span class="badge badge-secondary"><i class="fas fa-eye"></i> MODO LECTURA</span>
            <?php endif; ?>
        </div>
    </div>
</nav>

<div class="container-fluid">
