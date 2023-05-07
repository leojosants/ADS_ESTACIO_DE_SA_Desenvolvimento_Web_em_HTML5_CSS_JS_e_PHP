<?php
require_once "config.php";

class BasicDAO
{
    protected function execDML($sql, ...$params)
    {
        global $dsn, $user, $pass;
        $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);

        try {
            $stm = $pdo->prepare($sql);
            $stm->execute($params);
        } finally {
            $pdo = null;
        }
    }

    protected function execQUERY($sql)
    {
        global $dsn, $user, $pass;
        $pdo = new PDO($dsn, $user, $pass, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        $stm = $pdo->prepare($sql);
        $stm->execute();
        $objetos = $stm->fetchAll(PDO::FETCH_OBJ);
        $pdo = null;
        return $objetos;
    }
}
