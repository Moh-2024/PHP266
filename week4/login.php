<?php

    include '../includes/header.php';
    include '../week4/model/model_users.php';

    session_start();
    $_SESSION['isLoggedIn'] = false;
    $_SESSION['username'] = '';
    $error = '';

    if(isset($_POST['login'])){

        $username = filter_input(INPUT_POST,'username');
        $password = filter_input(INPUT_POST,'password');
    
        if(login($username, $password)){
            $_SESSION['isLogginIn'] = true;
            $_SESSION['username'] = $username;
            header('Location: viewPatients.php');
        }
        else{
            $error = "Please provide corret log in info";
        }



    }

?>


<div class="container">
                
    <form method="post">

        <div class="rowContainer">
            <h3>Login</h3>
        </div>
        <div class="rowContainer">
            <div class="col1">User Name:</div>
            <div class="col2"><input type="text" name="username" value=""></div> 
        </div>
        <div class="rowContainer">
            <div class="col1">Password:</div>
            <div class="col2"><input type="password" name="password" value=""></div> 
        </div>
            <div class="rowContainer">
            <div class="col1">&nbsp;</div>
            <div class="col2"><input type="submit" name="login" value="Login" class="btn btn-warning"></div> 
        </div>
        <?php
            if ($error != "") {
        ?>
        <div class="error"><?php echo $error; ?></div>
        <?php
            }
        ?>
        </form>

    </div>





<?php include '../includes/footer.php';