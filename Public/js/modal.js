/*
let modals = document.querySelectorAll(".modal");
let spans = document.querySelectorAll(".close");
let projectActions = document.querySelectorAll(
    ".project-actions :nth-child(odd)"
);

projectActions.forEach((btn) => {
    btn.onclick = function () {
        modals.forEach((modal) => {
            modal.style.display = "block";
        });
    };
});

console.log(projectActions);

spans.forEach((span) => {
    span.onclick = () => {
        modals.forEach((modal) => {
            modal.style.display = "none";
        });
    };
});

window.onclick = function (event) {
     if (event.target == modals) {
        modal.style.display = "none";
     }
 };
 */

let modal = document.getElementById("modal-eliminar");
let span = document.getElementById("close");
let btnCancelar = document.getElementById("btn-cancelar");
let btnEliminar = document.getElementById("eliminar-pr")


btnEliminar.onclick = ()=>{
    modal.style.display = "block"
}

btnCancelar.onclick = ()=>{
    modal.style.display = "none"
}

span.onclick = ()=>{
    modal.style.display = "none"
}

window.onclick = function (event) {
    if (event.target == modal) {
       modal.style.display = "none";
    }
};

