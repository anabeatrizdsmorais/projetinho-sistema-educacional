<?php
session_start();

require_once('../config/config.php');

try {
 
    // Verifica se os dados de login foram enviados
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
       
        $username = $_POST["username"];
        $password = $_POST["password"];
        
        $query = "SELECT login, senha FROM usuarios";
        $stmt = $pdo->query($query);

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            
            // Verifica se as credenciais são válidas (isso pode envolver uma consulta ao banco de dados)
            if ($username == $row['usuario'] && $password == $row['senha']) {
                // Inicia a sessão
                $_SESSION["username"] = $username;
        
                // Redireciona para a página de boas-vindas ou qualquer outra página protegida
                header("location: ./view/home.php");
            } else {
                // Se as credenciais não forem válidas, redirecione de volta ao formulário de login
                header("location: ../index.php");
            }
        }
    
    }
    
} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

?>
