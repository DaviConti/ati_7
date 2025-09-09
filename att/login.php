<?php

    $mysqli = new mysqli("localhost" , "root" , "login_db");
    if ($mysqli -> connect_errno){
        die("erro de conexão:" . $mysqli->connect_errno);
    }

    session_start()

?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login simples</title>
</head>
<body>
    <form action="post">
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Senha" required>
        <button type="submit">entrar</button>
    </form>

    <p><small>admin / 123</small></p>
</body>
</html>