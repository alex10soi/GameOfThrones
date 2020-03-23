<?php
  session_start();
  define('_DS', DIRECTORY_SEPARATOR);
  define('DATA_IMAGES_PATH', 'public' . _DS . 'json' . _DS . 'dataImages.json');
  define('DATA_SELECT_OPTIONS_PATH', 'public' . _DS . 'json' . _DS . 'dataSelectOptions.json');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Game of Thrones</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- Style Slick Slider -->
    <link rel="stylesheet" type="text/css" href="public/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="public/slick/slick-theme.css"/>
    <!-- ----------------------------------------------------------- -->
    <!-- Style Select2 -->
    <link href="public/select2/dist/css/select2.min.css" rel="stylesheet" />
    <!-- ----------------------------------------------------------- -->
    <link rel="stylesheet" type="text/css" href="public/css/styles.css">
    <link href="https://fonts.googleapis.com/css?family=EB+Garamond|Open+Sans&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="grid">
      <div class="slick-slider grid-item left_sidebar">
        <!-- Template block with pictures for Slider -->
        <?php 
          require_once 'blocksCode/sliderImages.php';
        ?>
        <!-- The End Block Pattern with Pictures for Slider -->
      </div>
      <div id="right-sidebar" class="grid-item right_sidebar">
        <div class="form">
          <div class="form_wrapper">
            <div class="title">GAME OF THRONES</div>
            <!-- Registration form template -->
            <?php 
              require_once 'blocksCode/formRegistration.php';
            ?>
            <!-- End of registration form template -->
            <!-- AboutMe form template -->
            <?php 
              require_once 'blocksCode/formAboutMe.php';
            ?>
            <!-- End of AboutMe form template -->
          </div>
        </div>
      </div>
    </div>
    <!-- Slick Slider -->
    <script type="text/javascript" src="public/slick/slick.min.js"></script>
    <!-- Select2 -->
    <script src="public/select2/dist/js/select2.min.js"></script>
    <!-- My script -->
    <script src="public/js/script.js"></script>
  </body>
</html>