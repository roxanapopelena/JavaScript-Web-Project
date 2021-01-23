<?php
ini_set("session_save_path", "/home/unn_w18004367/sessionData");
session_start();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>eventUpdate.php - updating a event record to a database using PDO</title>
</head>
<body>

<?php
// Retrieve variables
$eventID = filter_has_var(INPUT_GET, 'eventID') ? $_GET['eventID'] : null;
$eventTitle = filter_has_var(INPUT_GET, 'eventTitle') ? $_GET['eventTitle'] : null;
$eventStartDate = filter_has_var(INPUT_GET, 'eventStartDate') ? $_GET['eventStartDate'] : null;
$eventEndDate = filter_has_var(INPUT_GET, 'eventEndDate') ? $_GET['eventEndDate'] : null;
$eventPrice = filter_has_var(INPUT_GET, 'eventPrice') ? $_GET['eventPrice'] : null;
$catID = filter_has_var(INPUT_GET, 'catID') ? $_GET['catID'] : null;
$venueID = filter_has_var(INPUT_GET, 'venueID') ? $_GET['venueID'] : null;
$eventDescription = filter_has_var(INPUT_GET, 'eventDescription') ? $_GET['eventDescription'] : null;

$eventID = trim($eventID);
$eventTitle = trim($eventTitle);
$eventStartDate = trim($eventStartDate);
$eventEndDate = trim($eventEndDate);
$eventPrice = trim($eventPrice);
$catID = trim($catID);
$venueID = trim($venueID);
$eventDescription = trim($eventDescription);

$errors = false;

if (empty($eventTitle)) {
    echo "<p>You need to have selected a title.</p>\n";
    $errors = true;
}
if (empty($venueID)) {
    echo "<p>You need to choose a venue.</p>\n";
    $errors = true;
}
if (empty($catID)) {
    echo "<p>You need to choose a description.</p>\n";
    $errors = true;
}if (empty($eventDescription)) {
    echo "<p>You need to choose a description.</p>\n";
    $errors = true;
}
if (empty($eventStartDate)) {
    echo "<p>You need to choose a starting date.</p>\n";
    $errors = true;
}
if (empty($eventEndDate)) {
    echo "<p>You need to choose an ending date.</p>\n";
    $errors = true;
}
if (empty($eventPrice)) {
    echo "<p>You need to choose a price.</p>\n";
    $errors = true;
}
if ($errors === true) {
    echo "<p>Please try <a href='chooseEvent.php'>again</a>.</p>\n";
}
else {
    try {
        require_once("functions.php");
        $dbConn = getConnection();

        if (isset($_SESSION['logged-in']) && $_SESSION['logged-in']) {
            echo "<a href = 'logout.php'> Logout</a>";

        $updateSQL = "UPDATE NE_events
        SET catID='$catID', venueID='$venueID', eventDescription='$eventDescription', eventTitle= '$eventTitle', eventStartDate='$eventStartDate', eventEndDate='$eventEndDate', eventPrice=$eventPrice
        WHERE eventID=$eventID";

        $dbConn->exec($updateSQL);
        echo "<p>Event updated. Go back to <a href='index.php'>homepage.</a></p>\n";

        } else {
            echo "<p> You need to be <a href='loginForm.html'>logged  in to access this page.</a> </p>";
        }
    } catch (Exception $e) {
        echo "<p>Event not updated: " . $e->getMessage() . "</p>\n";
    }
}
?>
</body>
</html>