<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> MangaBoobs </title>
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
    <title>MangaBoobs</title>
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
    <div class="daytop_container">
        <img src="https://99px.ru/sstorage/56/2022/02/image_562102221206537735985.jpg" class="daytop-cover" alt="">
        <div class="daytop-info-container">
            top of the day
            <a href="" class="title-name">chainsaw man</a>
            The story is set in a world where Devils cause harm to humans, which makes them a target for extermination.
            Denji is a young, depressed man who has sold several of his organs and works as a tree cutter and devil
            hunter to pay back his deceased father’s debt to loan sharks
            <div class="horizontal-items" style="padding-top: 10px;">
                <div class="horizontal-item">
                    <a href="/manga" class="button_purple no-select">Read</a>
                </div>

                <div class="horizontal-item">

                    <span class="material-symbols-rounded" font-variato>
                        star
                    </span>
                    <span class="material-symbols-rounded">
                        star
                    </span>
                    <span class="material-symbols-rounded">
                        star
                    </span>
                    <span class="material-symbols-rounded">
                        star
                    </span>
                    <span class="material-symbols-rounded">
                        star
                    </span>
                </div>
            </div>


        </div>
        <img src="https://vsthemes.org/uploads/posts/2022-04/1648913749_5.webp" class="daytop-cover" alt="">

    </div>

    <div class="page-container column">

        <label style="font-size: 18pt">Popular titles</label>
        <br>

        <div class="title-previews-carousel">
            <div class="title-preview-container">
                <img src="https://e1.pxfuel.com/desktop-wallpaper/459/922/desktop-wallpaper-chainsaw-man-manga-cover-manga-cover.jpg" class="title-preview-image" alt="">
                <a href="/manga" class="header-navlink" style="margin-top: 10px; margin-bottom: 10px">Chainsaw Man</a>
<!--                <a href="/manga" class="button_purple noselect title-preview-button">Read</a>-->
            </div>
            <div class="title-preview-container">
                <img src="https://comicvine.gamespot.com/a/uploads/scale_small/11157/111571812/8699319-91ppd6vvrol.jpg" class="title-preview-image" alt="">
                <a href="/manga" class="header-navlink" style="margin-top: 10px; margin-bottom: 10px">OnePunchMan</a>
<!--                <a href="/manga" class="button_purple noselect title-preview-button">Read</a>-->
            </div>
            <div class="title-preview-container">
                <img src="https://kbimages1-a.akamaihd.net/7170129c-796e-41c3-b21e-d9bc6fc8e993/1200/1200/False/rascal-does-not-dream-of-bunny-girl-senpai-manga.jpg" class="title-preview-image " alt="">
                <a href="/manga" class="header-navlink" style="margin-top: 10px; margin-bottom: 10px; max-width: 300px; text-align: center">Rascal Does Not Dream of Bunny Girl Senpai</a>
<!--                <a href="/manga" class="button_purple noselect title-preview-button">Read</a>-->
            </div>
            <div class="title-preview-container">
                <img src="assets/images/baal.jfif" class="title-preview-image " alt="">
                <a href="/manga" class="header-navlink" style="margin-top: 10px; margin-bottom: 10px; max-width: 300px; text-align: center">Genshin Impact</a>
<!--                <a href="/manga" class="button_purple noselect title-preview-button">Read</a>-->
            </div>
        </div>

    </div>
<!--        <?php-->
<!--        include PROJECT_ROOT."views/templates/authTemplate.php";-->
<!--        ?>-->
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

