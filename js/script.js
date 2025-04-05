document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.btn-success');
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            alert('Producto agregado al carrito');
        });
    });
});
