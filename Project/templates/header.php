<?php include_once 'database/user.php'; ?>
<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>HouseHunt</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="data:,">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
    <link href="../css/page_style.css" rel="stylesheet">
    <link href="../css/search_bar_style.css" rel="stylesheet">
    <link href="../css/user_profile_style.css" rel="stylesheet">
    <link href="../css/house_results_style.css" rel="stylesheet">
    <link href="../css/house_page_style.css" rel="stylesheet">
    <link href="../css/messages_style.css" rel="stylesheet">
  </head>
  <body>
    <?php if (!isset($_SESSION['userID']) || empty($_SESSION['userID'])) { header("Location: ../pages/invalid_back_page.php"); } ?>
    <div class="page_header">
      <div id="logo_name">
          <a href="main_page.php">
            <img src="../images/home.png" alt="House icon" width="20" height="20">
          </a>
          <h1><a href="../pages/main_page.php">HouseHunt</a></h1>
      </div>
      <div class="profile_dropdown">
        <div id="username_link">
          <a href="../pages/user_profile_page.php?user=<?php echo $_SESSION['username']; ?>" >
          <?php echo $_SESSION['username']; ?>
          </a>
        </div>
          <span>
            <img href="../pages/user_profile_page.php?user=<?php echo $_SESSION['username']; ?>" src="../images/<?php echo getUserPhoto($_SESSION['username']); ?>" alt="User icon" width="20" height="20">
          </span>
            <div class="dropdown_content">
              <br>
              <div><a href="../pages/user_profile_page.php?user=<?php echo $_SESSION['username'] ?>">My Profile</a></div>
              <form action="../actions/action_logout.php" method="post">
                <button class="logout_button" type="submit">Logout</button>
              </form>
            </div>
      </div>
    </div>
