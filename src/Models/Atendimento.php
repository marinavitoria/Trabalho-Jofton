<?php
class Atendimento {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    // Busca atendimentos JÁ COM o nome do aluno
    public function listarTodos() {
        $sql = "SELECT at.*, al.nome AS nome_aluno 
                FROM atendimento at 
                INNER JOIN aluno al ON at.id_aluno = al.id 
                ORDER BY at.prioridade DESC"; // Ordena por prioridade
        return $this->conn->query($sql)->fetchAll();
    }

    public function buscarPorId($id) {
        $stmt = $this->conn->prepare("SELECT * FROM atendimento WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function criar($dados) {
        $sql = "INSERT INTO atendimento (id_aluno, descricao, nome_educador, prioridade, status) 
                VALUES (:idAluno, :descricao, :educador, :prioridade, 'A esperar')";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($dados);
    }

    public function atualizar($id, $dados) {
        $sql = "UPDATE atendimento SET id_aluno = :idAluno, descricao = :descricao, 
                nome_educador = :educador, prioridade = :prioridade WHERE id = :id";
        $dados['id'] = $id;
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($dados);
    }

    public function atualizarStatus($id, $status) {
        $stmt = $this->conn->prepare("UPDATE atendimento SET status = :status WHERE id = :id");
        return $stmt->execute(['status' => $status, 'id' => $id]);
    }

    public function excluir($id) {
        $stmt = $this->conn->prepare("DELETE FROM atendimento WHERE id = :id");
        return $stmt->execute(['id' => $id]);
    }
}