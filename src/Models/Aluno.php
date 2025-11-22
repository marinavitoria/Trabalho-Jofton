<?php
class Aluno {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function listarTodos() {
        return $this->conn->query("SELECT * FROM aluno ORDER BY nome ASC")->fetchAll();
    }

    public function criar($nome, $email) {
        $stmt = $this->conn->prepare("INSERT INTO aluno (nome, email) VALUES (:nome, :email)");
        return $stmt->execute(['nome' => $nome, 'email' => $email]);
    }
}