<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
</head>

<body class="container">
    <h1>Alunos</h1>
    <a href="cadastro.php">
        <button class="btn btn-primary">
            Novo Aluno
        </button>
    </a>

    <?php
    require_once "aluno.php";
    $dao = new AlunoDAO();

    if (isset($_POST["matricula"])) {
        $aluno = new Aluno($_POST["matricula"], $_POST["nome"], $_POST["entrada"]);

        try {
            $dao->inserir($aluno);
            echo ("<hr />Aluno incluído <hr />");
        } catch (PDOException $e) {
            echo ("<hr />Erro: " . $e->getMessage() . "<hr />");
        }
    }
    ?>

    <table class="table">
        <tr class="table-dark">
            <td>Matricula</td>
            <td>Nome</td>
            <td>Entrada</td>
        </tr>

        <?php
        foreach ($dao->obterTodos() as $obj) {
            echo "<tr><td>$obj->matricula</td>";
            echo "<td>$obj->nome</td>";
            echo "<td>$obj->entrada</td></tr>";
        }
        ?>

    </table>
</body>

</html>