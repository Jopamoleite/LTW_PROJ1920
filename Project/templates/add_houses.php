
<div class="profile flex-container">
  <div class="profile_info">
    <h3>Add new house</h3>
      <form method="post" action="../actions/action_add_house.php"  enctype="multipart/form-data">
          <label>Title:</label><br>
          <input type="text" name="title" placeholder="Title" maxlength="30" required/><br>
          <label>Location:</label><br>
          <input type="text" name="location" placeholder="Location" maxlength="35" required/><br>
          <label>Address:</label><br>
          <input type="text" name="address" placeholder="Address" maxlength="50" required/><br>
          <label>Price per night (€):</label><br>
          <input type="number" name="price" placeholder="Price" min="1" max="25000" required/><br>
          <label>House capacity:</label><br>
          <input type="number" name="capacity" placeholder="Capacity" min="1" max="100" required/><br><br>
          <label>Description:</label><br>
          <textarea name="description" rows="3" cols="50" maxlength="500" placeholder="Write something about the house"></textarea><br><br>
          <input type="file" name="picture" id="house_pic">
          <input id="add_house_button" class="button" type="submit" name="submit" value="Create House">
      </form>
      <a id="backtoprofile_link" href="../pages/user_profile.php?user=<?php echo $_SESSION['username'] ?>">Back to Profile</a>
  </div>
</div>
