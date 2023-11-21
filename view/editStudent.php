

<?php
session_start();

require_once('../config/config.php');
try {

    $id = $_GET['id'];

    $query = "SELECT a.id, a.nome, a.data_nascimento, a.endereco, a.email, c.id as id_curso, c.nome as curso 
    FROM alunos as a
    LEFT JOIN cursos as c ON c.id = a.curso_id
    WHERE a.id = '$id' ";

    $stmt = $pdo->query($query);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $nome = $row['nome'];
    $data_nasc = $row['data_nascimento'];
    $endereco = $row['endereco'];
    $email = $row['email'];
    $curso = $row['curso'];
    $id_curso = $row['id_curso'];

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
                <h2 class="text-left">Alunos</h2>
            </div>
            <a class="btn btn-success btn-sm float-end" href="./students.php">
                <i class="fa-solid fa-list"></i> Listar
            </a>
            
            <br>

            <div class="">
                <form autocomplete="off" action="../controller/EditStudentController.php?id=<?php echo $id; ?>" method="post">
                    <div class="row">

                        <div class="col-md-6">

                            <div>
                                <label for="">Nome</label>
                                <input type="text" name="nome" class="form-control" value="<?php echo $nome ?>">
                            </div>
                            <br>
                            <div>
                                <label for="">Data de Nascimento</label>
                                <input type="date" name="data_nascimento" class="form-control" value="<?php echo $data_nasc ?>">
                            </div>
                            <br>
                            <div>
                                <label for="">E-mail</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $email ?>">
                            </div>



                        </div>
                        
                        <div class="col-md-6">

                            <div>
                                <label for="">Endereço</label>
                                <input type="text" name="endereco" class="form-control" value="<?php echo $endereco ?>">
                            </div>
                            <br>
                            <div>
                                <div>
                                    <label for="">Curso</label>
                                    <select type="text" name="curso_id" class="form-select" require>
                                        <option value="" >Selecione um curso</option>
                                        <?php
                                            $query = "SELECT id, nome FROM cursos ";
                                            $stmt = $pdo->query($query);
                                            $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach($registros as $option){
                                        ?>
                                            <option value="<?php echo $option['id']?>" <?php echo ($option['id'] == $id_curso ? 'selected' : ''); ?>>
                                                <?php echo $option['nome']?>
                                            </option>
                                        <?php
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary" >Salvar</button>
                            <button type="button" class="btn btn-default" onclick="backPage()">Voltar</button>
                        </div>
                    </div>
                </form>
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