<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
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
      <input type="text" id="nome" name="nome" required>
    </div>
    <div>
      <label for="login">Login:</label>
      <input type="text" id="login" name="login" required>
    </div>
    <div>
      <label for="senha">Senha:</label>
      <input type="password" id="senha" name="senha" required>
    </div>
    <div>
      <label for="confirmar_senha">Confirmação de Senha:</label>
      <input type="password" id="confirmar_senha" name="confirmar_senha" required>
    </div>
    <div>
      <label for="idade">Idade:</label>
      <input type="number" id="idade" name="idade" required>
    </div>
    <div>
      <input type="submit" value="Cadastrar">
    </div>
  </form>
</body>
</html>

