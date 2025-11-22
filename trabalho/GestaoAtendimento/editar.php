<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Atendimento</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</head>
<body>
    
<nav class="navbar navbar-expand-lg" data-bs-theme="dark" style="background-color: #0056b3;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Unipê</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link"  href="index.php">Cadastrar Aluno</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="cadastrar.php">Cadastrar Atendimento</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gerenciar.php">Gerenciar Atendimento</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <!-- Conteudo da pagina -->
<?php
//Aloca o id
$id = $_GET['id'];

$db = new PDO("mysql:host=localhost;
dbname=mysql","root","");

$atendimento = $db->prepare("SELECT * FROM atendimento
WHERE id=:id");
$atendimento->bindValue(':id', $id);
$atendimento->execute();

$atendimento = $atendimento->fetch(PDO::FETCH_ASSOC);

?>
  <form action="conexao/atendimentoEditar.php?id=<?php echo $atendimento['id'];?>" method="post">
    <br>
    <div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Descrição do Atendimento</label>
  <input type="text" value="<?php echo $atendimento['descricao'];?>" class="form-control" name="descricao" id="exampleFormControlInput1" placeholder="Digite a descrição do atendimento" required>
</div>
<br>
<div class="mb-3">
  <label for="exampleFormControlInput1" class="form-label">Educador Responsavel</label>
  <input type="text" value="<?php echo $atendimento['nome_educador'];?>" class="form-control" name="educador"  id="exampleFormControlInput1" placeholder="Digite o nome" required>
</div>
<br>
<label for="exampleFormControlInput1" class="form-label">Selecione Aluno</label>
<select class="form-select" aria-label="Default select example" name="idAluno" required>

<?php
  //Conectar ao banco de dados
  $db = new PDO("mysql:host=localhost;
  dbname=mysql","root","");
  $consulta = $db->query("SELECT * FROM aluno");

  while($aluno = $consulta->fetch(PDO::FETCH_ASSOC)){
?>
    <option value="<?php echo $aluno['id'];?>">
    <?php echo $aluno['nome'];?></option>
<?php
  }
?>
</select>
<br>
<label for="exampleFormControlInput1" class="form-label">Selecione Prioridade</label>
<select class="form-select" name="prioridade"  aria-label="Default select example">

<option value="<?php echo $atendimento['prioridade'];?>">
  <?php echo $atendimento['prioridade'];?>
</option>

<option value="Alto">Alto</option>
<option value="Medio">Medio</option>
  <option value="Baixo">Baixo</option>
</select>
<br>
<div class="col-auto">
    <button type="submit" class="btn btn-primary mb-3">Editar</button>
  </div>

  </form>


</div>





</body>
</html>