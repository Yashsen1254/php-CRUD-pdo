<?php
include ('../includes/connection.php');

$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$address = $_POST['address'];
$number = $_POST['number'];

$query = "UPDATE demo SET name=?, password=?, address=?, number=? WHERE id=?";
$param = [$name,$password,$address,$number,$id];

$statement= $connection->prepare($query);
$data = $statement->execute($param);

?>