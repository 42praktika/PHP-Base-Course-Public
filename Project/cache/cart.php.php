<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Корзина </title>
  <link rel="stylesheet" href="source/styles/project_styles.css" />
  <script src="source/scripts/project_scripts.js"></script>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
          href="https://fonts.googleapis.com/css2?family=Montserrat&family=Playfair+Display:wght@800&display=swap"
          rel="stylesheet"
  />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
</head>

<?php

use app\mappers\UserMapper;
session_start();
$authorised = false;
$userID = isset($_SESSION["userID"]);
if($userID) $authorised = true;
?>
<body>
<?php if ($authorised) : ?>
<?php $userID = $_SESSION["userID"];
    $user = UserMapper::findUserByID($userID);
    $name = $user->getUsername();
    $email = $user->getEmail();
    $phone = $user->getPhone();
    ?>
<div class="info_container">
    <form action="order" method="post" class="form reg_whiteText">
        <div class="form_group">
            <input type="text" name="username" class="reg_whiteText form_input" value="<?php echo $name?>" placeholder="">
            <label class="form_label">Имя</label>
        </div>
        <div class="form_group">
            <input  type="text" name="phone" class="reg_whiteText form_input" value="<?php echo $phone?>" placeholder="">
            <label class=" form_label">Номер телефона</label>
        </div>
        <div class="form_group">
            <input type="text" name="address" class="reg_whiteText form_input" value="" placeholder="">
            <label class="form_label">Адрес</label>
        </div>
        <div class="form_group">
            <input id="cost" name="cost" type="text" readonly class="reg_whiteText form_input" placeholder="">
            <label class="form_label">Итоговая цена</label>
        </div>
        <div class="form_group">
            <input name="order" type="text" class="reg_whiteText form_input" value="" placeholder="">
            <label class="form_label"></label>
        </div>
        <div style="padding-top: 20px">
            <button type="submit" class="form_button reg_whiteText">Заказать</button>
        </div>
    </form>
</div>
<?php else: ?>
<div class="info_container">
        <form action="" method="" class="form reg_whiteText">
            <h1 class="form_title title_3">Введите данные:</h1>
            <div class="form_group">
                <input type="text" name="username" class="reg_whiteText form_input" placeholder="">
                <label class="form_label">Имя</label>
            </div>
            <div class="form_group">
                <input  type="text" name="phone" class="reg_whiteText form_input" placeholder="">
                <label class=" form_label">Номер телефона</label>
            </div>
            <div class="form_group">
                <input name="email" type="text" class="reg_whiteText form_input" placeholder="">
                <label class="form_label">Адрес</label>
            </div>
            <div class="form_group">
                <input id="cost" name="cost" type="text" readonly class="reg_whiteText form_input" placeholder="">
                <label class="form_label">Итоговая цена</label>
            </div>
            <div class="form_group">
                <input name="order" type="text" class="reg_whiteText form_input" value="" placeholder="">
                <label class="form_label"></label>
            </div>
            <div style="padding-top: 20px">
                <button type="submit" class="form_button reg_whiteText">Заказать</button>
            </div>
        </form>
</div>
<?php endif; ?>

<div class="cart_container">
    <div class="orderInfo_container">
    </div>
    <div id="empty_cart" class="main_cart active">
        Корзина пуста
    </div>
    <div id="fill_cart" class="main_cart">
    </div>
</div>
</body>

</html>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>

<script>
    let cart ={};
    let final_cost = BigInt(0);
    function loadCart(){
        if (localStorage.getItem('cart')){
            cart = JSON.parse(localStorage.getItem('cart'));
            document.getElementById("empty_cart").classList.remove('active');
            document.getElementById("fill_cart").classList.add('active');
            showCart();
        }
        else{
            document.getElementById("fill_cart").classList.remove('active');
            document.getElementById("empty_cart").classList.add('active');
        }
    }

    async function showCart(){
        let response = await fetch('source/menu.json');
        let goods_info = await response.json();
        for (let id in cart){
            goods_info.forEach((item) =>{
                if(id === item['foodName']){
                    let parent = document.getElementById("fill_cart");
                    parent.insertAdjacentHTML("afterend", `<div><img src="source${item['imgPath']}"><div>${id}</div><div>${item['foodCost']}</div></div>`);
                    final_cost += BigInt(item['foodCost']) * BigInt(cart[id]);
                }
            })
        }
        document.getElementById("cost").value = final_cost;
    }


    $(document).ready(function (){
        loadCart();
    })
</script>