<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

    <script>
        // Menu Toggle
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');
        let btnMenu = document.querySelector('.btn-menu')

        toggle.onclick = function(){
            navigation.classList.toggle('active')
            main.classList.toggle('active')
            btnMenu.classList.toggle('back-to')
        }
    </script>
</body>
</html>