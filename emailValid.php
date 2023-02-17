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
$email = $_REQUEST["email"];
$msg = "";
if ($email !== "") {
    $query_email = mysqli_query($conn, "SELECT username FROM userinfo WHERE email = '$email'");
    // $query_regno = mysqli_query($conn, "SELECT regno FROM userinfo WHERE regno = '$regno'");
    if (!$query_email) {
        echo $msg;
    }
    $rows_email = $query_email->num_rows;
    if ($rows_email >= 1) {
        $msg = "Email should be unique";
    }
}
echo $msg;