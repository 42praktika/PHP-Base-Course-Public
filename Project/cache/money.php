<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Доход | Расход </title>
</head>
<body>
   
<h1>Добавить запись</h1>
<form action="<?php echo $money_action ?>" method="post">
  <label for="sum">Сумма</label>
  <input type="text" name="sum" id="sum"><br>

  <label for="category">Категория</label>
  <select name="category" id="category">
  </select>
  <br>

  <input type="submit" value="Добавить">
</form>
<a href="<?php echo $profile_action ?>">Профиль</a>

</body>
</html>




