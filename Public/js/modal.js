let modals = document.querySelectorAll(".modal");
let spans = document.querySelectorAll(".close");
let projectActions = document.querySelectorAll(
    ".project-actions :nth-child(even)"
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

// window.onclick = function (event) {
//     if (event.target == modals) {
//         modal.style.display = "none";
//     }
// };
