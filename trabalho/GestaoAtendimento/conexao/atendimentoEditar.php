<?php

$db = new PDO("mysql:host=localhost;  dbname=mysql","root","");

$id = $_GET['id'];

$descricao = $_POST['descricao'];
$nome_educador = $_POST['educador'];
$idAluno = $_POST['idAluno'];
$prioridade = $_POST['prioridade'];

//Preparação do SQL
$stml = $db->prepare("UPDATE atendimento SET
id_aluno =:id_aluno , descricao=:descricao,
nome_educador=:nome_educador, prioridade=:prioridade
WHERE id=:id");
$stml->bindParam(':id_aluno', $idAluno);
$stml->bindParam(':descricao', $descricao);
$stml->bindParam(':nome_educador', $nome_educador);
$stml->bindParam(':prioridade', $prioridade);
$stml->bindParam(':id', $id);

if($stml->execute()){
    echo "<script>alert('Edição realizada com Sucesso!');
    window.location.href = '../gerenciar.php';
    </script>";
}else{
    echo "<script>alert('Erro ao editar!');
    window.location.href = '../gerenciar.php';
    </script>";
}





?>