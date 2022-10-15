
    </body>

        <div class="container">
        <footer class="py-3 my-4">
            <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <li class="nav-item"><a href="home" class="nav-link px-2 text-light">Inicio</a></li>
            {if !$bool}
                <li class="nav-item"><a href="login" class="nav-link px-2 text-light">Ingresa</a></li>
            {else}
                <a class="nav-link" href="logout"><i class="fa-solid fa-right-from-bracket"></i></a>
            {/if}
            </ul>
            <p class="text-center text-light">© 2022 TP web 2, Matias Moraga</p>
        </footer>
        </div>
</html>