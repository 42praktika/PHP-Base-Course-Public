{% extends layout.html %}

{% block title %} Profile {% endblock %}

{% block content %}
<body style="background-color: #D68B7E">
<div class="nav_container">
    <a href="/" class="hrefs_bar">
        <img class="icon_img" src="source/angle-white.png" alt="" />
    </a>
    <a href="favourites" class="icons_bar">
        <img class="icon_img" src="source/fav_img.png" alt="" />
    </a>
</div>
<h1 style="text-align: center; padding-top: 30px" class="title_3">Ваши данные</h1>
<div id="div1" class="inf active">
    <div class="inf_container">
        <div style="display: flex; flex-direction: row">
            <div class="create-line"></div>
            <div>
                <div class="inf_group">
                    <div class="inf_title reg_whiteText">Имя:</div>
                    <div class="reg_whiteText">{{$username}}</div>
                </div>
                <div class="inf_group">
                    <div class="inf_title reg_whiteText">Номер телефона:</div>
                    <div class="reg_whiteText">{{$phone}}</div>
                </div>
                <div class="inf_group">
                    <div class="inf_title reg_whiteText">E-Mail:</div>
                    <div class="reg_whiteText">{{$email}}</div>
                </div>

                <button onclick="showForm()" class="inf_button reg_whiteText">Редактировать профиль</button>
                <button onclick="window.location.href = '/logout'" class="inf_button reg_whiteText">Выйти</button>
            </div>

        </div>
    </div>
</div>
<div id="div2" class="inf">
    <div class="inf_container">
        <form action="edit" method="post" class="form reg_whiteText">
            <div class="form_group">
                <input name="username" class="reg_whiteText form_input" placeholder="">
                <label class="form_label">Имя</label>
            </div>
            <div class="form_group">
                <input name="phone" class="reg_whiteText form_input" placeholder="">
                <label class=" form_label">Номер телефона</label>
            </div>
            <div class="form_group">
                <input name="email" class="reg_whiteText form_input" placeholder="">
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
            <div style="display: flex; flex-direction: row; justify-content: space-between">
                <button type="submit" onclick="window.location.href = '/edit'" class="inf_button reg_whiteText">Подтвердить</button>
            </div>
        </form>
        <button onclick="hiddenForm()" class="inf_button reg_whiteText">Отмена</button>
    </div>
</div>
</body>

<script>
    function edit(){
        hiddenForm();
        window.location.href = '/edit'
        //location.reload()
        window.location.reload()
    }
</script>
{% endblock %}
