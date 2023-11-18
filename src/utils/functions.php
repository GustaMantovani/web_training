<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function verificarNome($nome){
    $msg = [];
    
    if (empty($nome)){
        array_push($msg,"Nome vazio");
    }
    
    else if(!preg_match('~^[ [:alpha:] ]+$~u', $nome)){
        array_push($msg,"Nome inválido");
    } 
    return $msg;
}

function verificarLogin($login){
    require_once '../model/userDBA.php';
    $msg = [];
    
    if (empty($login)){
        array_push($msg,"Login vazio");
    }
    
    else if (!verificaLoginBanco($login)){
        array_push($msg,"Esse login já existe");
    }
}

function verificarSenha(){
    
}

function verificarIdade(){
    
}