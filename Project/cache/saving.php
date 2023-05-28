<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Сбережение </title>
    
<link rel="stylesheet" type="text/css" href="../web/css/main.css">
<link rel="stylesheet" type="text/css" href="../web/css/userForm.css">

</head>
<body>
   
<div class="user-form">
  <h1>Сбережение</h1>
  <form action="<?php echo $cash_saving_action ?>" method="post">
    <label for="name">Имя</label>
    <input type="text" name="name" id="name" value="<?php echo $saving->getName() ?>"><br>

    <label for="sum">Сумма</label>
    <input type="number" name="sum" id="sum" value="<?php echo $saving->getSum() ?>"><br>

    <input type="submit" value="Сохранить">
  </form>
  <?php if ($delete_action != null) {
  echo "<a class='user-form__a' href='$delete_action'>Удалить</a>";
  } ?>
  <br>
  <a class="user-form__a" href="<?php echo $profile_action ?>">Профиль</a>
</div>


</body>
</html>






