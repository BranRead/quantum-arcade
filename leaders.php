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
                <img src="images/default-profile-pic.png" alt="" data-bs-toggle=modal data-bs-target="#user-settings">
                <p class="text-center white-text">UserName</p>
            </div>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link purple-text" href="play.php">Play</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link purple-text active" aria-current="page" href="leaders.php">Leaders</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link purple-text" href="about.html">About Us</a>
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
                        <button class="white-text sm-button-settings my-3">Sign Out</button>
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
                                <input type="password" id="password" class="form-input" name="password" placeholder="Password">
                                <input type="password" id="passwordConfirm" class="form-input" name="passwordConfirm" placeholder="Confirm Password">

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

      <div class="d-flex flex-column align-items-center">
        <p id="leadersTitle" class="purple-text">Current Masters of their Domain</p>
      </div>

      <div class="container-fluid">
            
        <div class="row justify-content-around my-3">
            <div class="col-lg-5 leaderboard-card" style="background-image: url('/images/gameimages/battyFarming.png')">
                <div class="header-leaderboard text-center white-text"><h2>Batty Farming</h2></div>
                <table class="leaderboard-table white-text">
                    <thead>
                        <tr>
                            <th scope="col">Rank</th>
                            <th scope="col">Player</th>
                            <th scope="col">Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="table-row">
                            <th scope="row">#1</th>
                            <td><img class="leaderboard-display-pic" src="images/default-profile-pic.png" alt="">Username</td>
                            <td>100 000 000</td>
                        </tr>
                        <tr class="table-row">
                            <th scope="row">#2</th>
                            <td>Username</td>
                            <td>100 000 000</td>
                        </tr>
                        <tr class="table-row">
                            <th scope="row">#3</th>
                            <td>Username</td>
                            <td>100 000 000</td>
                        </tr>
                        <tr class="table-row">
                            <th scope="row">#4</th>
                            <td>Username</td>
                            <td>100 000 000</td>
                        </tr>
                        <tr class="table-row">
                            <th scope="row">#5</th>
                            <td>Username</td>
                            <td>100 000 000</td>
                        </tr>
                        <tr class="table-row">
                            <th scope="row">#6</th>
                            <td>Username</td>
                            <td>100 000 000</td>
                        </tr>
                        <tr class="table-row">
                            <th scope="row">#7</th>
                            <td>Username</td>
                            <td>100 000 000</td>
                        </tr>
                        <tr class="table-row">
                            <th scope="row">#8</th>
                            <td>Username</td>
                            <td>100 000 000</td>
                        </tr class="table-row">
                        <tr class="table-row">
                            <th scope="row">#9</th>
                            <td>Username</td>
                            <td>100 000 000</td>
                        </tr>
                        <tr class="table-row">
                            <th scope="row">#10</th>
                            <td>Username</td>
                            <td>100 000 000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-5 leaderboard-card" style="background-image: url('/images/gameimages/bolt.png')">
                <div class="header-leaderboard text-center white-text"><h2>Bolt</h2></div>
                <table class="leaderboard-table white-text">
                    <thead>
                    <tr>
                        <th scope="col">Rank</th>
                        <th scope="col">Player</th>
                        <th scope="col">Score</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr class="table-row">
                        <th scope="row">#1</th>
                        <td><img class="leaderboard-display-pic" src="images/default-profile-pic.png" alt="">Username</td>
                        <td>100 000 000</td>
                    </tr>
                    <tr class="table-row">
                        <th scope="row">#2</th>
                        <td>Username</td>
                        <td>100 000 000</td>
                    </tr>
                    <tr class="table-row">
                        <th scope="row">#3</th>
                        <td>Username</td>
                        <td>100 000 000</td>
                    </tr>
                    <tr class="table-row">
                        <th scope="row">#4</th>
                        <td>Username</td>
                        <td>100 000 000</td>
                    </tr>
                    <tr class="table-row">
                        <th scope="row">#5</th>
                        <td>Username</td>
                        <td>100 000 000</td>
                    </tr>
                    <tr class="table-row">
                        <th scope="row">#6</th>
                        <td>Username</td>
                        <td>100 000 000</td>
                    </tr>
                    <tr class="table-row">
                        <th scope="row">#7</th>
                        <td>Username</td>
                        <td>100 000 000</td>
                    </tr>
                    <tr class="table-row">
                        <th scope="row">#8</th>
                        <td>Username</td>
                        <td>100 000 000</td>
                    </tr class="table-row">
                    <tr class="table-row">
                        <th scope="row">#9</th>
                        <td>Username</td>
                        <td>100 000 000</td>
                    </tr>
                    <tr class="table-row">
                        <th scope="row">#10</th>
                        <td>Username</td>
                        <td>100 000 000</td>
                    </tr>
                    </tbody>
                </table>
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