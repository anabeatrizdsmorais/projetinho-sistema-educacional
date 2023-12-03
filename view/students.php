<?php
session_start();

require_once('../config/config.php');
try {
    $query = "SELECT a.id, a.nome as aluno, a.data_nascimento, a.email, a.endereco, c.nome as curso 
    FROM alunos as a 
    LEFT JOIN cursos as c on c.id = a.curso_id";
    $stmt = $pdo->query($query);

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<?php require('./header-in.php'); ?>

<body id="body-pd">
    
    <?php require "./navBar.php" ?>

    <div class="height-100 main_components" >
        <div class="container">
            
            <div style="display: flex; justify-content: space-between;">
                <h2 class="text-left">Alunos</h2>
            </div>
            <a class="btn btn-success btn-sm float-end" href="./addStudent.php">
                <i class="fa-solid fa-plus"></i> Adicionar
            </a>
            
            <br>
            <br>

            <div>
                <input type="text" class="form-control" name="buscar" id="buscar" placeholder="Pesquisar..." oninput=" searchField() "/>
            </div>
            
            <br>

            <div class="">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th>Data de Nascimento</th>
                            <th>E-mail</th>
                            <th>Curso</th>
                            <th>Ações</th>
                        </tr>
    
                    </thead>    
                    <tbody>
                        <?php 
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                        ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['aluno'] ?></td>
                            <td>
                                <?php 
                                    echo $row['data_nascimento'] ? date("d/m/Y", strtotime($row['data_nascimento'])) : '-'; 
                                ?>
                            </td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['curso'] ?></td>
                            <td>
                                <a href="./editStudent.php?id=<?php echo $row['id']; ?>" class="btn btn-primary btn-sm" title="Editar">
                                    <i class='bx bx-edit'></i>
                                </a>
                                <a href="../controller/DeleteStudentController.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm" title="Excluir">
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