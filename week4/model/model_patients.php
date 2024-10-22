<?php

include (__DIR__ . '/db.php');

function getPatients(){
    global $db;

    $results = [];

    $stmt = $db->prepare("SELECT * FROM PATIENTS ORDER BY patientFirstName, patientLastName, patientMarried, patientBirthDate DESC, patientFirstName");

    if($stmt->execute() && $stmt->rowCount() > 0){
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    return $results;
}

function addTeam($pFirstN, $pLastN, $pMarried, $pBirthDate){
    global $db;

    $result = "";

    $sql = "INSERT INTO PATIENTS SET patientFirstName = :n, patientLastName = :c, patientMarried = :d, patientBirthDate = :p";

    $stmt = $db->prepare($sql);

    $binds = array(
        ":n" => $pFirstN,
        ":c" => $pLastN,
        ":d" => $pMarried,
        ":p" => $pBirthDate
    );

    if ( $stmt->execute($binds) && $stmt->rowCount() > 0){
        $result = "Data Added";
    }

    return $result;
}