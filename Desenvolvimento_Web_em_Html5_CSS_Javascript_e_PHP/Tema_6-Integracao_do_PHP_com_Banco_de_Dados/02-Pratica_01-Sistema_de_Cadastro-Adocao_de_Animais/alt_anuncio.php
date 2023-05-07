<?php
require_once "conectaBD.php";
session_start();

if (empty($_SESSION)) {
    // Significa que as variáveis de SESSÂO não foram definidas, este bloco não poderá ser acessado
    header("Location: index.php?msgErro=Você precisa se autenticar no sistema.");
    die();
}

/*
    // echo "Estou logado";
    echo "<pre>";
    print_r($_SESSION);
    print_r($_GET);
    echo "</pre>";
    die();
*/


//  Verificar se está chegando a informação (id_anuncio) pelo $_GET
if (!empty($_GET["id_anuncio"])) {

    $sql = "SELECT * FROM anuncio WHERE email_usuario = :email AND id = :id";

    //  Buscar as informações do anúncio a ser alterado (no BD)
    try {
        $stmt = $pdo->prepare($sql);

        $stmt->execute(
            array(":email" => $_SESSION["email"], ":id" => $_GET["id_anuncio"])
        );

        $result = array();

        //  Verificar se o usuário logado pode acessar / alterar as informações desse registro (id_anuncio)
        if ($stmt->rowCount() == 1) {
            //  Registro obtido no BD
            $result = $stmt->fetchAll();
            $result = $result[0];   //  Informações do registro a ser alterado.

            /*
                echo "<pre>";
                print_r($result);
                echo "<pre>";
            */

            // die();
        } else {
            // die("Não foi encontrado nenhum registro para o id_anuncio = " . $_GET["id_anuncio"] . " e e-mail = " . $_SESSION["email"]);

            header("Location: index_logado.php?msgErro=Você não tem permissão para acessar esta página!");
            die();
        }
    } catch (PDOException $e) {
        header("Location: index_logado.php?msgErro=Falha ao obter registro no BD!");
        // die($e->getMessage());
    }

    //  Setar os valores nos campos com base na consulta realizada
} else {
    //  Se cair nesse bloco, significa que $GET["id_anuncio"] está vazio
    header("Location: index_logado.php?msgErro=Você não tem permissão para acessar esta página!");
    die();
}

//  Redirecionar (permissão)
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Alterar Anúncio</title>

    <!--  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <h1>Alterar Anúncio</h1>

        <form action="processa_anuncio.php" method="post">
            <div class="col-4">
                <label for="id_anuncio">ID</label>
                <input type="text" class="form-control" name="id_anuncio" id="id_anuncio" value="<?php echo $result["id"]; ?>" readonly />
            </div>
            <div class="col-4">
                <label for="fase">Fase</label>

                <select class="form-select" name="fase" id="fase">
                    <option>Selecione a fase do animal</option>
                    <option value="F" <?php echo $result["fase"] == "F" ? "selected" : "" ?>>Filhote</option>
                    <option value="A" <?php echo $result["fase"] == "A" ? "selected" : "" ?>>Adulto</option>
                </select>
            </div>

            <div class="col-4">
                <label for="tipo">Tipo</label>

                <select class="form-select" name="tipo" id="tipo">
                    <option>Selecione o tipo do animal</option>
                    <option value="G" <?php echo $result["tipo"] == "G" ? "selected" : "" ?>>Gato</option>
                    <option value="C" <?php echo $result["tipo"] == "C" ? "selected" : "" ?>>Cachorro</option>
                </select>
            </div>

            <div class="col-4">
                <label for="tipo">Porte</label>

                <select class="form-select" name="porte" id="porte">
                    <option>Selecione o porte do animal</option>
                    <option value="P" <?php echo $result["porte"] == "P" ? "selected" : "" ?>>Pequeno</option>
                    <option value="M" <?php echo $result["porte"] == "M" ? "selected" : "" ?>>Médio</option>
                    <option value="G" <?php echo $result["porte"] == "G" ? "selected" : "" ?>>Grande</option>
                </select>
            </div>

            <div class="col-4">
                <label for="pelagemCor">Pelagem / Cor</label>
                <input type="text" name="pelagemCor" id="pelagemCor" class="form-control" value="<?php echo $result["pelagem_cor"]; ?>" />
            </div>

            <div class="col-4">
                <label for="raca">Raça</label>
                <input type="text" name="raca" id="raca" class="form-control" value="<?php echo $result["raca"]; ?>" />
            </div>

            <div class="col-4">
                <div class="form-check form-check-inline">
                    <label for="sexoM" class="form-check-label">Macho</label>
                    <input type="radio" class="form-check-input" name="sexo" id="sexoM" value="M" <?php echo $result["sexo"] == "M" ? "checked" : "" ?> />
                </div>

                <div class="form-check form-check-inline">
                    <label for="sexoF" class="form-check-label">Fêmea</label>
                    <input type="radio" class="form-check-input" name="sexo" id="sexoF" value="F" <?php echo $result["sexo"] == "F" ? "checked" : "" ?> />
                </div>
            </div>

            <div class="col-4">
                <label for="observacao">Observações</label>
                <textarea name="observacao" class="form-control" id="observacao" rows="3"><?php echo $result["observacao"]; ?></textarea>
            </div>

            <br />

            <button type="submit" name="enviarDados" class="btn btn-primary" value="ALT">Alterar</button>

            <a href="index_logado.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</body>

</html>