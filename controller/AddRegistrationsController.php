<?php 


/**
 * AddCRegistrationsController.php
 * Insere os dados na tabela inscrições.
 */

require_once('../config/config.php');

try {
    
    $aluno_id = !empty($_POST['aluno_id']) ? $_POST['aluno_id'] : 0;
    $curso_id = !empty($_POST['curso_id']) ? $_POST['curso_id'] : 0;
    
    $insert = $pdo->prepare(
        " INSERT INTO inscricoes (aluno_id, curso_id) VALUES (:aluno_id, :curso_id) "
    );

    $insert->bindParam(":aluno_id", $aluno_id);
    $insert->bindParam(":curso_id", $curso_id);
   
    if ($insert->execute()) {
        echo "<script>
            alert('Dados inseridos com sucesso!') ;
            location.href = '../view/registrations.php' ;
        </script>";
    } else {
        echo "<script>
            alert('Erro ao inserir os dados.') ;
            location.href = '../view/registrations.php' ;
        </script>";
    }
} catch(PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}

?>