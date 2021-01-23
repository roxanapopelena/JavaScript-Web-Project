<?php
ini_set("session_save_path", "/home/unn_w18004367/sessionData");
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>editEventForm.php- script to display an edit form for the chosen event</title>
</head>
<body>
<?php
$eventID = filter_has_var(INPUT_GET, 'eventID') ? $_GET['eventID'] : null;


if (empty($eventID)) {
    echo "<p>Please <a href='chooseEvent.php'>choose</a> a event.</p>\n";
}
else {
    try {
        require_once("functions.php");
        $dbConn = getConnection();

        if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']) {
            echo "<a href = 'logout.php'> Logout</a>";


        $sqlQuery = "SELECT NE_events.eventID, NE_events.eventTitle, NE_venue.venueID, NE_venue.venueName, NE_category.catID ,NE_category.catDesc, NE_events.eventDescription, NE_events.eventStartDate, NE_events.eventEndDate, NE_events.eventPrice
		FROM NE_events
        INNER JOIN NE_venue
        ON NE_events.venueID=NE_venue.venueID
        INNER JOIN NE_category
        ON NE_events.catID=NE_category.catID
        WHERE eventID=$eventID";
        $queryResult = $dbConn->query($sqlQuery);
        $rowObj = $queryResult->fetchObject();

            $sqlQuery2="SELECT venueID, venueName FROM NE_venue";
            $queryResult2 = $dbConn->query($sqlQuery2);

            $sqlQuery3="SELECT catID, catDesc FROM NE_category";
            $queryResult3 = $dbConn->query($sqlQuery3);

                echo "
		<h1>Update '{$rowObj->eventTitle}'</h1>
		<form id='UpdateEvent' action='updateEvent.php' method='get'>
			<p>Event ID <input type='text' name='eventID' value='$eventID' readonly /></p>
			<p>Title <input type='text' name='eventTitle' size='50' value='{$rowObj->eventTitle}' /></p>
            <p>Venue name 
            <select name='venueID'>
            <option value='{$rowObj->venueID}'>{$rowObj->venueName}</option>";
                while ($rowObj2 = $queryResult2->fetchObject()) {
                    if ($rowObj->venueName <> $rowObj2->venueName)
                    {
                        echo "<option value ='{$rowObj2->venueID}'>{$rowObj2->venueName}</option>";
                    }
                }
            echo"</select>
            </p>
            <p>Category description
             <select name='catID'>
             <option value='{$rowObj->catID}'>{$rowObj->catDesc}</option>";
                while($rowObj3 = $queryResult3->fetchObject()) {
                    if ($rowObj->catDesc <> $rowObj3->catDesc)
                    {
                        echo "<option value='{$rowObj3->catID}'>{$rowObj3->catDesc}</option>";
                    }
                }
            echo"</select>
            </p>
            <p>Event Description
            <textarea name='eventDescription'>{$rowObj->eventDescription}</textarea></p>
            <p> Event start date <input type='date' name='eventStartDate' value='{$rowObj->eventStartDate}' /></p>
			<p>Event end date  <input type='date' name='eventEndDate' value='{$rowObj->eventEndDate}' /></p>
			<p>Event price <input type='number' step='any' name='eventPrice' value='{$rowObj->eventPrice}' /></p>
			<p><input type='submit' name='submit' value='Update Event'></p>
		</form>
		";

        } else {
            echo "<p> You need to be <a href='loginForm.php'>logged  in to access this page.</a> </p>";
        }
        
    }
    catch (Exception $e){
        echo "<p>Event details not found: ".$e->getMessage()."</p>\n";
    }
}
?>
</body>
</html>