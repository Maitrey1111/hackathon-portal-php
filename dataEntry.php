<!DOCTYPE html>
<html lang="en">
<?php


?>

<head>
  <title>HACKATHON</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="stylesheet" href="dataEntry.css" />
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
            <!-- Other Required Credentials for -->
            <?php
            session_start();
            // include "./auth.php";
            if (isset($_SESSION['signup'])) {
              $_SESSION['signup'] = TRUE;
              $_SESSION['signin'] = FALSE;

              echo $_SESSION['username'] . "'s Session and DB functional";
            }

            ?>
          </a>
        </div>
      </div>
    </div>
  </nav>
  <main>
    <form action="home.php" method="post">
      <div id="data">
        <div class="part-form">
          <div class="input-title">
            <h3>Personal Data</h3>
          </div>
          <div class="input-container">
            <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
              <label autofocus for="name">NAME</label>
              <input required placeholder="John Smith" id="name" type="text" name="name" autofocus />
            </div>

            <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
              <label for="email">EMAIL</label>
              <input required placeholder="xyz@domain.com" id="email" type="email" name="email" onkeyup="validateEmail(this.value)" />
              <div id="emailvalidity"></div>
              <!-- style="display: none;" -->
            </div>

            <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
              <label for="bdate">BIRTHDATE</label>
              <input id="bdate" type="date" name="bdate" style="font-family: 'Lato'" />
            </div>

            <div class="side-inputs">
              <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
                <label for="age">AGE</label>
                <input id="age" type="number" name="age" min="13" placeholder="years" />
                <!-- <output name="x" for="a"></output> -->
              </div>
              <div class="radio">
                <fieldset>
                  <legend>GENDER</legend>
                  <div class="radio-buttons">
                    <div class="radio-option">
                      <input type="radio" name="gender" value="male" id="male" checked />
                      <label for="male">Male</label>
                    </div>
                    <div class="radio-option">
                      <input type="radio" name="gender" value="female" id="female" />
                      <label for="female">Female</label>
                    </div>
                    <div class="radio-option">
                      <input type="radio" name="gender" value="other" id="other" />
                      <label for="other">Other</label>
                    </div>
                  </div>
                </fieldset>
              </div>
            </div>

            <!-- <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
              <label>NATIONALITY</label>
              <input name="nationality" list="nationality" />
              <datalist id="nationality">
                <option selected value="Indian"></option>
                <option value="NRI"></option>
                <option value="Non-Indian"></option>
              </datalist>
            </div> -->

            <!-- <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
              <label>ADDRESS</label>
              <textarea name="address"></textarea>
            </div> -->
          </div>
        </div>

        <div class="part-form">
          <div class="input-title">
            <h3>Academic Data</h3>
          </div>
          <div class="input-container">
            <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
              <label for="regno">REG NO</label>
              <input required id="regno" name="regno" type="text" onkeyup="validateRegno(this.value)" pattern="^[1-9]{1}[0-9]{1}[A-Za-z]{3}([0-9999]{4})$" />
              <div id="regnovalidity"></div>
            </div>

            <div class="input-section" onmouseover="highlight(this)" onmouseout="unhighlight(this)">
              <label>COLLEGE</label>
              <select name="college">
                <option value="vitv">VIT, Vellore</option>
                <option value="vitc">VIT, Chennai</option>
                <option value="vitap">VIT, AP</option>
                <option value="vitb">VIT, Bhopal</option>
              </select>
            </div>

            <div class="radio">
              <fieldset>
                <legend>SKILLS</legend>
                <div class="checkboxes">
                  <div>
                    <input type="checkbox" id="html" name="lang1" value="html" />
                    <label for="html">HTML</label>
                  </div>
                  <div>
                    <input type="checkbox" id="css" name="lang2" value="css" />
                    <label for="css">CSS</label>
                  </div>
                  <div>
                    <input type="checkbox" id="js" name="lang3" value="js" />
                    <label for="js">JavaScript</label>
                  </div>
                  <div>
                    <input type="checkbox" id="php" name="lang4" value="php" />
                    <label for="php">PHP</label>
                  </div>
                  <div style="display: flex; align-items: center;column-gap: 4px;">
                    <input onclick="showup('other-lang')" type="checkbox" id="others" name="lang" value="other" />
                    <label for="others" id="otherlang-option">Other</label>
                    <input autofocus id="other-lang" style="
                          width: 80px;
                          font-size: 15px;
                          padding: 3px 3px;
                          margin-left: 5px;
                          border-radius: 5px;
                          display: none;
                        " type="input" id="other" name="lang5" />
                  </div>
                  <div></div>
                </div>
              </fieldset>
            </div>

            <!-- <div class="input-section">
              <label>UPLOAD YOUR IMAGE</label>
              <input type="file" accept="image/*" name="image" />
              required
            </div> -->
          </div>
        </div>
      </div>
      <div id="submit">
        <!-- <a href="" class="form-button" id="logout-back">
          <div>Skip</div>
          <img src="assets/circle-arrow-right-solid.svg" style="filter: invert(100%); width: 15px" />
        </a> -->
        <input class="form-button" type="submit" value="Submit and Continue" />
      </div>
    </form>
  </main>
</body>
<script src="js/functions.js"></script>

</html>