<header class="bg-dark py-2 py-md-0 sticky-top z-2">
    <div class="container px-0">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">

                <div class="navbar-brand col-md-2 col-sm-10">
                    <a class="text-light" href="/">CHAT</a>
                </div>

                <button class="navbar-toggler d-lg-none focus-ring focus-ring-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                    <span class='material-symbols-outlined'>Menu</span>
                </button>

                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    <ul class="navbar-nav col col-sm-12 col-lg-8 col-xl-6 mb-lg-0 justify-content-end w-100">
                        
                        <?php
                        if ($_SESSION["logado"]) {
                            echo "
                                    <li class='text-light px-0 px-sm-0 d-md-flex justify-content-lg-center align-items-md-center'>Seja muito bem-vindo, {$_SESSION['nome']}</li>
                                    <li class='nav-item px-0 px-sm-0 d-md-flex justify-content-lg-center align-items-md-center'>
                                        <a class='nav-link text-danger' aria-current='' href='/logoff'>Sair</a>
                                    </li>
                                ";
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>