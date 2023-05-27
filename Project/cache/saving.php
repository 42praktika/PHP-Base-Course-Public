<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Сбережение </title>
</head>
<body>
   
<h1>Сбережение</h1>
<form action="<?php echo $cash_saving_action ?>?id=<?php echo $saving->getId() ?>" method="post">
  <label for="name">Имя</label>
  <input type="text" name="name" id="name" value="<?php echo $saving->getName() ?>"><br>

  <label for="sum">Сумма</label>
  <input type="text" name="sum" id="sum" value="<?php echo $saving->getSum() ?>"><br>

  <input type="submit" value="Сохранить">
</form>
<a href="<?php echo $profile_action ?>">Профиль</a>

</body>
</html>




