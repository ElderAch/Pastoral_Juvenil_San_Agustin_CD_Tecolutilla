<?php
// Nombre del archivo CSV donde se guardarán los registros
$archivo = 'respuestas.csv';

// Recibir los datos del formulario
$nombre = $_POST['nombre'] ?? '';
$edad = $_POST['edad'] ?? '';
$vives = $_POST['vives'] ?? '';
$ermita = $_POST['ermita'] ?? '';
$zona = $_POST['zona'] ?? '';
$ministerio = $_POST['ministerio'] ?? '';
$comentario = $_POST['comentario'] ?? '';

// Limpiar caracteres especiales (prevención básica)
$nombre = str_replace(["\n", "\r", ","], ['','',';'], $nombre);
$edad = str_replace(["\n", "\r", ","], ['','',';'], $edad);
$vives = str_replace(["\n", "\r", ","], ['','',';'], $vives);
$ermita = str_replace(["\n", "\r", ","], ['','',';'], $ermita);
$zona = str_replace(["\n", "\r", ","], ['','',';'], $zona);
$ministerio = str_replace(["\n", "\r", ","], ['','',';'], $ministerio);
$comentario = str_replace(["\n", "\r", ","], ['','',';'], $comentario);

// Crear la línea CSV
$linea = [$nombre, $edad, $vives, $ermita, $zona, $ministerio, $comentario];
$linea_csv = implode(",", $linea) . "\n";

// Guardar en el archivo CSV (modo append)
file_put_contents($archivo, $linea_csv, FILE_APPEND | LOCK_EX);

// Redirigir a la página de agradecimiento
header("Location: agradecimiento.html");
exit();
?>
