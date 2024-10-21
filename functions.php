<?php
function calcPoints($wins, $ot_losses): float|int{
    $totalPoints = $wins * 2 + $ot_losses;
    return $totalPoints;
}

function age($bdate) {
    // Convert the birth date string to a DateTime object
    $birthDate = new DateTime($bdate);
    $today = new DateTime('today');
    
    // Calculate the age by finding the difference between the current date and the birth date
    $age = $birthDate->diff($today)->y;
    
    // Return the calculated age in years
    return $age;
}

function isDate($dob) {
    $date_arr = explode('-', $dob);  // Assuming the date is in YYYY-MM-DD format
    return checkdate((int)$date_arr[1], (int)$date_arr[2], (int)$date_arr[0]);
}

function bmi($ft, $inch, $weight) {
    // Convert feet and inches to total height in meters
    $height_m = (($ft * 12) + $inch) * 0.0254;  // 1 inch = 0.0254 meters

    // Calculate BMI
    if ($height_m > 0) {
        return round($weight / ($height_m ** 2), 1);  // Return BMI rounded to one decimal place
    }
    return 0;
}

function bmiDescription($bmi) {
    if ($bmi < 18.5) {
        return "Underweight";
    } elseif ($bmi >= 18.5 && $bmi <= 24.9) {
        return "Normal weight";
    } elseif ($bmi >= 25 && $bmi <= 29.9) {
        return "Overweight";
    } else {
        return "Obese";
    }
}
