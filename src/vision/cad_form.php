<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Formulário de Cadastro</title>
</head>
<body>
  <h2>Cadastro</h2>
  <form action="../controller/cad_user.php" method="POST">
    <div>
      <label for="nome">Nome:</label>
      <input type="text" id="nome" name="txt_nome" required>
    </div>
    <div>
      <label for="login">Login:</label>
      <input type="text" id="login" name="txt_login" required>
    </div>
    <div>
      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="txt_senha1" required>
    </div>
    <div>
      <label for="confirmar_senha">Confirmação de Senha:</label>
      <input type="password" id="confirmar_senha" name="txt_senha2" required>
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

