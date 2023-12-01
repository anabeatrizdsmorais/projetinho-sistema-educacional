<?php
session_start();

require_once('../config/config.php');

try {
    $id = $_GET['id']; 
    
    $nome = !empty($_POST['nome']) ? strtoupper($_POST['nome']) : "";
    $data_nascimento= !empty($_POST['data_nascimento']) ? ($_POST['data_nascimento']) : "";
    $endereco = !empty($_POST['endereco']) ? strtoupper($_POST['endereco']) : "";
    $email = !empty($_POST['email']) ?  strtoupper($_POST['email']) : "";
    $curso_id = $_POST['curso_id'];

    // $data_atual =
    
    $stmt = $pdo->prepare(" 
        UPDATE alunos 
        SET nome = :nome, 
        data_nascimento = :data_nascimento, 
        endereco = :endereco,
        email = :email,
        curso_id = :curso_id
        WHERE id = :id 
    ");
    
    $stmt->bindParam(':nome', $nome, PDO::PARAM_STR);
    $stmt->bindParam(':data_nascimento', $data_nasc, PDO::PARAM_STR);
    $stmt->bindParam(':endereco', $endereco, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':curso_id', $curso_id, PDO::PARAM_STR);

    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        echo "<script>
            alert('Sucesso! Registro alterado.');
            location.href = '../view/students.php' ;
        </script>";
       
    } else {
        echo "<script>
            alert('Erro ao inserir os dados.') ;
            location.href = '../view/editStudent.php' ;
        </script>";
    }

} catch (PDOException $e) {
    echo "Erro ao inserir dados: " . $e->getMessage();
}    


?>



