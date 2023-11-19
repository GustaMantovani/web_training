<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    require_once '../connection/db_connection.php';
    require_once '../model/userDBA.php';
    require_once '../utils/functions.php';

    $connection = connection();

    $msg = ""; 

    $login = mysqli_real_escape_string($connection, htmlspecialchars(trim($_POST["txt_login"]), ENT_QUOTES, 'UTF-8'));
    $senha = mysqli_real_escape_string($connection, htmlspecialchars(trim($_POST["txt_senha"]), ENT_QUOTES, 'UTF-8'));
    
    $msg .= validarCamposFormLoginUsr($login,$senha);
    //$msg .= validarUsuario($connection,$login,$senha);

   echo $msg;
} else {
    header("Location: ../vision/login.php");
}