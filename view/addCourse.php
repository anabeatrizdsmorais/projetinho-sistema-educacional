

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
                <h2 class="text-left">Cursos > Adicionar</h2>
            </div>
            <a class="btn btn-success btn-sm float-end" href="./courses.php">
                <i class="fa-solid fa-list"></i> Listar
            </a>
            
            <br>
            <hr>

            <div class="">
                <form autocomplete="off" action="../controller/AddCourseController.php" method="post">
                    <div class="row">

                        <div class="col-md-6">

                            <div>
                                <label for="">Nome</label>
                                <input type="text" name="nome" class="form-control">
                            </div>
                            <br>
                            <div>
                                <label for="">Carga horaria</label>
                                <input type="text" name="carga_horaria" class="form-control">
                            </div>
                            <div>
                                <label for="">Descrição</label>
                                <textarea type="text" name="descricao" class="form-control"></textarea>
                            </div>



                        </div>
                        
                        <div class="col-md-6">

                            <div>
                                <label for="">Origem</label>
                                <select name="origem" class="form-select">
                                    <option value="">Selecione a origem</option>
                                    <option value="Exatas" > Exatas </option>
                                    <option value="Humanas" > Humanas </option>
                                    <option value="Biologicas" > Biologicas </option>
                                </select>
                            </div>
                            <br>
                            <div>
                                <label for="">Status</label>
                                <select type="text" name="status" class="form-select">
                                    <option value="0">Selecione um status</option>
                                    <option value="1">1- ATIVADO</option>
                                    <option value="2">2- DESATIVADO</option>
                                    <option value="3">3- CANCELADO</option>
                                </select>
                            </div>

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