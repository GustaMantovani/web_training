<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function verificaLoginBanco($login){
    require_once '../connection/db_connection.php';
    $connection = connection();
    
    $query = "SELECT * FROM user WHERE login == $login";
    
    $registro = mysqli_query($connection, $query) or die(mysqli_errno($connection));
    mysqli_close($connection);
    if(isset($registro)){
        mysqli_free_result($result);
        return true;
    }else{
        return false;
    }
}