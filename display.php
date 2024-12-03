<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-container">
        <div class="topic-container">
            <h1 class="text-topic">user list</h1>
        </div>

        <div class="link-adduser-container">
            <a href="/CRUDOperation/create.php" class="link-adduser">add user</a>
        </div>
        <table class="table-user">
            <thead>
                <tr>
                    <th>id</th>
                    <th>username</th>
                    <th>email</th>
                    <th>phone</th>
                    <th>place</th>
                </tr>
            </thead>
            <tbody>
                 <?php
                    // Create variable to connection to database  
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = 'operation_data';
                    // Create connnection
                    $connection = mysqli_connect($servername, $username, $password, $database);
                    // Check connection
                    if($connection->connect_error) {
                        die("Connection flied : " . $connection->connect_error);
                    }
                    // Read all row from database table
                    $sql = "SELECT * FROM dataoperation";
                    $result = $connection->query($sql);
                    if(!$result) {
                        die("Invalid query : " . $connection->error);
                    }
                    // Read data of each row
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[username]</td>
                            <td>$row[email]</td>
                            <td>$row[mobilephone]</td>
                            <td>$row[place]</td>
                            <td>
                                <a href='/CRUDOperation/edit.php?id=$row[id]' class='link-edit-user'>edit</a>
                                <a href='/CRUDOperation/delete.php?id=$row[id]' class='link-delete-user'>delete</a>
                            </td>
                        </tr>
                        ";
                    }
                 ?>
            </tbody>
        </table>
    </div>
</body>
</html>