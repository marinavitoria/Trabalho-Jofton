function confirmarExclusao(url) {
    if (confirm("Deseja realmente excluir este registro?")) {
        window.location.href = url;
    }
}