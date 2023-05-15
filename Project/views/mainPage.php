<html lang="ru">
<head>
    <title>Main page</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<?php
include "header.php"
?>
<main>

    <div  id="myCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="img/5836.jpg" width="750px" height="550px" style="position: relative; left: 650px"/>
                <div class="container">
                    <div class="carousel-caption text-start">
                        <h1 style="color: black">Join us!</h1>
                        <p style="color: black">Don't waste time and start reading.</p>
                        <p><a class="btn btn-lg btn-primary" href="/registration">Sign up right now</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/5865.jpg" width="750px" height="650px" style="position: relative; left: 600px; top:-120px"/>
                <div class="container">
                    <div class="carousel-caption">
                        <h1 style="color: black">Interesting news</h1>
                        <p style="color: black">Our experts conducted an experiment and revealed the advantages of online shopping.</p>
                        <p><a class="btn btn-lg btn-primary" href="/news">Learn more</a></p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="img/photo1.jpg" width="612px" height="363px" style="position: relative; left: 350px"/>
                <div class="container">
                    <div class="carousel-caption text-end">
                        <h1 style="color: black">One good thing</h1>
                        <p style="color: black">Get a promo code for a discount by following the link.</p>
                        <p><a class="btn btn-lg btn-primary" href="/promo">Get it!</a></p>
                    </div>
                </div>
            </div>
        </div>
        <button  style="color: black" class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
            <span  class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

<?php
include "leftPanel.php"
?>
    <div class="container" style="position: relative; top:-464px; left: 200px">
        <div class="row row-cols-md-3" >
            <div class="col mb-4">
     <div class="card" style="width: 300px;">
         <img src="..." class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title">Название карточки</h5>
             <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
         </div>
         <div class="card-footer">
             <button  class="btn btn-primary" style="background:black ">110p</button>
             <button  class="btn btn-primary">Add to cart</button>
         </div>
     </div>
     </div>
            <div class="col mb-4">
     <div class="card" style="width: 300px; ">
         <img src="..." class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title">Название карточки</h5>
             <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
         </div>
         <div class="card-footer">
             <button  class="btn btn-primary" style="background:black ">110p</button>
             <button  class="btn btn-primary">Add to cart</button>
         </div>
     </div>
            </div>
            <div class="col mb-4">
     <div class="card" style="width: 300px; ">
         <img src="..." class="card-img-top" alt="...">
         <div class="card-body">
             <h5 class="card-title">Название карточки</h5>
             <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
         </div>
         <div class="card-footer">
             <button  class="btn btn-primary" style="background:black ">110p</button>
             <button  class="btn btn-primary">Add to cart</button>
         </div>
     </div>
            </div>
 </div>
    </div>


    <script async src="https://cdn.jsdelivr.net/npm/es-module-shims@1/dist/es-module-shims.min.js" crossorigin="anonymous"></script>
    <script type="importmap">
    {
      "imports": {
        "@popperjs/core": "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js",
        "bootstrap": "https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.esm.min.js"
      }
    }
    </script>
    <script type="module">
        import * as bootstrap from 'bootstrap'

        new bootstrap.Popover(document.getElementById('popoverButton'))
    </script>
<?php
include "footer.php"
?>
</body>