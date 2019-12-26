<?php
if ($_SESSION['UsuarioTipo'] == '1') {
  echo ' <script> window.location.href="index.php?pg=tickets" </script> ';
}
?>

<div class="container mb-5">
  <div class="row justify-content-between">
    <div class="col-12 col-md-6 col-lg-4 mt-3">
      <div class="p-3 bg-light shadow box">
        <div class="row">
          <div class="col-10">
            <h2 class="titulo">Pendente</h2>
          </div>
          <div class="col-2">
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
          <div class="col-12 cards" draggable="true">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod labore, ratione eaque.</p>
            <div class="row justify-content-between">
              <div>
                <small><i class="fa fa-clock"></i> 29/12/1994 12:00</small>
              </div>
              <div>
                <small><i class="fa fa-ban"></i></small>
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
                <small><i class="fa fa-ban"></i></small>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="col-12 col-md-6 col-lg-4 mt-3">
      <div class="p-3 bg-light shadow box">
        <div class="row">
          <div class="col-10">
            <h2 class="titulo">Em Progresso</h2>
          </div>
          <div class="col-2">
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
              <div class="media p-1 rounded text-light">
                <small><i class="fa fa-clock"></i> 29/12/1994 12:00</small>
              </div>
              <div>
                <small><i class="fas fa-question"></i></small>
              </div>
              <div>
                <img src="../assets/img/mrbrunelli.jpg" class="foto">
              </div>
            </div>
          </div>
          <div class="col-12 cards">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod labore, ratione eaque.</p>
            <div class="row justify-content-between">
              <div class="alta p-1 rounded text-light">
                <small><i class="fa fa-clock"></i> 29/12/1994 12:00</small>
              </div>
              <div>
                <small><i class="fas fa-code"></i></small>
              </div>
              <div>
                <img src="../assets/img/armandobretas.jpg" class="foto">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <div class="col-12 col-md-6 col-lg-4 mt-3">
      <div class="p-3 bg-light shadow box">
        <div class="row">
          <div class="col-10">
            <h2 class="titulo">Finalizado</h2>
          </div>
          <div class="col-2">
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
              <div class="baixa rounded p-1 text-light">
                <small><i class="fa fa-clock"></i> 29/12/1994 12:00</small>
              </div>
              <div>
                <small><i class="fas fa-ban"></i></small>
              </div>
              <div>
                <img src="../assets/img/mrbrunelli.jpg" class="foto">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>