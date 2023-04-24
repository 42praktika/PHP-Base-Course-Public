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

    <script src="/assets/js/global.js"></script>

    <script>
        function SetAuthContainerVisible() {
            document.getElementById('auth-container').style.visibility = "visible"
        }

        function SetAuthContainerHidden() {
            document.getElementById('auth-container').style.visibility = "hidden"
        }


        function DisplayTopProfileMenu() {
            var x = document.getElementById('top-profile-menu');
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

<body class="main-content">

<?php
include PROJECT_ROOT."views/templates/authTemplate.php";
?>
<div class="page-container">
    <div class="flex column">
        <div class="row">
            <label class="title-name">Profile</label>
            <br>
            <img src="" alt="user image">
            <div>
                <label>Username</label>
                <label>registration date</label>
                <button class="button-login">Edit profile</button>
            </div>
            <input class="radio" id="one" name="group" type="radio" checked>
            <input class="radio" id="two" name="group" type="radio">
            <input class="radio" id="three" name="group" type="radio">

            <div class="tabs">
                <label class="tab no-select" id="one-tab" for="one">Favourite</label>
                <label class="tab no-select" id="two-tab" for="two">Read later</label>
                <label class="tab no-select" id="three-tab" for="three">tab 3</label>
            </div>
            <div class="panels">
                <div class="panel" id="one-panel">

                </div>
                <div class="panel" id="two-panel">

                </div>

                <div class="panel" id="three-panel">

                </div>
            </div>
        </div>
    </div>
</div>
</body>

<?php
include PROJECT_ROOT."views/templates/footerTemplate.php";
?>
</html>