<?php
function getConnection()
{
    try {
        $connection = new PDO("mysql:host=localhost;dbname=unn_w18004367",
            "unn_w18004367", "RoxanasiRusty99");
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connection;
    } catch (Exception $e) {
        throw new Exception("Connection error " . $e->getMessage(), 0, $e);
    }
}
?>
