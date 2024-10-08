<?php 
include '../includes/header.php'; 

include '../week1/functions.php';
?>
<h2>Age check</h2>
<?php
$age = 25;

if (checkAge($age)) {
    echo "You are old enough to enter the nightclub.";
} else {
    echo "Sorry, you are not old enough to enter the nightclub.";
}
?>

<h2>Fizz / Buzz </h2>

<?php   
    for($i = 0; $i<100; $i++){
        echo fizzBuzz($i) . "\n";
    }

?>



<?php include '../includes/footer.php'; ?>