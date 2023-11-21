<?php
session_start();

require_once('../config/config.php');

try {
    $query = "SELECT * FROM usuarios";
    $stmt = $pdo->query($query);

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<?php require('./header-in.php'); ?>

<body id="body-pd">

    <?php require('./navBar.php') ?>
       
    <div class="height-100 main_components" >
        <div class="container">
            
            <div style="display: flex; justify-content: space-between;">
                <h2 class="text-left">Usuários</h2>
            </div>
            <a class="btn btn-success btn-sm float-end" href="./addUser.php">
                <i class="fa-solid fa-plus"></i> Adicionar
            </a>
            
            <br>
            <br>

            <div class="">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>NOME</th>
                            <th>LOGIN (CPF ou Email)</th>
                            <th>NIVEL</th>
                            <th>AÇÕES</th>
                        </tr>
    
                    </thead>    
                    <tbody>
                        <?php 
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                                $nivel = ($row['nivel'] == 0) 
                                ? '0- SUPER USUÁRIO' : (($row['nivel'] == 1) 
                                ? '1- ADMINISTRATIVO' : (($row['nivel'] == 2) 
                                ? '2- PROFESSORES' : '3- ALUNOS'));
                        ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['nome'] ?></td>
                            <td><?php echo $row['login'] ?></td>
                            <td><?php echo $nivel ?></td>
                            <td>
                                <a href="./editUser.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm" title="Editar">
                                    <i class='bx bx-edit'></i>
                                </a>
                                <?php if($_SESSION["nivel"] != 2 && $_SESSION["nivel"] != 3): ?>
                                    <a href="../controller/DeleteUserController.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" title="Excluir">
                                        <i class='bx bx-trash'></i>
                                    </a>
                                <?php endif; ?>
                            </td>
                        </tr>
                        <?php 
                            endwhile;
                        ?>
    
                    </tbody>
                </table>
            </div>
            <br>
            <br>
            <br>
        </div>
    </div>

    <!-- File js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js" integrity="sha384-Rx+T1VzGupg4BHQYs2gCW9It+akI2MM/mndMCy36UVfodzcJcF0GGLxZIzObiEfa" crossorigin="anonymous"></script>
    <script src="../scripts/script.js"></script>
</body>

</html>