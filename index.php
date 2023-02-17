<!DOCTYPE html>
<html lang="en">

<head>
    <title>HACKATHON</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="styles.css" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="icon" type="image/x-icon" href="assets/favicon.png">

    <style>
        body {
            font-family: "Lato", sans-serif;
        }
    </style>
</head>

<body onload="popup()">
    <nav>
        <div>
            <a href="#landing">
                <h2>
                    <span style="font-weight: 900; color: rgb(75, 204, 0)">HACK-</span>A-THON
                </h2>
            </a>

            <div class="">
                <div>
                    <a href="#landing" style="cursor: pointer;">Home</a>
                </div>
                <div>
                    <a href="#about" style="cursor: help;">About</a>
                </div>
                <div>
                    <a href="#contact" style="cursor: pointer;">Contact</a>
                </div>
                <div class="button" title="Sign In to Existing Account">
                    <a href="signIn.php">Sign In</a>
                </div>
            </div>
        </div>
    </nav>

    <main>
        <?php
            if (isset($_SESSION['username'])) {
                session_destroy();
            }
        ?>


        <div id="landing">
            <div class="title">
                <div style="
              padding: 0 50px 0 0;
              display: flex;
              flex-direction: column;
              row-gap: 10px;
            ">
                    <h1>
                        Build your own <br />Innovation<sub style="font-size: 30px">.exe</sub>
                    </h1>
                    <h2>#Find solutions for real-world problems</h2>
                </div>
                <a href="signUpForm.php" class="button" title="Register as new User">
                    <h4>Register now</h4>
                </a>
            </div>
            <div class="title-img">
                <img src="assets/undraw_in_thought_re_qyxl.svg" />
            </div>
        </div>

        <div id="about">
            <div class="about-title" style="
            padding: 0 50px 0 0;
            display: flex;
            flex-direction: column;
            row-gap: 10px;
          ">
                <h1>
                    About
                    <span style="font-family: 'Lato'">
                        <span style="font-weight: 900; color: rgb(75, 204, 0)">HACK-</span>A-THON
                    </span>
                </h1>
            </div>

            <div class="about-para">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae
                repudiandae nemo alias placeat ipsa culpa, dignissimos eaque
                cupiditate nesciunt quidem debitis explicabo suscipit hic unde eos
                <br />
                quia odio eius. Ducimus repellendus consequatur, expedita numquam quo
                obcaecati aspernatur totam asperiores? Sit debitis voluptatibus
                incidunt eius facilis tempora assumenda eum sunt quibusdam!
                <br />
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum eaque
                est atque unde numquam dignissimos provident repudiandae cupiditate
                voluptatibus non repellendus, culpa sunt vitae repellat!
                <br />
                At adipisci voluptate cupiditate quod modi molestias corporis ipsam
                non facilis eaque dolor quis optio quae alias commodi vitae laboriosam
                in, labore, dicta magni veniam.
            </div>
        </div>
        <div id="gradient"></div>
    </main>


    <footer class="" id="contact" style="color: white">
        <div class="footer-title">Contact Us</div>
        <div class="footer-content">
            <div class="social-media">
                <a onmouseover="expand(this)" onmouseout="normal(this)" href="#contact" class="contact">
                    <img src="assets/contact/square-facebook-brands.svg" />
                    <div>
                        Facebook
                    </div>
                </a>
                <a onmouseover="expand(this)" onmouseout="normal(this)" href="#contact" class="contact">
                    <img src="assets/contact/instagram-brands.svg" />
                    <div>
                        Instagram
                    </div>
                </a>
                <a onmouseover="expand(this)" onmouseout="normal(this)" href="#contact" class="contact">
                    <img src="assets/contact/twitter-brands.svg" />
                    <div>
                        Twitter
                    </div>
                </a>
                <a onmouseover="expand(this)" onmouseout="normal(this)" href="mailto:hackathon@gmail.com" class="contact">
                    <img src="assets/contact/envelope-solid.svg" />
                    <div>
                        Mail
                    </div>
                </a>
                <a onmouseover="expand(this)" onmouseout="normal(this)" href="#contact" class="contact">
                    <img src="assets/contact/phone-solid.svg" />
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
<script src="./js/functions.js"></script>

</html>