<!-- Block slider template -->
<?php   
  $blockImages = '';
  $file = json_decode(file_get_contents(DATA_IMAGES_PATH));
  foreach ($file as $key => $obj) {
    $blockImages .= "<div class='item'>
      <img class='image_slide' src='{$obj->src}' alt='{$obj->alt}'";
    if(property_exists($obj, 'value')){
      $blockImages .= " value='{$obj->value}'></div>";
    }else{
      $blockImages .= "></div>";
    }
  }
  echo $blockImages;
  unset($blockImages, $file);
?>