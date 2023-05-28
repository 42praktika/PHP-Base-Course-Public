{% extends layout.html %}

{% block title %} Hello {% endblock %}

{% block content %}
<body style="background-color: #D68B7E" background-size="400px" >
<div style="width: 100%" class="nav_container hrefs_bar">
    <a href="/">
        <img class="icon_img" src="source/angle-white.png" alt="" />
    </a>
</div>
<div class="form_container">
    <form action="login" method="post" class="form reg_whiteText">
        <h1 class="form_title title_3">Вход</h1>
        <div class="form_group">
            <input name="phone" class="reg_whiteText form_input" placeholder="">
            <label class="form_label">Phone</label>
        </div>
        <div class="form_group">
            <input name="password" type="password" class="form_input" placeholder="">
            <label class="form_label">Пароль</label>
        </div>
        <button class="form_button reg_whiteText">Войти</button>
        <a class="hrefs_text" href="registration">Впервые у нас?</a>
    </form>
</div>
</body>
{% endblock %}
