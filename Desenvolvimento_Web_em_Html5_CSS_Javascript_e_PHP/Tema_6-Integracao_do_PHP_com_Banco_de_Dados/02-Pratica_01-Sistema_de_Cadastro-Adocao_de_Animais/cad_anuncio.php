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

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Cadastrar Novo Anúncio</title>

    <!--  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body>
    <!-- 
        Fase    ->  (F)ilhote   /   (A)dulto
        Tipo    ->  (G)ato      /   (C)achorro 
        Porte   ->  (P)equeno   /   (M)edio     /   (G)rande
        Pelagem / Cor
        Raça
        Sexo    ->  (M)acho     /   (F)êmea
        Observação 
    -->

    <div class="container">
        <h1>Cadastrar Novo Anúncio de Animal para Adoção</h1>

        <form action="processa_anuncio.php" method="post">
            <div class="col-4">
                <label for="fase">Fase</label>

                <select class="form-select" name="fase" id="fase">
                    <option selected>Selecione a fase do animal</option>
                    <option value="F">Filhote</option>
                    <option value="A">Adulto</option>
                </select>
            </div>

            <div class="col-4">
                <label for="tipo">Tipo</label>

                <select class="form-select" name="tipo" id="tipo">
                    <option selected>Selecione o tipo do animal</option>
                    <option value="G">Gato</option>
                    <option value="C">Cachorro</option>
                </select>
            </div>

            <div class="col-4">
                <label for="tipo">Porte</label>

                <select class="form-select" name="porte" id="porte">
                    <option selected>Selecione o porte do animal</option>
                    <option value="P">Pequeno</option>
                    <option value="M">Médio</option>
                    <option value="G">Grande</option>
                </select>
            </div>

            <div class="col-4">
                <label for="pelagemCor">Pelagem / Cor</label>
                <input type="text" name="pelagemCor" id="pelagemCor" class="form-control" />
            </div>

            <div class="col-4">
                <label for="raca">Raça</label>
                <input type="text" name="raca" id="raca" class="form-control" />
            </div>

            <div class="col-4">
                <div class="form-check form-check-inline">
                    <label for="sexoM" class="form-check-label">Macho</label>
                    <input type="radio" class="form-check-input" name="sexo" id="sexoM" value="M" />
                </div>

                <div class="form-check form-check-inline">
                    <label for="sexoF" class="form-check-label">Fêmea</label>
                    <input type="radio" class="form-check-input" name="sexo" id="sexoF" value="F" />
                </div>
            </div>

            <div class="col-4">
                <label for="observacao">Observações</label>
                <textarea name="observacao" class="form-control" id="observacao" rows="3"></textarea>
            </div>

            <br />

            <button type="submit" name="enviarDados" class="btn btn-primary" value="leo">Cadastrar</button>

            <a href="index_logado.php" class="btn btn-danger">Cancelar</a>
        </form>
    </div>
</body>

</html>