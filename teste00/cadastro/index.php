<?php
    include('../conexaoBD/conexao.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $data = $_REQUEST['val1'];
    
        if (empty($data)) {
            echo "usuário não encontrado";
        } else {
            echo $data;
        }
    }
    
    $conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro teste00</title>
</head>
<body>
<div class="form">
        <form action="index.php" method="POST">
            <fieldset>
                <legend>Cadastre-se</legend>
                <div class="inputForm">
                    <input type="text" name="nome" id="nome" class="user" required>
                    <label for="nome" class="label-input">Nome</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="text" name="sobrenome" id="sobrenome" class="user" required>
                    <label for="sobrenome" class="label-input">Sobrenome</label>
                </div>
                <br><br>
                <div class="inputForm">
                    <input type="email" name="email" id="email" class="user" required>
                    <label for="email" class="label-input">E-mail</label>
                </div>
                <br><br>
                <div id="enviar"><input type="submit" name="submit" id="submit"></div>
            </fieldset>
        </form>

        <div class="loginlink">
            <a href="../login/index.php">Fazer login</a>
        </div>
    </div>
</body>
</html>