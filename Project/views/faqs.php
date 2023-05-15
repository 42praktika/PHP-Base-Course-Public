<html lang="ru">
<head>
    <title>FAQs</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style type="text/css">
        body{
            background: #eee;
            padding-top: 20px;
            font-family: monospace;

        }
        .row{
            width: 700px;
            position: relative;
            left: 350px;
        }
        .header{
            border-radius: 20px 20px 0px 0px;
            padding: 10px 0px;
            background: #0D6EFD;
            color: #fff;
            width: 100%;
            display: flex;
            align-content: center;
            justify-content: center;
        }
        .faq-item{
            margin-bottom: 40px;
            margin-top: 40px;
        }
        .faq-body{
            display: none;
            margin-top: 30px;
        }
        .faq-wrapper{
            width: 75%;
            margin: 0 auto;
        }
        .faq-inner{
            padding: 30px;
            background: rgba(213, 212, 212, 0.09);
        }
        .faq-plus{
            float: right;
            font-size: 1.4em;
            line-height: 1em;
            cursor: pointer;
        }
        hr{
            background-color: #9b9b9b;
        }
    </style>
</head>
<body>
<?php
include "header.php"
?>

<div class="container">
    <div class="row">
        <div class="faq-wrapper">
            <div class="header">
                <h1>FAQs</h1>
            </div>
            <div class="faq-inner">
                <div class="faq-item">
                    <h3>
                        Can I leave an order by phone?
                        <span class="faq-plus">&plus;</span>
                    </h3>
                    <div class="faq-body">
                        In order to avoid mistakes and misunderstandings, you need to leave an order through the website, after going through the registration procedure, filling in the necessary information fields and paying for the order.
                    </div>
                </div>
                <hr>
                <div class="faq-item">
                    <h3>
                        Is it possible to pay for the order upon receipt?
                        <span class="faq-plus">&plus;</span>
                    </h3>
                    <div class="faq-body">
                        There is no such possibility yet. The order is processed and delivered only after 100% payment.
                    </div>
                </div>
                <hr>
                <div class="faq-item">
                    <h3>
                        How much will the delivery cost?
                        <span class="faq-plus">&plus;</span>
                    </h3>
                    <div class="faq-body">
                        Immediately before payment, you will be able to check the exact cost of your chosen delivery, as well as the total amount of the order.
                    </div>
                </div>
                <hr>
                <div class="faq-item">
                    <h3>
                        I want to buy 3 products of the same name, but the site does not allow me to deliver more than 2. What should I do?
                        <span class="faq-plus">&plus;</span>
                    </h3>
                    <div class="faq-body">
                        If the site does not allow you to deliver the required quantity, then there is not enough of this product in stock. To clarify the quantity and find out if the goods are in stock in another city, you can call +7(987)654-32-10.
                    </div>
                </div>
                <hr>
                <div class="faq-item">
                    <h3>
                        Do you have any guarantees that my order will be fulfilled?
                        <span class="faq-plus">&plus;</span>
                    </h3>
                    <div class="faq-body">
                        Our company has been on the market for 26 years, we work with reliable delivery and delivery partners, as well as proven payment systems.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(".faq-plus").on('click',function(){
        $(this).parent().parent().find('.faq-body').slideToggle();
    });
</script>
<?php
include "footer.php"?>
</body>
</html>

