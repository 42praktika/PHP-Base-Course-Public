<html lang="ru">
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<div style="width: 500px;height: 900px; position:relative;top:300px;left: 700px">
<ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">

    <li class="nav-item" role="presentation">
        <a class="nav-link active" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
           aria-controls="pills-login" aria-selected="true">Login</a>
    </li>
</ul>

<div class="tab-content">
    <div class="tab-pane fade show active" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
        <form method="post" action="http://localhost:8081/dologin">
            <!-- Email input -->
            <div class="form-outline mb-4">
                <input type="email" id="loginName" class="form-control" placeholder="Email or username" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
                <input type="password" id="loginPassword" class="form-control" placeholder="Password" />
            </div>

            <!-- 2 column grid layout -->
            <div class="row mb-4">
                <div class="col-md-6 d-flex justify-content-center">
                    <!-- Checkbox -->
                    <div class="form-check mb-3 mb-md-0">
                        <input class="form-check-input" type="checkbox" value="" id="loginCheck" checked />
                        <label class="form-check-label" for="loginCheck"> Remember me </label>
                    </div>
                </div>

                <div class="col-md-6 d-flex justify-content-center">
                    <!-- Simple link -->
                    <a href="#!">Forgot password?</a>
                </div>
            </div>

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4">Sign in</button>

            <!-- Register buttons -->
            <div class="text-center">
                <p>Not a member? <a href="/registration">Register</a></p>
            </div>
        </form>
    </div>
</div>
</div>
</body>
