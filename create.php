<?php
    // Create variable and connection to database
    $connection = mysqli_connect("localhost", "root", "", "operation_data");

    // isset ตรวจสอบว่าใช้เพื่อกำหนดตั้งค่าตัวแปรหรือไม่
    if(isset($_POST["submit"])) {
        // Create variable and get method post from name in tag html
        $username = $_POST["username"];
        $email = $_POST["email"];
        $mobilephone = $_POST["mobilephone"];
        $place = $_POST["place"];
        // Check empty value and if not empty value send query to database
        if(!empty($username) || !empty($email) || !empty($mobilephone) || !empty($place)) {
            $query = "INSERT INTO dataoperation VALUES('', '$username', '$email', '$mobilephone', '$place')";
            mysqli_query($connection, $query);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main-create-container">
        <div class="create-container">
            <p class="text-create">create new user</p>
        </div>
        <div class="form-container">
            <form method="post">
                <label>username :</label>
                <input type="text" name="username" placeholder="enter your username">
                <label>email :</label>
                <input type="email" name="email" placeholder="enter your email">
                <label>phone :</label>
                <input type="text" name="mobilephone" placeholder="enter your phone">
                <label>place :</label>
                <input type="text" name="place" placeholder="enter your place">
                <div class="button-containers">
                    <div class="button-container">
                        <button type="submit" class="button-submit" name="submit">submit</button>
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