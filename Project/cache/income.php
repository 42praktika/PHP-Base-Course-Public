<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Доход </title>
    
<link rel="stylesheet" type="text/css" href="../web/css/userForm.css">
<link rel="stylesheet" type="text/css" href="../web/css/main.css">

</head>
<body>
   

<div class="user-form">
    <h1>Добавить доход</h1>
    <form action="<?php echo $income_action ?>" method="post">
        <label for="sum">Сумма</label>
        <input type="number" name="sum" id="sum"
               <?php if ($operation != null) {
               $sum = $operation->getSum();
        echo "value='$sum'";
        } ?>
        ><br>

        <label for="date">Дата</label>
        <input type="date" name="date" id="date"
               <?php if ($operation != null) {
               $date = $operation->getDate();
        echo "value='$date'";
        } ?>
        ><br>

        <label for="category">Категория</label>
        <select name="category_id" id="category">
            <?php $categoryId = 0;
            if ($operation != null) {
            $categoryId = $operation->getCategoryId();
            }
            foreach ($categories as $c) {
            $n = $c->getName();
            $i = $c->getId();
            if ($i == $categoryId) echo "<option value='$i' selected>$n</option>";
            else echo "<option value='$i'>$n</option>";
            } ?>

        </select>
        <input type="hidden" name="income" value="true">
        <br>

        <label for="description">Описание</label>
        <input type="text" name="description" id="description"
               <?php if ($operation != null) {
               $description = $operation->getDescription();
        echo "value='$description'";
        } ?>
        ><br>

        <input type="submit" value="Сохранить">
    </form>
    <a class="user-form__a" href="<?php echo $profile_action ?>">Профиль</a>
</div>

</body>
</html>






