<?php
session_start();
$_SESSION['username'] = $_POST['username'];
$_SESSION['password'] = $_POST['password'];
$_SESSION['signup'] = FALSE;
$_SESSION['signin'] = TRUE;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "userdata";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$uname = $_SESSION['username'];
$pass = $_SESSION['password'];

//AUTHENTICATION in XML
$xml = simplexml_load_file("xml/userdata.xml");
foreach ($xml->children() as $user){
    if($user->username == $uname && $user->password == $pass){
        $_SESSION['name'] = "$user->name";
        // echo $user->name;
        header("Location:./home.php");
        break;
    } else {
        header("Location:./signIn.php");
    }
}

            // $user = $xml->createElement("user");
            //   $username = $xml->createElement("username",$_SESSION['username']);
            //   $password = $xml->createElement("password",$_SESSION['password']);
  

// $query = mysqli_query($conn, "SELECT name FROM userinfo WHERE username = '$uname' AND password = '$pass'");
// if (!$query) {
//     echo "DB error";
// } else {
//     $rows = $query->num_rows;
//     $row = mysqli_fetch_array($query);
//     $conn->close();
//     if ($rows >= 1) {
//         $_SESSION['name'] = $row['name'];
//         header("Location:./home.php");
//     } else {
//         header("Location:./signIn.php");
//     }
// }
