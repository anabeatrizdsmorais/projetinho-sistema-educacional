<?php 

/**
 * AddCourseController.php
 * Insere os dados na tabela curso.
 */

require_once('../config/config.php');

try {
    $nome = !empty($_POST['nome']) ? strtoupper($_POST['nome']) : "";
    $origem = !empty($_POST['origem']) ? strtoupper($_POST['origem']) : "";
    $carga_horaria = !empty($_POST['carga_horaria']) ? strtoupper($_POST['carga_horaria']) : "";
    $status = !empty($_POST['status']) ? $_POST['status'] : 0;
    $descricao = !empty($_POST['descricao']) ? strtoupper($_POST['descricao']) : "";

    $insert = $pdo->prepare(
        " INSERT INTO cursos (nome, origem, carga_horaria, status, descricao) VALUES (:nome, :origem, :carga_horaria, :status, :descricao) "
    );

    $insert->bindParam(":nome", $nome);
    $insert->bindParam(":origem", $origem);
    $insert->bindParam(":carga_horaria", $carga_horaria);
    $insert->bindParam(":status", $status);
    $insert->bindParam(":descricao", $descricao);

    $insert->execute();
    echo "<script>
        alert('Dados inseridos com sucesso!') ;
        location.href = '../view/addCourse.php' ;
    </script>";
} catch(PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}

?>