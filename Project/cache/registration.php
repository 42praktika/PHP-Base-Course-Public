<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Регистрация </title>
    
<link rel="stylesheet" type="text/css" href="../web/css/main.css">
<link rel="stylesheet" type="text/css" href="../web/css/userForm.css">
<link rel="stylesheet" type="text/css" href="../web/css/submitButton.css">

</head>
<body>
   
<div class="user-form">
  <h1>Регистрация</h1>
  <form action="<?php echo $registration_action ?>" method="post">
    <label for="name">Имя</label>
    <input type="text" name="name" id="name"><br>

    <label for="email">Электронная почта</label>
    <input type="text" name="email" id="email"><br>

    <label for="password">Пароль</label>
    <input type="password" name="password" id="password"><br>

    <input type="submit" value="Зарегистрироваться">
  </form>
  <a class="user-form__a" href="<?php echo $main_action ?>">Назад</a>
</div>


</body>
</html>






