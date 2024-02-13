<?php

function verificaLoginBanco($connection,$login){
    $query = "SELECT login FROM user WHERE login = '$login'";
    
    $registro = mysqli_query($connection, $query) or die(mysqli_errno($connection));
    if(mysqli_num_rows($registro)>0){
        mysqli_free_result($registro);
        return true;
    }else{
        mysqli_free_result($registro);
        return false;
    }
}

function cadastrarUsuario($connection,$nome,$login,$senha){
    $dataHoraAtual = date("Y-m-d H:i:s");
    $idTimeStampSeed = (string) time();
    
    $id = hash('sha256', $idTimeStampSeed);
    $login = hash('sha256', $login);
    $senha = password_hash($senha, PASSWORD_DEFAULT);

    $query = "INSERT INTO user (iduser,insertdate,name,login,senha) VALUES ('$id','$dataHoraAtual','$nome','$login','$senha')";
    
    mysqli_query($connection,$query) or die (mysqli_error($connection));
}

function pesqUserPorLogin($connection,$login){
    $query = "SELECT iduser,name,login,senha FROM user WHERE login = '$login'";
    $result = mysqli_query($connection, $query) or die(mysqli_errno($connection));
    return $result;
}

function getNames($connection,$n){
    $query = "SELECT name FROM user LIMIT $n";
    $result = mysqli_query($connection, $query);
    return $result; 
}
