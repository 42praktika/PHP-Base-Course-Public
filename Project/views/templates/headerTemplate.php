<header>
    <div class="header_content">
        <div class="horizontal_items">
            <div class="horizontal_item">
                <a href="/" class="header_navlink">Home</a>
            </div>

            <div class="horizontal_item">
                <a href="#" class="header_navlink">Catalog</a>
            </div>
            <div class="horizontal_item">
                <!-- <a href="#" class="header_navlink">Search</a> -->
                <input type="search" placeholder="Search" name="" class="blurred_input" id="">
            </div>
        </div>
        <div class="horizontal_items">
            <div class="horizontal_item">
                <a href=""><img src="assets/images/logo.svg" alt="" height="50"></a>
                <!-- <p class="header_logo">MANGA</p> -->
            </div>
        </div>

        <div class="horizontal_items">
            <div class="horizontal_item">
                <a href="" class="header_navlink">Favourite</a>
            </div>
            <div class="horizontal_item">
                <!-- <a class="top_profile_button" onclick="DisplayTopProfileMenu()">dev_profile</a> -->
                <div class="dropdown">
                    <button class="top_profile_button">user</button>

                    <div class="dropdown-content">
                        <div style="width: 280; height: 20;"></div>
                        <div class="top_profile_content">

                            <button class="sidemenu_button margin_top">Profile</button>
                            <button class="sidemenu_button margin_top">Wish list</button>

                            <br>
                            <div class="outlined_button noselect margin_top" onclick="">
                                Logout
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="horizontal_item">
                <button onclick="SetAuthContainerVisible()" class="button_login" id="header_login_button">Login</button>
            </div>
        </div>
    </div>
</header>