<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quantum Arcade</title>
    <link rel="icon" type="image/x-icon" href="/images/tabIcon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Gemunu+Libre&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="stylesheets/styles.css">
</head>
<body>
<div class="upper-gradient">
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex justify-content-between">
            <div><a class="navbar-brand" href="index.html"><img id="navbar-logo"  src="images/fulllogo_transparent_nobuffer.png" alt="Logo for website"></a></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div id="profileTitle" class="d-flex flex-row align-items-center">
                <img class="displayPic" src="images/default-profile-pic.png" alt="" data-bs-toggle=modal data-bs-target="#user-settings">
                <p id="displayedUsername" class="text-center white-text">UserName</p>
                <div class="mx-2 d-flex flex-row align-items-center">
                    <form id="changeUsernameForm" method="post" action="">
                        <input id="changeUsernameInput" class="form-input-small" name="changeUsernameInput" placeholder="">
                        <button class="xtra-sm-button" type="submit">Submit</button>
                    </form>
                </div>
                <img id="changeUsername" src="/images/settingsIcon.png" alt="Settings">
            </div>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link purple-text" href="play.php">Play</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link purple-text" href="leaders.php">Leaders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link purple-text" href="about.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link purple-text active" aria-current="page" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid mb-5">
        <h2 class="text-center mt-3">Contact the Squad</h2>
        <div class="horizontal-line"></div>
        <div class="row mt-3">

            <div id="contact-text"class="col-lg-5 white-text  offset-lg-1 ">
                <p>Need to get in touch with the Quantum Arcade team? We're just a pixel away!</p>
                <div>
                    What's on your mind?
                    <ol>
                        <li>💡 Genius game ideas </li>
                        <li>🚨 Bug Alerts</li>
                        <li>🛠️ Collaborative ventures</li>
                        <li>🌌 Whatever's floating in your gaming galaxy</li>
                    </ol>
                </div>
                <p>Use the form over there to send your signal, and we'll beam back a response faster than you can say "high score"! </p>
                <p>P.S. If you spot any oddities on our site, blame our virtual raccoon, "Buggy." He's mischievous, but we love him! 🦝</p>
            </div>

            <div class="col-lg-5">
                <div id="contactFormContainer" class="d-flex flex-column justify-content-center">
                    <div class="orange-header"><h1 class="white-text">Hit us up!</h1></div>
                    <form action="" class="d-flex flex-column justify-content-center p-4" method="post" id="contactForm">
                        <div class="d-flex flex-row justify-content-between">
                            <input id="contact-name" class="form-input" type="text" name="name" placeholder="Name">
                            <input class="form-input" type="email" name="email" placeholder="Email">
                        </div>
                        <input class="form-input" type="text" name="subject" placeholder="Subject">
                        <textarea class="form-input" rows="5" name="message" form="contactForm" placeholder="Your thoughts"></textarea>
                        <button class="sm-button mx-auto my-2" type="submit">Submit</button>
                    </form>

                </div>
            </div>
    </div>
</div>
    <div id="footer" class="d-flex flex-column align-items-center">
        <div id="logo-footer-div">
            <img id="logo-footer" src="images/fulllogo_transparent.png" alt="Website Logo">
        </div>
        <div class="d-flex flex-row justify-content-center">
            <a href="#"><img class="social-media-link mx-3" src="images/twitch.png" alt=""></a>
            <a href="#"><img class="social-media-link mx-3" src="images/Intagram.png" alt=""></a>
            <a href="#"><img class="social-media-link mx-3" src="images/facebook.png" alt=""></a>
        </div>
        <div>
            <p id="footer-copyright" class="white-text">© 2023 Omega Squad. All rights reserved.</p>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="scripts/script.js"></script>
</body>
</html>