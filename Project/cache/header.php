<?php class_exists('app\core\Template') or exit; ?>


<header>
    <div class="header-content">
        <div class="horizontal-items">
            <div class="horizontal-item">
                <a href="/" class="header-navlink">Home</a>
            </div>

            <div class="horizontal-item">
                <a href="#" class="header-navlink">Catalog</a>
            </div>
            <div class="horizontal-item">
                <!-- <a href="#" class="header_navlink">Search</a> -->
                <input type="search" placeholder="Search" name="" class="blurred-input" id="">
            </div>
        </div>
        <div class="horizontal-items">
            <div class="horizontal-item">
                <a href="/" style="transform: translate(0%,13%)"><img src="assets/images/logo.svg" alt="" height="50"></a>
            </div>
        </div>

        <div class="horizontal-items">
            <div class="horizontal-item">
                <a href="/favourite" class="header-navlink">Favourite</a>
            </div>
<!--            user-->

<!--            sign in-->
<!--            <div class="horizontal-item">-->
<!--                <button onclick="SetAuthContainerVisible()" class="button-login" id="header-login-button">Sign in</button>-->
<!--            </div>-->
            <?php echo $authorised ?>
        </div>
    </div>
</header>
