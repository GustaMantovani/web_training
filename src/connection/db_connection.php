<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

function connection(){   
    $conexao = mysqli_connect($host, $usuario, $senha, $bancoDados);
    // Verifica se houve erro na conexão
    if (!$conexao) {
        die("Erro de conexão: " . mysqli_connect_error());
    }
    return $conexao;
}