<?php

session_start();

require_once('../config/config.php');
try {
    $query = "SELECT d.id, d.nota, d.situacao, d.semestre, a.nome as aluno, p.nome as professor, di.nome as disciplina
    FROM diario as d 
    LEFT JOIN alunos as a on a.id = d.aluno_id
    LEFT JOIN professores as p on p.id = d.professor_id
    LEFT JOIN disciplinas as di on di.id = d.disciplina_id
    LEFT JOIN usuarios as user on user.id = p.user_id
    WHERE a.inativo = 0 
    AND user.id = ".$_SESSION["id"];
    
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
                <h2 class="text-left">Diário</h2>
            </div>
            <a class="btn btn-success btn-sm float-end" href="./addNotes.php">
                <i class="fa-solid fa-plus"></i> Adicionar
            </a>
            
            <br>
            <br>

            <div class="">
                <table class="table table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>ALUNO</th>
                            <th>DISCIPLINA</th>
                            <th>PROFESSOR</th>
                            <th>NOTA</th>
                            <th>SITUAÇÃO</th>
                            <th>SEMESTRE</th>
                            <?php if( $_SESSION['nivel'] != 3): ?>
                            <th>AÇÃO</th>
                            <?php endif; ?>
                        </tr>
    
                    </thead>    
                    <tbody>
                        <?php 
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) :
                        ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['aluno'] ?></td>
                            <td><?php echo $row['disciplina']  ?></td>
                            <td><?php echo $row['professor']  ?></td>
                            <td><?php echo $row['nota'] ?></td>
                            <td><?php echo $row['situacao']  ?></td>
                            <td><?php echo $row['semestre']  ?></td>
                            <?php if( $_SESSION['nivel'] != 3): ?>
                            <td>
                                <a href="#editar" class="btn btn-primary btn-sm" title="Editar">
                                    <i class='bx bx-edit'></i>
                                </a>
                                <a href="#excluir" class="btn btn-danger btn-sm" title="Excluir">
                                    <i class='bx bx-trash'></i>
                                </a>
                            </td>
                            <?php endif; ?>
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