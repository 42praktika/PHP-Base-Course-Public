<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Сбережение </title>
</head>
<body>
   
<h1>Добавить запись</h1>
<form action="<?php echo $cash_saving_action ?>" method="post">
  <label for="name">Имя</label>
  <input type="text" name="name" id="name"><br>

  <label for="sum">Сумма</label>
  <input type="text" name="sum" id="sum"><br>

  <input type="submit" value="Добавить">
</form>
<a href="<?php echo $profile_action ?>">Профиль</a>

</body>
</html>




