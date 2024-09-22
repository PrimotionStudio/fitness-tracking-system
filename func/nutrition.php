<?php
require_once "get_ai_advice.php";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $food_name = $_POST["food_name"];
    $calories = $_POST["calories"];
    $protein = $_POST["protein"];
    $carbohydrate = $_POST["carbohydrate"];
    $fats = $_POST["fats"];

    $insert_nutrition = "INSERT INTO nutrition_logs (user_id, food_name, calories, protein, carbohydrate, fats) VALUES ('$user_id', '$food_name', '$calories', '$protein', '$carbohydrate', '$fats')";
    if (mysqli_query($con, $insert_nutrition)) {
        $_SESSION["alert"] = "Nutrition log created successfully!";
    } else {
        $_SESSION["alert"] = "Unable to create nutrition log";
    }
    // echo $_SESSION['alert'] . "<br>";
    if ($_SESSION["alert"] == "Nutrition log created successfully!") {

        $last_nutrition_id = mysqli_insert_id($con);
        // echo "Last Nutrition Id: " . $last_nutrition_id . "<br>";


        $select_nutrition_logs = "SELECT * FROM nutrition_logs WHERE user_id='$user_id'";
        $query_nutrition_logs = mysqli_query($con, $select_nutrition_logs);
        $total_nutrition_logs_serialized = '';
        while ($get_nutrition_logs = mysqli_fetch_assoc($query_nutrition_logs)) {
            $total_nutrition_logs_serialized .= serialize($get_nutrition_logs) . '\n';
        }
        // echo "Total Nutrition Logs Serialized: " .
        //     $total_nutrition_logs_serialized . "<br>";

        $select_nutrition_log = "SELECT * FROM nutrition_logs WHERE id='$last_nutrition_id' && user_id='$user_id'";
        $query_nutrition_logs = mysqli_query($con, $select_nutrition_log);
        $get_nutrition_log = mysqli_fetch_assoc($query_nutrition_logs);
        // echo
        // "Last Nutrition Log" . "<br>";
        // print_r($get_nutrition_log);
        // echo  "<br>";

        $select_goals = "SELECT * FROM goals WHERE user_id='$user_id' && status='In Progress'";
        $query_goals = mysqli_query($con, $select_goals);
        // echo "Number of Goals: " . mysqli_num_rows($query_goals)
        //     . "<br>";
        if (mysqli_num_rows($query_goals) == 0) {
            // No Goal to add
            $goal = '';
        } else {
            $get_goals = mysqli_fetch_assoc($query_goals);
            $goal = "I have set a Goal for myself ";
            // echo
            // "Last Goal: " . "<br>";
            switch ($get_goals['goal_type']) {
                case 'Weight Loss':
                    $goal .= "To loose " . number_format($get_goals['target_value'], 2) . "kg in about " . approximateTimeDifference(date('Y-m-d', strtotime($get_goals['start_date'])), date('Y-m-d', strtotime($get_goals["end_date"]))) . "( " . $get_goals['start_date'] . " - " . $get_goals['end_date'] . " )";
                    $unit = 'kg';
                    break;
                case 'Workout':
                    $goal .= "To workout " . number_format($get_goals['target_value'], 2) . " time(s) within " . approximateTimeDifference(date('Y-m-d', strtotime($get_goals['start_date'])), date('Y-m-d', strtotime($get_goals["end_date"]))) . "( " . $get_goals['start_date'] . " - " . $get_goals['end_date'] . " )";
                    $unit = 'time(s)';
                    break;
                case 'Distance':
                    $goal .= "To walk or run over " . number_format($get_goals['target_value'], 2) . "km in about " . approximateTimeDifference(date('Y-m-d', strtotime($get_goals['start_date'])), date('Y-m-d', strtotime($get_goals["end_date"]))) . "( " . $get_goals['start_date'] . " - " . $get_goals['end_date'] . " )";
                    $unit = 'time(s)';
                    $unit = 'km';
                    break;
                case 'Calories Burned':
                    $goal .= "To burn " . number_format($get_goals['target_value'], 2) . "kcal calories within " . approximateTimeDifference(date('Y-m-d', strtotime($get_goals['start_date'])), date('Y-m-d', strtotime($get_goals["end_date"]))) . "( " . $get_goals['start_date'] . " - " . $get_goals['end_date'] . " )";
                    $unit = 'kcal';
                    break;
                default:
                    $goal = '';
                    $unit = '';
                    break;
            }
        }
        // echo "Goal: " . $goal
        //     . "<br>";
        $select_activity_metrics = "SELECT * FROM activity_metrics WHERE user_id='$user_id'";
        $query_activity_metrics = mysqli_query($con, $select_activity_metrics);
        $total_activity_metrics_serialized = '';
        while ($get_activity_metrics = mysqli_fetch_assoc($query_activity_metrics)) {
            $total_activity_metrics_serialized .= serialize($get_activity_metrics) . "\n";
        }
        // echo "Total Activity Metrics Serialied: " . $total_activity_metrics_serialized
        //     . "<br>";
        // Overwrite Session Alert
        $question = "Give me advice on being fit. \n";
        $question .= $goal . "\n";
        $question .= "Below is a serialized version of activities that i have done and logged \n";
        $question .= $total_activity_metrics_serialized . "\n";
        $question .= "I just ate " . $food_name . " with " . $calories . " calories, " . $protein . "g protein, " . $carbohydrate . "g carbohydrates, and " . $fats . "g fats. \n";
        $question .= "Below are my previous nutrition logs (serialized) \n";
        $question .= $total_nutrition_logs_serialized . "\n\n";
        $question .= "I want you to give me advice, whether or not I can reach my goal.\n";
        $question .= "Some words of encouragement and some advice on things to improve on in both the workouts and the nutrition aspects";

        // str_replace('"', "'", $question);
        // echo "Question: " . $question . "<br>";
        $ai_advice = get_ai_advice($question);
        // echo $ai_advice . "<br>";

        $_SESSION["advice"] .= $ai_advice;
        header("location: nutrition");
    }
    exit;
}
