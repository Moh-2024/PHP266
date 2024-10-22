<?php
    include '../includes/header.php';
    include '../week4/model/model_patients.php';

    $error = "";
    $patientFirstName = "";
    $patientLastName = "";
    $patientMarried = "";
    $patientBirthDate = "";

    if (isset($_POST['storePatient'])) {
        $patientFirstName = filter_input(INPUT_POST, 'patientFirstName');
        $patientLastName = filter_input(INPUT_POST, 'patientLastName');
        $patientMarried = filter_input(INPUT_POST, 'patientMarried', FILTER_VALIDATE_BOOL);
        $patientBirthDate = filter_input(INPUT_POST, 'patientBirthDate');
        
        if ($patientFirstName == "") $error .= "<li>Please provide patient first name</li>";
        if ($patientLastName == "") $error .= "<li>Please provide patient last name</li>";
        if ($patientMarried == "") $error .= "<li>Please provide Married status</li>";
        if ($patientBirthDate == "") $error .= "<li>Please provide patient's birth date</li>";
        
        if ($error == ""){
            addTeam ($patientFirstName, $patientLastName, $patientMarried, $patientBirthDate);
            header('Location: viewPatients.php');
            exit();
        }
    }
?>


<div class="container">
    <div class="col-sm-12"> 
        <a class='mar12' href="viewPatients.php">Back to View All Patients</a>
        <h2 class='mar12'>Add Patient</h2>
        <form name="patients" method="post">
            <?php
                if ($error != ""):
            ?>      
            <div class="error">
                <p>Please fix the following and resubmit</p>
                <ul style="color: red;">
                    <?php echo $error; ?>
                </ul>
            </div>
            <?php
                endif;
            ?>
            <div class="wrapper">
                <div class="form-group">
                    <div class="label">
                        <label for="firstName" style="color: black;">Patient First Name:</label>
                    </div>
                    <div>
                        <input type="text" id="firstName" name="patientFirstName" class="form-control" value="<?= $patientFirstName; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label for="lastName" style="color: black;">Patient Last Name:</label>
                    </div>
                    <div>
                        <input type="text" id="lastName" name="patientLastName" class="form-control" value="<?= $patientLastName; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label for="married" style="color: black;">Married:</label>
                    </div>
                    <div>
                        <input type="text" id="married" name="patientMarried" class="form-control" value="<?= $patientMarried; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <div class="label">
                        <label for="birthDate" style="color: black;">BirthDate:</label>
                    </div>
                    <div>
                        <input type="text" id="patientBirthDate" name="patientBirthDate" class="form-control" value="<?= $patientBirthDate; ?>" />
                    </div>
                </div>
                <div>
                    &nbsp;
                </div>
                <div>
                    <input class="btn btn-success" type="submit" name="storePatient" value="Add Patient Information" />
                </div>  
            </div>
        </form>
    </div>
</div>

<?php
    include '../includes/footer.php';
?>