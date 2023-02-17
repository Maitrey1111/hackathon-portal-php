<!DOCTYPE html>
<html lang="en">

<head>
  <title>HACKATHON</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="home.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

  <link rel="icon" type="image/x-icon" href="assets/favicon.png" />
  <style>
    body {
      font-family: "Lato", sans-serif;
    }
  </style>
</head>

<body>

  <!-- <script>
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        myFunction(this);
      }
    };
    xhttp.open("GET", "./xml/userdata.xml", true);
    xhttp.send();

    function myFunction(xml) {
      var xmlDoc = xml.responseXML;
      // var x = xmlDoc.getElementsByTagName("user")[0].childNodes[0];
      // x.insertData(0, "Cooking: ");
      document.getElementById("demo").innerHTML = x.data;
    }
  </script> -->


  <!-- <script>
    $(document).ready(function() {
      var xml;
      $('#b1').click(function() {
        $.get('xml/userdata.xml', null, function(data, textStatus) {
          xml = data;
          $(xml).find('details').each(function() {
            var item = $(this);

            if (item.find('username').text() == $('#userid').val() && item.find('password').text() == $('#pwd').val()) {
              window.open('success.html');
            }
          });
        });
      });
    });
  </script> -->

  <nav>
    <div>
      <a href="index.php">
        <h2>
          <span style="font-weight: 900; color: rgb(75, 204, 0)">HACK-</span>A-THON
        </h2>
      </a>

      <div class="">
        <div>
          <a href="#" style="cursor: pointer;">Home</a>
        </div>
        <div>
          <a href="#contact" style="cursor: pointer;">Contact</a>
        </div>
        <form method="post">
          <button type="submit" id="logout" name="logout" class="button" title="Log out">
            <div>Log out</div>
          </button>
        </form>

      </div>

      <?php
      if (array_key_exists('logout', $_POST)) {
        if (isset($_SESSION['signin']) || isset($_SESSION['signup'])) {
          $_SESSION['signin'] = FALSE;
          $_SESSION['signup'] = FALSE;
          setcookie($cookie_name, "New user logged in 1 Hour before...", time() - 3600);
          session_destroy();
        }
        header("Location:./index.php");
      }
      ?>

    </div>

  </nav>

  <main>
    <div id="landing">
      <div class="title">
        <div style="
              padding: 10vh 0px 12vh 0;
              display: flex;
              flex-direction: column;
              row-gap: 10px;">
          <h1>Registration Complete</h1>
          <div id="demo"></div>

          <!-- <h2>#Succesfully Registered for Hackathon</h2> -->
          <?php
          session_start();
          $cookie_name = $_SESSION["username"];
          if ($_SESSION['signup'] === TRUE && $_SESSION['signin'] === FALSE) {

            // STORING DATA in MySQL
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "userdata";

            $_SESSION['signup'] = FALSE;
            $_SESSION['signin'] = TRUE;

            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }

            //userinfo
            $_SESSION['regno'] = $_POST['regno'];
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['name'] = $_POST['name'];
            $_SESSION['skills'] = $_POST['lang1'] . " " . $_POST['lang2'] . " " . $_POST['lang3'] . " " . $_POST['lang4'] . " " . $_POST['lang5'];
            $uname = $_SESSION['username'];
            $pass = $_SESSION['password'];
            $regno = $_SESSION['regno'];
            $email = $_SESSION['email'];
            $name = $_SESSION['name'];

            $sql = "INSERT INTO userinfo (`username`, `name`, `password`, `email`, `regno`)
              VALUES ('$uname', '$name', '$pass', '$email', '$regno')";

            //userdetails
            $_SESSION['bdate'] = $_POST['bdate'];
            $_SESSION['age'] = $_POST['age'];
            $_SESSION['college'] = $_POST['college'];
            $_SESSION['gender'] = $_POST['gender'];
            $bdate = $_SESSION['bdate'];
            $age = $_SESSION['age'];
            $clg = $_SESSION['college'];
            $gender = $_SESSION['gender'];
            $skills = $_SESSION['skills'];

            $sql2 = "INSERT INTO userdetails (`username`, `gender`,`bdate`, `age`, `college`)
              VALUES ('$uname', '$gender','$bdate', '$age', '$clg')";
            $sql3 = "INSERT INTO userskills (`username`, `skills`)
              VALUES ('$uname', '$skills')";


            //DATA STORING in XML
            $xml = new DOMDocument("1.0", "UTF-8");
            $xml->load("xml/userdata.xml");
            $root = $xml->getElementsByTagName("userdata")->item(0);
            $user = $xml->createElement("user");
            $username = $xml->createElement("username", $_SESSION['username']);
            $password = $xml->createElement("password", $_SESSION['password']);
            $email = $xml->createElement("email", $_SESSION['email']);
            $name = $xml->createElement("name", $_SESSION['name']);
            $regno = $xml->createElement("regno", $_SESSION['regno']);
            $user->appendChild($username);
            $user->appendChild($password);
            $user->appendChild($email);
            $user->appendChild($name);
            $user->appendChild($regno);
            $root->appendChild($user);

            echo $xml->saveXML();
            file_put_contents("xml/userdata.xml", $xml->saveXML());

            //DATA DISPLAY
            //DATA DISPLAY
            $xml = simplexml_load_file("xml/userdata.xml");
            foreach ($xml->children() as $user) {
              if ($user->username == $uname && $user->password == $pass) {
                echo "<br><br>Your Details: <br>";
                echo "Email: " . $user->email . "<br>Reg No: " . $user->regno;
                break;
              }
            }

            //COOKIE SETTING
            setcookie($cookie_name, "New user logged in 1 Hour before...", time() + 3600);
            if ($conn->query($sql) === TRUE && $conn->query($sql2) === TRUE && $conn->query($sql3) === TRUE) {
              echo "<h2>#Succesfully Registered for Hackathon</h2>";
              echo "Hello, " . $name;
              if (isset($_COOKIE[$cookie_name])) {
                echo "<br>Cookie set just now<br>";
                echo $_COOKIE[$cookie_name] . "<br>";
              }
            } else {
              echo "<h2>It seems some error occured..</h2>";
            }
            // echo "<br>" . $gender."<br>".$age."<br>".$bdate."<br>".$clg;

            $conn->close();
          } elseif ($_SESSION['signin'] === TRUE && $_SESSION['signup'] === FALSE) {
            // session_start();
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "userdata";

            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error){
              die("Connection failed: " . $conn->connect_error);
            }

            $uname = $_SESSION['username'];
            $pass = $_SESSION['password'];
            $name = $_SESSION['name'];

            // $cookie_name = "newuser";
            echo "<h2>#Login Successful</h2>";
            echo "Hello, " . $name;

            //DATA DISPLAY
            $xml = simplexml_load_file("xml/userdata.xml");
            foreach ($xml->children() as $user) {
              if ($user->username == $uname && $user->password == $pass) {
                echo "<br><br>Your Details: <br>";
                echo "Email: " . $user->email . "<br>Reg No: " . $user->regno;
                break;
              }
            }

            //COOKIE
            if (isset($_COOKIE[$cookie_name])) {
              // echo "\n";
              echo "<br>";
              echo $_COOKIE[$cookie_name] . "<br>";
            }
          } else {
            header("Location:./signUpForm.php");
          }

          // $xml = simplexml_load_file("xml/userdata.xml");

          ?>

          <form method="post">
            <label for="closeacc">To close the account</label>
            <button type="submit" id="closeacc" name="closeacc" title="Close account and Delete my Data">
              <div>Go ahead</div>
            </button>
          </form>

          <?php

          if (array_key_exists('closeacc', $_POST)) {
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "userdata";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
              die("Connection failed: " . $conn->connect_error);
            }
            $query = mysqli_query($conn, "SELECT username FROM userinfo WHERE username = '$uname'");
            // $query2 = mysqli_query($conn, "SELECT username FROM userfeed WHERE username = '$uname'");
            // $query3 = mysqli_query($conn, "SELECT userskills FROM userinfo WHERE username = '$uname'");
            if (!$query) {
              echo "DB error";
            } else {
              $rows = $query->num_rows;
              if ($rows == 1) {
                $query_delete = mysqli_query($conn, "DELETE FROM userinfo WHERE username = '$uname'");
                // $query_delete = mysqli_query($conn, "DELETE FROM userinfo WHERE username = '$uname'");
                // $query_delete = mysqli_query($conn, "DELETE FROM userinfo WHERE username = '$uname'");
                if (!$query_delete) {
                  // header("Location:./signIn.php");
                } else {
                  header("Location:./index.php");
                }
              } else {
                header("Location:./index.php");
              }
            }
            $conn->close();
          }
          ?>

        </div>

      </div>

      <div class="crud">
        <form method="post">
          <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
            <label>FEEDBACK ABOUT HACK-A-THON</label>
            <select name="feedback" id="feedback">
              <option value="vgood">Very Good</option>
              <option value="good">Good</option>
              <option value="neutral">Neutral</option>
              <option value="bad">Bad</option>
            </select>
            <button type="submit" id="submitfeedback" name="submitfeedback" class="form-button" title="Close account and Delete my Data">
              <div>Submit Feedback</div>
            </button>
          </div>
        </form>

        <?php
        if (array_key_exists('submitfeedback', $_POST)) {
          $servername = "localhost";
          $username = "root";
          $password = "";
          $dbname = "userdata";
          $uname = $_SESSION['username'];

          $conn = new mysqli($servername, $username, $password, $dbname);
          if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
          }

          $exist = "SELECT username FROM userfeed WHERE username='$uname'";
          $query = mysqli_query($conn, $exist);
          if (!$query) {
            echo "DB error";
          }
          if ($query->num_rows == 1) {
            $feedback = $_POST['feedback'];
            $update = "UPDATE userfeed SET `feedback` = '$feedback' WHERE username = '$uname'";
            $q = mysqli_query($conn, $update);
            if (!$query) {
              die();
            }
            echo "Response updated...";
          } else {
            $feedback = $_POST['feedback'];
            $insertion = "INSERT INTO userfeed (`username`, `feedback`) VALUES ('$uname', '$feedback')";
            $q = mysqli_query($conn, $insertion);
            if (!$query) {
              die();
            }
            echo "Response saved...";
          }

          $conn->close();
        } else {
          echo "";
        }

        ?>
      </div>

    </div>

    <div id="gradient"></div>
  </main>

  <footer class="" id="contact" style="color: white">
    <div class="footer-title">Contact Us</div>
    <div class="footer-content">
      <div class="social-media">
        <a href="#contact" onmouseover="expand(this)" onmouseout="normal(this)" class="contact">
          <img src="./assets/contact/square-facebook-brands.svg" />
          <div href="#contact">
            Facebook
          </div>
        </a>
        <a href="#contact" onmouseover="expand(this)" onmouseout="normal(this)" class="contact">
          <img src="./assets/contact/instagram-brands.svg" />
          <div>
            Instagram
          </div>
        </a>
        <a href="#contact" onmouseover="expand(this)" onmouseout="normal(this)" class="contact">
          <img src="./assets/contact/twitter-brands.svg" />
          <div>
            Twitter
          </div>
        </a>
        <a href="#contact" onmouseover="expand(this)" onmouseout="normal(this)" class="contact">
          <img src="./assets/contact/envelope-solid.svg" />
          <div href="mailto:hackathon@gmail.com">
            Mail
          </div>
        </a>
        <a href="#contact" onmouseover="expand(this)" onmouseout="normal(this)" class="contact">
          <img src="./assets/contact/phone-solid.svg" />
          <div>
            Phone
          </div>
        </a>

      </div>

    </div>
    <div style="text-align: center;">
      <p class="w3-medium">© Copyright 2022</p>
    </div>
  </footer>

</body>
<script type="text/javascript" src="./js/functions.js"></script>

</html>