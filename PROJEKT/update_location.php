<?php
require_once __DIR__ . '/db_connect.php';

$response = array();

$db = new DB_CONNECT();
if (!$db){
    $response["success"] = 0;
    $response["message"] = "couldn't connect to db";
 
    echo json_encode($response);
}


if ( isset($_POST['xval']) && isset($_POST['yval'])) {
    $xval = $_POST['xval'];
    $yval = $_POST['yval'];
 
    $result = mysql_query("update sample set XVAL='$xval',YVAL='$yval'");

    if ($result) {
        $response["success"] = 1;
        $response["message"] = "Location successfully updated.";
 
        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "Oops! An error occurred.";
 
        echo json_encode($response);
    }
}
else {

$result = mysql_query("SELECT * FROM sample WHERE PKEY = 1");

    if (mysql_num_rows($result) > 0) {

        $result = mysql_fetch_array($result);

        $location = array();
        $location["xval"] = $result["XVAL"];
        $location["yval"] = $result["YVAL"];
        $location["last_updated"] = $result["LAST_UPDATED"];

        $response["success"] = 1;
        $response["location"] = array();

        array_push($response["location"], $location);

        echo json_encode($response);
    } else {
        $response["success"] = 0;
        $response["message"] = "No records found";

        echo json_encode($response);
    } 
}


?>
