<?php


require_once 'conexao.php';
require_once 'funcoes.php';


if ( isset ( $_GET['element'] ) && $_GET['element'] == 'tabela_usuarios' ) {
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
    foreach( DBRead('usuario') as $d ){
        echo '<tr>
            <td>'.$d['idusuario'].'</td>
            <td>'.$d['identidade'].'</td>
            <td>'.$d['idtipousuario'].'</td>
            <td>'.$d['nome'].'</td>
            <td>'.$d['email'].'</td>
            <td>'.$d['telefone'].'</td>
            <td>'.$d['status'].'</td>
            <td>
                <button class="btn btn-dark" type="button" onclick="editar('.$d['idusuario'].',`'.$d['nome'].'`,`'.$d['email'].'`,`'.$d['telefone'].'`,'.$d['idtipousuario'].','.$d['identidade'].')">
                    <i class="fa fa-edit"></i>
                </button>
            </td>
        </tr>';
    }
    echo '</tbody>
    </table>';
}

//   idusuario, nome, email, telefone, idtipousuario, identidade