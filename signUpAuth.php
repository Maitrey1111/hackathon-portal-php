<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confp = $_POST['confp'];

    if($password === $confp && $confp && $password){
        session_start();
        $_SESSION["username"] = $username;
        $_SESSION["password"] = $password;
        $_SESSION["signup"] = TRUE;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "userdata";

        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
        } 
          
        $uname = $_POST['username'];

        //validation using PHP and Database
        $query = mysqli_query($conn, "SELECT username FROM userinfo WHERE username = '$uname'");
        if (!$query) {
            die();
        }          
        $rows = $query->num_rows;
        if ($rows >= 1) {
            header("Location:./signUpForm.php");
        }
        else{
            header("Location:./dataEntry.php");
        }
    }
    else{
        if(isset($_SESSION['username'])){
            session_destroy();
        }
        header("Location:./signUpForm.php");
    }

?>