<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Formulário de Cadastro</title>
</head>
<body>
  <h2>Login</h2>
  <form action="../controller/log_user.php" method="POST">
    <div>
      <label for="login">Login:</label>
      <input type="text" id="login" name="txt_login" required>
    </div>
    <div>
      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="txt_senha" required>
    </div>
    <div>
      <input type="submit" value="Cadastrar">
    </div>
      <?php 
        if(isset($_GET['msg'])){
            $msg = $_GET['msg'];
            echo $msg;
        }
      ?>
  </form>
</body>
</html>

