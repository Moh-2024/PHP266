<?php
    session_start();
    include '../includes/header.php';
    include 'model/model_patients.php';

    $patients = getPatients ();

    $patientFirstName = '';
    $patientLastName = '';
    $patientBirthDate = '';

    if(isset($_POST['searchPatients'])){
        $patientFirstName = filter_input(INPUT_POST,'patientFirstName');
        $patientLastName = filter_input(INPUT_POST,'patientLastName');
        $patientBirthDate = filter_input(INPUT_POST,'patientBirthDate');
        
        $patients = searchPatients($patientFirstName, $patientLastName, $patientBirthDate);
    }
?>


<div class="container">

<div class="wrapper">
    <?php if(isset($_SESSION['isLoggedIn'])): ?>
    <h1>Welcome <?= $_SESSION['username']; ?></h1>
    <a href="logoff.php">Log Out</a>
    <?php else: ?>
    <a href="login.php">Log In</a>
    <?php endif; ?>
</div>
    
    <div class="col-sm-12">
        <h1>Patients</h1>

        <form method="POST" name="searchPatients">
	  <div class="wrapper" style="display: flex; align-items: center;padding: 2rem 0; margin: 2rem 0; justify-content: space-evenly; background-color: aliceblue; border-radius: 2rem;">
          <div class="form-group">
              <div class="label">
                  <label for="patientFirstName" style="color: black;">Patient First Name:</label>
              </div>
              <div>
                  <input type="text" id="patientFirstName" name="patientFirstName" class="form-control" />
              </div>
          </div>
          <div class="form-group">
              <div class="label">
                  <label for="patientFirstName" style="color: black;">Patient Last Name:</label>
              </div>
              <div>
                  <input type="text" id="patientFirstName" name="patientLastName" class="form-control" />
              </div>
          </div>
          <div class="form-group">
              <div class="label">
                  <label for="patientBirthDate" style="color: black;">Patient BirthDate:</label>
              </div>
              <div>
                  <input type="text" id="patientBirthDate" name="patientBirthDate" class="form-control" />
              </div>
          </div>
          <div>
              &nbsp;
          </div>
          <div>
              <input class="btn btn-info" type="submit" name="searchPatients" value="Search" style="margin-top: 0.5rem;"/>
          </div>  

      </div>
  </form>

        <a href="managePatients.php?Action=Add">Add New Patient</a>

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
    </div>
</div>

<?php
    include '../includes/footer.php';
?>