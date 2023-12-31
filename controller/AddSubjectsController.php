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

    
    $insert = $pdo->prepare(
        " INSERT INTO disciplinas (nome, curso_id, professor_id, valor, periodo, criado_em, usuario) 
        VALUES (:nome, :curso_id, :professor_id, :valor, :periodo, :criado_em, :usuario) "
    );

    $insert->bindParam(":nome", $nome);
    $insert->bindParam(":curso_id", $curso_id);
    $insert->bindParam(":professor_id", $professor_id);
    $insert->bindParam(":valor", $valor);
    $insert->bindParam(":periodo", $periodo);
    $insert->bindParam(":criado_em", $data_atual);
    $insert->bindParam(":usuario", $usuario);
    
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