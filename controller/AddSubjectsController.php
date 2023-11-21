<?php 

require_once('../config/config.php');

try {
    $nome = !empty($_POST['nome']) ? strtoupper($_POST['nome']) : "";
    $curso_id = !empty($_POST['curso_id']) ? $_POST['curso_id'] : 0;
    
    $insert = $pdo->prepare(
        " INSERT INTO disciplinas (nome, curso_id) VALUES (:nome, :curso_id) "
    );

    $insert->bindParam(":nome", $nome);
    $insert->bindParam(":curso_id", $curso_id);
    
    if ($insert->execute()) {
        echo "<script>
            alert('Dados inseridos com sucesso!') ;
            location.href = '../view/addSubjects.php' ;
        </script>";
    } else {
        echo "<script>
            alert('Erro ao inserir os dados.') ;
            location.href = '../view/addSubjects.php' ;
        </script>";
    }
} catch(PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}

?>