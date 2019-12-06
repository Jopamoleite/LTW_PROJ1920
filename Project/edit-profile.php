<!-- HEADER -->
<? include_once('includes/start.php') ?>
<? include_once('database/db_user.php') ?>
<? include_once('templates/common/header.php') ?>


<!-- PROFILE -->
<div id="profile" class="flex-container">
  <img src="images\default_pic.bmp" id="profile_pic" alt="Profile Pic" width="300" height="300">
  <div id="profile_info">
        <?php if(isset($_SESSION["errormsg"]) && !empty($_SESSION["errormsg"])){ echo $_SESSION["errormsg"]; unset($_SESSION["errormsg"]);}?>
    <a href="main_page.php">Home</a> |  <a href="user_profile.php"> <?php echo $_SESSION['username'] ?> 's Profile  </a>      
    <h1>  <? echo $_SESSION['username']; ?> </h1>
    <h3>Update Profile Information</h3> 
      <form method="post" action="action_edit-profile.php">   
          <label>Location:</label><br>
          <input type="text" name="location" value="<?php echo "Location" ?>" /><br> 
          <label>Phone Number:</label><br> 
          <input type="text" name="phone" value="<?php echo "Phone Number" ?>" /><br>
          <label>Email Address:</label><br>          
          <input type="email" name="email" value="<? $email = getIdMail($_SESSION['userID']); echo $email; ?>" required/><br><br>  
          <label>Bio:</label><br>          
          <input type="text" name="bio" value="<? $bio = getIdBio($_SESSION['userID']); echo $bio; ?>" maxlength="50"/><br><br>  
          <input id="edit-profile-button" class="button" type="submit" value="Update Profile">      
		  </form>  
  </div>
</div>

<!-- TABS -->


<!-- FOOTER -->
<? include_once('templates/common/footer.php') ?>
