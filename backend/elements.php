<?php


require_once 'conexao.php';
require_once 'funcoes.php';


if (isset($_GET['element'])) {

  if ($_GET['element'] == 'conteudoGerencial') {
?>
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
            foreach (tickets(1) as $ticket) {

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

              <div class="col-12 cards" onclick="modalTicket('<?= $ticket['idticket'] ?>')">
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
            $d = tickets(2);
            if ($d > 0) {
              foreach ($d as $ticket) {
                $foto = $ticket['foto'];
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



            ?>

                <div class="col-12 cards" onclick="modalTicket('<?= $ticket['idticket'] ?>')">
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
            $d = tickets(3);
            if ($d > 0) {
              foreach ($d  as $ticket) {
                $foto = $ticket['foto'];
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


            ?>

                <div class="col-12 cards" onclick="modalTicket('<?= $ticket['idticket'] ?>')">
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
            }
            ?>

          </div>
        </div>
      </div>
    </div>

  <?php
    exit;
  }

  if ($_GET['element'] == 'conteudoTicket') {

    $table = "ticket t";

    $params = "LEFT JOIN usuario u on u.idusuario=t.idusuario
    LEFT JOIN categoria_ticket c on c.idcategoriaticket=t.idcategoriaticket
    LEFT JOIN tipo_ticket tp on tp.idtipoticket = t.idtipoticket
    LEFT JOIN atendente at on at.idatendente=t.idatendente
    LEFT JOIN prioridade_ticket p on p.idprioridadeticket = t.idprioridadeticket
    LEFT JOIN situacao_ticket s on s.idsituacaoticket=t.idsituacaoticket
    where t.idticket = {$_GET['idticket']}";

    $fields = "t.*,
    SUBSTRING_INDEX(u.nome,' ',1) as usuario,
    c.nome as categoria,
    at.nome as atendente,
    p.nome as prioridade,
    s.nome as situacao,
    tp.nome as tipo
    ";

    $ticket = DBRead($table, $params, $fields);
    $titulo = $ticket[0]['titulo'];
    $descricao = $ticket[0]['descricao'];
    $data = $ticket[0]['datahoraabertura'];
    $usuario = $ticket[0]['usuario'];
    $tipo = $ticket[0]['tipo'];
    $categoria = $ticket[0]['categoria'];
    $situacao = $ticket[0]['situacao'];
    $ip = $ticket[0]['ip'];
    $nav = $ticket[0]['navegador'];
    $prioridade = $ticket[0]['prioridade'];
    $atendente = $ticket[0]['atendente'];
    $abertura = $ticket[0]['datahoraabertura'];
    $idsituacaoticket = $ticket[0]['idsituacaoticket'];
    switch ($nav) {

      case 'Chrome':
        $browser = '<i class="fab fa-chrome"></i> ' . $nav;
        break;
      case 'Firefox':
        $browser = '<i class="fab fa-firefox-browser"></i> ' . $nav;
        break;
      case 'IE':
        $browser = '<i class="fab fa-edge"></i> ' . $nav;
        break;
      case 'Opera':
        $browser = '<i class="fab fa-opera"></i> ' . $nav;
        break;
      default:
        $browser = '<i class="fas fa-question-circle"></i> Desconhecido';
        break;
    }
  ?>
    <div class="row">
      <div class="col-sm-9" style="border-right: solid 1px #80808029">
        <div class="row">
          <div class="col-sm-12">
            <h2><?= $titulo ?> </h2>
          </div>
          <div class="col-sm-12">
            <textarea rows="6" class="form-control" disabled><?= base64_decode($descricao, true) ?></textarea>
          </div>

          <div class="col-sm-12">
            <br>
            <img src="../assets/img/user.png" width="25" height="25"> Armando Neto - <small><?= date('d/m/y H:i') ?></small>
            <textarea rows="2" class="form-control" disabled>Segue o protótipo dos indicadores em anexo</textarea>
          </div>
          <div class="col-sm-12">
            <br>
            <img src="../assets/img/user.png" width="25" height="25"> Armando Neto - <small><?= date('d/m/y H:i') ?></small>
            <textarea rows="2" class="form-control" disabled>Segue o protótipo dos indicadores em anexo</textarea>
          </div>
          <div class="col-sm-12">
            <br>
            <img src="../assets/img/user.png" width="25" height="25"> Armando Neto - <small><?= date('d/m/y H:i') ?></small>
            <textarea rows="2" class="form-control" disabled>Segue o protótipo dos indicadores em anexo</textarea>
          </div>
          <div class="col-sm-12">
            <br>
            <img src="../assets/img/user.png" width="25" height="25"> Armando Neto - <small><?= date('d/m/y H:i') ?></small>
            <textarea rows="2" class="form-control" disabled>Segue o protótipo dos indicadores em anexo</textarea><br><br>
          </div>


          <div class="col-12">
            <div class="input-group">
              <textarea rows="2" class="form-control" placeholder="Digite a mensagem..."></textarea>
              <div class="input-group-prepend">
                <button type="button" class="btn btn-dark input-group-text">
                  <i class="fas fa-paper-plane"></i>
                </button>
              </div>

            </div>
          </div>

        </div>
      </div>
      <div class="col-sm-3">
        <div class="row">
          <div class="col-sm-12">
            <h4>Detalhes</h4>
          </div>
          <div class="col-sm-12">
            <p>Abertura: <b> <?= date('d/m/Y H:i', strtotime($abertura)) ?> </b> </p>
          </div>

          <?php
          session_start();
          if ($_SESSION['UsuarioTipo'] == 3) {

          ?>
            <div class="col-sm-12">
              <div class="form-group">
                <label for="idsituacaoticket"><small><b> Situação: </b></small></label>
                <select name="idsituacaoticket" id="idsituacaoticket" class="form-control" onchange="situacaoTicket(this.value,'<?= $_GET['idticket'] ?>','<?= $_SESSION['UsuarioID'] ?>')">
                  <?php
                  foreach (DBRead('situacao_ticket') as $situacaoticket) {
                    $situacaoticket['idsituacaoticket'] == $idsituacaoticket ? $selected = "selected" : $selected = "";
                    echo '<option ' . $selected . ' value="' . $situacaoticket['idsituacaoticket'] . '">' . $situacaoticket['nome'] . '</option>';
                  }
                  ?>
                </select>
              </div>
            </div>

          <?php
          }
          ?>

          <div class="col-sm-12">
            <p>Tipo: <b><?= $tipo ?></b></p>
          </div>
          <div class="col-sm-12">
            <p>Categoria: <b><?= $categoria ?></b></p>
          </div>
          <div class="col-sm-12">
            <p>Navegador: <b><?= $browser ?></b></p>
          </div>
          <div class="col-sm-12">
            <p>IP: <b><?= $ip ?></b></p>
          </div>
          <div class="col-sm-12">
            <br>
            <h4>Anexos</h4>
          </div>
          <div class="col-sm-12 py-2">
            <button class="btn btn-dark" type="button">
              <i class="fa fa-download"></i> Print-tela.png
            </button>
          </div>
          <div class="col-sm-12 py-2">
            <button class="btn btn-dark" type="button">
              <i class="fa fa-download"></i> Print-erro.png
            </button>
          </div>
        </div>
      </div>
    </div>
<?php
    exit;
  }
















  if ($_GET['element'] == 'meustickets') {
    session_start();
    $idusuario = $_SESSION['UsuarioID'];

    $table = "ticket t";

    $params = " LEFT JOIN categoria_ticket c   ON c.idcategoriaticket=t.idcategoriaticket
                    LEFT JOIN tipo_ticket tp       ON tp.idtipoticket=t.idtipoticket
                    LEFT JOIN atendente a          ON a.idatendente=t.idatendente
                    LEFT JOIN situacao_ticket s    ON s.idsituacaoticket=t.idsituacaoticket
                    LEFT JOIN prioridade_ticket pt ON pt.idprioridadeticket=t.idprioridadeticket
                    WHERE t.idusuario = $idusuario ";


    $fields = " t.* 
                    ,c.nome as categoria
                    ,tp.nome as tipo
                    ,substring_index(a.nome, ' ', 1) as atendente
                    ,s.nome as situacao
                    ,pt.nome as prioridade
                    ,pt.cor
                    ,a.foto
                    ,CASE
                        WHEN t.idsituacaoticket = 4 THEN 0
                        WHEN t.idsituacaoticket = 5 THEN 0
                        WHEN t.idsituacaoticket = 3 THEN 100
                        WHEN t.dataprevisao IS NULL THEN 0
                        ELSE (DATEDIFF(current_date, date (t.datahoraabertura)) / DATEDIFF( t.dataprevisao,date(t.datahoraabertura)))*100
                    END AS progresso ";


    $tickets = DBRead($table, $params, $fields);
    if ($tickets > 0) {


      echo '
            <table class="table table-hover" id="table" style="margin-bottom: 0 !important;">
            <thead>
                <div style="position: relative;">
                    <div class="pt-1 bg-dark" style="position: absolute; width: 100%;">
                        <p class="font-weight-bolder text-light lead ml-3">Meus tickets</p>
                    </div>
                    <div style="padding: 1.5%; position: absolute; width: 100%;">
                        <button type="button" class="btn-add" style="float: right;" title="Abrir ticket" data-toggle="modal" data-target="#adicionar">
                            <i class="fas fa-plus text-dark"></i>
                        </button>
                    </div>
                </div>
                <div class="pt-5">
                    <!-- DIV PARA SEPARAR O BOTAO ADD DA DIV DE BAIXO -->
                </div>
            </thead>
            <thead>
                <tr>
                    <th scope="col"><b>#</b></th>
                    <th scope="col"><b>Inclusão</b></th>
                    <th scope="col"><b>Título</b></th>
                    <th scope="col"><b>Status</b></th>
                    <th scope="col"><b>Categoria</b></th>
                    <th scope="col"><b>Tipo</b></th>
                    <th scope="col" style="width: 160px;"><b>Atendente</b></th>
                    <th scope="col"><b>Progresso</b></th>
                </tr>
            </thead>
            <tbody>
            ';
      foreach ($tickets as $d) {


        $d['atendente'] ? $atendente = '<img src="../' . $d['foto'] . '" class="foto"> ' . $d['atendente'] : $atendente = '';
        $d['situacao'] == 'Pendente' ? $sts = "black" : $sts = "lightgrey";
        $d['progresso'] == 100 ? $bg_prog = "bg-success" : $bg_prog = "bg-dark";

        $d['progresso'] == '0' ? $perc = "" : $perc = number_format($d['progresso'], 2, ',', '.') . '%';

        echo '
                <tr style="cursor:pointer;color:' . $sts . ' !important" onclick="modalTicket(' . $d['idticket'] . ',`' . $d['titulo'] . '`)">
                    <th scope="row">' . $d['idticket'] . '</th>
                    <th>' . date('d/m/y H:i', strtotime($d['datahoraabertura'])) . '</th>
                    <th>' . $d['titulo'] . '</th>
                    <th>' . $d['situacao'] . '</th>
                    <th>' . $d['categoria'] . '</th>
                    <th>' . $d['tipo'] . '</th>
                    <td>' . $atendente . '</td>
                    <td>
                        <div class="progress">
                            <div class="' . $bg_prog . ' progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="' . $d['progresso'] . '" aria-valuemin="0" aria-valuemax="100" style="width:' . $d['progresso'] . '%">
                            </div>
                        </div>
                    </td>
                </tr>
                ';
      }
      echo '
            </tbody>
        </table>
        ';
    } else {
      echo '<p> Nenhum ticket ... </p>';
    }

    exit;
  }


  if ($_GET['element'] == 'tabela_usuarios') {
    echo '
    <table class="table table-hover">
        <thead>
            <tr>
                <td>id</td>
                <td>Entidade</td>
                <td>Tipo</td>
                <td>Nome</td>
                <td>E-mail</td>
                <td>Telefone</td>
                <td>Status</td>
                <td>Opções</td>
            </tr>
        </thead>
        <tbody>';
    foreach (DBRead('usuario') as $d) {
      echo '<tr>
            <td>' . $d['idusuario'] . '</td>
            <td>' . $d['identidade'] . '</td>
            <td>' . $d['idtipousuario'] . '</td>
            <td>' . $d['nome'] . '</td>
            <td>' . $d['email'] . '</td>
            <td>' . $d['telefone'] . '</td>
            <td>' . $d['status'] . '</td>
            <td>
                <button class="btn btn-dark" type="button" onclick="editar(' . $d['idusuario'] . ',`' . $d['nome'] . '`,`' . $d['email'] . '`,`' . $d['telefone'] . '`,' . $d['idtipousuario'] . ',' . $d['identidade'] . ')">
                    <i class="fa fa-edit"></i>
                </button>
            </td>
        </tr>';
    }
    echo '</tbody>
    </table>';
    exit;
  }
}
