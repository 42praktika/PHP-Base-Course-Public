<?php class_exists('app\core\Template') or exit; ?>
<?php
use app\core\Application;
$pdo = Application::$database->pdo;
$query = $pdo->prepare("SELECT * FROM menu");
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title> Меню </title>
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

<body style="background-color: #D68B7E">
<div class="nav_container">
    <div class="hrefs_bar">
        <a href="/">
            <img class="icon_img" src="source/angle-white.png" alt="" />
        </a>
    </div>
    <div class="icons_bar">
        <a href="cart">
            <img class="icon_img space" src="source/cart_icon.png" alt="" />
        </a>
    </div>
</div>
<h1 style=" margin-left: 122px; padding-top: 50px" class="title_3">Меню</h1>
<div class="tabs_container">
        <button class="tab_button active reg_whiteText" >Супы</button>
        <button class="tab_button reg_whiteText">Вторые блюда</button>
        <button class="tab_button reg_whiteText">Суши</button>
        <button class="tab_button reg_whiteText">Закуски</button>
        <button class="tab_button reg_whiteText">Десерты</button>
</div>
<div class="menu_container">
    <div class="menu_content active">
        <?php foreach ($result as $item) :?>
            <?php if ($item['type'] == 'soup') : ?>
            <div class="img_parent">
                <img class="menu_img" src="source<?php echo $item['imgPath']; ?>">
                <div class="menu_inf">
                    <label style="padding-top: 60px" class="reg_whiteText"><?php echo $item['foodName']; ?></label>
                    <h5 style="padding-top: 40px" class="reg_whiteText"><?php echo $item['foodCost']; ?></h5>
                    <div style="display: flex; flex-direction: row; align-items: center;">
                        <button onclick="AddToCart(this)" id="<?php echo $item['foodName'];?>" class="menu_button reg_whiteText">В корзину</button>
                        <img style="padding-left: 15px" class="icon_img" src="source/fav_img.png" alt="" />
                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="menu_content">
        <?php foreach ($result as $item) :?>
        <?php if ($item['type'] == 'second') : ?>
                <div class="img_parent">
                    <img class="menu_img" src="source<?php echo $item['imgPath']; ?>">
                    <div class="menu_inf">
                        <h5 style="padding-top: 30px" class="reg_whiteText"><?php echo $item['foodName']; ?></h5>
                        <h5 style="padding-top: 40px" class="reg_whiteText"><?php echo $item['foodCost']; ?></h5>
                        <div style="display: flex; flex-direction: row; align-items: center;">
                            <button onclick="AddToCart(this)" id="<?php echo $item['foodName'];?>" class="menu_button reg_whiteText">В корзину</button>
                            <img style="padding-left: 15px" class="icon_img" src="source/fav_img.png" alt="" />
                        </div>
                    </div>
                </div>
        <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="menu_content">
        <?php foreach ($result as $item) :?>
            <?php if ($item['type'] == 'sushi') : ?>
                <img class="menu_img" src="source<?php echo $item['imgPath']; ?>">
                <div class="menu_inf">
                    <h5 style="padding-top: 30px" class="reg_whiteText"><?php echo $item['foodName']; ?></h5>
                    <h5 style="padding-top: 40px" class="reg_whiteText"><?php echo $item['foodCost']; ?></h5>
                    <div style="display: flex; flex-direction: row; align-items: center;">
                        <button onclick="AddToCart(this)" id="<?php echo $item['foodName'];?>" class="menu_button reg_whiteText">В корзину</button>
                        <img style="padding-left: 15px" class="icon_img" src="source/fav_img.png" alt="" />
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="menu_content">
        <?php foreach ($result as $item) :?>
            <?php if ($item['type'] == 'snacks') : ?>
                <img class="menu_img" src="source<?php echo $item['imgPath']; ?>">
                <div class="menu_inf">
                    <h5 style="padding-top: 30px" class="reg_whiteText"><?php echo $item['foodName']; ?></h5>
                    <h5 style="padding-top: 40px" class="reg_whiteText"><?php echo $item['foodCost']; ?></h5>
                    <div style="display: flex; flex-direction: row; align-items: center;">
                        <button onclick="AddToCart(this)" id="<?php echo $item['foodName'];?>" class="menu_button reg_whiteText">В корзину</button>
                        <img style="padding-left: 15px" class="icon_img" src="source/fav_img.png" alt="" />
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
    <div class="menu_content">
        <?php foreach ($result as $item) :?>
            <?php if ($item['type'] == 'desert') : ?>
                <img class="menu_img" src="source<?php echo $item['imgPath']; ?>">
                <div class="menu_inf">
                    <h5 style="padding-top: 30px" class="reg_whiteText"><?php echo $item['foodName']; ?></h5>
                    <h5 style="padding-top: 40px" class="reg_whiteText"><?php echo $item['foodCost']; ?></h5>
                    <div style="display: flex; flex-direction: row; align-items: center;">
                        <button onclick="AddToCart(this)" id="<?php echo $item['foodName'];?>" class="menu_button reg_whiteText">В корзину</button>
                        <img style="padding-left: 15px" class="icon_img" src="source/fav_img.png" alt="" />
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
    </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
<script>
    let tabs = document.querySelectorAll('.tab_button');
    let contents = document.querySelectorAll('.menu_content');

    for(let i =0; i< tabs.length; i++){
        tabs[i].addEventListener('click', (event) => {

            let tabsCurrent = event.target.parentElement.children;
            for (let t=0; t<tabsCurrent.length; t++){
                tabsCurrent[t].classList.remove('active')
            }
            event.target.classList.add("active");

            let contentCurrent = event.target.parentElement.nextElementSibling.children;
            for (let c=0; c<contentCurrent.length; c++){
                contentCurrent[c].classList.remove('active')
            }
            contents[i].classList.add("active")

        })
    }

    let cart = {};
    function AddToCart(button) {
        let id = $(button).attr('id');
        if (cart[id] == undefined) {
            cart[id] = 1; //если товара нет - создаем его в корзине
        }
        else {
            cart[id] += 1; //если есть - увеличиваем кол-во
        }
        saveCart();

    }

    function saveCart(data){
        localStorage.setItem("cart", JSON.stringify(cart));
    }

    // function showCart(){
    //     let out="";
    //     for(let key in cart){
    //         out+= key + '---' + cart[key] + "<br>";
    //     }
    //     console.log(out);
    // }

    function loadCart(){
        if (localStorage.getItem('cart')){
            cart = JSON.parse(localStorage.getItem('cart'));
        }
    }

    $(document).ready(function (){
        loadCart();
    })
</script>


</html>





