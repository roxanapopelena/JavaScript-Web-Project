<?php
ini_set("session_save_path", "/home/unn_w18004367/sessionData");
session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>loginForm</title>
</head>
<body>
<form method="post" action="loginProcess.php">
    Username <input type="text" name="username">
    Password <input type="password" name="password">
    <input type="submit" value="Logon">
</form>
</body>
</html>