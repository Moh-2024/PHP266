<?php
include 'person.php';

$person = new Person('Moh', 'Malek');

?>

<h1><?= $person->getFirst();?></h1>
<h2><?= $person->getlast();?></h1>
<h3><?= $person->getID();?></h1>