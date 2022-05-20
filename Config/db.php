<?php 

$user = 'root';
$pass = 'root';
$dbname = 'wsf';

try {
    $db = new PDO('mysql:host=localhost;dbname=' . $dbname, $user, $pass);
    // other code ... 
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
