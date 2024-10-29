<?php
    include '../includes/header.php';
    include 'model/model_patients.php';

    $patients = getPatients ();
?>

<div class="container">
                
    <div class="col-sm-12">
        <h1>Patients</h1>

        <a href="managePatients.php">Add New Patient</a>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient's First Name</th>
                    <th>Patient's Last Name</th>
                    <th>Married</th>
                    <th>BirthDate</th>
                    <th>Admin</th>
                </tr>
            </thead>
            <tbody>
            
            <?php foreach ($patients as $patient):                 
            ?>
                <tr>
                    <td><?= $patient['id']; ?></td>
                    <td><?= $patient['patientFirstName']; ?></td>
                    <td><?= $patient['patientLastName']; ?></td> 
                    <td><?= $patient['patientMarried']; ?></td> 
                    <td><?= $patient['patientBirthDate']; ?></td>  
                    <td><a href="managePatients.php?Action=Edit&ID=<?= $patient['id']; ?>">Edit</a></td>     
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>

        <a href="managePatients.php">Add New Patient</a>

    </div>
</div>

<?php
    include '../includes/footer.php';
?>