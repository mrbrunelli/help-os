<?php


require_once 'conexao.php';
require_once 'funcoes.php';


if (isset($_GET['element'])) {

    if ($_GET['element'] == 'conteudoTicket') {

        $table = "ticket t";

        $params =  "LEFT JOIN usuario u on u.idusuario=t.idusuario
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
            <div class="col-sm-9" style="border-right: solid 1px grey">
                <div class="row">
                    <div class="col-sm-12">
                        <p><?= date('d/m/Y H:i', strtotime($abertura)) ?> </p>
                    </div>
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
                        <textarea rows="2" class="form-control" disabled>Segue o protótipo dos indicadores em anexo</textarea>
                    </div>

                </div>
            </div>
            <div class="col-sm-3">
                <div class="row">
                    <div class="col-sm-12">
                        <h4>Detalhes</h4>
                    </div>
                    <div class="col-sm-12">
                        <p>Situação: <b><?= $situacao ?></b></p>
                    </div>
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
                        <button class="btn btn-primary" type="button">
                            <i class="fa fa-download"></i> Print-tela.png
                        </button>
                    </div>
                    <div class="col-sm-12 py-2">
                        <button class="btn btn-primary" type="button">
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
                    ,a.nome as atendente
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
                    <th scope="col"><b>Atendente</b></th>
                    <th scope="col"><b>Progresso</b></th>
                </tr>
            </thead>
            <tbody>
            ';
            foreach ($tickets as $d) {


                $d['atendente'] ? $atendente = '<img src="../assets/img/user.png" width="20" alt=""> ' . $d['atendente'] : $atendente = '';
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
