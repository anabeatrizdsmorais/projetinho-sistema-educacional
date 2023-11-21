<?php
require_once('../config/config.php');

try {
    $id = $_GET['id'];
    
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = :id");
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>
            alert('Sucesso! Registro excluido.');
            location.href = '../view/users.php' ;
        </script>";
    } else {
        echo "<script>
            alert('Erro ao excluir registro.');
            location.href = '../view/users.php' ;
        </script>";
    }
    
} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage(); 
}
