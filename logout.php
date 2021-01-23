<?php
ini_set("session_save_path", "/home/unn_w18004367/sessionData");
session_start();

if(session_destroy()) {
    header('Location:http://unn-w18004367.newnumyspace.co.uk/index.php');
}
?>