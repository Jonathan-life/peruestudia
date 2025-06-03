<?php
require 'conexion.php';
require 'clases.php';

// Crear una evaluación
$evaluaciones = new Evaluaciones($pdo);
$idEval = $evaluaciones->create([
    'titulo' => 'Evaluación Matemática',
    'tipo' => 'Parcial',
    'area' => 'Matemáticas',
    'fecha_inicio' => '2025-06-03 08:00:00',
    'fecha_fin' => '2025-06-03 09:00:00',
    'tiempo_minutos' => 60,
    'id_curso' => 1
]);
echo "Evaluación insertada con ID: $idEval<br>";

// Crear una pregunta
$preguntas = new Preguntas($pdo);
$idPregunta = $preguntas->create([
    'id_evaluacion' => $idEval,
    'texto_pregunta' => '¿Cuál es la raíz cuadrada de 16?',
    'puntaje' => 2.0
]);
echo "Pregunta insertada con ID: $idPregunta<br>";

// Crear alternativas
$alternativas = new Alternativas($pdo);
$idAlt1 = $alternativas->create([
    'id_pregunta' => $idPregunta,
    'texto_alternativa' => '4',
    'es_correcta' => true
]);
$idAlt2 = $alternativas->create([
    'id_pregunta' => $idPregunta,
    'texto_alternativa' => '5',
    'es_correcta' => false
]);
echo "Alternativas insertadas con ID: $idAlt1 y $idAlt2<br>";
?>
