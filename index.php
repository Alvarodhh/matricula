<?php
require_once __DIR__ . '/includes/functions.php';
if (isset($_GET['accion']) && isset($_GET['id'])) {
    switch ($_GET['accion']) {
        case 'eliminar':
            $count = eliminarAlumno($_GET['id']);
            $mensaje = $count > 0 ? "Tarea eliminada con éxito." : "No se pudo eliminar la tarea.";
            break;
        case 'toggleCompletada':
            $nuevoEstado = toggleAlumnoMatriculado($_GET['id']);
            if ($nuevoEstado !== null) {
                $mensaje = $nuevoEstado ? "Tarea marcada como completada." : "Tarea marcada como no completada.";
            } else {
                $mensaje = "No se pudo cambiar el estado de la tarea.";
            }
            break;
    }
}
$alumnos = obtenerAlumnos();
?>
<?php if (isset($mensaje)): ?>
    <div class="<?php echo strpos($mensaje, 'éxito') !== false ? 'success' : 'error'; ?>">
        <?php echo $mensaje; ?>
    </div>
<?php endif; ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Matricula de Alumnos</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <div class="container">
    <center><h1>Gestión de Matricula de Alumnos</h1></center>
    <a href="agregar_alumno.php" class="button">Agregar Nuevo Alumno</a>
    <h2>Lista de Alumnos Matriculados</h2>
    <table border="1">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dni</th>
            <th>Carrera</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($alumnos as $alumno): ?>
        <tr>
            <td><?php echo htmlspecialchars($alumno['nombre']); ?></td>
            <td><?php echo htmlspecialchars($alumno['apellido']); ?></td>
            <td><?php echo htmlspecialchars($alumno['dni']); ?></td>
            <td><?php echo htmlspecialchars($alumno['carrera']); ?></td>
            <td><?php echo $alumno['estado'] ? 'Matriculado' : 'No Matriculado'; ?></td>
            <td
            class="actions">
                <a href="editar_alumno.php?id=<?php echo $alumno['_id']; ?>"class="button">Editar</a>
                <a href="index.php?accion=eliminar&id=<?php echo $alumno['_id']; ?>" class="button"onclick="return confirm('¿Estás seguro de que quieres eliminar esta tarea?');">Eliminar</a>
            </td>

        </tr>
    <?php endforeach; ?>
    </table>
</div>
</body>
</html>

