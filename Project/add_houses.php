<!-- HEADER -->
<?php
  include_once 'includes/start.php';
  include_once 'templates/common/header.php';
?>

<div class="profile flex-container">
  <div class="profile_info">
    <h3>Add new house</h3>
      <form method="post" action="action_add_house.php">
          <label>Title:</label><br>
          <input type="text" name="title" placeholder="Title" required/><br>
          <label>Location:</label><br>
          <input type="text" name="location" placeholder="Location" required/><br>
          <label>Address:</label><br>
          <input type="text" name="address" placeholder="Address" required/><br>
          <label>Price per night (€):</label><br>
          <input type="number" name="price" placeholder="Price" min="1" required/><br>
          <label>House capacity:</label><br>
          <input type="number" name="capacity" placeholder="Capacity" min="1" max="100" required/><br><br>
          <label>Description:</label><br>
          <textarea name="description" rows="3" cols="50" maxlength="200" placeholder="Write something about the house"></textarea><br><br>
          <input id="add_house_button" class="button" type="submit" value="Create House">
      </form>
      <a id="backtoprofile_link" href="user_profile.php?user=<?php echo $_SESSION["username"] ?>">Back to Profile</a>
  </div>
</div>



<!-- FOOTER -->
<?
  include_once 'templates/common/footer.php'
?>
