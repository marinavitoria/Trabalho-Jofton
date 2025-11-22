<?php include '../src/Views/templates/header.php'; ?>

<div class="card shadow-sm mt-4">
    <div class="card-header bg-primary text-white">
        <h4 class="mb-0">Novo Atendimento</h4>
    </div>
    <div class="card-body">
        <form action="index.php?rota=cadastrar_atendimento" method="post">
            
            <div class="mb-3">
                <label class="form-label">Descrição do Problema</label>
                <input type="text" name="descricao" class="form-control" required placeholder="Ex: Dúvida sobre matrícula">
            </div>

            <div class="mb-3">
                <label class="form-label">Educador Responsável</label>
                <input type="text" name="educador" class="form-control" required placeholder="Nome do educador">
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Aluno</label>
                    <select name="idAluno" class="form-select" required>
                        <option value="">Selecione um aluno...</option>
                        <?php foreach ($alunos as $aluno): ?>
                            <option value="<?php echo $aluno['id']; ?>">
                                <?php echo htmlspecialchars($aluno['nome']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Prioridade</label>
                    <select name="prioridade" class="form-select">
                        <option value="Baixo">Baixo</option>
                        <option value="Medio" selected>Medio</option>
                        <option value="Alto">Alto</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-success">Salvar Atendimento</button>
            <a href="index.php?rota=kanban" class="btn btn-outline-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php include '../src/Views/templates/footer.php'; ?>