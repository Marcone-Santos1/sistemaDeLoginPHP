<?php

require_once("conexao.php");

if(isset($_POST['Email']) || isset($_POST['password'])){

    if (strlen($_POST['Email']) == 0) {
        echo "<p style=\"color: red;\">Preencha seu Email...</p>";
    } else if (strlen($_POST['password']) == 0) {
        echo "<p style=\"color: red;\">Preencha sua senha...</p>";
    } else {
        $email = $mysqli->real_escape_string($_POST['Email']);
        $password = $mysqli->real_escape_string($_POST['password']);

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email' AND senha = '$password'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ". $mysqli->error);

        $quantidade = $sql_query->num_rows;

        if ($quantidade == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (!isset($_SESSION)) {
                session_start();
            }

            $_SESSION['id'] = $usuario['id'];
            $_SESSION['name'] = $usuario['nome'];

            header("Location: painel.php");

        } else {
            echo "<p style=\"color: red;\">Falha ao logar! Email ou Senha incorretos</p>";
        }
    }

} 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <div class="container">
        <form action="" class="content" method="post">

            <p>
                <label for="">Email</label>
                <input type="Email"name="Email">
            </p>
            <p>
                <label for="">Senha</label>
                <input type="password" name="password" id="">
            </p>
            <p>
                <button type="submit">Entrar</button>
            </p>
        </form>
            <a style="border: 1px solid black; background: #f88;" href="cadastrar.php">Cadastrar...</a> 
    </div>

</body>
</html>