<?php 

/**
 * AddNotesController.php
 * Insere os dados na tabela diario.
 */

require_once('../config/config.php');

try {
    $aluno_id = $_POST['aluno_id'];
    $disciplina_id = $_POST['disciplina_id'];
    $professor_id = $_POST['professor_id'];
    $nota = $_POST['nota'];
    $situacao = $_POST['situacao'];
    $semestre = $_POST['semestre'];

    $insert = $pdo->prepare(
        "INSERT INTO diario (aluno_id, disciplina_id, professor_id, nota, situacao, semestre) 
        VALUES (:aluno_id, :disciplina_id, :professor_id, :nota, :situacao, :semestre)"
    );

    $insert->bindParam(":aluno_id", $aluno_id);
    $insert->bindParam(":disciplina_id", $disciplina_id);
    $insert->bindParam(":professor_id", $professor_id);
    $insert->bindParam(":nota", $nota);
    $insert->bindParam(":situacao", $situacao);
    $insert->bindParam(":semestre", $semestre);

    $insert->execute();
    echo "<script>
        alert('Dados inseridos com sucesso!') ;
        location.href = '../view/addNotes.php' ;
    </script>";
} catch(PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}

?>