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
<?php
include PROJECT_ROOT."views/templates/headerTemplate.php";
?>

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

                                <div class="outlined-button noselect margin_top" onclick="">
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
                        type
                    </td>
                    <td class="manga_specs_value">
                        manga
                    </td>
                </tr>
                <tr class="manga-specs-row">
                    <td class="manga-specs-key">
                        genre
                    </td>
                    <td class="manga_specs_value">
                        action
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
                        2019
                    </td>
                </tr>
                <tr class="manga-specs-row">
                    <td class="manga-specs-key">
                        author
                    </td>
                    <td class="manga_specs_value">
                        Tatsuki Fujimoto
                    </td>
                </tr>
                <tr class="manga-specs-row">
                    <td class="manga-specs-key">
                        publisher
                    </td>
                    <td class="manga_specs_value">
                        Shueisha
                    </td>
                </tr>
                <tr class="manga-specs-row">
                    <td class="manga-specs-key">
                        age rating
                    </td>
                    <td class="manga_specs_value">
                        18+
                    </td>
                </tr>
            </table>
        </div>
        <div class="daytop-info-container">
            <div class="manga-name-rating">
                <a href="" class="title-name">chainsaw man</a>

                <div class="rating">
                    <div class="rating_stars" id="rating">
                        <button class="rating-star">
                            <span class="material-symbols-rounded noselect">star</span>
                        </button>
                        <button class="rating-star">
                            <span class="material-symbols-rounded noselect">star</span>
                        </button>
                        <button class="rating-star">
                            <span class="material-symbols-rounded noselect">star</span>
                        </button>
                        <button class="rating-star">
                            <span class="material-symbols-rounded noselect">star</span>
                        </button>
                        <button class="rating-star">
                            <span class="material-symbols-rounded noselect">star</span>
                        </button>

                    </div>
                    <label>4.7/5</label>
                </div>
            </div>

            <div class="manga-profile-tags">
                <a href="" class="manga_tag">action</a>
                <a href="" class="manga_tag">blood</a>
                <a href="" class="manga_tag">vulgar</a>
                <a href="" class="manga_tag">demons</a>
            </div>
            <div class="manga_profile_description" id="manga_profile_description">
                “I have always dreamed of living an ordinary life: sleeping in a warm bed, eating jam on toast in the
                morning, going on dates with my girlfriend and smiling every day. But everything changed with the death
                of
                his father - now, Pochita, it's time to kill! - with these words, Denji, along with his chainsaw dog
                Pochita, goes to another contract, because they are demon hunters. Every day they kill for the money
                that
                Denji must pay to one yakuza, otherwise the debt of the deceased father will have to pay with his own
                life.
                But what awaits Denji when he returns all the debt: will he live a normal life or continue to save the
                world
                from demons? Or maybe fate has its own plans for the fate of the hero?
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
                <label class="tab noselect" id="one-tab" for="one">Preview</label>
                <label class="tab noselect" id="two-tab" for="two">Chapters</label>
                <label class="tab noselect" id="three-tab" for="three">Linked content</label>
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

    <div class="auth-container" id="auth-container">

        <div class="auth-content-container" id="auth_content_container">
            <label for="" style="color: white; font-size: 40px; line-height: 48px;">Login in</label>
            <input type="email" placeholder="username or email" name="LoginInput" class="blurred-input" id="">
            <input type="password" placeholder="password" name="" class="blurred-input" id="">

            <a href="" class="button-auth">Login</a>
            <div class="auth-bottom-container">

                <div class="outlined-button noselect" onclick="SetAuthContainerHidden()" onclick="">
                    close
                </div>
                <div style="width: 20px;"></div>
                <a href="" class="outlined-button">sign in</a>

            </div>
            <label style="color: red;" id="auth-error-label"></label>
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
<?php
include PROJECT_ROOT."views/templates/footerTemplate.php";
?>
</html>