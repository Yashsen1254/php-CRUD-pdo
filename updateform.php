<?php
include ('includes/connection.php');
$id = $_GET["id"];
$querry = "SELECT * FROM demo";
$statement = $connection->prepare($querry);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <form>
        <input type="text" name="name" id="name" placeholder="Enter name" value="<?= $user['name'] ?>">
        <input type="hidden" id="id" value="<?= $user['id'] ?>">
        <input type="password" name="password" id="password" placeholder="Enter password" value="<?= $user['password'] ?>" >
        <input type="text" name="address" id="address" placeholder="Enter Address" value="<?= $user['address'] ?>" >
        <input type="number" name="number" id="number" placeholder="Enter number" value="<?= $user['number'] ?>" >
        <input type="button" value="Update" onclick="updateData()">
    </form>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function updateData() {
            var name = $("#name").val();
            var password = $("#password").val();
            var address = $("#address").val();
            var number = $("#number").val();
            var id = $("#id").val();

            $.ajax({
                url: "./api/update.php",
                method: "POST",
                data: {
                    id:id,
                    name: name,
                    password: password,
                    address: address,
                    number: number
                },
                success: function (response) {
                    console.log(response);
                }
            })
        }
    </script>
</body>

</html>