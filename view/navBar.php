<?php

// Verifica se o usuário está autenticado
if (!isset($_SESSION["username"])) {
    header("location: ./home.php");
    exit();
}

?>

<header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="../images/logo-sistema-edu.jpg" alt=""> </div>
    </header>

<div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="./home.php" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">Sistema Educacional</span> </a>
                <div class="nav_list"> 
                    
                    <a href="./courses.php" class="nav_link <?php echo ($_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3) ? 'permissao_por_nivel' : '' ?>"> 
                        <i class='bx bx-grid-alt nav_icon'></i> 
                        <span class="nav_name">CURSOS</span> 
                    </a> 

                    <a href="./students.php" class="nav_link <?php echo ($_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3) ? 'permissao_por_nivel' : '' ?>"> 
                        <i class='bx bx-user nav_icon'></i> 
                        <span class="nav_name">ALUNOS</span> 
                    </a> 

                    <a href="./subjects.php" class="nav_link <?php echo ($_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3) ? 'permissao_por_nivel' : '' ?>"> 
                        <i class='bx bx-message-square-detail nav_icon'></i> 
                        <span class="nav_name">DISCIPLINAS</span> 
                    </a> 

                    <a href="./notes.php" class="nav_link <?php echo ($_SESSION['nivel'] == 2 && $_SESSION['nivel'] == 3) ? 'permissao_por_nivel' : '' ?>"> 
                        <i class='bx bx-bookmark nav_icon'></i> 
                        <span class="nav_name">DIÁRIO</span> 
                    </a> 
                    
                    <a href="./teachers.php" class="nav_link  <?php echo ($_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3) ? 'permissao_por_nivel' : '' ?>"> 
                        <i class='bx bx-folder nav_icon'></i> 
                        <span class="nav_name">PROFESSORES</span> 
                    </a> 
                    
                    <!-- <a href="./registrations.php" class="nav_link  <?php echo ($_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3) ? 'permissao_por_nivel' : '' ?>"> 
                        <i class='bx bx-bar-chart-alt-2 nav_icon'></i> 
                        <span class="nav_name">INSCRIÇÕES</span> 
                    </a>  -->
                    
                    <a href="./users.php" class="nav_link  <?php echo ($_SESSION['nivel'] == 2 || $_SESSION['nivel'] == 3) ? 'permissao_por_nivel' : '' ?>"> 
                        <i class='bx bx-user nav_icon'></i> 
                        <span class="nav_name">USUÁRIOS</span> 
                    </a> 
                    
                </div>
            </div> 
            <a href="../controller/logoutController.php" class="nav_link"> 
                <i class='bx bx-log-out nav_icon'></i> 
                <span class="nav_name">Sair</span> 
            </a>
        </nav>
    </div>