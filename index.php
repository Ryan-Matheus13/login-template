<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>
<body>
    <div class="img">
        <img src="logoNova.png" alt="">
    </div>
    <form class="container">
        <h1>Sing in Account</h1>
        <span class="subhead">Already not have an account? <a href="cadastro/cadastro.php">Sing Up</a> </span>
        <input type="email" class="email" name="email" placeholder="Email">
        <input type="password" class="senha" name="senha" placeholder="Password" >
        <div class="resultado"></div>
        <button id="enviar" type="submit"><span>Sing In</span></button>
    </form>
    <script src="scripts/jquery.js"></script>
    <script src="scripts/ajaxLogin.js"></script>
</body>
</html>