<?php
ini_set("session_save_path", "/home/unn_w18004367/sessionData");
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Choose event</title>
</head>
<body>
<?php
try {
    require_once("functions.php");
    $dbConn = getConnection();

        if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']) {
            echo "<a href = 'logout.php'> Logout</a>";

            $sqlQuery = "SELECT NE_events.eventID,NE_events.eventTitle, NE_venue.venueName, NE_category.catDesc
		FROM NE_events
        INNER JOIN NE_venue
        ON NE_events.venueID=NE_venue.venueID
        INNER JOIN NE_category
        ON NE_events.catID=NE_category.catID
        ORDER BY eventTitle ASC";

            $queryResult = $dbConn->query($sqlQuery);

            while ($rowObj = $queryResult->fetchObject()) {
                echo "<div class='event'>\n
				   <span class='ID'><a href='editEvent.php?eventID={$rowObj->eventID}'>{$rowObj->eventTitle}</a></span>\n
				   <span class='venueName'>{$rowObj->venueName}</span>\n
				   <span class='description'>{$rowObj->catDesc}</span>\n
			  </div>
\n";

        }
        } else {
            echo "<p> You need to be <a href='loginForm.php'>logged  in to access this page.</a> </p>";
        }

} catch (Exception $e) {
    echo "<p>Query failed: " . $e->getMessage() . "</p>\n";
}


?>
</body>
</html>
