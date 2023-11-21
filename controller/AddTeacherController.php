<?php 

require_once('../config/config.php');

try {
    $nome = !empty($_POST['nome']) ? strtoupper($_POST['nome']) : "";
    $especialidade = !empty($_POST['especialidade']) ? strtoupper($_POST['especialidade']) : "";
    $email_academico = !empty($_POST['email_academico']) ? strtoupper($_POST['email_academico']) : "";
    $telefone = !empty($_POST['telefone']) ? $_POST['telefone'] : "";
    $userId = !empty($_POST['user_id']) ? $_POST['user_id'] : 0;

    $insert = $pdo->prepare(
        " INSERT INTO professores (nome, especialidade, email_academico, telefone, user_id) VALUES (:nome, :especialidade, :email_academico, :telefone, :userId) "
    );

    $insert->bindParam(":nome", $nome);
    $insert->bindParam(":especialidade", $especialidade);
    $insert->bindParam(":email_academico", $email_academico);
    $insert->bindParam(":telefone", $telefone);
    $insert->bindParam(":userId", $userId);

    $insert->execute();
    echo "<script>
        alert('Dados inseridos com sucesso!') ;
        location.href = '../view/addTeacher.php' ;
    </script>";
} catch(PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}

?>