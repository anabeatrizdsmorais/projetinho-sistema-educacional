

<?php
session_start();

require_once('../config/config.php');
try {

    $id = $_GET['id'];

    $query = "SELECT * FROM usuarios WHERE id = '$id'";
    $stmt = $pdo->query($query);

    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $nome = $row['nome'];
    $login = $row['login'];
    $nivel = $row['nivel'];

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
            <a class="btn btn-success btn-sm float-end" href="./users.php">
                <i class="fa-solid fa-list"></i> Listar
            </a>
            
            <br>

            <div class="">
                <form autocomplete="off" action="../controller/EditUserController.php?id=<?php echo $id; ?>" method="post" id="form_user">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" name="nome" class="form-control" value="<?php echo $nome ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Login</label>
                                <input type="text" name="login" class="form-control" placeholder="CPF ou Email" value="<?php echo $login ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Senha</label>
                                <input type="text" name="senha" id="senha" class="form-control">
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nivel</label>
                                <select name="nivel" id="nivel" class="form-select">
                                    <option value="">Selecione o nivel deste usuario</option>
                                    <option value="0" <?php echo ($nivel == 0 ? 'selected' : ''); ?>> 0- Super </option>
                                    <option value="1" <?php echo ($nivel == 1 ? 'selected' : ''); ?>> 1- Administrativo </option>
                                    <option value="2" <?php echo ($nivel == 2 ? 'selected' : ''); ?>> 2- Professor </option>
                                    <option value="3" <?php echo ($nivel == 3 ? 'selected' : ''); ?>> 3- Aluno </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Confirmar senha</label>
                                <input type="text" name="confirmar_senha" id="confirmar_senha" class="form-control">
                                <small 
                                    hidden 
                                    class="info-confirmar-senha text-danger"
                                >
                                    Os caracteres no campo senha estão diferentes do campo confirmar senha.
                                </small>
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