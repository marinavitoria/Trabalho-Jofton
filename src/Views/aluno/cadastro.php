<?php include '../src/Views/templates/header.php'; ?>

<div class="row justify-content-center mt-4">
    <div class="col-md-8">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Cadastrar Novo Aluno</h4>
            </div>
            <div class="card-body">
                
                <form action="index.php?rota=cadastrar_aluno" method="post">

                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome Completo</label>
                        <input type="text" class="form-control" name="nome" id="nome" 
                               placeholder="Digite o nome do aluno" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="email" class="form-control" id="email" name="email" 
                               placeholder="exemplo@email.com" required>
                    </div>

                    <div class="d-flex justify-content-between mt-4">
                        <a href="index.php?rota=kanban" class="btn btn-outline-secondary">Voltar</a>
                        <button type="submit" class="btn btn-success">Salvar Aluno</button>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

<?php include '../src/Views/templates/footer.php'; ?>