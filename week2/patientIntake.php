<?php

include '../includes/header.php'; 
include '../functions.php'; 

// Initializing variables
$firstName = '';
$lastName = '';
$birthDate = '';
$height_ft = '';
$height_in = '';
$weight = '';
$error = '';
$bmi = '';
$age = '';
$bmi_classification = '';

// Handling form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Validate first name
    if (filter_input(INPUT_POST, 'first_name') != '') {
        $firstName = filter_input(INPUT_POST, 'first_name');
    } else {
        $error .= 'First name is required <br/>';
    }

    // Validate last name
    if (filter_input(INPUT_POST, 'last_name') != '') {
        $lastName = filter_input(INPUT_POST, 'last_name');
    } else {
        $error .= 'Last name is required <br/>';
    }

    // Validate birth date using isDate()
    $birthDate = filter_input(INPUT_POST, 'birth_date');
    if ($birthDate != '' && isDate($birthDate)) {
        $age = age($birthDate);  // Calculate age
    } else {
        $error .= 'Invalid birth date format <br/>';
    }

    // Validate height in feet and inches (must be valid numbers)
    if (filter_input(INPUT_POST, 'height_ft', FILTER_VALIDATE_FLOAT) !== false) {
        $height_ft = filter_input(INPUT_POST, 'height_ft', FILTER_VALIDATE_FLOAT);
    } else {
        $error .= 'Height (feet) is not a valid number <br/>';
    }

    if (filter_input(INPUT_POST, 'height_in', FILTER_VALIDATE_FLOAT) !== false) {
        $height_in = filter_input(INPUT_POST, 'height_in', FILTER_VALIDATE_FLOAT);
    } else {
        $error .= 'Height (inches) is not a valid number <br/>';
    }

    // Validate weight (must be a valid number)
    if (filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT) !== false) {
        $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);
    } else {
        $error .= 'Weight is not a valid number <br/>';
    }

    // If no errors, calculate BMI and other details
    if (empty($error)) {
        // Calculate BMI using the bmi() function
        $bmi = bmi($height_ft, $height_in, $weight);
        
        // Get BMI classification using bmiDescription() function
        $bmi_classification = bmiDescription($bmi);
    }
}
?>

<!-- HTML Form for BMI Calculation -->
<h1>BMI Calculator</h1>

<!-- BMI Criteria -->
<h2>Criteria</h2>
<ul>
    <li>Underweight: BMI < 18.5</li>
    <li>Normal weight: BMI 18.5–24.9</li>
    <li>Overweight: BMI 25–29.9</li>
    <li>Obese: BMI 30 or greater</li>
</ul>

<hr/>

<!-- BMI Form -->
<div class="form-wrapper">

    <form name="bmi_calculator" method="post">

        <div class="form-control">
            <label for="first_name">First Name:</label><br/>
            <input type="text" id="first_name" name="first_name" value="<?= htmlspecialchars($firstName); ?>">
        </div>

        <div class="form-control">
            <label for="last_name">Last Name:</label><br/>
            <input type="text" id="last_name" name="last_name" value="<?= htmlspecialchars($lastName); ?>">
        </div>

        <div class="form-control">
            <label for="birth_date">Birth Date (YYYY-MM-DD):</label><br/>
            <input type="date" id="birth_date" name="birth_date" value="<?= htmlspecialchars($birthDate); ?>">
        </div>

        <div class="form-control">
            <label for="height_ft">Height (Feet):</label><br />
            <input type="text" name="height_ft" value="<?= htmlspecialchars($height_ft); ?>">
        </div>

        <div class="form-control">
            <label for="height_in">Height (Inches):</label><br />
            <input type="text" name="height_in" value="<?= htmlspecialchars($height_in); ?>">
        </div>

        <div class="form-control">
            <label for="weight">Weight (kg):</label><br />
            <input type="text" name="weight" value="<?= htmlspecialchars($weight); ?>">
        </div>

        <div class="form-submit">
            <input type="submit" name="bmi_calculator_submit" value="Submit">
        </div>

    </form>

</div>

<!-- Display Results and Errors -->
<div>
    <p style="color: red;"><?= $error; ?></p>
    <h2>Form Results</h2>
    <p>First Name:<?= $firstName; ?></p>
    <p>Last Name:<?= $lastName; ?></p>
    <p>Age:<?= $age; ?> years</p>
    <p>>Height:<?= $height_ft; ?> feet <?= $height_in; ?> inches</p>
    <p>Weight<?= $weight; ?> kg</p>
    <p>BMI:<?= $bmi; ?></p>
    <p>BMI Classification:<?= $bmi_classification; ?></p>
</div>

<?php include '../includes/footer.php'; ?>
