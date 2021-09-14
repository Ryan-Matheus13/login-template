<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cadastro.css">
    <title>Cadastro</title>
</head>
<body>
    <div class="img">
        <img src="../logoNova.png" alt="">
    </div>
    <form class="container">
        <h1>Create Account</h1>
        <span class="subhead">Already have an account? <a href="../index.php">Sing In</a> </span>
        <input type="email" class="email" name="email" placeholder="Email" >
        <input type="password" class="senha" name="senha" placeholder="Senha">
        <input type="password" class="confirma-senha" name="confirma-senha" placeholder="Confirma a senha">
        <input type="text" class="nickname" name="nickname" placeholder="Nickname">
        <div class="resultado"></div>
        <button id="enviar" type="submit"><span>Sing Up</span></button>
        <div class="content-terms">
            <input class="terms" name="terms" type="checkbox" ><span>I have a read and agree to the <a href="#">Terms of Services</a></span>
        </div>
    </form>
    <script src="../scripts/jquery.js"></script>
    <script src="../scripts/ajaxCadastro.js"></script>
</body>
</html>