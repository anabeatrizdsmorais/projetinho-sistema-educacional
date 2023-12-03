<?php 
session_start();

require_once('../config/config.php');

try {
    $nome = !empty($_POST['nome']) ? strtoupper($_POST['nome']) : "";
    $curso_id = !empty($_POST['curso_id']) ? $_POST['curso_id'] : 0;
    $professor_id = !empty($_POST['professor_id']) ? $_POST['professor_id'] : 0;
    $valor = !empty($_POST['valor']) ? $_POST['valor'] : 0;
    $periodo = !empty($_POST['periodo']) ? $_POST['periodo'] : 0;

    $data_atual = date("Y-m-d H:i:s");
    $usuario = $_SESSION['nome'];

    
    $stmt = $pdo->prepare(" UPDATE disciplinas 
        SET nome = :nome, 
        curso_id = :curso_id,
        professor_id = :professor_id,
        usuario = :usuario,
        periodo = :periodo,
        valor = :valor
        WHERE id = :id 
    ");
    
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':curso_id', $curso_id, PDO::PARAM_STR);
    $stmt->bindParam(':professor_id', $professor_id, PDO::PARAM_STR);
    $stmt->bindParam(':periodo', $periodo, PDO::PARAM_STR);
    $stmt->bindParam(':valor', $valor, PDO::PARAM_STR);
    $stmt->bindParam(':usuario', $usuario, PDO::PARAM_STR);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
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