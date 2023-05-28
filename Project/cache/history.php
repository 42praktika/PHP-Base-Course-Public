<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> История </title>
    
<link rel="stylesheet" type="text/css" href="../web/css/main.css">
<link rel="stylesheet" type="text/css" href="../web/css/tables.css">
<link rel="stylesheet" type="text/css" href="../web/css/userForm.css">

</head>
<body>
   
<div class="user-form">
  <p>Посмотреть за другой период:</p>
  <form action="<?php echo $history_action ?>" method="POST">
    <input type="date" name="start">
    <input type="date" name="end">
    <input type="submit" value="Посмотреть">
  </form>
</div>
<table class="money-operation">
  <tr>
    <th>Category</th>
    <th>Sum</th>
    <th>Date</th>
    <th>Description</th>
    <th></th>
    <th></th>
  </tr>

  <?php foreach ($operations as $operation) {
      $categoryId = $operation->getCategoryId();
      $category = $categories[$categoryId];
      $sum = $operation->getSum();
      $date = $operation->getDate();
      $description = $operation->getDescription();
      $editHref = $edit_action.'?id='.$operation->getId();
      $deleteHref = $delete_action.'?id='.$operation->getId();
      echo "
  <tr>
    <th>$category</th>
    <th>$sum</th>
    <th>$date</th>
    <th>$description</th>
    <th>
      <a href='$editHref'>Edit</a>
    </th>
    <th>
      <a href='$deleteHref'>Delete</a>
    </th>
  </tr>";
    } ?>

</table>

<a class="user-form user-form__a" href="<?php echo $profile_action ?>">Профиль</a>

</body>
</html>






