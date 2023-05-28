<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
    <title> Profile </title>
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">

    <meta charset="utf-8">
    <link rel="stylesheet" href="/assets/styles/global_styles.css">
    <link rel="stylesheet" href="/assets/styles/main_styles.css">
    <link rel="stylesheet" href="/assets/styles/user_profile_styles.css">
    <link rel="stylesheet" href="/assets/styles/error_page.css">
    <script src="/assets/js/global.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />
</head>
<body>

  

<html lang="en" xml:lang="en">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.svg">
    <link rel="stylesheet" href="assets/styles/global_styles.css">
    <link rel="stylesheet" href="assets/styles/main_styles.css">
    <link rel="stylesheet" href="assets/styles/user_profile_styles.css">
    <link rel="stylesheet" href="assets/styles/manga_profile_styles.css">
    <title>About MangaBoobs</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,0,0" />

<!--    <script src="/assets/js/global.js"></script>-->


    <style>
        .material-symbols-rounded {
            font-variation-settings:
                    'FILL' 0,
                    'wght' 400,
                    'GRAD' 0,
                    'opsz' 48
        }
    </style>
</head>

<?php echo $header ?>

<body class="main-content">
<div class="page-container column">
    <div class="flex column">
        <div class="row">
            <label class="title-name">Profile</label>
            <br>
            <form class="flex row" >

                <div class="profile-image">

                    <img src="https://99px.ru/sstorage/56/2022/02/image_562102221206537735985.jpg" class="no-select" alt="user image">
                </div>
<!--                <dl class="flex column" style="margin-left: 15px">-->
                <dl  style="margin-left: 15px; display: block">
                    <label class="title-name"><Public></Public></label>
                    <div class="flex align-center" style="justify-content: space-between">
                        <dt style="float: left; display: block">
                            <label>title</label>
                        </dt>
                        <dd style="float: left; display: flex; align-items: center">
                            <input type="text" id="title-showcase" class="blurred-input" disabled value="<?php echo $username ?>"></input>
                        </dd>
                    </div>


                    <div class="flex align-center" style="margin-top: 10px; margin-bottom: 10px; justify-content: space-between">
                        <dt style="float: left; display: block">
                            <label>email</label>
                        </dt>
                        <dd style="float: left; display: flex; align-items: center">
                            <input type="email" id="email-showcase" class="blurred-input" disabled value="<?php echo $email ?>"></input>
                        </dd>
                    </div>
                    <div class="flex align-center" style="margin-top: 10px; margin-bottom: 10px; justify-content: space-between">
                        <dt style="float: left; display: block">
                            <label>birth date</label>
                        </dt>
                        <dd style="float: left; display: flex; align-items: center">
                            <input type="date" id="date-showcase" class="blurred-input" disabled ></input>
                        </dd>
                    </div>
                    <label id="edit-profile-form-message"></label>
<!--                    <button type="button" class="button-login" id="edit-profile-button" style="max-width: 50%">Edit profile</button>-->
                </dl>
            </form>

            <input class="radio" id="one" name="group" type="radio" checked>
            <input class="radio" id="two" name="group" type="radio">
            <input class="radio" id="three" name="group" type="radio">

            <div class="tabs">
                <label class="tab no-select" id="one-tab" for="one">Profile</label>
                <label class="tab no-select" id="two-tab" for="two">Password</label>
                <label class="tab no-select" id="three-tab" for="three">smth</label>
            </div>
            <div class="panels">
                <div class="panel" id="one-panel">

                    <label>Manage profile</label>
                    <div class="flex align-center" style="justify-content: space-between">
                        <dt style="float: left; display: block">
                            <label>title</label>
                        </dt>
                        <dd style="float: left; display: flex; align-items: center">
                            <input type="text" id="title-input" style="background: #D9D9D9" class="blurred-input"  value="<?php echo $username ?>"></input>
                        </dd>
                    </div>


                    <div class="flex align-center" style="margin-top: 10px; margin-bottom: 10px; justify-content: space-between">
                        <dt style="float: left; display: block">
                            <label>email</label>
                        </dt>
                        <dd style="float: left; display: flex; align-items: center">
                            <input type="email" id="email-input" class="blurred-input" style="background: #D9D9D9"  value="<?php echo $email ?>"></input>
                        </dd>
                    </div>
                    <div class="flex align-center" style="margin-top: 10px; margin-bottom: 10px; justify-content: space-between">
                        <dt style="float: left; display: block">
                            <label>birth date</label>
                        </dt>
                        <dd style="float: left; display: flex; align-items: center">
                            <input type="date" id="date-input" style="background: #D9D9D9" class="blurred-input"  ></input>
                        </dd>
                    </div>
                    <div class="flex align-center" style="margin-top: 10px; margin-bottom: 10px; justify-content: space-between">
                        <dt style="float: left; display: block">
                            <label>confirm with password</label>
                        </dt>
                        <dd style="float: left; display: flex; align-items: center">
                            <input type="password" id="current-password-control" class="blurred-input" style="background: #D9D9D9" placeholder="current password"></input>
                        </dd>


                    </div>
                    <button class="button-login">Save</button>


                </div>



                <div class="panel" id="two-panel">

                    <label>Manage password</label>

                    <div class="flex align-center" style="margin-top: 10px; margin-bottom: 10px; justify-content: space-between">
                        <dt style="float: left; display: block">
                            <label>current password</label>
                        </dt>
                        <dd style="float: left; display: flex; align-items: center">
                            <input type="password" id="current-password-input" class="blurred-input" style="background: #D9D9D9" placeholder="current password"></input>
                        </dd>
                    </div>
                    <div class="flex align-center" style="margin-top: 10px; margin-bottom: 10px; justify-content: space-between">
                        <dt style="float: left; display: block">
                            <label>new password</label>
                        </dt>
                        <dd style="float: left; display: flex; align-items: center">
                            <input type="password" id="new-password-input" class="blurred-input" style="background: #D9D9D9" placeholder="new password"></input>
                        </dd>


                    </div>
                    <button class="button-login">Save</button>

                </div>

                <div class="panel" id="three-panel">

                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
<script>

</script>

</body>
</html>
<?php
        include PROJECT_ROOT."views/templates/authTemplate.php";
?>










<footer class="footer flex">
    <div class="flex row">
        <div class="footer-item flex column">
            <a href="/" class="footer-link">MangaBoobs, <?php echo date("Y")?> </a>
            <label class="footer-label">Unregistered trademark N??????. Licenses NO</label>
            <a href="privacy" class="header-navlink">Privacy</a>
        </div>
        <div class="footer-item flex column">
            <a href="about" class="footer-link">About</a>
        </div>
        <div class="footer-item flex column">
            <a href="contact" class="footer-link">Contact</a>
            <label class="footer-label">Telegram: @DeeUsh</label>
        </div>
    </div>
</footer>
