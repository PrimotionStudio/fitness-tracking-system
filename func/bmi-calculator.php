<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $weight = $_POST["weight"];
    $height = $_POST["height"];
    if ($weight > 0 && $height > 0) {
        // Calculate BMI
        $bmi = $weight / ($height * $height);

        // Classify BMI category
        if ($bmi < 18.5) {
            $category = "Underweight";
        } elseif ($bmi >= 18.5 && $bmi < 24.9) {
            $category = "Normal weight";
        } elseif ($bmi >= 25 && $bmi < 29.9) {
            $category = "Overweight";
        } else {
            $category = "Obesity";
        }

        $update_user_profile = "UPDATE users SET weight='$weight', height='$height' WHERE id='$user_id'";
        mysqli_query($con, $update_user_profile);
        // Display the result
        $_SESSION["alert"] = "Your BMI is: " . number_format($bmi, 2) . "<br />";
        $_SESSION["alert"] .= "Category: " . $category . "";
    } else {
        $_SESSION["alert"] = "Please enter valid values for weight and height.";
    }
    header("location: bmi-calculator");
    exit;
}
