<?php
require_once("config.php");
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $decoded = file_get_contents("php://input");
    $data = json_decode($decoded);
    error_log('Received data: ' . print_r($data, true)); // Log the received data
    if (isset($data['type']) && isset($data['connoisseur']) && isset($data['ratedWine']) && isset($data['rating']) && isset($data['user_id'])) {
        if ($data->connoisseur == "true"){
            $reviewType ='Critic'
        }
        else{
            $reviewType = 'General';
        }
        $ratedWine = $data->ratedWine;
        $rating = $data->rating;
        $userId = $data->user_id;
        $sql = "INSERT INTO Review (User_id, Wine_id, Rating, Review_type) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('ssss', $userId, $ratedWine, $rating, $reviewType);
        if ($stmt->execute()) {
            echo "New row inserted successfully.";
        } else {
            echo "Error inserting row.";
        }
    } else {
        echo "Invalid data.";
    }
} 
else {
    error_log('Received data: ' . print_r($data, true)); // Log the received data
    echo "Invalid request.";
}
?>

