<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> About </title>
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
            document.getElementById('auth-container').style.visibility = "visible"
        }

        function SetAuthContainerHidden() {
            document.getElementById('auth-container').style.visibility = "hidden"
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
<?php echo $header ?>

<body class="main-content">

<!--<?php-->
<!--include PROJECT_ROOT."views/authTemplate.php";-->
<!--?>-->
    <div class="page-container">
        <div class="flex column">
            <label class="title-name">About us</label>
            <br>
            <label>MangaBoobs - the best (worst) website to read manga!</label>
            <label>We don't have many pieces, but we are SURE that you will like them!</label>
        </div>
        <div>
            <img src="assets/images/about_tyanka.jpg">
        </div>
    </div>
</body>


</html>


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
