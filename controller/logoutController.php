<?php
session_start();

// Finaliza a sessão
session_destroy();

// Redireciona de volta para a página de login
header("location: ../index.php");
?>