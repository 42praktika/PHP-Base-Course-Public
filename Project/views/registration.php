<html lang="ru">
<head>
    <title>Registration</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div style="width: 500px;height: 900px; position:relative;top:200px;left: 700px">
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
           aria-controls="pills-register" aria-selected="true">Register</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade show active" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
        <form method="post" action="http://localhost:8081/doregistration">
            <!-- Name input -->
            <div class="form-outline mb-4">
                <input type="text" id="registerName" class="form-control" placeholder="Name" />
            </div>

            <!-- Username input -->
            <div class="form-outline mb-4">
                <input type="text" id="registerUsername" class="form-control" placeholder="Username" />
            </div>

            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="registerEmail" class="form-control" placeholder="Email"/>
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="registerPassword" class="form-control" placeholder="Password"/>
            </div>

            <!-- Repeat Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="registerRepeatPassword" class="form-control" placeholder="Repeat password" />
            </div>

            <!-- Checkbox -->
            <div class="form-check d-flex justify-content-center mb-4">
                <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" checked
                       aria-describedby="registerCheckHelpText" />
                <label class="form-check-label" for="registerCheck">
                    I have read and agree to the terms
                </label>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
        </form>
    </div>
</div>
</div>

</body>
