<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function verificaLoginBanco($connection,$login){
    $query = "SELECT * FROM user WHERE login = '$login'";
    
    $registro = mysqli_query($connection, $query) or die(mysqli_errno($connection));
    if(isset($registro)){
        mysqli_free_result($registro);
        return true;
    }else{
        return false;
    }
}

function cadastrarUsuario($connection,$nome,$login,$senha,$idade){
    $dataHoraAtual = date("Y-m-d H:i:s");
    $idTimeStampSeed = (string) time();
    
    $id = hash('sha256', $idTimeStampSeed);
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (iduser,insertdate,name,login,senha) VALUES ('$id','$dataHoraAtual','$nome','$login','$senha')";
    
    mysqli_query($connection,$query) or die (mysqli_error($connection));
}
