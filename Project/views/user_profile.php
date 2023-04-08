<html>

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

    <script src="assets/js/global.js"></script>

    <script>
        function SetAuthContainerVisible() {
            document.getElementById('auth_container').style.visibility = "visible"
        }

        function SetAuthContainerHidden() {
            document.getElementById('auth_container').style.visibility = "hidden"
        }


        function DisplayTopProfileMenu() {
            var x = document.getElementById('top_profile_menu');
            if (x.style.visibility == 'hidden') {
                x.style.visibility = 'visible';
            } else {
                x.style.visibility = 'hidden';
            }
        }

    </script>
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
<?php
include PROJECT_ROOT."views/templates/headerTemplate.php";
?>

<body class="main_content">

<div class="auth_container" id="auth_container">

    <form class="auth_content_container" id="auth_content_container" action="login" method="post">
        <label for="" style="color: white; font-size: 40px; line-height: 48px;">Login in</label>
        <input type="email" placeholder="email" name="email" class="blurred_input" id="">
        <input type="password" placeholder="password" name="password" class="blurred_input" id="">

        <button type="submit" class="button_auth">Login</button>

        <div class="auth_bottom_container">

            <div class="outlined_button noselect" onclick="SetAuthContainerHidden()" onclick="">
                close
            </div>
            <div style="width: 20px;"></div>
            <a href="" class="outlined_button">sign in</a>

        </div>
        <label style="color: red;" id="auth_error_label"></label>
    </form>
</div>
<div class="page-container">
    <div class="flex column">
        <div class="row">
            <label class="title_name">Profile</label>
            <br>
            <img src="" alt="user image">
            <div>
                <label>Username</label>
                <label>registration date</label>
                <button>Edit profile</button>
            </div>
        </div>
        <div>
            panels
        </div>
    </div>
</div>
</body>

<?php
include PROJECT_ROOT."views/templates/footerTemplate.php";
?>
</html>