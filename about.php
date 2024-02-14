<?php
// This isn't needed since it's done on updateUsername.php. That file won't fun unless it's called there.
//session_start();
require_once "php/crud.php";
require_once "php/login.php";
require_once "php/updateUsername.php";
?>

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
                <img class="displayPic" src="images/default-profile-pic.png" alt="" data-bs-toggle=modal data-bs-target=<?php if(!isset($_SESSION['userID'])) : echo "#login-modal"; else : echo "#user-settings"; endif;?>>
                <p id="displayedUsername" class="text-center white-text"><?php if(isset($_SESSION['userID'])) : echo $_SESSION['userName']; else : echo "UserName"; endif;?></p>
                <div class="mx-2 d-flex flex-row align-items-center">
                    <form id="changeUsernameForm" method="post" action="php/updateUsername.php">
                        <input id="changeUsernameInput" class="form-input-small" name="changeUsernameInput" placeholder="">
                        <button class="xtra-sm-button"  name="location"  value="about.php" type="submit">Submit</button>
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
                        <a class="nav-link purple-text active" href="about.php"  aria-current="page" >About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link purple-text" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!--Modal for user settings-->
    <div class="modal fade" id="user-settings" tabindex="-1" aria-labelledby="login-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-background-gradient"></div>
                <div class="modal-background-image"></div>
                <div class="modal-background-filter"></div>
                <div class="modal-header">
                    <h2 class="modal-title white-text" id="login-modal-label">User Settings</h2>
                </div>
                <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                    <button class="white-text sm-button-settings my-3" data-bs-toggle=modal data-bs-target="#password-change-modal">Change Password</button>
                    <a href="php/logout.php"><button class="white-text sm-button-settings my-3">Sign Out</button></a>
                    <button class="white-text sm-button-settings my-3" data-bs-toggle=modal data-bs-target="#reset-scores-modal">Reset All Scores</button>
                    <button class="white-text sm-button-settings my-3" data-bs-toggle=modal data-bs-target="#delete-account-modal">Delete Account</button>
                </div>
            </div>
        </div>
    </div>
    <!--End of modal for user settings-->

    <!--Modal for change password-->
    <div class="modal fade" id="password-change-modal" tabindex="-1" aria-labelledby="login-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-background-gradient"></div>
                <div class="modal-background-image"></div>
                <div class="modal-background-filter"></div>
                <div class="modal-header">
                    <h2 class="modal-title white-text" id="login-modal-label">Change Password</h2>
                </div>
                <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                    <form action="#" method="post">
                        <div class="d-flex flex-column align-items-center">
                            <input type="password" id="oldPassword" class="form-input" name="oldPassword" placeholder="Old Password">
                            <input type="password" id="newPassword" class="form-input" name="newPassword" placeholder="New Password">
                            <input type="password" id="newPasswordConfirm" class="form-input" name="newPasswordConfirm" placeholder="Retype New Password">
                            <button class="sm-button mt-4" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--End of modal for change password-->

    <!--Modal for reset scores-->
    <div class="modal fade" id="reset-scores-modal" tabindex="-1" aria-labelledby="login-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-background-gradient"></div>
                <div class="modal-background-image"></div>
                <div class="modal-background-filter"></div>
                <div class="modal-header warning-banner">
                    <h2 class="modal-title white-text" id="login-modal-label">&#9888 Reset Scores &#9888</h2>
                </div>
                <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                    <form action="#" method="post">
                        <div class="d-flex flex-column align-items-center">
                            <input type="password" id="passwordResetScores" class="form-input" name="password" placeholder="Password">
                            <input type="password" id="passwordConfirmResetScores" class="form-input" name="passwordConfirm" placeholder="Confirm Password">
                        </div>
                    </form>
                    <button class="sm-button mt-4" data-bs-toggle=modal data-bs-target="#reset-scores-confirm-modal">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!--End of modal for reset scores-->

    <!--Modal for reseting scores verification-->
    <div class="modal fade" id="reset-scores-confirm-modal" tabindex="-1" aria-labelledby="login-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-background-gradient"></div>
                <div class="modal-background-image"></div>
                <div class="modal-background-filter"></div>
                <div class="modal-header">
                    <h2 class="modal-title white-text" id="login-modal-label">&#9888 Warning &#9888</h2>
                </div>
                <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                    <div class="confirm-modal">
                        <p>This action can not be reversed!</p>
                        <p>Once you press "Confirm" your scores will be lost permanently.</p>
                        <p>Please be absolutely sure you wish to continue before clicking the big red button!</p>
                    </div>
                    <button id="submitResetScores" class="bg-red-button mt-4 p-4">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!--End of modal for deleting account verification-->


    <!--Modal for deleting account-->
    <div class="modal fade" id="delete-account-modal" tabindex="-1" aria-labelledby="login-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-background-gradient"></div>
                <div class="modal-background-image"></div>
                <div class="modal-background-filter"></div>
                <div class="modal-header warning-banner">
                    <h2 class="modal-title white-text" id="login-modal-label">&#9888 Delete Account &#9888</h2>
                </div>
                <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                    <form action="#" method="post">
                        <div class="d-flex flex-column align-items-center">
                            <input type="password" id="password" class="form-input" name="password" placeholder="Password">
                            <input type="password" id="passwordConfirm" class="form-input" name="passwordConfirm" placeholder="Confirm Password">

                        </div>
                    </form>
                    <button class="sm-button mt-4" data-bs-toggle=modal data-bs-target="#delete-account-confirm-modal">Submit</button>
                </div>
            </div>
        </div>
    </div>
    <!--End of modal for deleting account-->

    <!--Modal for deleting account verification-->
    <div class="modal fade" id="delete-account-confirm-modal" tabindex="-1" aria-labelledby="login-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-background-gradient"></div>
                <div class="modal-background-image"></div>
                <div class="modal-background-filter"></div>
                <div class="modal-header">
                    <h2 class="modal-title white-text" id="login-modal-label">&#9888 Warning &#9888</h2>
                </div>
                <div class="modal-body d-flex flex-column justify-content-center align-items-center">
                    <div class="confirm-modal">
                        <p>This action can not be reversed!</p>
                        <p>Once you press "Confirm" all data will be lost permanently.</p>
                        <p>Please be absolutely sure you wish to continue before clicking the big red button!</p>
                    </div>
                    <button id="submitDeleteAccount" class="bg-red-button mt-4 p-4">Confirm</button>
                </div>
            </div>
        </div>
    </div>
    <!--End of modal for deleting account verification-->

    <div class="container-fluid mt-5 pb-5 white-text">
        <div class="row">
            <div class="offset-lg-1 col-lg-5">
                <h1 class="purple-text text-center">About Omega Squad</h1>
                <h2>
                    Once upon a semester, four programming students—united by their passion for gaming and coding—formed
                    the legendary Omega Squad. Tasked with a group project, we decided to embark on a quest to blend
                    our skills in a way only true IT enthusiasts could.
                </h2>
            </div>
            <div id="omegaLogoAbout" class="offset-lg-1 col-lg-4">
                <img class="img-fluid" src="/images/omegaSquadLogo.png">
            </div>
        </div>

        <div class="horizontal-line mb-5"></div>

        <h1 class="text-center purple-text">Meet the Squad</h1>

        <div id="about-us-row" class="row align-items-start d-flex flex-row justify-content-center mb-5">
            <div class="team-about-card d-flex flex-column justify-content-center text-center">
                <img src="/images/teamImages/frontEnd.png">
                <h2>The Front-End Wizard</h2>
                <h3>
                    Master of pixels, conjurer of UIs, and a firm believer that "if it's not broken,
                    it doesn't have enough features yet."
                </h3>
            </div>
            <div class="team-about-card d-flex flex-column justify-content-center text-center">
                <img src="/images/teamImages/backEnd.png">
                <h2>The Back-End Guru</h2>
                <h3>
                    Whisperer to servers, tamer of databases,
                    and always on a quest to find the most elegant code to solve the most complex problems.
                </h3>
            </div>
            <div class="team-about-card d-flex flex-column justify-content-center text-center">
                <img src="/images/teamImages/database.png">
                <h2>The Database Architect</h2>
                <h3>
                    Guardian of data, seeker of efficiency,
                    and has a personal vendetta against slow queries and unoptimized schemas.
                </h3>
            </div>
            <div class="team-about-card d-flex flex-column justify-content-center text-center">
                <img src="/images/teamImages/gameMechanic.png">
                <h2>The Game Mechanic</h2>
                <h3>
                    Dreamer of worlds, crafter of challenges,
                    and can turn coffee into code that makes you say, "Just one more level."
                </h3>
            </div>
        </div>
        <div class="horizontal-line mb-5"></div>
        <div class="row">
            <div class="offset-lg-1 col-lg-10">
                <h3 class="mb-3">
                    Our mission was simple yet ambitious:
                    to create a website that not only showcases our technical prowess but
                    also serves as a battleground for our game development dreams.
                    From sleek front-end designs to robust back-end systems,
                    every pixel and line of code on this site is infused with our geeky passion.
                </h3>
                <h3 class="mb-3">
                    The Result: A capstone project turned digital playground.
                    Here, you'll find games that are not just a testament to our journey from
                    students to tech-savvy heroes but also a tribute to our collective gaming nerd culture.
                </h3>
                <h3 class="mb-3">
                    Welcome to Omega Squad's realm, where coding meets gaming.
                    Enjoy your stay, and remember, great things happen when nerds unite.
                </h3>
                <h2 class="text-center my-5">
                    Omega Squad - Where Code and Gaming Collide.
                </h2>
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
<script src="/scripts/script.js"></script>
</body>
</html>