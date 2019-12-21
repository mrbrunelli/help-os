<?php
date_default_timezone_set('America/Sao_Paulo');
require_once 'conexao.php';
require_once 'funcoes.php';

if (isset($_GET['service'])) {



  if ($_GET['service'] == 'ticket') { 
    session_start();
    $useragent = $_SERVER['HTTP_USER_AGENT'];
    if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
      $browser_version=$matched[1];
      $browser = 'IE';
    } elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
      $browser_version=$matched[1];
      $browser = 'Opera';
    } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
      $browser_version=$matched[1];
      $browser = 'Firefox';
    } elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
      $browser_version=$matched[1];
      $browser = 'Chrome';
    } elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
      $browser_version=$matched[1];
      $browser = 'Safari';
    } else {
      // browser not recognized!
      $browser_version = null;
      $browser= 'desconhecido';
    }

    $ticket = array(
      'titulo' => $_POST['tituloticket'],
      'descricao' => $_POST['descricaoticket'],
      'datahoraabertura' => date('Y-m-d H:i:s'),
      'idusuario' => $_SESSION['UsuarioID'],
      'idtipoticket' => $_POST['idtipoticket'],
      'idcategoriaticket' => $_POST['idcategoriaticket'],
      'idsituacaoticket' => 1,
      'ip' => $_SERVER['REMOTE_ADDR'],
      'navegador' => $browser,
      'idprioridadeticket' => 1
    );

    $insert = DBCreate('ticket',$ticket);

    if ($insert) {
      Header('Location: ../app/pages/index.php?pg=tickets&r=success');
    } else {
      Header('Location: ../app/pages/index.php?pg=tickets&r=error'); 
    }
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
        $_SESSION['UsuarioTipo'] = 3;
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
