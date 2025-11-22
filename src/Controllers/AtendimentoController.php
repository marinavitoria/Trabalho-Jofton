<?php
require_once '../src/Models/Atendimento.php';
require_once '../src/Models/Aluno.php';

class AtendimentoController {
    
    public function index() {
        $atendimentoModel = new Atendimento();
        $todos = $atendimentoModel->listarTodos();

        // Organiza para o Kanban
        $kanban = [
            'A esperar' => [],
            'Em atendimento' => [],
            'Finalizado' => []
        ];

        foreach ($todos as $tarefa) {
            // Normaliza a chave do array caso o banco retorne minúsculo/maiúsculo diferente
            $status = ucfirst(strtolower($tarefa['status'])); 
            // Ajuste fino para bater com as chaves do array $kanban se necessário
            if($status == 'A esperar') $kanban['A esperar'][] = $tarefa;
            elseif($status == 'Em atendimento') $kanban['Em atendimento'][] = $tarefa;
            elseif($status == 'Finalizado') $kanban['Finalizado'][] = $tarefa;
        }

        require_once '../src/Views/atendimento/kanban.php';
    }

    public function criar() {
        $alunoModel = new Aluno();
        $alunos = $alunoModel->listarTodos();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $atendimento = new Atendimento();
            $dados = [
                'descricao' => $_POST['descricao'],
                'educador' => $_POST['educador'],
                'idAluno' => $_POST['idAluno'],
                'prioridade' => $_POST['prioridade']
            ];
            $atendimento->criar($dados);
            header('Location: index.php?rota=kanban');
        }

        require_once '../src/Views/atendimento/cadastro.php';
    }

    public function editar() {
        $id = $_GET['id'];
        $atendimentoModel = new Atendimento();
        $alunoModel = new Aluno();
        
        $atendimento = $atendimentoModel->buscarPorId($id);
        $alunos = $alunoModel->listarTodos();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'descricao' => $_POST['descricao'],
                'educador' => $_POST['educador'],
                'idAluno' => $_POST['idAluno'],
                'prioridade' => $_POST['prioridade']
            ];
            $atendimentoModel->atualizar($id, $dados);
            header('Location: index.php?rota=kanban');
        }

        require_once '../src/Views/atendimento/editar.php';
    }

    public function mudarStatus() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $atendimento = new Atendimento();
            $atendimento->atualizarStatus($_GET['id'], $_POST['status']);
            header('Location: index.php?rota=kanban');
        }
    }

    public function excluir() {
        $atendimento = new Atendimento();
        $atendimento->excluir($_GET['id']);
        header('Location: index.php?rota=kanban');
    }
}