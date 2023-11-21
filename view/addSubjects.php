<?php
session_start();

require_once('../config/config.php');
try {
    $query = "SELECT id, nome FROM cursos WHERE status = 1";
    $stmt = $pdo->query($query);

} catch (PDOException $e) {
    echo "Erro: " . $e->getMessage();
}


?>


<!DOCTYPE html>
<html lang="pt-br">

<?php require('./header-in.php'); ?>

<body id="body-pd">

   
    <?php require_once "./navBar.php" ?>
    
    <div class="height-100 main_components" >
        <div class="container">
            
            <div style="display: flex; justify-content: space-between;">
                <h2 class="text-left">Disciplinas</h2>
            </div>
            <a class="btn btn-success btn-sm float-end" href="./subjects.php">
                <i class="fa-solid fa-list"></i> Listar
            </a>
            
            <br>

            <div class="">
                <form autocomplete="off" action="../controller/AddSubjectsController.php" method="post">
                    <div class="row">

                        <div class="col-md-6">

                            <div>
                                <label for="">Disciplina</label>
                                <input type="text" name="nome" class="form-control">
                            </div>
                            <br>
                            <div>
                                <label for="">Curso</label>
                                <select type="text" name="curso_id" class="form-select" require>
                                    <option value="" >Selecione um curso</option>
                                    <?php
                                        $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                        foreach($registros as $option){
                                    ?>
                                        <option value="<?php echo $option['id']?>">
                                            <?php echo "#".$option['id']." ".$option['nome']?>
                                        </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <br>
                           
                            
                        </div>
                        
                        <div class="col-md-6">

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