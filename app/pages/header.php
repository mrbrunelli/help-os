<?php

require_once '../../backend/conexao.php';
require_once '../../backend/funcoes.php';

$_SESSION['UsuarioTipo'] == '1' ? $menu_usuario = "display:none;" : $menu_usuario = "";
$_SESSION['UsuarioTipo'] == '3' ? $menu_atendente = "display:none;" : $menu_atendente = "";

$pg_tickets = "";
$pg_dashboard = "";
$pg_gerencial = "";
$pg_sobre = "";

if (isset($_GET['pg'])) {
  if ($_GET['pg'] == 'tickets') {
    $pg_tickets = "color:black !important;font-weight:bold;";
  }
  if ($_GET['pg'] == 'gerencial') {
    $pg_gerencial =  "color:black !important;font-weight:bold;";
  }
  if ($_GET['pg'] == 'dashboard') {
    $pg_dashboard =  "color:black !important;font-weight:bold;";
  }
  if ($_GET['pg'] == 'sobre') {
    $pg_sobre =  "color:black !important;font-weight:bold;";
  }
}

?>
<!doctype html>
<html lang="pt-br">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>HELP.ME | Home</title>
  <meta name="description" content="HelpOS, sistema web desenvolvido por Matheus Brunelli e Armando Bretas.">
  <link rel="shortcut icon" href="../assets/img/icon.png">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans&display=swap">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.0/css/all.css" integrity="sha384-REHJTs1r2ErKBuJB0fCK99gCYsVjwxHrSU0N7I1zl9vZbggVJXRMsv/sLlOAGb4M" crossorigin="anonymous">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.1/css/buttons.dataTables.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.css">


  <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
  <script src="../assets/js/app.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.js"></script>

</head>

<body>

  <header id="inicio">
    <!-- PRIMEIRO NAV  -->
    <nav class="navbar-nav navbar-dark bg-dark shadow">
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
              <input type="text" class="form-control" id="idticket_search" placeholder="Digite o número do Ticket...">
              <button type="submit" onclick="modalTicket($('#idticket_search').val())">
                <i class="fa fa-search"></i>
              </button>
              <a href="javascript:void(0)" class="search-close">
                <i class="fa fa-times"></i>
              </a>
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


            // FUNCAO PARA RECONHECER O ENTER
            const inputEnter = document.getElementById('idticket_search')
            inputEnter.addEventListener('keyup', function(e) {
              // which lê o código da tecla
              var key = e.which || e.keyCode
              if (key == 13) {
                modalTicket($('#idticket_search').val())
              }
            })
          </script>


        </li>
        <li class="nav-item">
          <img src="../assets/img/logo.png" width="150" style="transform: scale(1.5)">
        </li>
        <li class="nav-item">
          <!-- MENU DO USUARIO -->
          <div class="dropdown ">
            <a href="" class="nav-link text-light mr-5" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle fa-2x"></i>
            </a>

            <!-- OPÇÕES DO DROPDOWN  -->
            <div class="dropdown-menu shadow dropdown-menu-right position-absolute mr-4 text-center z-index9999" aria-labelledby="dropdownMenu">
                <h6 class="dropdown-header bg-light"><img src="../" width="30px" height="30px"> - <?= $_SESSION['UsuarioNome'] ?> </h6>
              <a href="" class="dropdown-item"><i class="fas fa-cog"></i> Configurações</a>
              <div class="dropdown-divider"></div>
              <a href="logout.php" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Sair</a>
            </div>
          </div>
        </li>
      </ul>
    </nav>


  </header>
  <!-- SEGUNDO NAV -->
  <nav class="navbar-nav navbar-light bg-light shadow sticky-top" style="margin-bottom:50px">
    <ul class="navbar nav justify-content-around py-3 container">
      <li class="nav-item" style="<?= $menu_atendente; ?>">
        <a href=" index.php?pg=tickets" class="nav-link" style="<?= $pg_tickets; ?>"> <i class="fas fa-clipboard-list"></i> Tickets</a>
      </li>
      <li class="nav-item" style="<?= $menu_usuario; ?>">
        <a href="index.php?pg=gerencial" class="nav-link" style="<?= $pg_gerencial; ?>"> <i class="fa fa-cogs"></i> Gerencial</a>
      </li>
      <li class="nav-item" style="<?= $menu_usuario ?>">
        <a href="index.php?pg=dashboard" class="nav-link" style="<?= $pg_dashboard; ?>"><i class="fas fa-chart-line"></i> Dashboard</a>
      </li>
      <!-- MENU DROPDOWN GERENCIAL  -->
      <div class="dropdown" style="<?= $menu_usuario; ?>">
        <li class="nav-item">
          <a href="" class="nav-link dropdown-toggle" id="dropdown-gerencial" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-edit"></i> Cadastro</a>
          <div class="dropdown-menu shadow position-absolute" aria-labelledby="dropdown-gerencial">
            <!-- LINK QUE ATIVA O MODAL PARA CADASTRAR USUARIOS  -->
            <a href="" class="dropdown-item" data-toggle="modal" data-target="#add-usuario"><i class="fas fa-plus-circle"></i> Cadastrar usuários</a>
          </div>
        </li>
      </div>
      <li class="nav-item">
        <a href="index.php?pg=sobre" class="nav-link" style="<?php echo $pg_sobre; ?>"> <i class="fas fa-info-circle"></i> Sobre</a>
      </li>
    </ul>
  </nav>