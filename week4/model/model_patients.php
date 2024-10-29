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

function addPatient($pFirstN, $pLastN, $pMarried, $pBirthDate){
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
function getPatient($id){
    global $db;

    $result = [];

    $sql = 'SELECT * FROM PATIENTS WHERE ID = :id';

    $stmt = $db->prepare($sql);

    $binds = array(
        ':id'=> $id
    );

    if ( $stmt->execute($binds) && $stmt->rowCount() > 0){
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    }

    return $result;
}

function updatePatient($id, $pFirstN, $pLastN, $pMarried, $pBirthDate){
    global $db;

    $result = '';

    $sql = 'UPDATE PATIENTS SET patientFirstName = :n, patientLastName = :c, patientMarried = :d, patientBirthDate = :p WHERE id = :id';

    $stmt = $db->prepare($sql);

    $binds = array(
        ':id'=> $id,
        ':n'=> $pFirstN,
        ':c'=> $pLastN,
        ':d'=> $pMarried,
        ':p'=> $pBirthDate
    );

    if ( $stmt->execute($binds) && $stmt->rowCount() > 0){
        $result = "Patient Updated";
    }

    return $result; 
}

function deletePatient($id){
    global $db;

    $result = "";

    $sql = "DELETE FROM PATIENTS WHERE id = :id";

    $stmt = $db->prepare($sql);

    $binds = array(
        ":id"=> $id
    );

    if ( $stmt->execute($binds) && $stmt->rowCount() > 0){
        $result = "Patient Deleted";
    }

    return $result;
}