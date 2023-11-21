<?php
session_start();

require_once('../config/config.php');

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
            <a class="btn btn-success btn-sm float-end" href="./notes.php">
                <i class="fa-solid fa-list"></i> Listar
            </a>
            
            <br>

            <div class="">
                <form autocomplete="off" action="../controller/AddNotesController.php" method="post">
                    <div class="row">

                        <div class="col-md-6">

                            <div>
                                <label for="">Aluno</label>
                                <select name="aluno_id" id="" class="form-select">
                                    <option value="0">Selecione um aluno</option>
                                    <?php
                                        $query = "SELECT id, nome FROM alunos WHERE inativo = 0 ";
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
                            <br>
                            <div>
                                <label for="">Disciplina</label>
                                <select name="disciplina_id" id="" class="form-select">
                                    <option value="0">Selecione uma disciplina</option>
                                    <?php
                                            $query = "SELECT id, nome FROM disciplinas ";
                                            $stmt = $pdo->query($query);
                                            $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach($registros as $option):
                                        ?>
                                            <option value="<?php echo $option['id']?>">
                                                <?php echo $option['nome']?>
                                            </option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                            <br>
                            <div>
                                <label for="">Professor</label>
                                <select name="professor_id" id="" class="form-select">
                                    <option value="0">Selecione um professor</option>

                                    <?php
                                            $query = "SELECT id, nome FROM professores ";
                                            $stmt = $pdo->query($query);
                                            $registros = $stmt->fetchAll(PDO::FETCH_ASSOC);

                                            foreach($registros as $option):
                                        ?>
                                            <option value="<?php echo $option['id']?>">
                                                <?php echo $option['nome']?>
                                            </option>
                                    <?php
                                        endforeach;
                                    ?>
                                </select>
                            </div>
                            
                        </div>
                        
                        <div class="col-md-6">

                            <div>
                                <label for="">Nota</label>
                                <input type="text" name="nota" class="form-control">
                            </div>
                            <br>
                            <div>
                                <label for="">Situação</label>
                                <input type="text" name="situacao" class="form-control" placeholder="Em andamento, aprovado ou reprovado"/>
                            </div>
                            <br>
                            <div>
                                <label for="">Semestre</label>
                                <input type="text" name="semestre" class="form-control" placeholder="Ex.: 2/2023"/>
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