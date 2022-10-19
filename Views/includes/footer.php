<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

<script>
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

toggle.onclick = function() {
    navigation.classList.toggle('active')
    main.classList.toggle('active')
    btnMenu.classList.toggle('back-to')
    linea2.classList.toggle('active')
    linea3.classList.toggle('active')
    linea4.classList.toggle('active')
    tabcontainer.classList.toggle('active')
    topbar.classList.toggle('baract')
}
</script>
<script src="../public/js/projects.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>
</html>