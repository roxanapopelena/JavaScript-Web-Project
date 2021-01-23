<?php
ini_set("session_save_path", "/home/unn_w18004367/sessionData");
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login process script</title>
</head>
<body>
<?php
$username = filter_has_var(INPUT_POST, 'username') ? $_POST['username']: null;
$username = trim($username);
$password = filter_has_var(INPUT_POST, 'password') ? $_POST['password']: null;
$password = trim($password);

if (empty($username) || empty ($password)) {
    echo "<p>You need to provide a username and a password. 
          Please try <a href='loginForm.php'> again</a>.</p>\n";
    }
else {
    try{
        unset($_SESSION['username']);
        unset($_SESSION['logged-in']);

        require_once("functions.php");
        $dbConn = getConnection();

        $querySQL = "SELECT passwordHash FROM NE_users WHERE username = :username";
        $stmt = $dbConn->prepare($querySQL);
        $stmt->execute(array(':username'=>$username));
        $user = $stmt->fetchObject();

        if($user) {
            if(password_verify($password, $user->passwordHash)){
                echo "<p>Logon success!</p>\n";
                header('Location:http://unn-w18004367.newnumyspace.co.uk/index.php');

                $_SESSION['logged-in'] = true;
                $_SESSION['username'] = $username;
            } else{
                echo "<p>The username or password were incorrect. 
                      Please try <a href='loginForm.php'> again</a></p>\n";
            }
        }else{
            echo "<p>The username or password were incorrect. 
                  Please try <a href='loginForm.php'> again</a></p>\n";
        }
    } catch (Exception $e) {
        echo "Record not found: " . $e->getMessage();
    }
}
?>
</body>
</html>
