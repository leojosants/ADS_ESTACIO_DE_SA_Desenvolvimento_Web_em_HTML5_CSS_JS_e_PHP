<?php
session_start();

if (empty($_SESSION)) {
    // Significa que as variáveis de SESSÂO não foram definidas, este bloco não poderá ser acessado
    header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
} else {
    session_destroy();
    header("Location: index.php?msgSucesso=Logout efetuado com sucesso!");
}

die();
