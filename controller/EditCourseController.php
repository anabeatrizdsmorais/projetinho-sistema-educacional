<?php
session_start();

/**
 * EditCourseController.php
 * Edita os dados na tabela curso.
 */

require_once('../config/config.php');

try {
    $id = $_GET['id']; 
    
    $nome = strtoupper($_POST['nome']);
    $origem = $_POST['origem'];
    $carga_horaria = strtoupper($_POST['carga_horaria']);
    $descricao = strtoupper($_POST['descricao']);
    $status = $_POST['status'];

    $data_atual = date('Y-m-d H:i:s');
    
    $stmt = $pdo->prepare(" UPDATE cursos 
        SET nome = :nome, 
        origem = :origem,
        carga_horaria = :carga_horaria, 
        descricao = :descricao,
        status = :status,
        atualizado_em = :atualizado_em,
        usuario = :usuario
        WHERE id = :id 
    ");
    
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':origem', $origem, PDO::PARAM_STR);
    $stmt->bindParam(':carga_horaria', $carga_horaria, PDO::PARAM_STR);
    $stmt->bindParam(':descricao', $descricao, PDO::PARAM_STR);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':atualizado_em', $data_atual, PDO::PARAM_STR);
    $stmt->bindParam(':usuario', $_SESSION["nome"], PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        echo "<script>
            alert('Sucesso! Registro alterado.');
            location.href = '../view/courses.php' ;
        </script>";
    } else {
        echo "Erro ao atualizar o registro.";
    }

} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}    


?>



