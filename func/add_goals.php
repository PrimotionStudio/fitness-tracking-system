<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $goal_type = $_POST["goalType"];
    $target_value = $_POST["targetValue"];
    $end_date = $_POST["goalEnd"];

    // Only one goals can exist at a point
    $select_goals = "SELECT * FROM goals WHERE user_id='$user_id' && status='In Progress'";
    $query_goals = mysqli_query($con, $select_goals);
    if (mysqli_num_rows($query_goals) > 0) {
        $_SESSION["alert"] = "You already have a goal In Progress. Complete it and try again";
        header("location: goals");
        exit;
    }
    $insert_goals = "INSERT INTO goals (user_id, goal_type, target_value, end_date) VALUES ('$user_id', '$goal_type', '$target_value', '$end_date')";
    if (mysqli_query($con, $insert_goals)) {
        $_SESSION["alert"] = "Goal created successfully!";
    } else {
        $_SESSION["alert"] = "Unable to create goal";
    }

    header("location: goals");
    exit;
}
