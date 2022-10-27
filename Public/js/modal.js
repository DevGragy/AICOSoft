let modal = document.getElementById("modal-eliminar");
let close = document.getElementById("close-pr");
let btnCancelar = document.getElementById("btn-cancelar");
let btnEliminar = document.getElementById("eliminar-pr");
console.log(modal);
console.log(close);

btnEliminar.onclick = () => {
    modal.style.display = "block";
};

btnCancelar.onclick = () => {
    modal.style.display = "none";
    console.log(modal);
    console.log(close);
};

close.onclick = () => {
    modal.style.display = "none";
};

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
};
