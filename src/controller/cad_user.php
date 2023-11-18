<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once '../connection/db_connection.php';
require_once '../model/userDBA.php';
require_once '../utils/functions.php';

$connection = connection();

//Receber os dados do formulário de cadastro

$msg = []; //Variável que armazena as strings de mensagem de resposta


if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica se o formulário foi submetido
    $nome = mysqli_real_escape_string($connection, htmlspecialchars(trim($_POST["txt_nome"]), ENT_QUOTES, 'UTF-8'));
    $login = mysqli_real_escape_string($connection, htmlspecialchars(trim($_POST["txt_login"]), ENT_QUOTES, 'UTF-8'));
    $senha1 = mysqli_real_escape_string($connection, htmlspecialchars(trim($_POST["txt_senha1"]), ENT_QUOTES, 'UTF-8'));
    $senha2 = mysqli_real_escape_string($connection, htmlspecialchars(trim($_POST["txt_senha2"]), ENT_QUOTES, 'UTF-8'));
    
    $msg = validarCamposFormCadUsr($connection,$nome,$login,$senha1,$senha2);
    echo "teste muito foda";
    foreach ($msg as $error){
        echo $error;
    }

    if(empty($msg)){
        
        cadastrarUsuario($connection,$nome,$login,$senha1,$senha2);
        mysqli_close($connection);
        echo "Cadastrou";
    }else{
        //header("Location: ../vision/cad_form.php?msg=$msg");
    }
} else {
    header("Location: ../vision/cad_form.php");
}