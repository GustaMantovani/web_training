<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

require_once '../server/connection.php';
require_once '../model/userDAO.php';

$connection = connection();

//Receber os dados do formulário de cadastro

$msg = ''; //Variável que armazena as strings de mensagem de resposta


if ($_SERVER["REQUEST_METHOD"] == "POST") { // Verifica se o formulário foi submetido
    $nome = mysqli_real_escape_string($connection, htmlspecialchars(trim($_POST["txt_nome"]), ENT_QUOTES, 'UTF-8'));
    $login = mysqli_real_escape_string($connection, htmlspecialchars(trim($_POST["txt_login"]), ENT_QUOTES, 'UTF-8'));
    $senha = mysqli_real_escape_string($connection, htmlspecialchars(trim($_POST["txt_senha"]), ENT_QUOTES, 'UTF-8'));
    
    $msg = validarCamposFormCadUsr($nome,$login,$senha);
    if(empty($msg)){
        header("Location: ../vision/login.php");
    }else{
         header("Location: ../vision/cad_form.php?msg=$msg");
    }
} else {
    header("Location: ../vision/cad_form.php");
    exit();
}


//Validar os dados

//Garvar os dados