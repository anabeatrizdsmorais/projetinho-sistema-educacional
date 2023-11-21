<?php
session_start();

require_once('config/config.php');

try {

    // $senhaFornecida = "minhaSenha123";
    // $hashArmazenado = "$2y$10$Q7Dl7xEHx/TEBvuz0xK6meQb7CxI1coZ.GTXA7fAcC4vOz3s2BG0a";

    // if (password_verify($senhaFornecida, $hashArmazenado)) {
    //     echo "A senha é válida!";
    // } else {
    //     echo "A senha é inválida.";
    // }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $query = "SELECT nome, login, senha, nivel, id FROM usuarios WHERE login = '$username' ";
        $stmt = $pdo->query($query);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

            if (password_verify($password, $row['senha'])) {
                echo "<script>alert('Algo deu certo.')</script>";
            } else {
                echo "<script>alert('Algo deu errado.')</script>";
            }

            
            if ($username == $row['login'] && $password == $row['senha']) {
            // if ($username == $row['login'] && password_verify($password, $row['senha'])) {
                $_SESSION["username"] = $username;
                $_SESSION["id"] = $row['id'];
                $_SESSION["nome"] = $row['nome'];
                $_SESSION["nivel"] = $row['nivel'];
                
                header("location: view/home.php");
            } else {
                // header("location: login.php");
                echo "<script>alert('Algo deu errado.')</script>";
            }
        }
    
    }
    
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

?>


<!DOCTYPE html>
<html lang="pt-br">
    <?php require('./view/header-out.php') ?>
<body>
    
<div class="sidenav">
    <div class="login-main-text">
        <!-- <h2>SYS EDUCATION</h2>
        <p>Login para acessar.</p> -->
        <img src="./images/logo-sistema-edu.jpg" alt="">
    </div>
</div>
<div class="main">
    <div class="col-md-6 col-sm-12">
        <div class="login-form">
            <form action="index.php" method="post" autocomplete="off">
                <div class="form-group">
                    <label>Usuario</label>
                    <input type="text" name="username" class="form-control" placeholder="CPF ou Email">
                </div>
                <div class="form-group">
                    <label>Senha</label>
                    <input type="password" name="password" class="form-control" placeholder="">
                </div>
                <button type="submit" class="btn btn-black">Entrar</button>
            </form>
        </div>
    </div>
</div>

</body>
</html>