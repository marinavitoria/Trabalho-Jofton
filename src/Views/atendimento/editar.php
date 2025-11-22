<?php include '../src/Views/templates/header.php'; ?>

<div class="card shadow-sm mt-4">
    <div class="card-header bg-warning text-dark">
        <h4 class="mb-0">Editar Atendimento #<?php echo $atendimento['id']; ?></h4>
    </div>
    <div class="card-body">
        <form action="index.php?rota=editar_atendimento&id=<?php echo $atendimento['id']; ?>" method="post">
            
            <div class="mb-3">
                <label class="form-label">Descrição</label>
                <input type="text" name="descricao" class="form-control" 
                       value="<?php echo htmlspecialchars($atendimento['descricao']); ?>" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Educador</label>
                <input type="text" name="educador" class="form-control" 
                       value="<?php echo htmlspecialchars($atendimento['nome_educador']); ?>" required>
            </div>

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label class="form-label">Aluno</label>
                    <select name="idAluno" class="form-select" required>
                        <?php foreach ($alunos as $aluno): ?>
                            <option value="<?php echo $aluno['id']; ?>" 
                                <?php echo ($aluno['id'] == $atendimento['id_aluno']) ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($aluno['nome']); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Prioridade</label>
                    <select name="prioridade" class="form-select">
                        <option value="Baixo" <?php echo ($atendimento['prioridade'] == 'Baixo') ? 'selected' : ''; ?>>Baixo</option>
                        <option value="Medio" <?php echo ($atendimento['prioridade'] == 'Medio') ? 'selected' : ''; ?>>Medio</option>
                        <option value="Alto" <?php echo ($atendimento['prioridade'] == 'Alto') ? 'selected' : ''; ?>>Alto</option>
                    </select>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Salvar Alterações</button>
            <a href="index.php?rota=kanban" class="btn btn-outline-secondary">Cancelar</a>
        </form>
    </div>
</div>

<?php include '../src/Views/templates/footer.php'; ?>