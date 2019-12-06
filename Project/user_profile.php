<!-- HEADER -->
<? include_once('includes/start.php') ?>
<? include_once('database/db_user.php') ?>
<? include_once('templates/common/header.php') ?>


<!-- PROFILE -->
<div id="profile" class="flex-container">
  <img src="images\default_pic.bmp" id="profile_pic" alt="Profile Pic" width="300" height="300">
  <div id="profile_info">
    <a href="edit-profile.php">Edit Profile</a>
    <h1>  <? echo $_SESSION['username']; ?> </h1>
    <p>
      <img src="images\location.png" class="icon" alt="loca" width="15" height="15">
      Far Far Away
    </p>
    <p>
      <img src="images\telephone.png" class="icon" alt="loca" width="15" height="15">
      *111#
    </p>
    <p>
      <img src="images\mail.png" class="icon" alt="loca" width="15" height="15">
          <? 
            $email = getIdMail($_SESSION['userID']);
            echo $email;
          ?>
    </p>
    <p id="description">
          <? 
            $bio = getIdBio($_SESSION['userID']);
            echo $bio;
          ?>
    </p>
  </div>
</div>

<!-- TABS -->


<!-- FOOTER -->
<? include_once('templates/common/footer.php') ?>
