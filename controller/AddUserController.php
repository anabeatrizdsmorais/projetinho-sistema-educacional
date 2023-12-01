<?php 

require_once('../config/config.php');

try {
    $login = !empty($_POST['login']) ? strtoupper($_POST['login']) : "";
    $nome = !empty($_POST['nome']) ? strtoupper($_POST['nome']) : "";
    $senha = !empty($_POST['senha']) ? $_POST['senha'] : "";
    $nivel = !empty($_POST['nivel']) ? $_POST['nivel'] : 0;
    $data_atual = date('Y-m-d H:i:s');

    $insert = $pdo->prepare(
        " INSERT INTO usuarios (nome, login, senha, nivel, criado_em, atualizado_em) 
        VALUES (:nome, :login, :senha, :nivel, :criado_em, :atualizado_em) "
    );

    $insert->bindParam(":nome", $nome);
    $insert->bindParam(":login", $login);
    $insert->bindParam(":senha", $senha);
    $insert->bindParam(":nivel", $nivel);
    $insert->bindParam(":criado_em", $data_atual);
    $insert->bindParam(":atualizado_em", $data_atual);

    $insert->execute();
    echo "<script>
            alert('Dados inseridos com sucesso!') ;
            location.href = '../view/user.php' ;
        </script>";
} catch(PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}

?>