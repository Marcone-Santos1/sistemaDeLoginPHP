<?php

if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['id'])) {
    die("<p style=\"color: red;\">Você não pode acessar esta página, porque você não está logado. <a href=\"index.php\"</a>Acesse aqui...</p>");
}

?>