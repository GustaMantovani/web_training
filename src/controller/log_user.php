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
   
   if(empty($msg)){
       $login = hash('sha256', $login);
       $resultLoginQuery = pesqUserPorLogin($connection,$login);
       if(mysqli_num_rows($resultLoginQuery)==1){
           $userData = mysqli_fetch_assoc($resultLoginQuery);
           if(password_verify($senha,$userData['senha'])){
               session_start();
               $_SESSION['id_sessao'] = $userData['iduser'];
               $_SESSION['nome_sessao'] = $userData['name'];
               
               header("Location: ../vision/panel.php");
           }else{
                echo "Login ou senha inválidos";
           }
       }else{
           echo "Login ou senha inválidos";
       }
       mysqli_free_result($resultLoginQuery);
   }else{
       echo $msg;
   }
   mysqli_close($connection);
} else {
    header("Location: ../vision/login.php");
}