<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script defer src="/js/register.js"></script>
    <script defer src="/js/menu.js"></script>
    <link
        rel="stylesheet"
        type="text/css"
        href="/css/register.css"
    >
</head>
<body>
<?php
readfile('header.html');
?>
<div class="background">
</div>
<div class="main">
    <div class="productCards">
        <?php foreach ($products as $product): ?>
            <div class="productCard">
                <img class="imgCard" src="<?php echo $product->image; ?>">
                <p class="imgText"><?php echo $product->text; ?></p>
                <div class="dropdownLists">
                    <button class="dropListsBtn">
                        <i class="far fa-heart fa-1x"></i>
                    </button>
                    <div class="dropdown-lists dropLists">
                        <form method="get" action="/addWishlist">
                            <input class="wish" type="submit" value="+">
                        </form>
<!--                        --><?php //foreach ($wishlists as $wishlist): ?>
<!--                            <form action="/addProduct" method="post">-->
<!--                                <input class="wish" type="submit" value="--><?php //echo $wishlist->title; ?><!--">-->
<!--                                <input type="hidden" name="listID" value="--><?php //echo $wishlist->id; ?><!--">-->
<!--                                <input type="hidden" name="prodID" value="--><?php //echo $product->id; ?><!--">-->
<!--                            </form>-->
<!--                        --><?php //endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
readfile('footer.html');
?>
</body>
</html>
