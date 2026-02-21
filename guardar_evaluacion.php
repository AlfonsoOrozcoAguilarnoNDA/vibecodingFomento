<?php
include 'config.php';

// Bloqueo de seguridad: Si no es el Líder, no procesa nada
if (!$es_lider) {
    header("Location: index.php?error=no_autorizado");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitización básica de entradas
    $id_vacante       = mysqli_real_escape_string($conn, $_POST['id_vacante']);
    $nombre_griego    = mysqli_real_escape_string($conn, $_POST['nombre_griego']);
    $letra_perfil     = mysqli_real_escape_string($conn, $_POST['letra_perfil']);
    $ronda            = mysqli_real_escape_string($conn, $_POST['ronda']);
    $semaforo         = mysqli_real_escape_string($conn, $_POST['semaforo']);
    $puntuacion       = mysqli_real_escape_string($conn, $_POST['puntuacion']);
    $respuesta_llm    = mysqli_real_escape_string($conn, $_POST['respuesta_llm']);
    $evidencia_link   = mysqli_real_escape_string($conn, $_POST['evidencia_link']);
    $comentario_eval  = mysqli_real_escape_string($conn, $_POST['comentario_evaluador']);
    $cambio_criterio  = isset($_POST['cambio_criterio']) ? 1 : 0;

    $sql = "INSERT INTO vacantes_evaluaciones 
            (id_vacante, nombre_griego, letra_perfil, ronda, semaforo, puntuacion, respuesta_llm, evidencia_link, comentario_evaluador, cambio_criterio) 
            VALUES 
            ('$id_vacante', '$nombre_griego', '$letra_perfil', '$ronda', '$semaforo', '$puntuacion', '$respuesta_llm', '$evidencia_link', '$comentario_eval', '$cambio_criterio')";

    if (mysqli_query($conn, $sql)) {
        // Regresamos al dashboard con éxito
        header("Location: index.php?msg=evaluacion_guardada");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
