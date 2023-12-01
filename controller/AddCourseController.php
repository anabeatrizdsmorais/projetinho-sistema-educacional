<?php 
session_start();

/**
 * AddCourseController.php
 * Insere os dados na tabela curso.
 */

require_once('../config/config.php');

try {
    $nome = !empty($_POST['nome']) ? strtoupper($_POST['nome']) : "";
    $origem = !empty($_POST['origem']) ? ($_POST['origem']) : "";
    $carga_horaria = !empty($_POST['carga_horaria']) ? strtoupper($_POST['carga_horaria']) : "";
    $status = !empty($_POST['status']) ? $_POST['status'] : 0;
    $descricao = !empty($_POST['descricao']) ? strtoupper($_POST['descricao']) : "";
    $inativo = 0;

    $data_atual = date('Y-m-d H:i:s');

    $insert = $pdo->prepare(
        " INSERT INTO cursos (nome, origem, carga_horaria, status, descricao, criado_em, atualizado_em, usuario, inativo) 
        VALUES (:nome, :origem, :carga_horaria, :status, :descricao, :criado_em, :atualizado_em, :usuario, :inativo) "
    );

    $insert->bindParam(":nome",             $nome,              PDO::PARAM_STR);
    $insert->bindParam(":origem",           $origem,            PDO::PARAM_STR);
    $insert->bindParam(":carga_horaria",    $carga_horaria,     PDO::PARAM_STR);
    $insert->bindParam(":status",           $status,            PDO::PARAM_STR);
    $insert->bindParam(":descricao",        $descricao,         PDO::PARAM_STR);
    $insert->bindParam(':criado_em',        $data_atual,        PDO::PARAM_STR);
    $insert->bindParam(':atualizado_em',    $data_atual,        PDO::PARAM_STR);
    $insert->bindParam(':usuario',          $_SESSION["nome"], PDO::PARAM_STR);
    $insert->bindParam(':inativo',          $inativo,           PDO::PARAM_INT);

    $insert->execute();
    echo "<script>
        alert('Dados inseridos com sucesso!') ;
        location.href = '../view/courses.php' ;
    </script>";
} catch(PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}

?>