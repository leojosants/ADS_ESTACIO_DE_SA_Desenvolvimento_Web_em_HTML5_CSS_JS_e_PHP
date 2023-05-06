<?php
require_once 'conectaBD.php';

//  Conectar ao BD (com o PHP)

//  Verificar se esta chegando por POST
if (!empty($_POST)) {
    //  Iniciar SESSAO (session_start)
    session_start();

    try {
        //  Montar a SQL
        $sql = "SELECT nome, email, telefone, data_nascimento FROM usuario WHERE email = :email AND senha = :senha";

        //  Preparar a SQL (pdo)
        $stmt = $pdo->prepare($sql);

        //  Definir/organizar os dados para $sql
        $dados = array(
            ':email' => $_POST['email'],
            ':senha' => md5($_POST['senha'])
        );

        $stmt->execute($dados);

        $result = $stmt->fetchAll();

        if ($stmt->rowCount() == 1) {   //  Se o resultado da consulta SQL trouxer um registro
            //  Autenticação foi realizada com sucesso

            $result = $result[0];

            //  Definir as variáveis da sessão
            $_SESSION['nome'] = $result['nome'];
            $_SESSION['email'] = $result['email'];
            $_SESSION['data_nascimento'] = $result['data_nascimento'];
            $_SESSION['telefone'] = $result['telefone'];

            //  Redirecionar para página inicial (ambiente logado)
            header("Location: index_logado.php");
        } else {    //  Se o resultado da consulta SQL não trouxer um registro
            //  Falha na autenticação

            //  Destruir a SESSÃO
            session_destroy();

            //  Redirecionar para página inicial (login)
            header("Location: index.php?msgErro=E-mail e/ou Senha inválido(s).");
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
} else {
    header("Location: index.php?msgErro=Você não tem permissão para acessar esta página...");
}

die();

//  Preparar as informações   //
//  Executar a SQL

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
        $sql = "INSERT INTO usuario (nome, data_nascimento, telefone, email, senha)
                VALUES (:nome, :dataNascimento, :telefone, :email, :senha)";

        //  - Preparar a SQL (pdo)
        $stmt = $pdo->prepare($sql);

        //  - Definir/organizar os dados para SQL
        $dados = array(
            ':nome' => $_POST['nome'],
            ':dataNascimento' => $_POST['dataNascimento'],
            ':telefone' => $_POST['telefone'],
            ':email' => $_POST['email'],
            ':senha' => md5($_POST['senha'])
        );

        //  - Tentar executar a SQL (INSERT)
        //  Realizar a inserção das informações no BD (com o PHP)
        if ($stmt->execute($dados)) {
            header("Location: index.php?msgSucesso=Cadastro realizado com sucesso!");
        }
    } catch (PDOException $e) {
        // die($e->getMessage());
        header("Location: index.php?msgErro=Falha ao cadastrar...");
    }
} else {
    header("Location: index.php?msgErro=Erro de acesso.");
}

die();

//  Redirecionar para a págin Inicial (Login) com mensagem de erro/sucesso