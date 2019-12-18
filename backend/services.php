<?php


require_once 'conexao.php';
require_once 'funcoes.php';

if (isset($_GET['service'])) {

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
