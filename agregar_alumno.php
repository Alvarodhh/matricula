<?php
require_once __DIR__ . '/includes/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = crearAlumno($_POST['nombre'], $_POST['apellido'], $_POST['dni'],$_POST['carrera']);
    if ($id) {
        header("Location: index.php");
        exit;
    } else {
        $error = "No se pudo crear la tarea.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Nueva Tarea</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
    <h1>Agregar Nuevo Alumno</h1>

    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>

    <form method="POST">
        <label>Nombre: <input type="text" name="nombre" required></label><br>
        <label>Apellido: <input type="text" name="apellido" required></label><br>
        <label>Dni: <input type="number" name="dni" required></label><br>
        <label>Carrera:
            <select name="carrera">
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
        <input type="submit" value="Agregar Alumno">
    </form>

    <a href="index.php">Volver a la lista de alumnos</a>
</div>
</body>
</html>

