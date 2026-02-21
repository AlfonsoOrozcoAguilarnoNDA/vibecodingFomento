<?php
// Configuración de Errores (Ocultar en producción si es necesario)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// 1. Zona Horaria de México
date_default_timezone_set('America/Mexico_City');

// 2. Parámetros de Base de Datos
$db_host = 'localhost';
$db_user = 'tu_usuario';
$db_pass = 'tu_password';
$db_name = 'tu_base_de_datos';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Fallo de conexión: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8mb4");

// 3. Validación de IP (Seguridad Hardcoded)
// Consultamos la IP autorizada desde la tabla config
$ip_autorizada = "";
$sql_ip = "SELECT valor FROM config WHERE parametro = 'ip_autorizada' LIMIT 1";
$res_ip = mysqli_query($conn, $sql_ip);
if ($row_ip = mysqli_fetch_assoc($res_ip)) {
    $ip_autorizada = $row_ip['valor'];
}

$mi_ip = $_SERVER['REMOTE_ADDR'];
$es_lider = ($mi_ip === $ip_autorizada);

// 4. Anti-Cache para CSS/JS
$version = time(); 
?>
