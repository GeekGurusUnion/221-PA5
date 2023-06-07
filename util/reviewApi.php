<?php
require_once("config.php");
function makeerror($msg)
{
    echo json_encode($msg);
    die();
}
header("Content-Type: application/json");
$data = file_get_contents("php://input");
$decoded = json_decode($data);
$result = mysqli_query($connection, $decoded);
$return = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode($return);
?>