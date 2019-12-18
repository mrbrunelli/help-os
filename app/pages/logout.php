<?php

session_start();

unset($_SESSION['UsuarioID']);

header('Location: ../../index.html');