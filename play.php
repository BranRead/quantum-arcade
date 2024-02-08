<? php

    session_start();
    
    if (isset($_SESSION["userID"])) {
      $db = require __DIR__ . "/php/config.php";
      $sql = "SELECT * FROM users WHERE id = {$_SESSION["userID"]}";
      $result = $db->query($sql);
      $user = $result->fetch_assoc();
    } else {
        header("Location: index.html");
        exit;
    }
        $isInvalid = false;
    if ($_SERVER["REQUEST_METHOD"] == false) {
        $conn = require "config.php";
        $
        }
      session_start();
      if (!isset($_SESSION['user'])) {
          header('Location: index.html');
  }

  $conn = require "config.php";

  $sql = "select * from GamesList";
  $result = $conn.query($sql);
  if (!result) {
      trigger_error('Invalid query: ' . $conn->error)
  }
  $conn->close();
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
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link purple-text active" aria-current="page" href="play.html">Play</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link purple-text" href="#">Merch</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link purple-text" href="#">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link purple-text" href="#">Contact</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div>

            <!--Modal for login-->
            <div class="modal fade" id="login-modal" tabindex="-1" aria-labelledby="login-modal-label" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div id="modal-background-gradient"></div>
                        <div id="modal-background-image"></div>
                        <div id="modal-background-filter"></div>
                        <div class="modal-header">
                            <h2 class="modal-title white-text" id="login-modal-label">Ready for more?</h2>
                        </div>
                        <div class="modal-body">
                            <form action="#" method="post">
                                <div class="d-flex flex-column align-items-center">
                                    <input type="email" id="emailLogin" name="email" placeholder="email">
                                    <input type="password" id="passwordLogin" name="password" placeholder="password">

                                    <div class="d-flex flex-row align-items-center justify-content-between mt-3">
                                        <div class="me-4"><a href="#">Forgot Password?</a></div>
                                        <div><button class="sm-button ms-2" type="submit">Login</button></div>
                                    </div>
                                </div>
                            </form>
                            <div class="d-flex flex-column align-items-center">
                                <div class="orange-banner mt-3">
                                    <h2 class="white-text">Looking to get started?</h2>
                                </div>
                                <h2 class="white-text">Press start to join the fray</h2>
                                <button class="sm-button my-5" type="button">Start</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--End of modal for login-->

            <h1 class="purple-text text-center mt-5">Choose your destiny:</h1>
            <div class="d-flex flex-column py-5">
                <div class="d-flex flex-row align-items-center game-row-left">
                    <?php
                    while ($row = $result->fetch_Assoc()) {
                        echo "
                        <div class='img-game' data-bs-toggle=modal data-bs-target='#login-modal'>
                        <a class='quantum-game-link' href='#'><img class='quantum-game img-fluid' src='" . $row['url'] . "' alt=''></a>
                    </div>

                    <div class='game-title'>
                        <h2 class='white-text'>" . $row['name'] . "</h2>
                    </div>
                    ";
                    }
                    ?>
                    <div class="img-game" data-bs-toggle=modal data-bs-target="#login-modal">
                        <a class="quantum-game-link" href="#"><img class="quantum-game img-fluid" src="images/battyFarmingPlaceholder.png" alt=""></a>
                    </div>

                    <div class="game-title">
                        <h2 class="white-text">Batty Farming</h2>
                    </div>
                    <!-- <a class="quantum-game-link game-row-right" href="#"><img class="quantum-game img-fluid" src="images/Coming_soon.png" alt=""></a>
                <h2 class="white-text game-title game-row-left">Game 2</h2> -->
                </div>
                <div class="horizontal-line"></div>
                <div class="d-flex flex-row align-items-center  justify-content-end  game-row-right">
                    <div class="game-title">
                        <h2 class="white-text">Game 2</h2>
                    </div>
                    <div class="img-game">
                        <a class="quantum-game-link" href="#"><img class="quantum-game img-fluid" src="images/Coming_soon.png" alt=""></a>
                    </div>
                </div>
                <div class="horizontal-line"></div>
                <div class="d-flex flex-row align-items-center game-row-left">
                    <div class="img-game">
                        <a class="quantum-game-link" href="#"><img class="quantum-game img-fluid" src="images/Coming_soon.png" alt=""></a>
                    </div>
                    <div class="game-title">
                        <h2 class="white-text">Game 3</h2>
                    </div>
                    <!-- <a class="quantum-game-link game-row-right" href="#"><img class="quantum-game img-fluid" src="images/Coming_soon.png" alt=""></a>
                <h2 class="white-text game-title game-row-left">Game 4</h2> -->
                </div>
                <div class="horizontal-line"></div>
                <div class="d-flex flex-row align-items-center justify-content-end game-row-right">
                    <div class="game-title">
                        <h2 class="white-text">Game 4</h2>
                    </div>
                    <div class="img-game">
                        <a class="quantum-game-link" href="#"><img class="quantum-game img-fluid" src="images/Coming_soon.png" alt=""></a>
                    </div>
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
