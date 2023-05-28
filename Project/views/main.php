{% extends layout.html %}

{% block title %} Симура {% endblock %}

{% block content %}
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
{% endblock %}