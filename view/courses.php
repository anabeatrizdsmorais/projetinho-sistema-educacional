<?php
session_start();

require_once('../config/config.php');
try {
    $query = "SELECT * FROM cursos";
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
                <h2 class="text-left">Cursos</h2>
            </div>
            <a class="btn btn-success btn-sm float-end" href="./addCourse.php">
                <i class="fa-solid fa-plus"></i> Adicionar
            </a>
            
            <br>
            <br>
            
            <div>
                <input type="text" class="form-control" name="buscar" id="buscar" placeholder="Pesquisar..." />
            </div>
            
            <br>
            
            <div class="">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>CURSO</th>
                            <th>CARGA HORARIA</th>
                            <th>STATUS</th>
                            <th>AÇÕES</th>
                        </tr>
    
                    </thead>    
                    <tbody>
                        <?php 
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)):
                                $status = ($row['status'] == 1) ? 'ATIVADO' : (($row['status'] == 2) ? 'DESATIVADO' : 'CANCELADO');
                                $class_row = ($row['status'] == 1) ? 'p-3 mb-2 bg-success text-white' : (($row['status'] == 2) ? 'p-3 mb-2 bg-warning text-dark' : 'p-3 mb-2 bg-danger text-white');
                        ?>
                        <tr class="<?php echo $class_row ?>">
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['nome'] ?></td>
                            <td><?php echo $row['carga_horaria'] ?></td>
                            <td><?php echo $status ?></td>
                            <td>
                                <a href="./editCourse.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm" title="Editar">
                                    <i class='bx bx-edit'></i>
                                </a>
                                <a href="../controller/DeleteCourseController.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" title="Excluir">
                                    <i class='bx bx-trash'></i>
                                </a>
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