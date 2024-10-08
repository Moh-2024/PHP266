
<?php
include '../includes/header.php'; 
$task = array(
    'homework'=> true,
    'cleaning' => false,
    'grocery' => true    
)
?>
<h1>Boolean / Conditionals</h1>
<ul>
    <?php foreach($task as $name => $status): ?>
        <li>
            <?php if($status == true): ?>
                <?php echo $name . ' &#10003;';?>
            <?php else: ?>
                <?php echo $name . ' &#10008;';?>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>



<?php include '../includes/footer.php'; ?>

