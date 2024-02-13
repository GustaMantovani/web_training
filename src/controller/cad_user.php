<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    
    require_once '../connection/db_connection.php';
    require_once '../model/userDBA.php';
    require_once '../utils/functions.php';

    $connection = connection();
    $msg = ""; 
    
    $nome = mysqli_real_escape_string($connection, htmlspecialchars(trim($_POST["txt_nome"]), ENT_QUOTES, 'UTF-8'));
    $login = mysqli_real_escape_string($connection, htmlspecialchars(trim($_POST["txt_login"]), ENT_QUOTES, 'UTF-8'));
    $senha1 = mysqli_real_escape_string($connection, htmlspecialchars(trim($_POST["txt_senha1"]), ENT_QUOTES, 'UTF-8'));
    $senha2 = mysqli_real_escape_string($connection, htmlspecialchars(trim($_POST["txt_senha2"]), ENT_QUOTES, 'UTF-8'));
    
    $msg .= validarCamposFormCadUsr($connection,$nome,$login,$senha1,$senha2);

    if(empty($msg)){
        cadastrarUsuario($connection,$nome,$login,$senha1,$senha2);
        echo "Cadastrou";
    }else{
        header("Location: ../vision/cad_form.php?msg=$msg");
    }
    mysqli_close($connection);
} else {
    header("Location: ../vision/cad_form.php");
}
