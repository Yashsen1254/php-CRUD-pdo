<?php
include ('../includes/connection.php');

$id = $_GET['id'];

$querry = "DELETE FROM demo WHERE id = $id";
$params = [$id];

$statement = $connection->prepare($querry);
$data = $statement->execute();

header("location:../index.php");

?>