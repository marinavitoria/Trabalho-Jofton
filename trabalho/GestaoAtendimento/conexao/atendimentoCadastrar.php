<?php
    //Buscar informações do formulario
    $descricao = $_POST['descricao'];
    $nome_educador = $_POST['educador'];
    $idAluno = $_POST['idAluno'];
    $prioridade = $_POST['prioridade'];
    $status = "a esperar";

    //Conectar ao banco de dados
    $db = new PDO("mysql:host=localhost; dbname=mysql","root","");

    //Preparação do SQL
    $stml = $db->prepare("INSERT INTO atendimento (id_aluno, descricao, nome_educador, prioridade, status) VALUE (:idAluno, :descricao, :nome_educador, :prioridade, :status)");
$stml->bindParam(':idAluno',$idAluno);
$stml->bindParam(':descricao',$descricao);
$stml->bindParam(':nome_educador',$nome_educador);
$stml->bindParam(':prioridade',$prioridade);
$stml->bindParam(':status',$status);

//Condicional para verificar se foi cadastrado
if($stml->execute()){
    echo "
    <script>
        alert('Cadastro Realizado com Sucesso!');
        window.location.href = '../gerenciar.php';
    </script>
    ";
}else{
    echo "
    <script>
        alert('Erro ao cadastrar!');
        window.location.href = '../gerenciar.php';
    </script>
    ";
}



?>