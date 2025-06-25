<?php
$nombre = $_POST['nombre'];
$mensaje = $_POST['mensaje'];

$host = "dpg-d151jqbuibrs73bfvi40-a.oregon-postgres.render.com";
$dbname = "noe";
$user = "noe_user";
$password = "qxb1V22veQN5IqDvnz81XrA4KrtVecyi";
$port = "5432";

$conn = pg_connect("host=$host dbname=$dbname user=$user password=$password port=$port");

if (!$conn) {
    die("Error al conectar con la base de datos.");
}

$query = "INSERT INTO opiniones (nombre, mensaje) VALUES ($1, $2)";
$result = pg_query_params($conn, $query, array($nombre, $mensaje));

if ($result) {
    echo "¡Gracias por tu opinión!";
} else {
    echo "Hubo un error.";
}

pg_close($conn);
?>
