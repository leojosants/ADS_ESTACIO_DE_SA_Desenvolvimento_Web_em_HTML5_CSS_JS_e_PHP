<?php
require_once 'conectaBD.php';

//  Definir o BD (e a tabela)
//  Conectar ao BD (com o PHP)

session_start();

if (empty($_SESSION)) {
    // Significa que as variáveis de SESSÂO não foram definidas, este bloco não poderá ser acessado
    header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
    die();
}
/*
    echo '<pre>';
    print_r($_POST);
    echo '</pre>';
    die();
*/

if (!empty($_POST)) {
    // Está chegando dados por POST e então posso tentar inserir no BD

    //  Obter as informações do formulário ($_POST)
    try {
        //  Preparar as informações //
        //  - Montar a SQL (pgsql)
        $sql = "INSERT INTO anuncio (fase, tipo, porte, sexo, pelagem_cor, raca, observacao, email_usuario)
                VALUES (:fase, :tipo, :porte, :sexo, :pelagem_cor, :raca, :observacao, :email_usuario)";

        //  - Preparar a SQL (pdo)
        $stmt = $pdo->prepare($sql);

        //  - Definir/organizar os dados para SQL
        $dados = array(
            ':fase' => $_POST['fase'],
            ':tipo' => $_POST['tipo'],
            ':porte' => $_POST['porte'],
            ':sexo' => $_POST['sexo'],
            ':pelagem_cor' => $_POST['pelagemCor'],
            ':raca' => $_POST['raca'],
            ':observacao' => $_POST['observacao'],
            ':email_usuario' => $_SESSION['email']
        );

        //  - Tentar executar a SQL (INSERT)
        //  Realizar a inserção das informações no BD (com o PHP)
        if ($stmt->execute($dados)) {
            header("Location: index_logado.php?msgSucesso=Anúncio cadastrado com sucesso!");
        }
    } catch (PDOException $e) {
        die($e->getMessage());
        header("Location: index_logado.php?msgErro=Falha ao cadastrar anúncio...");
    }
} else {
    header("Location: index_logado.php?msgErro=Erro de acesso.");
}

die();

//  Redirecionar para a página Inicial (index_logado) com mensagem de erro/sucesso