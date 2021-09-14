<?php

/*
oque eu tenho que fazer aqui:
conectar com o banco de dados: ok
coletar dados dos inputs: ok
requisicao slq para selecionar no banco de dados os usuarios cujo os dados sejam corretos:
tratar erros:
*/
$connect = include("conexao.php");

if( !isset($_POST) || empty($_POST)) {
    echo "";
} else {
    json_encode($_POST);
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);

    $sqlEmail = "SELECT email, senha FROM user WHERE email = '{$email}'";
    $queryEmail = $connect->query($sqlEmail);
    $resultadoEmail = mysqli_fetch_assoc($queryEmail);
    $totalEmail = mysqli_num_rows($queryEmail);

    $sqlSenha = "SELECT email, senha FROM user WHERE email = '{$email}' and senha = '{$senha}'";
    $querySenha = $connect->query($sqlSenha);
    $resultadoSenha = mysqli_fetch_assoc($querySenha);
    $totalSenha = mysqli_num_rows($querySenha);

    if($totalEmail == 0 || $totalSenha == 0) {
        if($totalEmail == 0) {
            echo "Email não encontrado!";
        }
        else if($totalSenha == 0) {
            echo "Senha incorreta!";
        }
    } else {
        echo "liberado";
    }
}