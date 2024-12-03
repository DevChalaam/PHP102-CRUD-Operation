<?php
    // Create variable to database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databasename = "operation_data";

    // Create variable to connection database
    $connection = mysqli_connect($servername, $username, $password, $databasename);

    // isset ตรวจสอบว่าใช้เพื่อกำหนดตั้งค่าตัวแปรหรือไม่
    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        // GET method : Show the data of the user
        if(!isset($_GET['id'])) {
            header('location: /CRUDOperation/display.php');
            exit;
        }

        // Create variable use get method
        $id = $_GET['id'];

        // Read the row of the selectd user from database table
        $sql = "SELECT * FROM dataoperation WHERE id = $id";
        $result = $connection->query($sql);
        $row = $result->fetch_assoc();

        if(!$row) {
            header('location: /CRUDOperation/display.php');
            exit;
        }

        $userName = $row['username'];
        $email = $row['email'];
        $mobilephone = $row['mobilephone'];
        $place = $row['place'];
    }
    else {
       // POST method: Update the data of the user
       $id = $_POST['id'];
       $userName = $_POST['username'];
       $email = $_POST['email'];
       $mobilephone = $_POST['mobilephone'];
       $place = $_POST['place'];
       
       // Check empty value
       if(empty($id) || empty($userName) || empty($email) || empty($mobilephone) || empty($place)) {
        die("All the fields are required");
        exit;
       }

       // Create variable for query value in the database
       $sql = "UPDATE dataoperation SET username = '$userName', email = '$email', mobilephone = '$mobilephone', place = '$place' WHERE id = $id";

       $result = $connection->query($sql);

       if(!$result) {
        die("Invalid query : " . $connection->error);
        exit;
       }

       header('location: /CRUDOperation/display.php');
       exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-create-container">
        <div class="create-container">
            <p class="text-create">edit user</p>
        </div>
        <div class="form-container">
            <form method="post">
                <input type="hidden" name = "id" value="<?php echo $id; ?>">
                <label>username :</label>
                <input type="text" name="username" placeholder="enter your username" value="<?php echo $userName; ?>">
                <label>email :</label>
                <input type="email" name="email" placeholder="enter your email" value="<?php echo $email; ?>">
                <label>phone :</label>
                <input type="text" name="mobilephone" placeholder="enter your phone" value="<?php echo $mobilephone; ?>">
                <label>place :</label>
                <input type="text" name="place" placeholder="enter your place" value="<?php echo $place; ?>">
                <div class="button-containers">
                    <div class="button-container">
                        <button type="submit" class="button-submit" name="submit">edit</button>
                    </div>
                    <div class="back-container">
                        <a href="/CRUDOperation/display.php" class="link-back">back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>