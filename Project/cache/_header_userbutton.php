<?php class_exists('app\core\Template') or exit; ?>



<div class="horizontal-item">
    <div class="dropdown">
        <button class="top_profile_button">
            <?php echo $username ?>
        </button>

        <div class="dropdown-content">
            <div style="width: 280px; height: 20px;"></div>
            <div class="top-profile-content">

                <button onclick="redirect('user')" class="sidemenu-button margin_top">Profile</button>
                <button class="sidemenu-button margin_top">Wish list</button>
                <br>
                <div class="outlined-button no-select margin_top" onclick="window.location = '/logout'">
                    Logout
                </div>
            </div>

        </div>
    </div>
</div>

