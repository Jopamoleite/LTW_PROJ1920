<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Housing Website</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:,">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
    <link href="/css/page_style.css" rel="stylesheet">
    <link href="/css/search_bar_style.css" rel="stylesheet">
    <link href="/css/user_profile_style.css" rel="stylesheet">
  </head>
  <body>
    <?
      if(!isset($_SESSION['userID']) || empty($_SESSION['userID'])){
        header("Location: invalid_back.php");
      }
    ?>
    <div class="page_header">
      <div id="logo_name">
          <a href="main_page.php">
            <img src="/images/home.png" alt="House icon" width="20" height="20">
          </a>
          <h1><a href="main_page.php">HouseHunt</a></h1>
      </div>
      <div id="user_profile_info">
        <div id="username_link">
          <a href="user_profile.php?user=" . <?$_SESSION["username"]?> >
          <? echo $_SESSION["username"]; ?>
          </a>
        </div>
        <div class="profile_dropdown">
          <span><img href="" src="/images/user.png" alt="User icon" width="20" height="20"></span>
            <div class="dropdown_content">
              <br>
<<<<<<< HEAD
              <div><a href="user_profile.php?user=" . <? $_SESSION["username"] ?> >My Profile</a></div>
=======
              <div><a href="user_profile.php?user=" . <? $_SESSION["userID"] ?> >My Profile</a></div>
>>>>>>> 89c53c4acf37a2b78c3589f6e07d825ddd87a216
              <form action="logout.php" method="post">
                <button class="logout_button" type="submit">Logout</button>
              </form>
            </div>
        </div>
      </div>
    </div>
