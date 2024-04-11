<?php

require_once "php/crud.php";
require_once "php/login.php";
require_once "php/updateUsername.php";

$crud = new crud();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    (new login)->logUserIn();
}



if (isset($_GET['deleteID'])) {
    $accountID = $_GET['deleteID'];

    try {
        $crud->deleteAccount($accountID);
        $crud->deleteScores($accountID);
    } catch (Exception $e) {
        die("err: " . $e->getMessage());
    }
}

if (isset($_GET["scoreID"])) {
    $scoreID = $_GET["scoreID"];

    try {
        $crud->deleteScores($scoreID);
    } catch (Exception $e) {
        die("err: " . $e->getMessage());
    }
}

$games = $crud->read('SELECT * FROM gamelist');
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
                <div><a class="navbar-brand" href="index.html"><img id="navbar-logo" src="images/fulllogo_transparent_nobuffer.png" alt="Logo for website"></a></div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div id="profileTitle" class="d-flex flex-row align-items-center">
                    <img class="displayPic" src="images/default-profile-pic.png" alt="" data-bs-toggle=modal data-bs-target=<?php if(!isset($_SESSION['userID'])) : echo "#login-modal"; else : echo "#user-settings"; endif;?>>
                    <?php if (isset($_SESSION['userName'])): ?>
                    <p id="displayedUsername" class="text-center white-text"><?php if(isset($_SESSION['userID'])) : echo $_SESSION['userName']; else : echo "UserName"; endif;?></p>
                    <div class="mx-2 d-flex flex-row align-items-center">
                        <form id="changeUsernameForm" method="post" action="php/updateUsername.php">
                            <input id="changeUsernameInput" class="form-input-small" name="changeUsernameInput" placeholder="">
                            <button class="xtra-sm-button" name="location" value="play.php" type="submit">Submit</button>
                        </form>
                    </div>

                    <img  title="Change username" id="changeUsername" src="/images/settingsIcon.png" alt="Settings">
                    <?php endif; ?>
                </div>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link purple-text active" aria-current="page" href="play.php">Play</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link purple-text" href="leaders.php">Leaders</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link purple-text" href="about.php">About Us</a>
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
              <form action="php/updatePassword.php" method="post">
                <div class="d-flex flex-column align-items-center">
                  <input type="password" id="oldPassword" class="form-input" name="oldPassword" placeholder="Old Password">
                  <input type="password" id="newPassword" class="form-input" name="newPassword" placeholder="New Password">
                  <input type="password" id="newPasswordConfirm" class="form-input" name="newPasswordConfirm" placeholder="Retype New Password">
                  <button class="sm-button mt-4" name="location" value="play.php"  type="submit">Submit</button>
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
            <button id="submitResetScores" class="bg-red-button mt-4 p-4"><?php echo "<a href='play.php?scoreID=" . $_SESSION["userID"] . "'>"?>Confirm</a></button>
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
              <button id="submitDeleteAccount" class="bg-red-button mt-4 p-4"><?php echo "<a href='play.php?deleteID=" . $_SESSION['userID'] . "'>"?>Confirm</a></button>
          </div>
        </div>
      </div>
    </div>
    <!--End of modal for deleting account verification-->

    <!--Modal for login-->
    <?php if (!isset($_SESSION['userName'])): ?>
    <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="login-modal-label" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-background-gradient"></div>
                <div class="modal-background-image"></div>
                <div class="modal-background-filter"></div>
                <div class="modal-header">
                    <h2 class="modal-title white-text" id="login-modal-label">Ready for more?</h2>
                </div>
                <div class="modal-body">
                    <form action="#" method="post">
                        <div class="d-flex flex-column align-items-center">
                            <input type="email" id="emailLogin" class="form-input" name="email" placeholder="email" value="<?php htmlspecialchars(isset($_POST["emailLogin"]) ? $_POST["emailLogin"] : "")?>">
                            <input type="password" id="passwordLogin" class="form-input" name="password" placeholder="password">
                            <div class="d-flex flex-row"><input type="checkbox" class="passwordShow" onclick="togglePassword('passwordLogin', 'passwordShowLogin')"><span id="passwordShowLogin" class="white-text">Show password</span></div>
                            <div class="d-flex flex-row align-items-center justify-content-between mt-3">
                                <div class="me-4"><a href="#">Forgot Password?</a></div>
                                <div><button class="sm-button ms-2" type="submit" onclick="validateSignIn()">Login</button></div>
                            </div>
                        </div>
                    </form>
                    <div class="d-flex flex-column align-items-center">
                        <div class="orange-banner mt-3">
                            <h2 class="white-text">Looking to get started?</h2>
                            <div class="horizontal-line" style="background-color: white"></div>
                            <h2 class="white-text">Register to join the fray</h2>
                        </div>

                        <button class="sm-button my-5" type="button" data-bs-toggle=modal data-bs-target="#register-modal">Register</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End of modal for login-->

     <!--Modal for registration-->
     <div class="modal fade" id="register-modal" tabindex="-1" aria-labelledby="login-modal-label" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
              <div class="modal-background-gradient"></div>
              <div class="modal-background-image"></div>
              <div class="modal-background-filter"></div>
              <div class="modal-header">
                <h2 class="modal-title white-text" id="login-modal-label">Registration</h2>
              </div>
              <div class="modal-body">
                  <form action="php/processSignUp.php" method="post">
                      <div class="d-flex flex-column align-items-center">
                          <input type="email" id="emailRegister" class="form-input" name="email" placeholder="email" required>
                          <input type="text" id="userNameRegister" class="form-input" name="username" placeholder="username" required>
                          <input type="password" id="passwordRegister" class="form-input" name="password" placeholder="password" required>
                          <input type="password" id="passwordRegisterConfirm" class="form-input" name="passwordConfirm" placeholder="confirm password" required>
                      </div>
                      <div class="d-flex flex-column align-items-center">
                          <button class="sm-button my-5" type="submit" onclick="return validateSignUp()">Submit</button>
                      </div>
                 </form>
              </div>
            </div>
          </div>
      </div>
      <?php endif; ?>
      <!--End of modal for registration-->

    <h1 class="purple-text text-center mt-5">Choose your destiny:</h1>
    <div class="container-fluid py-5">
        <?php
            $isFirstOne = true;
            while ($row = $games->fetch_assoc()) {
                if($isFirstOne){
                        $isFirstOne = false;
                    } else {
                        echo "<div class='horizontal-line'></div> ";
                    }
                if ($row['game_id'] % 2 == 0) {
                    echo "<div class='row'>
                                <div class='game-title text-center offset-4 col-lg-4'>
                                    <h2>" . $row['title'] . "</h2>
                                    <p>" . $row['description'] . "</p>
                                </div>
                                <div class='img-game d-flex justify-content-center col-lg-4'>
                                    <a class='quantum-game-link' href='" . $row['game_url'] . "'><img class='quantum-game img-fluid' src='" . $row['image_url'] . "' alt=''></a>
                                </div>
                          </div>";
                } else {
                    echo "<div class='row'>
                        <div class='img-game d-flex justify-content-center col-lg-4'>
                           <a class='quantum-game-link' href='" . $row['game_url'] . "'><img class='quantum-game img-fluid' src='" . $row['image_url'] . "' alt=''></a>
                        </div>
                        <div class='game-title text-center col-lg-4'>
                           <h2>" . $row['title'] . "</h2>
                           <p>" . $row['description'] . "</p>
                        </div>
                    </div>";
                }
            }
        ?>
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
    <script src="scripts/validation.js"></script>
</body>

</html>