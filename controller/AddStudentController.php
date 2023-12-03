<?php 
session_start();


/**
 * AddStudentController.php
 * Insere os dados na tabela aluno.
 */

require_once('../config/config.php');

try {
    $nome = !empty($_POST['nome']) ? strtoupper($_POST['nome']) : "";
    $data_nascimento= !empty($_POST['data_nascimento']) ? ($_POST['data_nascimento']) : "";
    $endereco = !empty($_POST['endereco']) ? strtoupper($_POST['endereco']) : "";
    $email = !empty($_POST['email']) ?  strtoupper($_POST['email']) : "";
    $cursoId = !empty($_POST['curso_id']) ? $_POST['curso_id'] : 0;

    $data_atual = date("Y-m-d H:i:s");
    $usuario = $_SESSION['nome'];
    
    $insert = $pdo->prepare(
        " INSERT INTO alunos (nome, data_nascimento, endereco, email, curso_id, usuario, criado_em, atualizado_em, inativo) 
        VALUES (:nome, :data_nascimento, :endereco, :email, :curso_id, :usuario, :criado_em, :atualizado_em, 0) "
    );

    $insert->bindParam(":nome", $nome);
    $insert->bindParam(":data_nascimento", $data_nascimento);
    $insert->bindParam(":endereco", $endereco);
    $insert->bindParam(":email", $email);
    $insert->bindParam(":curso_id", $cursoId);
    $insert->bindParam(":usuario", $usuario);
    $insert->bindParam(":criado_em", $data_atual);
    $insert->bindParam(":atualizado_em", $data_atual);
    
    if ($insert->execute()) {
        echo "<script>
            alert('Dados inseridos com sucesso!') ;
            location.href = '../view/addStudent.php' ;
        </script>";
    } else {
        echo "<script>
            alert('Erro ao inserir os dados.') ;
            location.href = '../view/addStudent.php' ;
        </script>";
    }
} catch(PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}

?>