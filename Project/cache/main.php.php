<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Симура </title>
  <link rel="stylesheet" href="source/styles/project_styles.css" />
  <script src="source/scripts/project_scripts.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
          href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display:wght@800&display=swap"
          rel="stylesheet"
  />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<body style="background-image: url('source/main_img.png');">
<header>
  <div class="nav_container">
    <div class="hrefs_bar">
      <a href="menu" class="hrefs_text">Меню</a>
      <a href="#" class="hrefs_text space">Акции</a>
      <a href="about" class="hrefs_text space">О нас</a>
    </div>
    <div class="icons_bar">
      <a href="login">
        <img class="icon_img" src="source/user_icon.png" alt="" />
      </a>
      <a href="cart">
        <img class="icon_img space" src="source/cart_icon.png" alt="" />
      </a>
    </div>
  </div>
</header>
    <div class="main_container">
      <div class="title_container">
        <div class="title">Ресторан Симура</div>

        <div class="title_3">
          Главное пристанище гурманов острова Наруками
        </div>
      </div>
      <div class="button_container">
        <a href="menu">
          <button class="order_button">Сделать заказ</button>
        </a>
      </div>
    </div>
  </body>

</html>



