<?php
 
$response = array();
 
require_once __DIR__ . '/db_connect.php';
 
$db = new DB_CONNECT();
 
if (isset($_GET["line"])) {
    $line = $_GET['line'];
 
    $result = mysql_query("SELECT * FROM sample WHERE line = $line");
 
    if (!empty($result)) {
        if (mysql_num_rows($result) > 0) {
 
            $response["bus"] = array();
            $response["success"] = 1;

            while($row = mysql_fetch_assoc($result)) {
                $bus["latitude"] = $row["latitude"];
                $bus["longtitude"] = $row["longtitude"];
                $bus["line"] = $row["line"];
                $bus["mpk_nr"] = $row["mpk_nr"];
                array_push($response["bus"], $bus);
            }

            echo json_encode($response);
        } else {
            $response["success"] = 0;
            $response["message"] = "No bus found";
 
            echo json_encode($response);
        }
    } else {
        $response["success"] = 0;
        $response["message"] = "No bus found";
 
        echo json_encode($response);
    }
} else {
    $response["success"] = 0;
    $response["message"] = "Required field(s) is missing";
 
    echo json_encode($response);
}
?>
