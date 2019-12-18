
<?php
  $house = ltrim($_GET['house'], '0');
  if(isset($_POST['delete'])) {
    removeHouse($house);
  }
?>

<div class="house_edit flex-container">
  <form id ="edit_house_img" action="../actions/action_edit_image.php" method="post" enctype="multipart/form-data">
    <input oninput="upload()" id="img_upload" type="file" name="picture">
          <label for="img_upload">Select file</label>
    <input type="hidden" id="houseID" name="houseID" value="<?php echo $house ?>">
  </form>
  <form id="delete_form" action="../actions/action_delete_house.php" method="post">
    <input id="delete_button" name="delete" class="button" type="submit" value="Delete">
    <input type="hidden" id="houseID" name="houseID" value="<?php echo $house ?>">
  </form>

</div>
<script src="../js/edithouseimg.js" defer></script>
