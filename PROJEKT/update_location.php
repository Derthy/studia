<?php
 
$response = array();

$data = json_decode(file_get_contents('php://input'),true); 

if ($data){
    if ($data['longitude'] & $data['latitude'] & $data['mpk_nr'] & $data['line']) {
        $longitude = $data['longitude'];
        $latitude = $data['latitude'];
        $mpk_nr = $data['mpk_nr'];
        $line = $data['line'];

        require_once __DIR__ . '/db_connect.php';
    
        $db = new DB_CONNECT();
    
        mysql_query("UPDATE sample set longitude='$longitude',latitude='$latitude' where mpk_nr=$mpk_nr and line=$line");

        if (mysql_affected_rows() > 0) {
            $response["success"] = 1;
            $response["message"] = "Location successfully updated.";
            mysql_query("COMMIT"); 

            echo json_encode($response);
        } else {
            $response["success"] = 0;
            $response["message"] = "0 rows updated";

            echo json_encode($response);
        }
    } else {
        $response["success"] = 0;                                                   
        $response["message"] = "Not all parameters provided";                                     
                                                                                        
        echo json_encode($response); 
    }
} else {
    $response["success"] = 0;
    $response["message"] = "no json found";
 
    echo json_encode($response);
}
?>
