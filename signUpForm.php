<!DOCTYPE html>
<html lang="en">

<head>
  <title>HACKATHON</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="./signUpForm.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="icon" type="image/x-icon" href="assets/favicon.png" />

  <style>
    body nav {
      font-family: "Lato", sans-serif;
    }
  </style>
</head>

<body>



  <nav>
    <div>
      <a href="index.php" title="Go to Home page">
        <h2>
          <span style="font-weight: 900; color: rgb(75, 204, 0)">HACK-</span>A-THON
        </h2>
      </a>
      <div class="">
        <div>
          <a href="#" style="
                cursor: pointer;
                font-family: 'Courier New', Courier, monospace;
                font-size: 25px;
                font-weight: 600;
              ">
            Login Credentials
          </a>
        </div>

        <!-- <div class="button" title="Submit">
            <a href="/Lab-2/lab2.html">Submit</a>
          </div> -->
      </div>
    </div>
  </nav>
  <main>

    <form action="signUpAuth.php" method="post">
      <!--  -->
      <div class="part-form">
        <div class="input-title">
          <h3>SIGN UP</h3>
        </div>

        <div class="input-container">
          <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
            <label for="username">USERNAME</label>
            <input autofocus required id="username" name="username" type="text" placeholder="Enter a username" onkeyup='validateUname(this.value)'>
            <span id="userdesc"></span>
            <!-- style="display: none;" -->
            <!-- pattern="^[1-9]{1}[0-9]{1}[A-Za-z]{3}([0-9999]{4})$" -->
          </div>

          <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
            <label for="password">PASSWORD</label>
            <input required id="password" name="password" type="password" placeholder="Enter password" onkeyup="showlen(this)" />
            <div id="passlentext" style="display: none;">
              Password Length:<span id="passlen">0</span>
            </div>
          </div>

          <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
            <label for="confp">CONFIRM PASSWORD</label>
            <input required id="confp" name="confp" type="password" placeholder="Confirm password" />
            <div id="passconf"></div>
          </div>
        </div>
      </div>

      <br />

      <div class="form-buttons">
        <button id="form-button-submit" class="form-button" type="submit" onclick="confirm()">
          <div>Get Logged In</div>
          <img src="assets/circle-arrow-right-solid.svg" style="filter: invert(100%); width: 15px;" />
        </button>
        <!-- <input id="form-button-submit" class="form-button" type="submit" value="Next"/> -->
        <input class="form-button" id="reset" type="reset" />
      </div>

    </form>

      <div id="gradient"></div>
  </main>
</body>
<script src="js/functions.js"></script>

</html>

<!-- 
  https://www.javascripttutorial.net/javascript-dom/javascript-/
  ..add JS for others in skills
  ..add JS for changing color of border of fields when not filled and clicked on submit
  ..add arrow at right bottom corner to go up when we scroll down
 -->