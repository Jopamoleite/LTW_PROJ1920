<!-- HEADER -->
<?php
  include_once 'includes/start.php';
  include_once 'database/db_user.php';
  include_once 'templates/common/header.php';
?>

<?php
  $user = getUser($_SESSION['username']);

  $username = $user['username'];   
  $name     = $user['name'];   
  $location = $user['location_'];       
  $phone    = $user['phone_num'];       
  $email    = $user['email'];          
  $bio      = $user['bio'];           
?>

<!-- PROFILE -->
<div class="profile flex-container">
  <img src="images/default_pic.bmp" id="profile_pic" alt="Profile Pic" width="300" height="300">
  <div class="profile_info">
        <?php if(isset($_SESSION["errormsg"]) && !empty($_SESSION["errormsg"])){ echo $_SESSION["errormsg"]; unset($_SESSION["errormsg"]);}?>
    <h1>  <?php echo $_SESSION['username']; ?> </h1>
    <h3>Update Profile Information</h3>
      <form method="post" action="action_edit_profile.php">
          <label>Username:</label><br>
          <input type="text" name="username" value="<?php if(!empty($username)){ echo $username; }?>" placeholder="Username" required/><br>
          <label>Name:</label><br>
          <input type="text" name="name" value="<?php if(!empty($name)){ echo $name; }?>" placeholder="Name"/><br>
          <label>Location:</label><br>
          <input type="text" name="location" value="<?php if(!empty($location)){ echo $location; }?>" placeholder="Location"/><br>
          <label>Phone Number:</label><br>
          <input type="number" name="phone" value="<?php if(!empty($phone)){ echo $phone; }?>" placeholder="Phone Number" /><br> 
          <label>Email Address:</label><br>
          <input type="email" name="email" value="<?php if(!empty($email)){ echo $email; }?>" required/><br><br>
          <label>Bio:</label><br>
          <textarea name="bio" rows="3" cols="50" maxlength="100" placeholder="Write something about yourself"><?php if(!empty($bio)){ echo $bio; } ?> </textarea><br><br>
          <input id="edit_profile_button" class="button" type="submit" value="Update Profile">
      </form>
      <a id="backtoprofile_link" href="user_profile.php?user=<?php echo $_SESSION['username'] ?>">Back to Profile</a>
  </div>
</div> 

<!-- TABS -->


<!-- FOOTER -->
<?php
  include_once 'templates/common/footer.php'
?>
