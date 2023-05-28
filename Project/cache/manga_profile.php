<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en" xml:lang="en">
<head>
    <title> Manga </title>
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
    <title>MangaBoobs - Manga Profile</title>
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
    <div class="manga_profile_container">
        <!-- <button class="button_purple"></button> -->
        <div>
            <img src="https://mangalib.me/uploads/cover/chainsaw-man/cover/mUIlgi4AJypL_250x350.jpg"
                 class="daytop-cover" alt="">
            <div class="horizontal-items" style="padding-top: 10px; justify-content: space-between;">
                <div class="horizontal-item">
                    <a href="error" class="button_purple">Read</a>
                </div>
                <div class="horizontal-item">
                    <!-- <a href="error.html" class="favourite_button">add to</a> -->
                    <div class="dropdown">
                        <button class="top_profile_button">Add to</button>

                        <div class="dropdown-content dropdown-content-left">
                            <div style="width: 280px; height: 20px;"></div>
                            <div class="top-profile-content">

                                <button class="sidemenu-button margin_top">Read later</button>
                                <button class="sidemenu-button margin_top">Already Read</button>
                                <button class="sidemenu-button margin_top">Reading now</button>

                                <div class="outlined-button no-select margin_top" onclick="">
                                    Skipped
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <table style="border-spacing: 10px;">
                <tr class="manga-specs-row">
                    <td class="manga-specs-key">
                        genre
                    </td>
                    <td class="manga_specs_value">
                        <?php echo $genre ?>
                    </td>
                </tr>
                <tr class="manga-specs-row">
                    <td class="manga-specs-key">
                        chapters
                    </td>
                    <td class="manga_specs_value">
                        49
                    </td>
                </tr>
                <tr class="manga-specs-row">
                    <td class="manga-specs-key">
                        release date
                    </td>
                    <td class="manga_specs_value">
                        <?php echo $release_date ?>
                    </td>
                </tr>
                <tr class="manga-specs-row">
                    <td class="manga-specs-key">
                        author
                    </td>
                    <td class="manga_specs_value">
                        <?php echo $author ?>
                    </td>
                </tr>

                <tr class="manga-specs-row">
                    <td class="manga-specs-key">
                        age rating
                    </td>
                    <td class="manga_specs_value">
                        <?php echo $age_rating ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="daytop-info-container">
            <div class="manga-name-rating">
                <a href="" class="title-name"><?php echo $title ?></a>

                <div class="rating">
                    <div class="rating_stars" id="rating">
                        <button class="rating-star">
                            <span class="material-symbols-rounded no-select">star</span>
                        </button>
                        <button class="rating-star">
                            <span class="material-symbols-rounded no-select">star</span>
                        </button>
                        <button class="rating-star">
                            <span class="material-symbols-rounded no-select">star</span>
                        </button>
                        <button class="rating-star">
                            <span class="material-symbols-rounded no-select">star</span>
                        </button>
                        <button class="rating-star">
                            <span class="material-symbols-rounded no-select">star</span>
                        </button>

                    </div>
                    <label><?php echo $rating_id ?>/5</label>
                </div>
            </div>

            <div class="manga-profile-tags">
                <a href="" class="manga_tag">action</a>
                <a href="" class="manga_tag">blood</a>
                <a href="" class="manga_tag">vulgar</a>
                <a href="" class="manga_tag">demons</a>
            </div>
            <div class="manga_profile_description" id="manga_profile_description">
                <?php echo $description ?>
            </div>

            <!-- <div class="tab_view">
                <label  class="tab_link" id="one-tablink" for="one">Preview</label >
                <label  class="tab_link" id="two-tablink" for="two">Linked manga</label >
                <label  class="tab_link" id="three-tablink" for="three">Chapters</label >
            </div>
            <div class="tab_content">
                <div class="tab" id="one-tab">
                    <label for="">hello</label>
                </div>
                <div class="tab" id="two-tab">
                    <label for="">world</label>
                </div>
                <div class="tab" id="three-tab">
                    <label for="">!</label>
                </div>
            </div> -->


            <input class="radio" id="one" name="group" type="radio" checked>
            <input class="radio" id="two" name="group" type="radio">
            <input class="radio" id="three" name="group" type="radio">

            <div class="tabs">
                <label class="tab no-select" id="one-tab" for="one">Preview</label>
                <label class="tab no-select" id="two-tab" for="two">Chapters</label>
                <label class="tab no-select" id="three-tab" for="three">Linked content</label>
            </div>

            <div>

            </div>
            <div class="panels">
                <div class="panel" id="one-panel">
                    <div style="display: flex; flex-direction: row;">

                        <img class="preview-page"
                            src="https://h4m.rmr.rocks/auto/25/66/33/003.png_res.jpg?t=1669596330&u=0&h=o0Hbw0DfLI-OgFL6Ffdd-g"
                            alt="">

                        <img class="preview-page"
                            src="https://h10m.rmr.rocks/auto/25/66/33/007.png_res.jpg?t=1669596330&u=0&h=04XrAFY4l5zQ-pLI0Zv7Eg"
                            alt="">

                    </div>

                </div>
                <div class="panel" id="two-panel">
                    <div class="chapter_list" scrolling="yes">
                        <a href="error.html" class="chapter-list-item">
                            <div>
                                1 - 1 - Dog and chainsaw
                            </div>
                            <div>
                                29.04.2021
                            </div>
                        </a>
                        <a href="error.html" class="chapter-list-item">
                            <div>
                                1 - 1 - Dog and chainsaw
                            </div>
                            <div>
                                29.04.2021
                            </div>
                        </a>
                        <a href="error.html" class="chapter-list-item">
                            <div>
                                1 - 1 - Dog and chainsaw
                            </div>
                            <div>
                                29.04.2021
                            </div>
                        </a>
                        <a href="error.html" class="chapter-list-item">
                            <div>
                                1 - 1 - Dog and chainsaw
                            </div>
                            <div>
                                29.04.2021
                            </div>
                        </a>
                        <a href="error.html" class="chapter-list-item">
                            <div>
                                1 - 1 - Dog and chainsaw
                            </div>
                            <div>
                                29.04.2021
                            </div>
                        </a>
                        <a href="error.html" class="chapter-list-item">
                            <div>
                                1 - 1 - Dog and chainsaw
                            </div>
                            <div>
                                29.04.2021
                            </div>
                        </a>
                        <a href="error.html" class="chapter-list-item">
                            <div>
                                1 - 1 - Dog and chainsaw
                            </div>
                            <div>
                                29.04.2021
                            </div>
                        </a>
                        <a href="error.html" class="chapter-list-item">
                            <div>
                                1 - 1 - Dog and chainsaw
                            </div>
                            <div>
                                29.04.2021
                            </div>
                        </a>
                        <a href="error.html" class="chapter-list-item">
                            <div>
                                1 - 1 - Dog and chainsaw
                            </div>
                            <div>
                                29.04.2021
                            </div>
                        </a>
                        <a href="error.html" class="chapter-list-item">
                            <div>
                                1 - 1 - Dog and chainsaw
                            </div>
                            <div>
                                29.04.2021
                            </div>
                        </a>
                    </div>
                </div>

                <div class="panel" id="three-panel">
                    <!-- <div style="display: flex; flex-direction: row;">
                        
                    </div> -->
                    <div class="short_grid_wrapper">
                        <div class="short-grid-item-container">
                            <a href="error.html" class="short-grid-item">
                                <img class="daytop-cover" src="https://staticmm.rmr.rocks/uploads/pics/00/90/254_o.jpg">
                            </a>
                            <label>one</label>
                        </div>
                        <div class="short-grid-item-container">
                            <a href="error.html" class="short-grid-item">
                                <img class="daytop-cover" src="https://staticmm.rmr.rocks/uploads/pics/00/90/254_o.jpg">
                            </a>
                            <label>one</label>
                        </div>  
                        <div class="short-grid-item-container">
                            <a href="error.html" class="short-grid-item">
                                <img class="daytop-cover" src="https://staticmm.rmr.rocks/uploads/pics/00/90/254_o.jpg">
                            </a>
                            <label>one</label>
                        </div>
                        <div class="short-grid-item-container">
                            <a href="error.html" class="short-grid-item">
                                <img class="daytop-cover" src="https://staticmm.rmr.rocks/uploads/pics/00/90/254_o.jpg">
                                <div style="display: flex;">
                                    hello
                                </div>
                            </a>
                            
                        </div>
                    </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- <div class="user_profile_container" id="user_profile">
            <div class="user_profile_content">
                <div class="user_profile_sidemenu">
                    <button  class="sidemenu_button margin_top">Profile</button>
                    <button  class="sidemenu_button margin_top">Wish list</button>
                    <button  class="sidemenu_button margin_top">Logout</button>
                   
                    <br>
                    <div class="outlined_button noselect margin_top" onclick="SetUserProfleHidden()" onclick="">
                        close
                    </div>
                </div>
                <div class="user_profile_sidemenu">
                    <a href="" class="button_auth">Login</a>
                    <a href="" class="button_auth">Login</a>
                </div>
            </div>
        </div> -->

</body>

<!-- <div class="top_profile_menu" id="top_profile_menu">
        <div class="top_profile_content">

            <button  class="sidemenu_button margin_top">Profile</button>
            <button  class="sidemenu_button margin_top">Wish list</button>
           
            <br>
            <div class="outlined_button noselect margin_top" onclick="">
                Logout
            </div>
        </div>
    </div> -->

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
