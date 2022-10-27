// Menu Toggle
let toggle = document.querySelector('.toggle');
let navigation = document.querySelector('.navigation');
let main = document.querySelector('.main');
let btnMenu = document.querySelector('.btn-menu')
let linea2 = document.querySelector('.linea2');
let linea3 = document.querySelector('.linea3');
let linea4 = document.querySelector('.linea4');
let tabcontainer = document.querySelector('.tabcontainer');
let topbar = document.querySelector('.topbar');
let btnElim = document.querySelector('.eliminar_proyecto');

toggle.onclick = function() {
    navigation.classList.toggle('active')
    main.classList.toggle('active')
    btnMenu.classList.toggle('back-to')
    linea2.classList.toggle('active')
    linea3.classList.toggle('active')
    linea4.classList.toggle('active')
    tabcontainer.classList.toggle('active')
    topbar.classList.toggle('baract')
    btnElim.classList.toggle('active')
}