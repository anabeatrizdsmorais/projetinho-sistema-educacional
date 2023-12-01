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
    
    $insert = $pdo->prepare(
        " INSERT INTO alunos (nome, data_nascimento, endereco, email, curso_id) VALUES (:nome, :data_nascimento, :endereco, :email, :curso_id) "
    );

    $insert->bindParam(":nome", $nome);
    $insert->bindParam(":data_nascimento", $data_nascimento);
    $insert->bindParam(":endereco", $endereco);
    $insert->bindParam(":email", $email);
    $insert->bindParam(":curso_id", $cursoId);
    
    // $insertUser = $pdo->prepare("INSERT INTO usuarios (nome, login, senha, nivel) VALUES (:nome, :login, :senha, :nivel) ");

    // $senha = "aluno";
    // $nivel = 3;

    // $insertUser->bindParam(":nome", $nome);
    // $insertUser->bindParam(":login", $email);
    // $insertUser->bindParam(":senha", $senha);
    // $insertUser->bindParam(":nivel", $nivel);

    // $insert->execute();
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