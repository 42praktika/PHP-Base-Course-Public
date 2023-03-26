<html lang="ru">
<head>
    <title>FourOFour</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        <?php echo file_get_contents('./css/presentation.css'); ?>
    </style>
</head>
<body>
<form action="http://127.0.0.1:8042/handle" method="post">
    <section class="h-100 bg-dark">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-registration/img4.webp"
                                     alt="Sample photo" class="img-fluid"
                                     width="470"
                                     style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;"/>
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h5 class="mb-5 text-uppercase">Регистрация в Инстаграмме </h5>

                                    <div class="row">
                                        <div class="col-md-10 mb-4">
                                            <div class="form-outline">
                                                <input type="text" id="yourLogin"
                                                       class="form-control form-control-lg"
                                                       onkeypress="return (event.charCode >= 65 && event.charCode
                                                           <= 90) || (event.charCode >= 97 && event.charCode <= 122) ||
                                                            (event.charCode >= 48 && event.charCode <= 57)"
                                                />
                                                <label class="form-label" for="form3Example1m">Ваш Логин</label>
                                            </div>
                                        </div>
                                        <div class="col-md-10 mb-4">
                                            <div class="form-outline">
                                                <input type="password" id="yourPassword"
                                                       class="form-control form-control-lg"
                                                       onkeypress="return (event.charCode >= 65 && event.charCode
                                                           <= 90) || (event.charCode >= 97 && event.charCode <= 122) ||
                                                            (event.charCode >= 48 && event.charCode <= 57)"
                                                />
                                                <label class="form-label" for="form3Example1n">Ваш пароль </label>
                                            </div>
                                        </div>
                                        <div class="col-md-10 mb-4">
                                            <div class="form-outline">
                                                <input type="password" id="yourPasswordAgain"
                                                       class="form-control form-control-lg"
                                                       onkeypress="return (event.charCode >= 65 && event.charCode
                                                           <= 90) || (event.charCode >= 97 && event.charCode <= 122) ||
                                                            (event.charCode >= 48 && event.charCode <= 57)"
                                                />
                                                <label class="form-label" for="form3Example1n">Повторите
                                                    пароль </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end pt-3">
                                        <button id="btnresetAll" type="button" class="btn btn-light btn-lg">Reset
                                            all
                                        </button>
                                        <button id="btnSubmit" type="button" class="btn btn-warning btn-lg ms-2">
                                            Submit form
                                        </button>
                                    </div>
                                    <div class="Note ustify-content-end pt-3">
                                        Можно использовать только латиницу и цифры.<br>
                                        Если Вы попытаетесь ввести другое - У Вас не будет печататься.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
<script>
    const btnResetAll = document.getElementById('btnresetAll')
    const btnSubmit = document.getElementById('btnSubmit')
    const inputYourLogin = document.getElementById('yourLogin')
    const inputYourPassword = document.getElementById('yourPassword')
    const inputYourPasswordAgain = document.getElementById('yourPasswordAgain')
    btnSubmit.addEventListener('click', () => {
        if ((inputYourPasswordAgain.value === inputYourPassword.value) &&
            inputYourLogin.value.length > 6 && inputYourPassword.value.length > 6 &&
            inputYourPasswordAgain.value.length > 6

        )
            // TODO -СПРОСИТЬ ПРО КОНФИГУРАЦИЮ
            alert('Помогите ')
        else {
            alert('Убедитесь, что совпадают ли пароли и они содержут только латинские буквы')
        }
    })
    btnResetAll.addEventListener('click', () => {
        inputYourLogin.value = inputYourPassword.value = inputYourPasswordAgain.value = ''
    })
</script>
</body>