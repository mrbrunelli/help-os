<?php
if ($_SESSION['UsuarioTipo'] == '1') {
  echo ' <script> window.location.href="index.php?pg=tickets" </script> ';
}
?>

<div class="container mb-5">
  <div class="row justify-content-between">
    <div class="col-12 col-md-6 col-lg-4 mt-3">
      <div class="p-3 bg-light shadow box scroll">
        <div class="row">
          <div class="col-10">
            <h2 class="titulo">Pendente</h2>
          </div>
          <div class="col-2">
            <div class="dropdown">
              <a type="button" id="dropdownconfig" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
              <div class="dropdown-menu shadow" aria-labelledby="dropdownconfig">
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

          <?php
          foreach (DBRead('ticket', 'where idsituacaoticket = 1') as $ticket) {

            switch ($ticket['idtipoticket']) {
              case '1':
                $emoji = '<i class="fas fa-question" title="Dúvidas de usuário"></i> ';
                break;
              case '2':
                $emoji = '<i class="fa fa-ban" title="Erros de sistema"></i> ';
                break;
              case '3':
                $emoji = '<i class="fas fa-code" title="Desenvolvimento"></i> ';
                break;
            }
          ?>

            <div class="col-12 cards" draggable="true" onclick="modalTicket()">
              <p><?= $ticket['titulo'] ?></p>
              <div class="row justify-content-between">
                <div>
                  <small><i class="fa fa-clock"></i> <?= date('d/m/y H:i', strtotime($ticket['datahoraabertura'])) ?></small>
                </div>
                <div>
                  <small><?= $emoji ?></small>
                </div>
              </div>
            </div>

          <?php
          }
          ?>

        </div>
      </div>
    </div>



    <div class="col-12 col-md-6 col-lg-4 mt-3">
      <div class="p-3 bg-light shadow box scroll">
        <div class="row">
          <div class="col-10">
            <h2 class="titulo">Em Progresso</h2>
          </div>
          <div class="col-2">
            <div class="dropdown">
              <a type="button" id="dropdownconfig" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
              <div class="dropdown-menu shadow" aria-labelledby="dropdownconfig">
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

          <?php
          foreach (DBRead('ticket', 'where idsituacaoticket = 2') as $ticket) {

            switch ($ticket['idtipoticket']) {
              case '1':
                $emoji = '<i class="fas fa-question" title="Dúvidas de usuário"></i> ';
                break;
              case '2':
                $emoji = '<i class="fa fa-ban" title="Erros de sistema"></i> ';
                break;
              case '3':
                $emoji = '<i class="fas fa-code" title="Desenvolvimento"></i> ';
                break;
            }

            switch ($ticket['idprioridadeticket']) {
              case '1':
                $prioridade = 'baixa';
                break;
              case '2':
                $prioridade = 'media';
                break;
              case '3':
                $prioridade = 'alta';
            }

            switch ($ticket['idatendente']) {
              case '1':
                $foto = 'assets/img/mrbrunelli.jpg';
                break;
              case '2':
                $foto = 'assets/img/armandobretas.jpg';
                break;
            }
          ?>

            <div class="col-12 cards">
              <p><?= $ticket['titulo'] ?></p>
              <div class="row justify-content-between">
                <div class="<?= $prioridade ?> p-1 rounded text-light">
                  <small><i class="fa fa-clock"></i> <?= date('d/m/y H:i', strtotime($ticket['dataprevisao'])) ?></small>
                </div>
                <div>
                  <small><?= $emoji ?></small>
                </div>
                <div>
                  <img src="../<?= $foto ?>" class="foto">
                </div>
              </div>
            </div>

          <?php
          }
          ?>

        </div>
      </div>
    </div>



    <div class="col-12 col-md-6 col-lg-4 mt-3">
      <div class="p-3 bg-light shadow box scroll">
        <div class="row">
          <div class="col-10">
            <h2 class="titulo">Finalizado</h2>
          </div>
          <div class="col-2">
            <div class="dropdown">
              <a type="button" id="dropdownconfig" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-ellipsis-h"></i></a>
              <div class="dropdown-menu shadow" aria-labelledby="dropdownconfig">
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

          <?php
          foreach (DBRead('ticket', 'where idsituacaoticket = 3') as $ticket) {

            switch ($ticket['idprioridadeticket']) {
              case '1':
                $prioridade = 'baixa';
                break;
              case '2':
                $prioridade = 'media';
                break;
              case '3':
                $prioridade = 'alta';
                break;
            }

            switch ($ticket['idtipoticket']) {
              case '1':
                $emoji = '<i class="fas fa-question" title="Dúvidas de usuário"></i> ';
                break;
              case '2':
                $emoji = '<i class="fa fa-ban" title="Erros de sistema"></i> ';
                break;
              case '3':
                $emoji = '<i class="fas fa-code" title="Desenvolvimento"></i> ';
                break;
            }

            switch ($ticket['idatendente']) {
              case '1':
                $foto = 'assets/img/mrbrunelli.jpg';
                break;
              case '2':
                $foto = 'assets/img/armandobretas.jpg';
                break;
            }
          ?>

            <div class="col-12 cards">
              <p><?= $ticket['titulo'] ?></p>
              <div class="row justify-content-between">
                <div class="<?= $prioridade ?> rounded p-1 text-light">
                  <small><i class="fa fa-clock"></i> <?= date('d/m/y H:i', strtotime($ticket['datahorafechamento'])) ?></small>
                </div>
                <div>
                  <small><?= $emoji ?></small>
                </div>
                <div>
                  <img src="../<?= $foto ?>" class="foto">
                </div>
              </div>
            </div>

          <?php
          }
          ?>

        </div>
      </div>
    </div>
  </div>
</div>