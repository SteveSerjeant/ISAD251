<?php

require_once 'db_connect.php';

try {
    $conn = new PDO("mysql:host=$dbServerName;dbname=$dbName", $dbUserName, $dbPassWord);
    echo "Connected to $dbName at $dbServerName successfully.";
    //$conn = null;
    $sql = 'SELECT * FROM stockitems';

    $q = $conn->prepare($sql);
    $q->execute(['%son']);
    $q->setFetchMode(PDO::FETCH_ASSOC);

    while ($r = $q->fetch()){

        echo sprintf('%s <br/>', $r['Price']);
    }
} catch (PDOException $pe) {
    die("Could not connect to the database $dbServerName :" . $pe->getMessage());
}


