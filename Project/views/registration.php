{% extends layout.html %}

{% block title %} Регистрация {% endblock %}

{% block content %}
<body style="background-color: #D68B7E" background-size="400px" >
    <div style="width: 100%" class="nav_container hrefs_bar">
        <a href="/">
            <img class="icon_img" src="source/angle-white.png" alt="" />
        </a>
    </div>
    <div class="form_container">
        <form action="signup" method="post" class="form reg_whiteText">
            <h1 class="form_title title_3">Создание аккаунта</h1>
            <div class="form_group">
                <input type="text" name="username" class="reg_whiteText form_input" placeholder="">
                <label class="form_label">Имя</label>
            </div>
            <div class="form_group">
                <input  type="text" name="phone" class="reg_whiteText form_input" placeholder="">
                <label class=" form_label">Номер телефона</label>
            </div>
            <div class="form_group">
                <input name="email" type="email" class="reg_whiteText form_input" placeholder="">
                <label class="form_label">E-Mail</label>
            </div>
            <div class="form_group">
                <input name="password" type="password" class="form_input" placeholder="">
                <label class="form_label">Пароль</label>
            </div>
            <div class="form_group">
                <input name="password_confirm" type="password" class="form_input" placeholder="">
                <label class="form_label">Повторите пароль</label>
            </div>
            <div style="padding-top: 20px">
                <button type="submit" class="form_button reg_whiteText">Создать аккаунт</button>
            </div>
        </form>
    </div>
</body>
{% endblock %}
