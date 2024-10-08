<?php 
include '../includes/header.php'; 


$info = array(
    'FirstName' => 'Mohammed',
    'LastName' => 'Malek',
    'Phone' => '401-000-0000',
    'Address' => 'My address'
)
?>
<h2>Associative Arrays</h2>
<ul>
    <?php foreach($info as $info => $description): ?>
        <li><?= $info . ': ' . $description; ?></li>
    <?php endforeach; ?>
</ul>

<?php 
include '../includes/footer.php'; ?>