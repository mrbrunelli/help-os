<?php
if ($_SESSION['UsuarioTipo'] == '1') {
  echo ' <script> window.location.href="index.php?pg=tickets" </script> ';
}
?>
<div class="container-fluid mb-5">
  <div class="row justify-content-center">

    <div class="col-12 col-md-6 col-lg-4 mt-3">
      <div class="p-4 bg-light shadow box">
        <div class="row">
          <div class="col-11">
            <h2 class="titulo">Pendente</h2>
          </div>
          <div class="col-1">
            <div class="dropdown">
              <a type="button" id="dropdownconfig" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownconfig">
                <h6 class="dropdown-header">Ações</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"><i class="far fa-share-square"></i> Compartilhar</a>
                <a class="dropdown-item"><i class="fas fa-print"></i> Imprimir</a>
                <a class="dropdown-item"><i class="fas fa-download"></i> Exportar</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 cards">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod labore, ratione eaque.</p>
            <div class="row justify-content-between">
              <div>
                <small><i class="fa fa-clock"></i> 29/12/1994 12:00</small>
              </div>
              <div>
                <small><i class="fa fa-ban"></i> Erro de sistema</small>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12 cards">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod labore, ratione eaque.</p>
            <div class="row justify-content-between">
              <div>
                <small><i class="fa fa-clock"></i> 29/12/1994 12:00</small>
              </div>
              <div>
                <small><i class="fa fa-ban"></i> Erro de sistema</small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4 mt-3">
      <div class="table-responsive p-4 bg-light shadow box">
        <div class="row">
          <div class="col-11">
            <h2 class="titulo">Em Progresso</h2>
          </div>
          <div class="col-1">
            <div class="dropdown">
              <a type="button" id="dropdownconfig" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownconfig">
                <h6 class="dropdown-header">Ações</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"><i class="far fa-share-square"></i> Compartilhar</a>
                <a class="dropdown-item"><i class="fas fa-print"></i> Imprimir</a>
                <a class="dropdown-item"><i class="fas fa-download"></i> Exportar</a>
              </div>
            </div>
          </div>
        </div>
        <div class="shadow rounded p-3 bg-white my-2">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod labore, ratione eaque.</p>
          <small class="float-left"><i class="fa fa-clock"></i> 29/12/1994 12:00</small>
          <small class="float-right"><i class="fa fa-ban"></i> Erro de sistema</small>
        </div>
      </div>
    </div>

    <div class="col-12 col-md-6 col-lg-4 mt-3">
      <div class="table-responsive p-4 bg-light shadow box">
        <div class="row">
          <div class="col-11">
            <h2 class="titulo">Finalizado</h2>
          </div>
          <div class="col-1">
            <div class="dropdown">
              <a type="button" id="dropdownconfig" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
              <div class="dropdown-menu" aria-labelledby="dropdownconfig">
                <h6 class="dropdown-header">Ações</h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item"><i class="far fa-share-square"></i> Compartilhar</a>
                <a class="dropdown-item"><i class="fas fa-print"></i> Imprimir</a>
                <a class="dropdown-item"><i class="fas fa-download"></i> Exportar</a>
              </div>
            </div>
          </div>
        </div>
        <table class="table table-hover bg-white shadow">
          <thead class="dark">
            <tr>
              <td>Solicitante</td>
              <td>Título</td>
              <td>Lead-Time</td>
              <td>Custo total</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Franciele</td>
              <td>Sistema de jornada</td>
              <td>67 horas</td>
              <td>R$ 900,00</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>