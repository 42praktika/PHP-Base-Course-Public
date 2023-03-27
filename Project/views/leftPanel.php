<html lang="ru">
<head>
    <title>Left panel</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div style="width: 300px; height:250px; position: relative; left: 50px">
    <ul class="dropdown-menu position-static d-grid gap-1 p-2 rounded-3 mx-0 shadow w-220px">
        <li><a class="dropdown-item rounded-2 active" href="#">Categories</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item rounded-2" href="#">Roman</a></li>
        <li><a class="dropdown-item rounded-2" href="#">Detective</a></li>
        <li><a class="dropdown-item rounded-2" href="#">Science</a></li>
    </ul>
</div>
<div class="b-example-divider"></div>

<div class="card" style="width: 300px;position: relative; left: 50px">
    <h3 class="dropdown-item rounded-2 active" style="position:relative; left: 15px" >Last product</h3>
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
        <h5 class="card-title">Name of product</h5>
        <p class="card-text">Book description</p>
        <a href="#" class="btn btn-primary">Buy</a>
    </div>
</div>
</body>