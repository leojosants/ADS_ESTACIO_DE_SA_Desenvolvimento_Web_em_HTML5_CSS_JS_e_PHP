<?php

//  endereco
//  nome do BD
//  usuario
//  senha

$endereco = 'localhost';
$banco = 'sispet';
$usuario = 'postgres';
$senha = 'l1j1o1s1';

try {
    /*  
        DSN: 1º arg: sgbd:host;dbname
             2º arg: usuario
             3º arg: senha
             4º arg: errmode - exceptions
    */
    $pdo = new PDO("pgsql:host=$endereco;port=5432;dbname=$banco", $usuario, $senha, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

    // echo "Conectado no BD!!!";
} catch (PDOException $e) {
    echo "Falha ao conectar ao BD! <br />";
    die($e->getMessage());
}
