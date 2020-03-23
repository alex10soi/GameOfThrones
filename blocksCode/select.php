<!-- Drop Down Template -->
<select id="select" class="nselect" name="select_house"
  <?php echo empty($_SESSION['select_house'])  ? '' : 'value="' . $_SESSION['select_house'] . '"'; ?>
>
<?php   
  $blockOptions = '';
  $file = json_decode(file_get_contents(DATA_SELECT_OPTIONS_PATH));
  foreach ($file as $key => $obj) {
    $blockOptions .= "<option value='{$obj}'>{$obj}</option>";
  }
  echo $blockOptions;
  unset($blockOptions, $file);
?>
</select>