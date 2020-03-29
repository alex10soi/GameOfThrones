<form id="firstForm" class="firstForm" action="resources/handler.php" method="post"
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
    }
  ?>
  <label class="userPassword paragrath" for="password">Choose secure password</label>
  <h3>Must be at least 8 characters</h3>
  <input id="password" type="password" name="password" placeholder="password">
  <?php
    if((isset($_SESSION['flag']['password']) && $_SESSION['flag']['password'] == 0) ||
      !empty($_SESSION['flag']['passwordError'])){
      echo '<div class="error">Invalid password</div>';
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