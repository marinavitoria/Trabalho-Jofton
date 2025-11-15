<?php
//Conecto com o BD
$db = new PDO("mysql:host=localhost; 
dbname=mysql","root","");

//Recupero o ID
$id = $_GET['id'];

//Prepração do SQL
$stmt=$db->prepare("DELETE FROM atendimento WHERE id=:id");
$stmt->bindParam(':id', $id);
$stmt->execute();

//Voltar a pagina
header("Location: ../gerenciar.php");

?>