document.querySelectorAll('.btn-danger').forEach(button => {
    button.addEventListener('click', function(e) {
        if (!confirm('Tem certeza que deseja excluir este item?')) {
            e.preventDefault();
        }
    });
});
