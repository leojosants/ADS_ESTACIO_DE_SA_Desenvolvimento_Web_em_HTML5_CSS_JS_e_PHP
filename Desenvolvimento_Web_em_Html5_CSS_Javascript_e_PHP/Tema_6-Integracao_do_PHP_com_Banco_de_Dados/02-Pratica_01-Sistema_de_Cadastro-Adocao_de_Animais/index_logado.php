<?php
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
        <div class="col-md-11">
            <h2 class="title">
                Olá! <i><?php echo $_SESSION['nome']; ?></i>, seja bem-vindo(a)!
            </h2>
        </div>
    </div>

    <div class="container">
        <a href="logout.php" class="btn btn-dark">Sair</a>
    </div>
</body>

</html>