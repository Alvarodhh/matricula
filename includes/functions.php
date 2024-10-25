<?php
require_once __DIR__ . '/../config/database.php';

function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}
function crearAlumno($nombre, $apellido, $dni,$carrera) {
    global $tasksCollection;
    $resultado = $tasksCollection->insertOne([
        'nombre' => sanitizeInput($nombre),
        'apellido' => sanitizeInput($apellido),
        'dni' => sanitizeInput($dni),
        'carrera' => sanitizeInput($carrera),
        'estado' => false
    ]);
    return $resultado->getInsertedId();
}

function obtenerAlumnos() {
    global $tasksCollection;
    return $tasksCollection->find();
}
function obtenerAlumnosPorId($id) {
    global $tasksCollection;
    return $tasksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
}

function actualizarAlumno($id, $nombre, $apellido, $dni,$carrera, $estado) {
    global $tasksCollection;
    $resultado = $tasksCollection->updateOne(
        ['_id' => new MongoDB\BSON\ObjectId($id)],
        ['$set' => [
            'nombre' => sanitizeInput($nombre),
            'apellido' => sanitizeInput($apellido),
            'dni' => sanitizeInput($dni),
            'carrera' => sanitizeInput($carrera),
            'estado' => $estado
        ]]
    );
    return $resultado->getModifiedCount();
}
function eliminarAlumno($id) {
    global $tasksCollection;
    $resultado = $tasksCollection->deleteOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    return $resultado->getDeletedCount();
}
function toggleAlumnoMatriculado($id) {
    global $tasksCollection;
    $alumno = $tasksCollection->findOne(['_id' => new MongoDB\BSON\ObjectId($id)]);
    if ($alumno) {
        $nuevoEstado = !$alumno['estado'];
        $resultado = $tasksCollection->updateOne(
            ['_id' => new MongoDB\BSON\ObjectId($id)],
            ['$set' => ['estado' => $nuevoEstado]]
        );
        return $resultado->getModifiedCount() > 0 ? $nuevoEstado : null;
    }
    return null;
}