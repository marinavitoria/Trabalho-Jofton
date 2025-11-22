<?php include '../src/Views/templates/header.php'; ?>

<h2 class="mb-4">Gerenciar Atendimentos</h2>

<div class="row">
    <?php 
    // Loop para criar as 3 colunas automaticamente
    $colunas = ['A esperar', 'Em atendimento', 'Finalizado'];
    foreach ($colunas as $coluna): 
    ?>
    
    <div class="col-md-4">
        <div class="card">
            <div class="card-header text-center fw-bold bg-light">
                <?php echo $coluna; ?>
            </div>
            <div class="card-body p-2">
                <?php foreach ($kanban[$coluna] as $item): ?>
                    <div class="card mb-3 shadow-sm border-start border-4 
                        <?php echo ($item['prioridade'] == 'Alto') ? 'border-danger' : (($item['prioridade'] == 'Medio') ? 'border-warning' : 'border-success'); ?>">
                        <div class="card-body">
                            <h5 class="card-title fs-6"><?php echo htmlspecialchars($item['descricao']); ?></h5>
                            <p class="card-text small mb-1">
                                <strong>Aluno:</strong> <?php echo htmlspecialchars($item['nome_aluno']); ?><br>
                                <strong>Educador:</strong> <?php echo htmlspecialchars($item['nome_educador']); ?><br>
                                <strong>Prioridade:</strong> <?php echo htmlspecialchars($item['prioridade']); ?>
                            </p>
                            
                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <div>
                                    <a href="index.php?rota=editar_atendimento&id=<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                                    <button onclick="confirmarExclusao('index.php?rota=excluir_atendimento&id=<?php echo $item['id']; ?>')" class="btn btn-sm btn-outline-danger">X</button>
                                </div>
                            </div>

                            <form action="index.php?rota=mudar_status&id=<?php echo $item['id']; ?>" method="post" class="mt-2">
                                <div class="input-group input-group-sm">
                                    <select name="status" class="form-select">
                                        <option value="A esperar">A esperar</option>
                                        <option value="Em atendimento">Atendendo</option>
                                        <option value="Finalizado">Finalizar</option>
                                    </select>
                                    <button class="btn btn-secondary" type="submit">OK</button>
                                </div>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <?php endforeach; ?>
</div>

<?php include '../src/Views/templates/footer.php'; ?>