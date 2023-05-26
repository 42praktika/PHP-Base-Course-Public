<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> История </title>
</head>
<body>
   
<h1>Все записи</h1>
<?php echo $operations ?>
<table class="money-operation">
  <tr>
    <th>Category</th>
    <th>Sum</th>
    <th>Date</th>
    <th>Description</th>
    <th></th>
    <th></th>
  </tr>

<!--    <tr>-->
<!--      <th>${operation.category}</th>-->
<!--      <th>${operation.sum}</th>-->
<!--      <th>${operation.date}</th>-->
<!--      <th>${operation.description}</th>-->
<!--      <th>-->
<!--        <a href="">Edit</a>-->
<!--      </th>-->
<!--      <th>-->
<!--        <a href="">Delete</a>-->
<!--      </th>-->
<!--    </tr>-->

</table>

<a href="<?php echo $profile_action ?>">Профиль</a>

</body>
</html>




