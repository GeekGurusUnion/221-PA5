<?php
require_once("config.php");
$decoded = file_get_contents("php://input");
$data = json_decode($decoded);
if (!empty($data)) {
    if (isset($data->user_id) && isset($data->wine_id) && isset($data->rating) && isset($data->review_type)) {
        $userId = $data->user_id;
        $wineId = $data->wine_id;
        $rating = $data->rating;
        $reviewType = $data->review_type;

        $sql = "INSERT INTO Review (User_id, Wine_id, Rating, Review_type) VALUES (?, ?, ?, ?)";
        $stmt = $connection->prepare($sql);
        $stmt->bind_param('ssss', $userId, $wineId, $rating, $reviewType);

        if ($stmt->execute()) {
            echo "Review inserted successfully.";
        } 
        else {
            echo "Error inserting review.";
        }
    } 
    else {
        echo "Invalid data.";
    }
} 
else {
    echo "Invalid request.";
}
?>
