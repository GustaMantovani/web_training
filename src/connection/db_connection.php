<?php

function connection(){   
    $conexao = mysqli_connect('172.18.0.3:3306', 'root', 'rpsswd', 'mydb');
    // Verifica se houve erro na conexão
    if (!$conexao) {
        die("Erro de conexão: " . mysqli_connect_error());
    }
    return $conexao;
}