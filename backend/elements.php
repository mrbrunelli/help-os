<?php


require_once 'conexao.php';
require_once 'funcoes.php';


if (isset($_GET['element'])) {


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
                        WHEN t.dataprevisao IS NULL THEN 0
                        WHEN t.idsituacaoticket = 3 THEN 100
                        ELSE t.dataprevisao-date(t.dataabertura) 
                    END AS progresso ";


        $tickets = DBRead($table , $params, $fields);

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
                    <th scope="col">#</th>
                    <th scope="col">Inclusão</th>
                    <th scope="col">Título</th>
                    <th scope="col">Status</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Atendente</th>
                    <th scope="col">Progresso</th>
                </tr>
            </thead>
            <tbody>
            ';
            foreach ($tickets as $d) {
                $d['atendente'] ? $atendente = '<img src="../assets/img/user.png" width="20" alt=""> '.$d['atendente'] : $atendente = '';
                $d['situacao'] == 'Pendente' ? $sts = "black" : $sts = "grey";
                $d['progresso'] == 100 ? $bg_prog = "bg-success" : $bg_prog = "bg-dark";
                if ($d['dataprevisao']) {
                    $prog = '
                    <div class="progress">
                        <div class="'.$bg_prog.' progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="'.$d['progresso'].'" aria-valuemin="0" aria-valuemax="100" style="width:'.$d['progresso'].'%">'.$d['progresso'].'%</div>
                    </div>
                    ';
                } else {
                    $prog="";
                }

                echo '
                <tr style="color:'.$sts.' !important">
                    <th scope="row">' . $d['idticket'] . '</th>
                    <th>' . date('d/m/y H:i',strtotime($d['datahoraabertura'])) . '</th>
                    <th>' . $d['titulo'] . '</th>
                    <th>' . $d['situacao'] . '</th>
                    <th>' . $d['categoria'] . '</th>
                    <th>' . $d['tipo'] . '</th>
                    <td>'.$atendente.'</td>
                    <td>'.$prog.'</td>
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
