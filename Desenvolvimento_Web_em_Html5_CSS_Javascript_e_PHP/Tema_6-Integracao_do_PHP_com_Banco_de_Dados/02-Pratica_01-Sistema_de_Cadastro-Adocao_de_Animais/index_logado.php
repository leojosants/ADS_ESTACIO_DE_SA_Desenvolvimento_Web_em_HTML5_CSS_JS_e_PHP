<?php
require_once "conectaBD.php";
session_start();

if (empty($_SESSION)) {
    // Significa que as variáveis de SESSÂO não foram definidas, este bloco não poderá ser acessado
    header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
    die();
}

/*
    echo "Estou logado";
    echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";
    die();
*/

$anuncios = array();

if (!empty($_GET["meus_anuncios"]) && $_GET["meus_anuncios"] == 1) {

    //  Obter somente os anúncios cadastrados pelo(a) usuário(a) logado(a).
    $sql = "SELECT * FROM anuncio WHERE email_usuario = :email ORDER BY id ASC";
    $dados = array(":email" => $_SESSION["email"]);

    try {
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute($dados)) {
            // Execução da SQL
            $anuncios = $stmt->fetchAll();
        } else {
            die("Falha ao executar a SQL...#1");
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
} else {
    $sql = "SELECT * FROM anuncio ORDER BY id ASC";

    try {
        $stmt = $pdo->prepare($sql);

        if ($stmt->execute()) { //  Execução da SQL OK!
            $anuncios = $stmt->fetchAll();

            /*
            echo "<pre>";
            print_r($anuncios);
            echo "</pre>";
            die();
            */
        } else {
            die("Falha ao executar a SQL...");
        }
    } catch (PDOException $e) {
        die($e->getMessage());
    }
}
?>

<!--  -->
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Página Inicial - Ambiente Logado</title>

    <!--  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <?php if (!empty($_GET['msgErro'])) { ?>

        <div class="alert alert-warning" role="alert">
            <?php echo $_GET["msgErro"]; ?>
        </div>

        <?php } ?>

        <?php if (!empty($_GET["msgSucesso"])) { ?>

        <div class="alert alert-success" role="alert">
            <?php echo $_GET["msgSucesso"]; ?>
        </div>

        <?php } ?>
    </div>

    <div class="container">
        <div class="col-md-11">
            <h2 class="title">
                Olá! <i><?php echo $_SESSION["nome"]; ?></i>, seja bem-vindo(a)!
            </h2>
        </div>
    </div>

    <div class="container">
        <a href="cad_anuncio.php" class="btn btn-primary">Novo Anúncio</a>
        <a href="index_logado.php?meus_anuncios=1" class="btn btn-success">Meus Anúncios</a>
        <a href="index_logado.php?meus_anuncios=0" class="btn btn-info">Todos Anúncios</a>
        <a href="logout.php" class="btn btn-dark">Sair</a>
    </div>

    <?php if (!empty($anuncios)) { ?>

    <!-- Aqui será montada a tabela com a relação de anúncios -->
    <div class="container">

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fase</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Porte</th>
                    <th scope="col">Pelagem / Cor</th>
                    <th scope="col">Raça</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($anuncios as $a) { ?>
                <tr>
                    <th scope="row"><?php echo $a["id"]; ?></th>
                    <td>
                        <?php
                                if ($a["fase"] == "A") {
                                    echo "Adulto";
                                } else {
                                    echo "Filhote";
                                }
                                ?>
                    </td>

                    <td><?php echo $a["tipo"] == "G" ? "Gato" : "Cachorro"; ?></td>

                    <td>
                        <?php
                                if ($a["porte"] == "P") {
                                    echo "Pequeno";
                                } elseif ($a["porte"] == "M") {
                                    echo "Médio";
                                } elseif ($a["porte"] == "G") {
                                    echo "Grande";
                                }
                                ?>
                    </td>

                    <td><?php echo $a["pelagem_cor"]; ?></td>
                    <td><?php echo $a["raca"]; ?></td>
                    <td><?php echo $a["sexo"] == "M" ? "Macho" : "Fêmea"; ?></td>

                    <td>
                        <?php if ($a["email_usuario"] == $_SESSION["email"]) { ?>
                        <a href="alt_anuncio.php?id_anuncio=<?php echo $a["id"]; ?>" class="btn btn-warning">Alterar</a>
                        <a href="del_anuncio.php?id_anuncio=<?php echo $a["id"]; ?>" class="btn btn-danger">Excluir</a>
                        <?php } ?>
                    </td>
                </tr>

                <?php } ?>

            </tbody>
        </table>
    </div>

    <?php } ?>

</body>

</html>