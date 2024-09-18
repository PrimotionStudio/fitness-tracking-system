<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $workout = $_POST["workout"];
    $steps = $_POST["steps"];
    $distance = $_POST["distance"];
    $duration = $_POST["duration"];
    $heartrate = $_POST["heartrate"];

    $insert_activity_metrics = "INSERT INTO activity_metrics (user_id, workout, steps, calories_burned, distance, duration, heartrate) VALUES ('$user_id', '$workout', $steps, $calories, $distance, $heartrate)";
    $query->bind_param("iiidi", $userId, $steps, $calories, $distance, $heartRate);
    exit;
}
