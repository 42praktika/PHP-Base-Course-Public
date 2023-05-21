<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title> OOps... </title>
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
<body style="justify-content: center">
    <img src="/assets/images/error_bg_alpha_short.png" onclick="redirect('')" type="images/png" alt="">
    <div class="error_content">
        <h1 class="error_code" id="error_code"><?php echo $error_code ?></h1>
        <label id="error_explanation">
            <?php echo $error_explanation ?>
        </label>
        <br>
        <a href="/" class="button_purple">Home</a>
    </div>
</body>
</html>

</body>
</html>
<?php
        include PROJECT_ROOT."views/templates/authTemplate.php";
        ?>







