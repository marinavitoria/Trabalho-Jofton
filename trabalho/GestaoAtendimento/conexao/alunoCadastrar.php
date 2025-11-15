<?php
//buscar informações do formulário
$nome = $_POST['nome'];
$email = $_POST['email'];

//conectar ao banco de dados
$db = new PDO("mysql:host=localhost; dbname=mysql","root","");

//Criação do script SQL
$stml = $db->prepare("INSERT INTO aluno (nome, email)VALUE(:nome, :email)");
$stml->bindParam(':nome', $nome);
$stml->bindParam(':email', $email);

//Condicional para verificar se o registro foi inserido
if($stml->execute()){
    echo "
    <script>
        alert('Cadastro concluído!');
        window.location.href = '../index.php';
    </script>
    ";
}else{
   echo "
    <script>
        alert('Erro ao cadastrar!');
        window.location.href = '../index.php';
    </script>
    ";
}
?>