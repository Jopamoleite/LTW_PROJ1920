<!DOCTYPE html>
<html lang="en-US">
  <head>
    <title>Housing Website</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Roboto&display=swap" rel="stylesheet">
    <link href="css/page_style.css" rel="stylesheet">
    <link href="css/page_layout.css" rel="stylesheet">
    <link href="css/search_bar_layout.css" rel="stylesheet">
    <link href="css/search_bar_style.css" rel="stylesheet">
  </head>
  <body>
    <div class="page_header">
      <div id="logo_name">
          <img src="https://image.flaticon.com/icons/png/512/86/86329.png" alt="House icon" width="20" height="20">
          <h1><a href="searchresults.php">HouseHunt</a></h1>
      </div>
      <div id="user_profile">
          <a href="">
          <?php echo $_SESSION["username"]; ?>
          </a> <!--TODO link p/ perfil e obter nome/foto do user>-->
          <a href=""><img href="" src="http://cdn.onlinewebfonts.com/svg/img_184513.png" alt="User icon" width="20" height="20"></a>
      </div>
    </div>
