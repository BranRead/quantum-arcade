<?php
session_start();

if (isset($_SESSION["userID"])) {
  $db = require __DIR__ . "/php/config.php";
  $sql = "SELECT * FROM users WHERE id = {$_SESSION["userID"]}";
  $result = $db->query($sql);
  $user = $result->fetch_assoc();
}
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
        <div>
          <a class="navbar-brand" href="index.php">
            <img id="navbar-logo" src="images/fulllogo_transparent_nobuffer.png" alt="Logo for website">
          </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link purple-text" href="play.php">Play</a>
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
    <div id="main-body" class="d-flex flex-row justify-content-between">
      <div class="pt-5">
        <h2 class="purple-text">YOUR QUEST FOR HIGH SCORE GLORY STARTS HERE</h2>
        <h2 class="white-text">
          Quantum Arcade: A nexus of challenge and triumph. Brace for a journey where every game is a battle for high-score supremacy.
        </h2>
        <h2 class="white-text">The arcade revolution awaits...</h2>
        <div class="d-flex flex-row justify-content-center">
          <button id="to-games-button" class="btn" type="button">Ready Player One?</button>
        </div>
      </div>
      <div>
        <img id="front-page-img" src="images/High_Score_Glory.png" alt="">
      </div>
    </div>
  </div>
  <div id="quantum-swag">
    <h1 class="purple-text">Quantum Swag</h1>
    <div class="d-flex flex-wrap flex-row justify-content-between">
      <a class="quantum-swag-link ms-2" href="#">
        <img class="quantum-swag img-fluid" src="images/Coming_soon.png" alt="">
      </a>
      <a class="quantum-swag-link" href="#">
        <img class="quantum-swag img-fluid" src="images/Coming_soon.png" alt="">
      </a>
      <a class="quantum-swag-link" href="#">
        <img class="quantum-swag img-fluid" src="images/Coming_soon.png" alt="">
      </a>
      <a class="quantum-swag-link" href="#">
        <img class="quantum-swag img-fluid" src="images/Coming_soon.png" alt="">
      </a>
    </div>
  </div>
  <div id="footer" class="d-flex flex-column align-items-center">
    <div id="logo-footer-div">
      <img id="logo-footer" src="images/fulllogo_transparent.png" alt="Website Logo">
    </div>
    <div class="d-flex flex-row justify-content-center">
      <a href="#">
        <img class="social-media-link mx-3" src="images/twitch.png" alt="">
      </a>
      <a href="#">
        <img class="social-media-link mx-3" src="images/Intagram.png" alt="">
      </a>
      <a href="#">
        <img class="social-media-link mx-3" src="images/facebook.png" alt="">
      </a>
    </div>
    <div>
      <p id="footer-copyright" class="white-text">© 2023 Omega Squad. All rights reserved.</p>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <script src="scripts/script.js"></script>
</body>

</html>
