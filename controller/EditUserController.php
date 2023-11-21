<?php

require_once('../config/config.php');

try {
    $id = $_GET['id']; 
    
    $nome = $_POST['nome'] ? strtoupper($_POST['nome']) : '';
    $login = $_POST['login'];
    $nivel = $_POST['nivel'];
    $confirmar_senha = $_POST['confirmar_senha'];
    $senha = $confirmar_senha && !empty($_POST['senha']) ? $_POST['confirmar_senha'] : $_POST['senha'];

    // $hashSenha = $confirmar_senha != "" ? password_hash($senha, PASSWORD_DEFAULT) : 0;
    
    $stmt = $pdo->prepare(" 
        UPDATE usuarios 
        SET nome = :nome, 
        login = :login, 
        nivel = :nivel,
        senha = :senha
        WHERE id = :id 
    ");
    
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':login', $login, PDO::PARAM_STR);
    $stmt->bindParam(':nivel', $nivel, PDO::PARAM_STR);
    $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        echo "<script>
            alert('Sucesso! Registro alterado.');
            location.href = '../view/users.php' ;
        </script>";
    } else {
        echo "Erro ao atualizar o registro.";
    }

} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}    


?>



