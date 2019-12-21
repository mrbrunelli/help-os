<!-- tela principal -->
<?php
session_start();
if (!isset($_SESSION['UsuarioID'])) {
    Header('Location: ../../index.html');
}

require_once 'header.php';
require_once 'modal.php';


if ($_SESSION['UsuarioTipo'] == 3) {
    isset($_GET['pg']) ? $pg = trim($_GET['pg']) : $pg = "gerencial";
} else {
    isset($_GET['pg']) ? $pg = trim($_GET['pg']) : $pg = "tickets";
}

$pg = $pg . ".php";
if (file_exists($pg)) {
    include $pg;
} else {
    include '404.php';
}

require_once 'footer.php';
?>