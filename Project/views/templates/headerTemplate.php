<php session_start(); ?>
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
                <a href="" class="header-navlink">Favourite</a>
            </div>
            <div class="horizontal-item">
                <div class="dropdown">
                    <button class="top_profile_button">
                       <?php
                            echo "username";
                       ?>
                    </button>

                    <div class="dropdown-content">
                        <div style="width: 280px; height: 20px;"></div>
                        <div class="top-profile-content">

                            <button onclick="redirect('user')" class="sidemenu-button margin_top">Profile</button>
                            <button class="sidemenu-button margin_top">Wish list</button>
                            <br>
                            <div class="outlined-button no-select margin_top" onclick="">
                                Logout
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="horizontal-item">
                <button onclick="SetAuthContainerVisible()" class="button-login" id="header-login-button">Sign in</button>
            </div>
        </div>
    </div>
</header>