<?php
// Datos de conexión a PostgreSQL
$host = "localhost";
$dbname = "tu_base_de_datos";   // ← cambia por el nombre de tu base
$user = "postgres";
$password = "tu_contraseña";

// Recibir datos del formulario
$nombre = $_POST['nombre'];
$correo = $_POST['correo'];
$opinion = $_POST['opinion'];  // Cambiado a opinion

try {
    // Conexión a PostgreSQL
    $conn = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Insertar opinión
    $sql = "INSERT INTO opiniones (nombre, correo, opinion) VALUES (:nombre, :correo, :opinion)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        ':nombre' => $nombre,
        ':correo' => $correo,
        ':opinion' => $opinion
    ]);

    echo "✅ ¡Gracias por tu opinión!";
} catch (PDOException $e) {
    echo "❌ Error: " . $e->getMessage();
}
?>