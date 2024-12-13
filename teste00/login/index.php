<?php
    include('../conexaoBD/conexao.php');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login teste 00</title>
</head>
<body>
<div class="form">
        <form method="POST">
            <fieldset>
                <legend>Login</legend>
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
                <div id="verificar-div"><button type="submit" name="verificar" id="verificar">Verificar conta</button></div>
            </fieldset>
        </form>

        <div class="cadastrolink">
            <a href="../cadastro/index.php">Não possuo conta</a>
        </div>
    </div>

    <?php
        if (isset($_POST['verificar'])) {
            $nome =  $_POST['nome'];
            $sobrenome = $_POST['sobrenome'];
            $email =  $_POST['email'];

            $stmt = $conexao->prepare("SELECT COUNT(*) FROM users WHERE nome = ? AND sobrenome = ? AND email = ?");
            $stmt->bind_param("sss", $nome, $sobrenome, $email);
            $stmt->execute();
            $stmt->bind_result($count);
            $stmt->fetch();
            
            if ($count > 0) {
                echo "<script>alert('Usuário $nome $sobrenome encontrado no banco de dados.');</script>";
            } else {
                echo "<script>alert('Usuário não encontrado no banco de dados.');</script>";
            }
            
            $stmt->close();
        }
        $conexao->close();
    ?>
</body>
</html>