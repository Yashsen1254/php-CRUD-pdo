<?php

    include('includes/connection.php');
    $querry = "SELECT * FROM setdata";
    $statement = $connection->prepare($querry);
    $statement->execute();
    
    $users = $statement->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <form>
        <input type="text" name="name" id="name" placeholder="Enter name">
        <input type="password" name="password" id="password" placeholder="Enter password">
        <input type="text" name="address" id="address" placeholder="Enter Address">
        <input type="number" name="number" id="number" placeholder="Enter number">
        <input type="button" value="submit" onclick="sendData()">
    </form>    
    <table border="1">
        <tr>
            <th>Name</th>
            <th>Password</th>
            <th>Address</th>
            <th>Number</th>
        </tr>
        <?php foreach ($users as $user): ?>
        <tr>
            <td><?= $user['name'] ?></td>
            <td><?= $user['password'] ?></td>
            <td><?= $user['address'] ?></td>
            <td><?= $user['number'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        function sendData() {
            var name = $("#name").val();
            var password = $("#password").val();
            var address = $("#address").val();
            var number = $("#number").val();
            
            $.ajax({
                url:"./api/insert.php",
                method:"POST",
                data: {
                    name:name,
                    password:password,
                    address:address,
                    number:number
                },
                success:function(response) {
                    console.log(response);
                }
            })
        }
    </script>
</body>
</html>