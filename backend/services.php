<?php
date_default_timezone_set('America/Sao_Paulo');
require_once 'conexao.php';
require_once 'funcoes.php';

if (isset($_GET['service'])) {



  if ($_GET['service'] == 'ticket') { 
    session_start();
    $user_agents = array("iPhone","iPad","Android","webOS","BlackBerry","iPod","Symbian","IsGeneric");
    foreach($user_agents as $user_agent){
        if (strpos($_SERVER['HTTP_USER_AGENT'], $user_agent) !== FALSE) {
            $mobile = TRUE;
            $modelo = $user_agent;
            break;
        }
    }
    if(!$mobile)
        $modelo = 'Computador';

    $ticket = array(
      'titulo' => $_POST['tituloticket'],
      'descricao' => $_POST['descricaoticket'],
      'datahoraabertura' => date('Y-m-d H:i:s'),
      'idusuario' => $_SESSION['UsuarioID'],
      'idtipoticket' => $_POST['idtipoticket'],
      'idcategoriaticket' => $_POST['idcategoriaticket'],
      'idsituacaoticket' => 1,
      'ip' => $_SERVER['REMOTE_ADDR'],
      'dispositivo' => $modelo,
      'modelo' => $user_agent
    );

    var_dump($ticket);

  }













  if ($_GET['service'] == 'login') {
    $email = $_POST['email'];
    $senha = sha1($_POST['senha']);


    $tabela = 'usuario';
    $filtros = " WHERE email = '$email' AND senha = '$senha' AND status = 'A' LIMIT 1 ";
    $campos = "*";

    $busca_usuario = DBRead($tabela, $filtros, $campos);

    if ($busca_usuario) {
      session_start();

      $_SESSION['UsuarioID'] = $busca_usuario[0]['idusuario'];
      $_SESSION['UsuarioNome'] = $busca_usuario[0]['nome'];
      $_SESSION['UsuarioTipo'] = $busca_usuario[0]['idtipousuario'];
      echo 1;
      exit;
    } else {

      $tabela = 'atendente';
      $filtros = " WHERE email = '$email' AND senha = '$senha' AND status = 'A' LIMIT 1 ";
      $campos = "*";
      $busca_usuario = DBRead($tabela, $filtros, $campos);

      if ($busca_usuario) {
        session_start();

        $_SESSION['UsuarioID'] = $busca_usuario[0]['idatendente'];
        $_SESSION['UsuarioNome'] = $busca_usuario[0]['nome'];
        $_SESSION['UsuarioTipo'] = 2;
        echo 1;
        exit;
      } else {
        echo 0;
        exit;
      }
    }
  }
} else {
  echo 'Requisição inválida';
}
