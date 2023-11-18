<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function validarNome($nome){
    $msg = [];
    
    if (empty($nome)){
        array_push($msg,"Nome vazio");
    }
    
    else if(!preg_match('~^[ [:alpha:] ]+$~u', $nome)){
        array_push($msg,"Nome inválido");
    } 
    return $msg;
}

function validarLogin($connection,$login){
    require_once '../model/userDBA.php';
    $msg = [];
    
    if (empty($login)){
        array_push($msg,"Login vazio");
    }
    
    else if (!verificaLoginBanco($connection,$login)){
        array_push($msg,"Esse login já existe");
    }
}

function validarSenha($senha, $confirmacaoSenha) {
    $mensagensErro = [];

    // Verifica se a senha tem pelo menos 8 caracteres
    if (strlen($senha) < 6) {
        array_push($mensagensErro, "A senha deve ter pelo menos 6 caracteres");
    } else {
        // Verifica se a senha contém pelo menos uma letra maiúscula
        if (!preg_match('/[A-Z]/', $senha)) {
            array_push($mensagensErro, "A senha deve conter pelo menos uma letra maiúscula");
        }

        // Verifica se a senha contém pelo menos uma letra minúscula
        if (!preg_match('/[a-z]/', $senha)) {
            array_push($mensagensErro, "A senha deve conter pelo menos uma letra minúscula");
        }

        // Verifica se a senha contém pelo menos um número
        if (!preg_match('/[0-9]/', $senha)) {
            array_push($mensagensErro, "A senha deve conter pelo menos um número");
        }
    }

    // Verifica se as senhas são iguais
    if ($senha !== $confirmacaoSenha) {
        array_push($mensagensErro, "As senhas não coincidem");
    }

    // Retorna o array de mensagens de erro
    return $mensagensErro;
}

function validarCamposFormCadUsr($connection,$nome, $login, $senha, $confirmacaoSenha) {
    $mensagensErro = [];

    // Validação do nome
    $validacaoNome = validarNome($nome);
    if (!empty($validacaoNome)) {
        $mensagensErro = array_merge($mensagensErro, $validacaoNome);
    }

    // Validação do login
    $validacaoLogin = validarLogin($connection,$login);
    if (!empty($validacaoLogin)) {
        $mensagensErro = array_merge($mensagensErro, $validacaoLogin);
    }

    // Validação da senha
    $validacaoSenha = validarSenha($senha, $confirmacaoSenha);
    if (!empty($validacaoSenha)) {
        $mensagensErro = array_merge($mensagensErro, $validacaoSenha);
    }

    // Retorna o array de mensagens de erro
    return $mensagensErro;
}
