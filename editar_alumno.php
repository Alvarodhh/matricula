<?php
require_once __DIR__ . '/includes/functions.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$tarea = obtenerAlumnosPorId($_GET['id']);

if (!$tarea) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $count = actualizarAlumno($_GET['id'], $_POST['nombre'], $_POST['apellido'], $_POST['dni'],$_POST['carrera'], isset($_POST['estado']));
    if ($count > 0) {
        header("Location: index.php");
        exit;
    } else {
        $error = "No se pudo actualizar el Alumno.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Alumno</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
    <center><h1>Editar Alumno</h1></center>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Nombre: <input type="text" name="nombre" value="<?php echo htmlspecialchars($tarea['nombre']); ?>" required></label><br>
        <label>Apellido: <input type="text" name="apellido" value="<?php echo htmlspecialchars($tarea['apellido']); ?>" required></label><br>
        <label>Dni: <input type="number" name="dni" value="<?php echo ($tarea['dni']); ?>" required></label><br>
        <label>Carrera:
            <select name="carrera" class="opciones">
                <option value="DSI">DSI</option>
                <option value="CONTA">CO</option>
                <option value="IA">IA</option>
                <option value="PA">PA</option>
                <option value="GOT">GOT</option>
                <option value="INICIAL">INICIAL</option>
                <option value="INICIAL  EIB">INICIAL  EIB</option>
                <option value="EDUCACION FISICA">EDUCACION FISICA</option>
                <option value="PRIMARIA  EIB">PRIMARIA  EIB</option>
                <option value="IEI">IDIOMAS ESPECIALIDAD INGLES</option>
            </select>
        </label><br>
        <label>Estado: <input type="checkbox" name="estado" <?php echo $tarea['estado'] ? 'checked' : ''; ?>></label><br>
        <input type="submit" value="Actualizar Alumno">
    </form>

    <a href="index.php">Volver a la lista de tareas</a>
</div>
</body>
</html>

