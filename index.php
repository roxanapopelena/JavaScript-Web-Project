<?php
ini_set("session_save_path", "/home/unn_w18004367/sessionData");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
</head>
<body>
<?php
try {
    require_once("functions.php");
    $dbConn = getConnection();

    if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']) {
        echo "<a href = 'logout.php'> Logout</a>";
        } else {
        echo "<a href = 'loginForm.php'>Login</a>";
        }

} catch (Exception $e) {
    echo "<p>Query failed: " . $e->getMessage() . "</p>\n";
}
?>
<br><br>
<div class="otherWebpages">
    <span class="chooseEvent"> Click here <a href="chooseEvent.php"> to choose an event to edit.</a></span><br>
    <span class="bookEvent"> Click here <a href="bookEventsForm.php"> to book an event.</a></span><br>
    <span class="credits"> Click here <a href="credits.html"> for credits.</a></span><br>
</div>
<br><br>
<aside id="offers">
</aside>
<br><br>
<aside id="XMLoffers">
</aside>
<script type="text/javascript" src="myScript.js"></script>
</body>
</html>