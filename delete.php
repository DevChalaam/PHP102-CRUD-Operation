<?php
    // isset ตรวจสอบว่าใช้เพื่อกำหนดตั้งค่าตัวแปรหรือไม่
    if(isset($_GET['id'])) {
        // ประกาศตัวแปร รับค่า id เป็นเมทธอด get
        $id = $_GET['id'];

        // Create variable to connection database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $databasename = "operation_data";

        // Create variable to connection to database
        $connection = mysqli_connect($servername, $username, $password, $databasename);

        // Create variable use mysqli command to delete value in database
        $sql = "DELETE FROM dataoperation WHERE id = $id";

        // Use variable connection and use access scope object
        $connection->query($sql);
    }

    // Redirect to display.php and exit
    header('location: /CRUDOperation/display.php');
    exit;
?>