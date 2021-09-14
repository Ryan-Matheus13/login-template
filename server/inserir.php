<?php
$connect = include("conexao.php");

if( !isset($_POST) || empty($_POST)) {
    echo "";
} else {
    json_encode($_POST);
    $email = $_POST["email"];
    $senha = md5($_POST["senha"]);
    $nickname = $_POST["nickname"];

    $sqlEmail = "SELECT email, senha FROM user WHERE email = '{$email}'";
    $queryEmail = $connect->query($sqlEmail);
    $resultadoEmail = mysqli_fetch_assoc($queryEmail);
    $totalEmail = mysqli_num_rows($queryEmail);

    $sqlNickname = "SELECT email, senha FROM user WHERE nickname = '{$nickname}'";
    $queryNickname = $connect->query($sqlNickname);
    $resultadoNickname = mysqli_fetch_assoc($queryNickname);
    $totalNickname = mysqli_num_rows($queryNickname);

    if($totalEmail > 0 || $totalNickname > 0) {
        if($totalNickname > 0 && $totalEmail == 0) {
            echo "Nickname já cadastrado!";
        }
        else if($totalEmail > 0 && $totalNickname == 0) {
            echo "Email já cadastrado!";
        }
        else {
            echo "Email e nickname já cadastrados!";
        }
    } else {
        $sql = "INSERT INTO user (nickname, email, senha) VALUES (?,?,?)";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("sss", $nickname, $email, $senha);
        $stmt->execute();
    
        echo "liberado";
    }
    
}