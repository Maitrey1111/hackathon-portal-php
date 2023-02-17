<!DOCTYPE html>
<html lang="en">

<head>
  <title>HACKATHON</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="signUpForm.css" />
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
            Login to Account
          </a>
        </div>
      </div>
    </div>
  </nav>
  <main>
    <form action="signInAuth.php" method="post">
      <div class="part-form">
        <div class="input-title">
          <h3>SIGN IN</h3>
        </div>
        <div class="input-container">
          <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
            <label for="regno">USERNAME</label>
            <input required id="username" name="username" type="text" placeholder="Username" />
            <!-- pattern="^[1-9]{1}[0-9]{1}[A-Za-z]{3}([0-9999]{4})$" -->
          </div>
          <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
            <label for="password">PASSWORD</label>
            <input required id="password" name="password" type="password" placeholder="Password" />
            <div id="passlentext" style="display: none;">
              Password Length:<span id="passlen">0</span>
            </div>
          </div>
        </div>
      </div>

      <br />
      <div class="form-buttons">
        <!-- <a href="" type="submit" class="form-button" id="next">
          <div>Sign in</div>
          <img src="assets/circle-arrow-right-solid.svg" style="filter: invert(100%); width: 15px" />
        </a> -->
        <button id="form-button-submit" class="form-button" type="submit">
          <div>Sign In</div>
          <img src="assets/circle-arrow-right-solid.svg" style="filter: invert(100%); width: 15px;" />
        </button>
        <!-- <input class="form-button" id="reset" type="reset" /> -->
      </div>
    </form>

    <div id="gradient"></div>
  </main>
</body>
<script src="js/functions.js"></script>

</html>