<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdata";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Getting query string
$uname = $_REQUEST["uname"];
$msg = "";
if ($uname !== "") {
    $query = mysqli_query($conn, "SELECT username FROM userinfo WHERE username = '$uname'");
    if (!$query) {
        die();
    }
    $rows = $query->num_rows;
    if ($rows >= 1) {
        $msg = "Username already exists, choose different name";
    }
    else{
        $msg = "Nice and unique username";
    }
}

echo $msg;