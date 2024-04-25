<?php

include ('../includes/connection.php');

$name = $_POST["name"];
$password = $_POST["password"];
$address = $_POST["address"];
$number = $_POST["number"];

$querry = "INSERT INTO demo (name,password,address,number) VALUES (?,?,?,?)";
$param = [$name, $password, $address, $number];

$statement = $connection->prepare($querry);
$data = $statement->execute($param);

?>