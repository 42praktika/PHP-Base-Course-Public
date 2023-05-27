<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Расход </title>
</head>
<body>
   
<h1>Добавить расход</h1>
<form action="<?php echo $expense_action ?>" method="post">
  <label for="sum">Сумма</label>
  <input type="number" name="sum" id="sum"><br>

  <label for="date">Дата</label>
  <input type="date" name="date" id="date"><br>

  <label for="category">Категория</label>
  <select name="category_id" id="category">
    <?php foreach ($categories as $c) {
        $n = $c->getName();
        $i = $c->getId();
        echo "<option value='$i'>$n</option>";
      } ?>

    <input type="text" hidden="hidden" name="income" value="false">
  </select>
  <br>

  <label for="description">Описание</label>
  <input type="text" name="description" id="description"><br>

  <input type="submit" value="Добавить">
</form>
<a href="<?php echo $profile_action ?>">Профиль</a>

</body>
</html>




