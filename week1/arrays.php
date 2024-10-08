<?php 
include '../includes/header.php'; 


$animals = array('bird', 'cat', 'dog', 'fish');
?>

<h1>Arrays</h1>
<h2>Indexed Arrays</h2>
<ul>
    <?php foreach($animals as $s): ?>
        <li><?= $s; ?></li>
    <?php endforeach; ?>
</ul>

<?php include '../includes/footer.php'; ?>