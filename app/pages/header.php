<?php

    require_once '../../backend/conexao.php';
    require_once '../../backend/funcoes.php';

?>
<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>HelpOS | Home</title>
    <meta name="description" content="HelpOS, sistema web desenvolvido por Matheus Brunelli e Armando Bretas.">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/css/style.css">


    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="../assets/js/app.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <script>
        // PARAMETRO PARA INICIAR O JQUERY 
        $(document).ready(function() {
            $('#telefone').mask('(00) 0 0000-0000')
        })
    </script>
</head>

<body>

    <header class="sticky-top">
        <!-- PRIMEIRO NAV  -->
        <nav class="navbar-nav navbar-dark bg-primary shadow position">
            <ul class="navbar nav justify-content-between py-4">
                <li class="nav-item">

                    <!-- BARRA DE SEARCH DO NAV  -->
                    <div class="searching">
                        <center>
                            <a href="javascript:void(0)" class="search-open">
                                <i class="fa fa-search text-light ml-5"></i>
                            </a>
                        </center>

                        <div class="search-inline">
                            <form>
                                <input type="text" class="form-control" placeholder="Digite o número do Ticket...">
                                <button type="submit">
                                     <i class="fa fa-search"></i>
                                 </button>
                                <a href="javascript:void(0)" class="search-close">
                                    <i class="fa fa-times"></i>
                                </a>
                            </form>
                        </div>
                    </div>

                    <script>
                        var sp = document.querySelector('.search-open');
                        var searchbar = document.querySelector('.search-inline');
                        var shclose = document.querySelector('.search-close');

                        function changeClass() {
                            searchbar.classList.add('search-visible');
                        }

                        function closesearch() {
                            searchbar.classList.remove('search-visible');
                        }
                        sp.addEventListener('click', changeClass);
                        shclose.addEventListener('click', closesearch);
                    </script>

                </li>
                <li class="nav-item">
                    <a href="" class="navbar-brand">HelpOS</a>
                </li>
                <li class="nav-item">
                    <!-- MENU DO USUARIO -->
                    <div class="dropdown">
                        <a href="" class="nav-link text-light mr-5" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-user-circle fa-2x"></i>
                        </a>

                        <!-- OPÇÕES DO DROPDOWN  -->
                        <div class="dropdown-menu shadow dropdown-menu-right position-absolute mr-4 text-center" aria-labelledby="dropdownMenu">
                            <h6 class="dropdown-header bg-light"><img src="../assets/img/user.png" width="30px" height="30px"> - <?=$_SESSION['UsuarioNome']?> </h6>
                            <a href="" class="dropdown-item"><i class="fas fa-cog"></i> Configurações</a>
                            <div class="dropdown-divider"></div>
                            <a href="logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Sair</a>
                        </div>
                    </div>
                </li>
            </ul>
        </nav>

        <!-- SEGUNDO NAV -->
        <nav class="navbar-nav navbar-light bg-light shadow">
            <ul class="navbar nav justify-content-around py-3 container">
                <li class="nav-item">
                    <a href="index.php?pg=home" class="nav-link ativo">Home</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pg=tickets" class="nav-link">Tickets</a>
                </li>
                <li class="nav-item">
                    <a href="index.php?pg=relatorio" class="nav-link">Relatório</a>
                </li>
                <!-- MENU DROPDOWN GERENCIAL  -->
                <div class="dropdown">
                    <li class="nav-item">
                        <a href="" class="nav-link dropdown-toggle" id="dropdown-gerencial" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Gerencial</a>
                        <div class="dropdown-menu shadow position-absolute" aria-labelledby="dropdown-gerencial">
                            <!-- LINK QUE ATIVA O MODAL PARA CADASTRAR USUARIOS  -->
                            <a href="" class="dropdown-item" data-toggle="modal" data-target="#add-usuario"><i class="fas fa-plus-circle"></i> Cadastrar usuários</a>
                        </div>
                    </li>
                </div>
            </ul>
        </nav>
    </header>


      
  

    <?php

        if (isset($_GET['pg'])) {
            if ( $_GET['pg'] == 'home') {
                $breadcrumb = "";
            } 
            if ( $_GET['pg'] == 'relatorio') {
                $breadcrumb = "Relatório";
            } 
            if ( $_GET['pg'] == 'tickets') {
                $breadcrumb = "Tickets";
            } 
        } 


        echo '
        <div class="py-3 container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-white" style="padding: 0.75rem 0rem !important;">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">'.$breadcrumb.'</li>
                </ol>
            </nav>
        </div>';

    ?>
 