<?php


/**
 * DeleteCourseController.php
 * Deleta o registro na tabela curso.
 */

require_once('../config/config.php');

try {
    $id = $_GET['id'];
    
    $stmt = $pdo->prepare("DELETE FROM cursos WHERE id = :id");

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
