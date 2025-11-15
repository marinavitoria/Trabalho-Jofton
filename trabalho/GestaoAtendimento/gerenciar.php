<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Atendimento</title>
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
      function confirmar(url){
        if(confirm("Deseja realmente excluir?")){
            window.location.href = url;
        }
      }
  </script>

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
          <a class="nav-link" href="index.php">Cadastrar Aluno</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cadastrar.php">Cadastrar Atendimento</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="gerenciar.php">Gerenciar Atendimento</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<div class="container">
  <!-- Conteudo da pagina -->
  <table class="table">
  <thead>
    <tr>
      <th scope="col">A espera</th>
      <th scope="col">Em atendimento</th>
      <th scope="col">Finalizado</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <td>


<?php
  //Conectar ao banco de dados
  $db = new PDO("mysql:host=localhost;  dbname=mysql","root","");
  $consulta = $db->query("SELECT * FROM atendimento where status='a esperar'");

  while($atendimento = $consulta->fetch(PDO::FETCH_ASSOC)){
    $id = $atendimento['id'];
    $idAluno = $atendimento['id_aluno'];
    $consultaAluno = $db->prepare("SELECT * FROM aluno 
    where id=:idAluno");
    $consultaAluno->bindValue(':idAluno',$idAluno);
    $consultaAluno->execute();

    $aluno = $consultaAluno->fetch(PDO::FETCH_ASSOC);
    $nomeAluno = $aluno['nome'];
?>


<b>Descrição:</b> <?php echo $atendimento['descricao'];?> <br>
<b>Aluno vinculado:</b> <?php echo $nomeAluno;?><br>
<b>Educador:</b> <?php echo $atendimento['nome_educador'];?><br>
<b>Prioridade:</b> <?php echo $atendimento['prioridade'];?><br>

<a href="editar.php?id=<?php echo $id;?>">
  <button type="button" class="btn btn-outline-primary">Editar</button>
</a>

<button type="button" onclick="confirmar('conexao/atendimentoExcluir.php?id=<?php echo $id;?>')" class="btn btn-outline-danger">Excluir</button>

<br>
<br>

<form action="conexao/atendimentoMudarStatus.php?id=<?php echo $id;?>" method="post">
<table>
  <tr>
    <td>
      <select class="form-select" name="status"  aria-label="Default select example">
        <option value="A esperar">A esperar</option>
        <option value="Em atendimento">Em atendimento</option>
        <option value="Finalizado">Finalizado</option>
    </select>
    </td>
    <td>
      <button type="submit" class="btn btn-outline-primary">Mudar Status</button>
    </td>
  </tr>
</table>


</form>

<br><br>


<?php
  }
?>
     </td>





      <td>

      <?php
  //Conectar ao banco de dados
  $db = new PDO("mysql:host=localhost;  dbname=mysql","root","");
  $consulta = $db->query("SELECT * FROM atendimento where status='em atendimento'");

  while($atendimento = $consulta->fetch(PDO::FETCH_ASSOC)){
    $id = $atendimento['id'];
    $idAluno = $atendimento['id_aluno'];
    $consultaAluno = $db->prepare("SELECT * FROM aluno 
    where id=:idAluno");
    $consultaAluno->bindValue(':idAluno',$idAluno);
    $consultaAluno->execute();

    $aluno = $consultaAluno->fetch(PDO::FETCH_ASSOC);
    $nomeAluno = $aluno['nome'];
?>


<b>Descrição:</b> <?php echo $atendimento['descricao'];?> <br>
<b>Aluno vinculado:</b> <?php echo $nomeAluno;?><br>
<b>Educador:</b> <?php echo $atendimento['nome_educador'];?><br>
<b>Prioridade:</b> <?php echo $atendimento['prioridade'];?><br>

<a href="editar.php?id=<?php echo $id;?>">
  <button type="button" class="btn btn-outline-primary">Editar</button>
</a>

<button type="button" onclick="confirmar('conexao/atendimentoExcluir.php?id=<?php echo $id;?>')" class="btn btn-outline-danger">Excluir</button>

<br>
<br>

<form action="conexao/atendimentoMudarStatus.php?id=<?php echo $id;?>" method="post">
<table>
  <tr>
    <td>
      <select class="form-select" name="status"  aria-label="Default select example">
        <option value="A esperar">A esperar</option>
        <option value="Em atendimento">Em atendimento</option>
        <option value="Finalizado">Finalizado</option>
    </select>
    </td>
    <td>
      <button type="submit" class="btn btn-outline-primary">Mudar Status</button>
    </td>
  </tr>
</table>


</form>

<br><br>


<?php
  }
?>


      </td>





      <td>

      <?php
  //Conectar ao banco de dados
  $db = new PDO("mysql:host=localhost;  dbname=mysql","root","");
  $consulta = $db->query("SELECT * FROM atendimento where status='finalizado'");

  while($atendimento = $consulta->fetch(PDO::FETCH_ASSOC)){
    $id = $atendimento['id'];
    $idAluno = $atendimento['id_aluno'];
    $consultaAluno = $db->prepare("SELECT * FROM aluno 
    where id=:idAluno");
    $consultaAluno->bindValue(':idAluno',$idAluno);
    $consultaAluno->execute();

    $aluno = $consultaAluno->fetch(PDO::FETCH_ASSOC);
    $nomeAluno = $aluno['nome'];
?>


<b>Descrição:</b> <?php echo $atendimento['descricao'];?> <br>
<b>Aluno vinculado:</b> <?php echo $nomeAluno;?><br>
<b>Educador:</b> <?php echo $atendimento['nome_educador'];?><br>
<b>Prioridade:</b> <?php echo $atendimento['prioridade'];?><br>

<a href="editar.php?id=<?php echo $id;?>">
  <button type="button" class="btn btn-outline-primary">Editar</button>
</a>

<button type="button" onclick="confirmar('conexao/atendimentoExcluir.php?id=<?php echo $id;?>')" class="btn btn-outline-danger">Excluir</button>

<br>
<br>

<form action="conexao/atendimentoMudarStatus.php?id=<?php echo $id;?>" method="post">
<table>
  <tr>
    <td>
      <select class="form-select" name="status"  aria-label="Default select example">
        <option value="A esperar">A esperar</option>
        <option value="Em atendimento">Em atendimento</option>
        <option value="Finalizado">Finalizado</option>
    </select>
    </td>
    <td>
      <button type="submit" class="btn btn-outline-primary">Mudar Status</button>
    </td>
  </tr>
</table>


</form>

<br><br>


<?php
  }
?>



      </td>





    </tr>
  </tbody>
</table>



  


</div>





</body>
</html>