<?php 

require_once('../config/config.php');

try {
    $login = !empty($_POST['login']) ? strtoupper($_POST['login']) : "";
    $nome = !empty($_POST['nome']) ? strtoupper($_POST['nome']) : "";
    $senha = !empty($_POST['senha']) ? $_POST['senha'] : "";
    $nivel = !empty($_POST['nivel']) ? $_POST['nivel'] : 0;

    $insert = $pdo->prepare(
        " INSERT INTO usuarios (nome, login, senha, nivel) VALUES (:nome, :login, :senha, :nivel) "
    );

    $insert->bindParam(":nome", $nome);
    $insert->bindParam(":login", $login);
    $insert->bindParam(":senha", $senha);
    $insert->bindParam(":nivel", $nivel);

    $insert->execute();
    echo "<script>
            alert('Dados inseridos com sucesso!') ;
            location.href = '../view/addUser.php' ;
        </script>";
} catch(PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}

?>