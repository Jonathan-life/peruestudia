<?php
require 'conexion.php'; // Incluye la conexión
require 'clases.php'; // Incluye las clases si están en archivo separado

$evaluaciones = new Evaluaciones($pdo);
$preguntas = new Preguntas($pdo);
$alternativas = new Alternativas($pdo);

// Crear evaluación
$idEvaluacion = $evaluaciones->create([
    'titulo' => 'Evaluación de Matemática',
    'tipo' => 'Parcial',
    'area' => 'Matemática',
    'fecha_inicio' => '2025-06-05 10:00:00',
    'fecha_fin' => '2025-06-05 11:00:00',
    'tiempo_minutos' => 60,
    'id_curso' => 1
]);

// Crear pregunta
$idPregunta = $preguntas->create([
    'id_evaluacion' => $idEvaluacion,
    'texto_pregunta' => '¿Cuánto es 5 + 5?',
    'puntaje' => 1.00
]);

// Crear alternativas
$alternativas->create([
    'id_pregunta' => $idPregunta,
    'texto_alternativa' => '10',
    'es_correcta' => true
]);

$alternativas->create([
    'id_pregunta' => $idPregunta,
    'texto_alternativa' => '9',
    'es_correcta' => false
]);

echo "Evaluación ID: $idEvaluacion\n";
echo "Pregunta ID: $idPregunta\n";
