<?php
session_start();

/**
 * DeleteCourseController.php
 * Deleta o registro na tabela curso.
 */

require_once('../config/config.php');

try {
    $id = $_GET['id'];
    $data_atual = date('Y-m-d H:i:s');
    $inativo = 1;

    // $stmt = $pdo->prepare("DELETE FROM cursos WHERE id = :id");

    $stmt = $pdo->prepare(" UPDATE cursos 
        SET inativo = :inativo,
        atualizado_em = :atualizado_em,
        usuario = :usuario
        WHERE id = :id 
    ");

    $stmt->bindParam(':inativo', $inativo, PDO::PARAM_INT);
    $stmt->bindParam(':atualizado_em', $data_atual, PDO::PARAM_STR);
    $stmt->bindParam(':usuario', $_SESSION["nome"], PDO::PARAM_STR);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>
            alert('Sucesso! Registro excluido.');
            location.href = '../view/courses.php' ;
        </script>";
    } else {
        echo "Erro ao excluir o registro";
    }
    
} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage(); 
}
