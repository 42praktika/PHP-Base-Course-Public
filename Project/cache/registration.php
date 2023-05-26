<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Регистрация </title>
</head>
<body>
   
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
<a href="<?php echo $main_action ?>">Назад</a>

</body>
</html>




