<?php
// Carrega configurações e helpers
require_once '../config/Conection.php';

// Roteamento Simples
$rota = $_GET['rota'] ?? 'kanban';

switch ($rota) {
    case 'cadastrar_aluno':
        require_once '../src/Controllers/AlunoController.php';
        (new AlunoController())->criar();
        break;
    
    case 'cadastrar_atendimento':
        require_once '../src/Controllers/AtendimentoController.php';
        (new AtendimentoController())->criar();
        break;

    case 'editar_atendimento':
        require_once '../src/Controllers/AtendimentoController.php';
        (new AtendimentoController())->editar();
        break;

    case 'kanban':
        require_once '../src/Controllers/AtendimentoController.php';
        (new AtendimentoController())->index();
        break;

    case 'mudar_status':
        require_once '../src/Controllers/AtendimentoController.php';
        (new AtendimentoController())->mudarStatus();
        break;

    case 'excluir_atendimento':
        require_once '../src/Controllers/AtendimentoController.php';
        (new AtendimentoController())->excluir();
        break;

    default:
        echo "Página não encontrada";
        break;
}
?>