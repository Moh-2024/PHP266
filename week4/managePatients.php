<?php
    include '../includes/header.php';
    include '../week4/model/model_patients.php';

    $error = "";
    $patientFirstName = "";
    $patientLastName = "";
    $patientMarried = "";
    $patientBirthDate = "";

    if (isset($_GET['Action'])) {
        $action = filter_input(INPUT_GET,'Action');
        $id = filter_input(INPUT_GET,'ID');

        $patient = getPatient($id);
        
        if($patient){
            $patientFirstName = $patient['patientFirstName'];
            $patientLastName = $patient['patientLastName'];
            $patientMarried = $patient['patientMarried'];
            $patientBirthDate = $patient['patientBirthDate'];
        }
    }


    if (isset($_POST['patientFirstName'])) {
        $patientFirstName = filter_input(INPUT_POST, 'patientFirstName');
        $patientLastName = filter_input(INPUT_POST, 'patientLastName');
        $patientMarried = filter_input(INPUT_POST, 'patientMarried', FILTER_VALIDATE_BOOL);
        $patientBirthDate = filter_input(INPUT_POST, 'patientBirthDate');
        
        if ($patientFirstName == "") $error .= "<li>Please provide patient first name</li>";
        if ($patientLastName == "") $error .= "<li>Please provide patient last name</li>";
        if ($patientMarried == "") $error .= "<li>Please provide Married status</li>";
        if ($patientBirthDate == "") $error .= "<li>Please provide patient's birth date</li>";
        
        if ($error == ""){
            if(isset($_POST["storePatient"])){
                addPatient ($patientFirstName, $patientLastName, $patientMarried, $patientBirthDate);
                header('Location: viewPatients.php');
                exit();
            }
            else if(isset($_POST['editPatient'])){
                updatePatient ($id, $patientFirstName, $patientLastName, $patientMarried, $patientBirthDate);
                header('Location: viewPatients.php');
                exit();
            }
            else if(isset($_POST['deletePatient'])){
                deletePatient ($id);
                header('Location: viewPatients.php');
                exit();
            }
        }
    }
?>


<div class="container">
    <div class="col-sm-12"> 
        <a class='mar12' href="viewPatients.php">Back to View All Patients</a>
        <h2 class='mar12'>Patient</h2>
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
                <?php if($action == 'Add'): ?>
                <div>
                    <input class="btn btn-success" type="submit" name="storePatient" value="Add Patient Information" />
                </div> 
                <?php else: ?>
                <div>
                    <input class="btn btn-warning" type="submit" name="editPatient" value="Edit Patient's Info" />
                </div> 
                <br/>
                <div>
                    <input class="btn btn-danger" type="submit" name="deletePatient" value="Delete Patient" />
                </div>   
                <?php endif; ?>
                 
            </div>
        </form>
    </div>
</div>

<?php
    include '../includes/footer.php';
?>