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
    <h1>Novo Aluno</h1>

    <script>
        function preenchido(objeto, campo) {
            if (objeto.value.trim() == "") {
                alert(`O campo ${campo} é obrigatório!`);
                objeto.focus();
                return false;
            }
            return true;
        }

        function validar() {
            let objMatricula = document.getElementById("matricula");
            let objNome = document.getElementById("nome");
            let objEntrada = document.getElementById("entrada");
            let objConfirma = document.getElementById("confirma");

            // Técnica de curto-circuito
            if (
                !preenchido(objMatricula, "matricula") ||
                !preenchido(objNome, "nome") ||
                !preenchido(objEntrada, "entrada")
            ) {
                return false;
            }

            if (objMatricula.value.length != 8) {
                alert("Campo matrícula tem 8 caracteres");
                objMatricula.focus();
                return false;
            }

            let d = new Date();
            let entrada = eval(objEntrada.value);

            if ((entrada < 2000) || (entrada > d.getFullYear())) {
                alert(`Entrada de 2000 a ${d.getFullYear()}`);
                objEntrada.focus();
                return false;
            }

            if (!objConfirma.checked) {
                alert("Você precisa marcar a confirmação!");
                return false;
            }

            return true;
        }
    </script>

    <form action="listagem.php" method="post" onsubmit="return validar()">
        Matricula: <input type="text" name="matricula" id="matricula" class="form-control" require maxlength="8" minlength="8" /><br />

        Nome: <input type="text" name="nome" id="nome" class="form-control" require /><br />

        Entrada: <input type="number" name="entrada" id="entrada" class="form-control" require min="2000" max="2099" /><br />

        <p>
            <input type="checkbox" id="confirma" class="form-check-input" require />
            <label class="form-check-label">
                Confirmo a veracidade das informações
            </label>
        </p>

        <input type="submit" value="Adicionar" class="btn btn-primary" />
    </form>
</body>

</html>