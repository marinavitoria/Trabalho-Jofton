<?php
require_once '../src/Models/Aluno.php';

class AlunoController {

    public function criar() {
        // Verifica se o formulário foi enviado via POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $nome = $_POST['nome'];
            $email = $_POST['email'];

            // Validação básica
            if (!empty($nome) && !empty($email)) {
                $alunoModel = new Aluno();
                $sucesso = $alunoModel->criar($nome, $email);

                if ($sucesso) {
                    // Redireciona com uma mensagem de sucesso
                    echo "<script>alert('Aluno cadastrado com sucesso!'); window.location.href='index.php?rota=cadastrar_aluno';</script>";
                    exit; // Encerra a execução para garantir o redirecionamento
                } else {
                    echo "<script>alert('Erro ao cadastrar aluno.');</script>";
                }
            } else {
                echo "<script>alert('Preencha todos os campos!');</script>";
            }
        }

        // Se não for POST carrega a View do formulário
        require_once '../src/Views/aluno/cadastro.php';
    }

    // Se você quiser listar os alunos em algum momento
    public function index() {
        $alunoModel = new Aluno();
        $alunos = $alunoModel->listarTodos();
        // require_once '../src/Views/aluno/listar.php'; // (View não criada ainda)
    }
}
?>