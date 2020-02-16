<?php
  session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Game of Thrones</title>
    <link rel="stylesheet" href="public/OwlCarousel2-2.3.4/docs/assets/css/docs.theme.min.css">
    <link rel="stylesheet" href="public/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="public/OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="public/OwlCarousel2-2.3.4/docs/assets/vendors/jquery.min.js"></script>
    <script src="public/OwlCarousel2-2.3.4/docs/assets/owlcarousel/owl.carousel.js"></script>
    <link rel="stylesheet" href="public/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/nselect/build/jquery.nselect.css">
  </head>
  <body>
    <div class="grid">
      <div class="owl-carousel  grid-item left_sidebar">
        <div class="item">
          <img class="image_slide" src="public/img/new753c11c098aee9c16140cc8bc46a17c3.jpg" alt="Foto dragon">
        </div>
        <div class="item">
          <img class="image_slide" src="public/img/small_388c5c6a7543eb4eab3c4ff817b4a7c0.jpg" alt="Foto Granjoy" value="Greyjoy">
        </div>
        <div class="item">
          <img class="image_slide" src="public/img/New Lannister.jpg" alt="Foto Lannister" value="Lannister">
        </div>
        <div class="item">
          <img class="image_slide" src="public/img/new28d136fe3c0721efe8c410ef9a70af2a.jpg" alt="Foto Daenerys Targaryen">
        </div>
        <div class="item">
          <img class="image_slide" src="public/img/small_749440bae8f9daae56b10150672a9db2.jpg" alt="Foto Arren" value="Arryn">
        </div>
        <div class="item">
          <img class="image_slide" src="public/img/small_abb5ea539bbd6a9edef8e5bad640ac80.jpg" alt="Foto Targaryen" value="Targaryen">
        </div>
        <div class="item">
          <img class="image_slide" src="public/img/6b29093976c86642846b4f1c1f205fde.jpg" alt="Foto Daenerys">
        </div>
        <div class="item">
          <img class="image_slide" src="public/img/New Baratheon.jpg" alt="Foto Baratheon" value="Baratheon">
        </div>
        <div class="item">
          <img class="image_slide" src="public/img/New Trully.jpg" alt="Foto Trully" value="Tully">
        </div>
        <div class="item">
          <img class="image_slide" src="public/img/stark.jpg" alt="Foto Stark" value="Stark">
        </div>
      </div>
      <div id="right-sidebar" class="grid-item right_sidebar">
        <div class="form">
          <div class="form_wrapper">
            <div class="title">GAME OF THRONES</div>
            <form id="firstForm" class="firstForm" action="handler.php" method="post"
              <?php
                if (isset($_SESSION['display_form'])){
                  echo 'style="display:none"';
                }
              ?>
            >
              <label class="UserEmail paragrath" for="email">Enter your email</label>
              <input id="email" type="email" name="email" placeholder="arya@westeros.com"
                <?php echo empty($_SESSION['email'])  ? '' : 'value="' . $_SESSION['email'] . '"';?>
              ><br>
              <?php
                if(isset($_SESSION['flag']['email']) && $_SESSION['flag']['email'] == 0){
                  echo '<div class="error">Invalid email</div>';
                }elseif(isset($_SESSION['account_exists'])){
                  echo '<div class="error">File exists</div>';
                }
              ?>
              <label class="userPassword paragrath" for="password">Choose secure password</label>
              <h3>Must be at least 8 characters</h3>
              <input id="password" type="password" name="password" placeholder="password">
              <?php
                if(isset($_SESSION['flag']['password']) && $_SESSION['flag']['password'] == 0){
                  echo '<div class="error">Invalid password</div>';
                  echo 'style="border: 1px solid red;"';
                }
              ?>
              <div class="checkbox">
                <input class="checkbox_input" type="checkbox" name="remember_me" id="checkbox">
                <label class="checkbox_label" for="checkbox">Remember me</label>
              </div>
              <input type="hidden" name="submit_firstForm">
              <button id="submit_firstForm" class="button" type="submit" name="submit_firstForm">
              <h3> Sign up</h3>
              </button>
            </form>
            <form id="secondForm" class="secondForm" action="handler.php" method="post" 
              <?php
                if (isset($_SESSION['display_form'])){
                  echo 'style="display:block"';
                }
              ?>
            >
              <div class="info">You've successfully joined the game<br>
                Tell us more about yourself
              </div>
              <label class="userName paragrath" for="text">Who are you?<br>
                <h3>Alpha-numeric username</h3>
              </label>
              <input type="text" id="text" placeholder="arya" name="username"
                <?php echo empty($_SESSION['username'])  ? '' : 'value="' . $_SESSION['username'] . '"'; ?>
              ><br>
              <?php
                if(isset($_SESSION['flag']['username']) && $_SESSION['flag']['username'] == 0){
                echo '<div class="error">Invalid username</div>';
                }
              ?>
              <label class="selectHouse paragrath">Your Great House</label>
              <select id="select" class="nselect" name="select_house"
                <?php echo empty($_SESSION['select_house'])  ? '' : 'value="' . $_SESSION['select_house'] . '"'; ?>
              >
                <option value="Select House">Select House</option>
                <option value="Targaryen">Targaryen</option>
                <option value="Stark">Stark</option>
                <option value="Lannister">Lannister</option>
                <option value="Tully">Tully</option>
                <option value="Arryn">Arryn</option>
                <option value="Greyjoy">Greyjoy</option>
                <option value="Baratheon">Baratheon</option>
              </select>
              <?php
                if(isset($_SESSION['flag']['select_house']) && $_SESSION['flag']['select_house'] == 0){
                echo '<div class="error">Choose a house</div>';
                }
              ?>
              <label class="menu" for="text2">You preferences, hobbies, wishes, etc.</label>
              <textarea id="text2" class="list" type="text" name="preferences" placeholder="I have a long TOKILL list..." rows="1"></textarea>
              <?php
                if(isset($_SESSION['flag']['preferences']) && $_SESSION['flag']['preferences'] == 0){
                echo '<div class="error">Tell us about yourself</div>';
                }
              ?>
              <input type="hidden" name="submit_seconForm">
              <button id="submit_seconForm" class="button" type="submit" name="submit_seconForm">
              <h3> Save</h3>
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="public/js/script.js"></script>
    <script src="public/OwlCarousel2-2.3.4/docs/assets/vendors/highlight.js"></script>
    <script src="public/OwlCarousel2-2.3.4/docs/assets/js/app.js"></script>
    <script src="public/nselect/build/jquery.nselect.min.js"></script>
    <script src="public/nselect/build/jquery.nselect.js"></script>
  </body>
</html>