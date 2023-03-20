<?php

$db_name = "mysql:host=localhost;dbname=Nis";
$username = "root";
$password = "";

// $conn = new PDO($db_name, $username, $password);

// if (!$conn) {
//     die ("<h1>Database connection failed</h1>");
    
// }

try {

    $conn = new PDO($db_name ,$username ,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    $conn-> getAttribute(constant("PDO::ATTR_CONNECTION_STATUS"));

} catch (PDOException $e) {

    die("error : not connecte" . $e->getMessage());

}

?>