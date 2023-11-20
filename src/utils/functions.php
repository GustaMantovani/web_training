<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function validarNome($nome){
    $msg = "";
    
    if (empty($nome)){
        $msg .= "Nome vazio<br>";
    }
    
    else if(!preg_match('~^[ [:alpha:] ]+$~u', $nome)){
        $msg .= "Nome inválido<br>";
    } 
    return $msg;
}

function validarLogin($login){
    $msg = "";
    
    if (empty($login)){
        $msg .= "Login vazio<br>";
    } 

    return $msg;
}

function validarSenha($senha, $confirmacaoSenha) {
    $mensagensErro = "";

    // Verifica se a senha tem pelo menos 8 caracteres
    if (strlen($senha) < 6) {
        $mensagensErro .= "A senha deve ter pelo menos 6 caracteres<br>";
    } else {
        // Verifica se a senha contém pelo menos uma letra maiúscula
        if (!preg_match('/[A-Z]/', $senha)) {
            $mensagensErro .= "A senha deve conter pelo menos uma letra maiúscula<br>";
        }

        // Verifica se a senha contém pelo menos uma letra minúscula
        if (!preg_match('/[a-z]/', $senha)) {
            $mensagensErro .= "A senha deve conter pelo menos uma letra minúscula<br>";
        }

        // Verifica se a senha contém pelo menos um número
        if (!preg_match('/[0-9]/', $senha)) {
            $mensagensErro .= "A senha deve conter pelo menos um número<br>";
        }
    }

    // Verifica se as senhas são iguais
    if ($senha !== $confirmacaoSenha) {
        $mensagensErro .= "As senhas não coincidem<br>";
    }

    // Retorna a string de mensagens de erro
    return $mensagensErro;
}

function validarCamposFormCadUsr($connection, $nome, $login, $senha, $confirmacaoSenha) {
    $mensagensErro = "";

    // Validação do nome
    $validacaoNome = validarNome($nome);
    if (!empty($validacaoNome)) {
        $mensagensErro .= $validacaoNome;
    }

    // Validação do login
    $validacaoLogin = validarLogin($login);
    if (!empty($validacaoLogin)) {
        $login = hash('sha256', $login);
        if (verificaLoginBanco($connection, $login)){
            $mensagensErro .= "Esse login já existe<br>";
        }
        $mensagensErro .= $validacaoLogin;
    }

    // Validação da senha
    $validacaoSenha = validarSenha($senha, $confirmacaoSenha);
    if (!empty($validacaoSenha)) {
        $mensagensErro .= $validacaoSenha;
    }

    // Retorna a string de mensagens de erro
    return $mensagensErro;
}

function validarCamposFormLoginUsr($login, $senha) {
    $mensagensErro = "";

    // Validação do login
    $validacaoLogin = validarLogin($login);
    if (!empty($validacaoLogin)) {
        $mensagensErro .= $validacaoLogin;
    }

    // Validação da senha
    $validacaoSenha = validarSenha($senha, $senha);
    if (!empty($validacaoSenha)) {
        $mensagensErro .= $validacaoSenha;
        
    }

    // Retorna a string de mensagens de erro
    return $mensagensErro;
}



