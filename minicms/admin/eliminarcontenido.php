<?php

session_start();
if (!isset($_SESSION['usuario'])) {
    if ($_GET["logout"] == 1) {
        session_destroy();
    } else {
        header("Location: login.php");
        exit();
    }
}

require_once 'info_contenido.php';

$contenido = new Contenido();

if (isset($_GET["idcontenido"])) {
  $contenido->delIdContenido($_GET["idcontenido"]);
}
header("Location: contenidos.php");


?>