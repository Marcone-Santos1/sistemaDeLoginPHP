<?php  

require("conexao.php");

if(isset ($_POST['Nome']) || isset($_POST['Email']) || isset($_POST['password'])){

    if (strlen($_POST['Email']) == 0) {
        echo "<p style=\"color: red;\">Preencha seu Email...</p>";
    }
    else if (strlen($_POST['Nome']) == 0) {
        echo "<p style=\"color: red;\">Preencha seu nome...</p>";
    } 
    else if (strlen($_POST['password']) == 0) {
        echo "<p style=\"color: red;\">Preencha sua senha...</p>";
    } 
    else {

    	$nome = $mysqli->real_escape_string($_POST['Nome']);
        $email = $mysqli->real_escape_string($_POST['Email']);
        $password = $mysqli->real_escape_string($_POST['password']);

        $sql_code = "INSERT INTO usuarios(nome, email, senha) VALUES ('$nome', '$email', '$password')";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: ". $mysqli->error); 

        $_SESSION['id'] = $usuario['id'];
        $_SESSION['name'] = $usuario['nome'];

        header("Location: index.php");      
    }

} 

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cadastro</title>
</head>
<body>

	<div class="container">
        <form action="" class="content" method="post">


        	<p>
                <label for="">Nome</label>
                <input type="text"name="Nome">
            </p>
            <p>
                <label for="">Email</label>
                <input type="Email"name="Email">
            </p>
            <p>
                <label for="">Senha</label>
                <input type="password" name="password" id="">
            </p>
            <p>
                <button type="submit">Cadastrar</button>
            </p>
        </form>
    </div>	

</body>
</html>