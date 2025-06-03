<?php

class Evaluaciones {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($data): int {
        $stmt = $this->db->prepare("
            INSERT INTO evaluaciones (titulo, tipo, area, fecha_inicio, fecha_fin, tiempo_minutos, id_curso)
            VALUES (:titulo, :tipo, :area, :fecha_inicio, :fecha_fin, :tiempo_minutos, :id_curso)
        ");
        $stmt->bindParam(':titulo', $data['titulo']);
        $stmt->bindParam(':tipo', $data['tipo']);
        $stmt->bindParam(':area', $data['area']);
        $stmt->bindParam(':fecha_inicio', $data['fecha_inicio']);
        $stmt->bindParam(':fecha_fin', $data['fecha_fin']);
        $stmt->bindParam(':tiempo_minutos', $data['tiempo_minutos']);
        $stmt->bindParam(':id_curso', $data['id_curso']);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM evaluaciones");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class Preguntas {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($data): int {
        $stmt = $this->db->prepare("
            INSERT INTO preguntas (id_evaluacion, texto_pregunta, puntaje)
            VALUES (:id_evaluacion, :texto_pregunta, :puntaje)
        ");
        $stmt->bindParam(':id_evaluacion', $data['id_evaluacion']);
        $stmt->bindParam(':texto_pregunta', $data['texto_pregunta']);
        $stmt->bindParam(':puntaje', $data['puntaje']);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM preguntas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class Alternativas {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($data): int {
        $stmt = $this->db->prepare("
            INSERT INTO alternativas (id_pregunta, texto_alternativa, es_correcta)
            VALUES (:id_pregunta, :texto_alternativa, :es_correcta)
        ");
        $stmt->bindParam(':id_pregunta', $data['id_pregunta']);
        $stmt->bindParam(':texto_alternativa', $data['texto_alternativa']);
        $stmt->bindParam(':es_correcta', $data['es_correcta'], PDO::PARAM_BOOL);
        $stmt->execute();
        return $this->db->lastInsertId();
    }

    public function getAll(): array {
        $stmt = $this->db->query("SELECT * FROM alternativas");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
