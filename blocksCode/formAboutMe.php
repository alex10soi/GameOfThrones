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
  <label for="select" class="selectHouse paragrath">Your Great House</label>
  <!-- Select Dropdown Template -->
  <?php 
    require_once 'blocksCode/select.php';
  ?>
  <!-- End of Select Dropdown Template -->
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