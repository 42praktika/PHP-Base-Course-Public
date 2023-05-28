<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Вход </title>
    
<link rel="stylesheet" type="text/css" href="../web/css/main.css">
<link rel="stylesheet" type="text/css" href="../web/css/userForm.css">
<link rel="stylesheet" type="text/css" href="../web/css/submitButton.css">

</head>
<body>
   
<div class="user-form">
  <h1>Войти</h1>
  <form action="<?php echo $login_action ?>" method="post">
    <label for="email">Электронная почта</label>
    <input type="text" name="email" id="email"><br>

    <label for="password">Пароль</label>
    <input type="password" name="password" id="password"><br>

    <input type="submit" value="Войти">
  </form>

  <a class="user-form__a" href="<?php echo $main_action ?>">Назад</a>
</div>


</body>
</html>






