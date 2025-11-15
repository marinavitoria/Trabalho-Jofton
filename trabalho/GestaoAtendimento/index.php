<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Aluno</title>
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
          <a class="nav-link active" aria-current="page" href="index.php">Cadastrar Aluno</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="cadastrar.php">Cadastrar Atendimento</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gerenciar.php">Gerenciar Atendimento</a>
        </li>

      </ul>
    </div>
  </div>
</nav>
<br>
<div class="container">
  <!-- Conteudo da pagina -->


  <form action="conexao/alunoCadastrar.php" method="post">

<div class="mb-3">
  <label for="formGroupExampleInput" class="form-label">Nome</label>
  <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome do usuario">
</div>
<div class="mb-3">
  <label for="formGroupExampleInput2" class="form-label">E-mail</label>
  <input type="email" class="form-control" id="email" name="email" placeholder="Digite o e-mail">
</div>

<br>

<div class="mb-3">
    <button type="submit" class="btn btn-primary">Cadastrar</button>
  </div>



</form>

</div>





</body>
</html>