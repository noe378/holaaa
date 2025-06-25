<?php
// Datos conexión PostgreSQL
$host = "dpg-d151jqbuibrs73bfvi40-a.oregon-postgres.render.com";
$port = "5432";
$dbname = "noe";
$user = "noe_user";
$password = "qxb1V22veQN5IqDvnz81XrA4KrtVecyi";

// Conectar a la base de datos
$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");
if (!$conn) {
    die("Error en la conexión a la base de datos.");
}

// Recibir datos del formulario
$id = intval($_POST['id']);
$name = $_POST['name'];
$address = $_POST['address'];
$cuote = $_POST['quotes'];

// Insertar datos (asumiendo que la tabla tiene columna id sin serial/autoincrement)
$query = 'INSERT INTO opinio (id, name, address, quotes) VALUES ($1, $2, $3, $4)';
$result = pg_query_params($conn, $query, array($id, $name, $address, $quotes));

if ($result) {
    echo "Opinión guardada con éxito.";
} else {
    echo "Error al guardar la opinión.";
}

pg_close($conn);
?>
