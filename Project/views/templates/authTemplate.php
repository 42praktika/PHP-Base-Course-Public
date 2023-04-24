<div class="auth-container" id="auth-container">
    <form class="auth-content-container" id="auth-content-container" action="login" method="post">
        <label for="" style="color: white; font-size: 40px; line-height: 48px;">Account</label>
        <input type="email" placeholder="email" name="email" class="blurred-input" id="">
        <input type="password" placeholder="password" name="password" class="blurred-input" id="">

        <button type="submit" class="button-auth">Sign in</button>

        <div class="auth-bottom-container">

            <div class="outlined-button no-select" onclick="SetAuthContainerHidden()" onclick="">
                close
            </div>
            <div style="width: 20px;"></div>
            <div class="outlined-button" onclick="switchView('auth-content-container', 'register-content-container')">sign up</div>
        </div>
        <label style="color: red;" id="auth-error-label"></label>
    </form>
    <form class="auth-content-container" style="display: none" id="register-content-container" action="register" method="post">
        <label for="" style="color: white; font-size: 40px; line-height: 48px;">Register</label>
        <input type="text" placeholder="nickname" name="nickname" class="blurred-input" id="">
        <input type="email" placeholder="email" name="email" class="blurred-input" id="">
        <input type="password" placeholder="password" name="password" class="blurred-input" id="">
<!--        <input type="password" placeholder="repeat password" name="password_2" class="blurred-input" id="">-->

        <button type="submit" class="button-auth">Sign up</button>

        <div class="auth-bottom-container">

            <div class="outlined-button no-select" onclick="SetAuthContainerHidden()" onclick="">
                close
            </div>
            <div style="width: 20px;"></div>
            <div class="outlined-button no-select" onclick="switchView('auth-content-container', 'register-content-container')">sign in</div>

        </div>
        <label style="color: red;" id="auth-error-label"></label>
    </form>
</div>

<script>

    function validateRegisterForm(formId){
        let registerForm = document.getElementById(formId);

    }

    function switchView(firstContainerID, secondContainerID){
        let firstContainer = document.getElementById(firstContainerID);
        let secondContainer = document.getElementById(secondContainerID);

        if(firstContainer.style.display === "none"){
            firstContainer.style.display = "flex";
            secondContainer.style.display = "none";
        }
        else{
            firstContainer.style.display = "none";
            secondContainer.style.display = "flex";
        }

    }
</script>