<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdata";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    echo $error;
    die("Connection failed: " . $conn->connect_error);
}

//Getting query string
$regno = $_REQUEST["regno"];
$msg = "";
if ($regno !== "") {
    $query_regno = mysqli_query($conn, "SELECT username FROM userinfo WHERE regno = '$regno'");
    if (!$query_regno) {
        echo $msg;
    }
    $rows_regno = $query_regno->num_rows;
    if ($rows_regno >= 1) {
        $msg = "Already used Registration Number";
    }
    else{
        $msg = "Valid Registration Number";
    }
}
echo $msg;

