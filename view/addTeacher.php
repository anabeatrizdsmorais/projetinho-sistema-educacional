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
                <h2 class="text-left">Professores</h2>
            </div>
            <a class="btn btn-success btn-sm float-end" href="./teachers.php">
                <i class="fa-solid fa-list"></i> Listar
            </a>
            
            <br>

            <div class="">
                <form autocomplete="off" action="../controller/AddTeacherController.php" method="post">
                    <div class="row">

                        <div class="col-md-6">

                            <div>
                                <label for="">Nome</label>
                                <input type="text" name="nome" class="form-control">
                            </div>
                            <br>
                            <div>
                                <label for="">Especialidade</label>
                                <input type="text" name="especialidade" class="form-control">
                            </div>
                            
                        </div>
                        
                        <div class="col-md-6">

                            <div>
                                <label for="">Email acadêmico:</label>
                                <input type="text" name="email_academico" class="form-control">
                            </div>
                            <br>
                            <div>
                                <label for="">Telefone</label>
                                <input type="text" name="telefone" class="form-control">
                            </div>

                        </div>

                        <div>
                                <label for="">Usuario</label>
                                <select name="user_id" id="" class="form-select">
                                    <option value="0">Selecione o usuário</option>
                                    <?php
                                        $query = "SELECT id, nome FROM usuarios ";
                                        $stmt = $pdo->query($query);
                                        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        foreach($registros as $option):
                                    ?>
                                            <option value="<?php echo $option['id']?>">
                                                <?php echo "#".$option['id']." ".$option['nome']?>
                                            </option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary">Salvar</button>
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