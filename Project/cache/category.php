<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Категория </title>
    
<link rel="stylesheet" type="text/css" href="../web/css/userForm.css">
<link rel="stylesheet" type="text/css" href="../web/css/main.css">
<link rel="stylesheet" type="text/css" href="../web/css/tables.css">

</head>
<body>
   

<div class="user-form">
    <h1>Добавить категорию</h1>
    <form action="<?php echo $category_action ?>" method="post">
        <label for="name">Имя</label>
        <input type="text" name="name" id="name"><br>

        <label for="income">Тип</label>
        <select name="income" id="income">
            <option value="true">Доход</option>
            <option value="false">Расход</option>
        </select>
        <br>
        <input type="submit" value="Сохранить">
    </form>
    <a class="user-form__a" href="<?php echo $profile_action ?>">Профиль</a>
</div>

<table class="money-operation">
    <tr>
        <th>Category</th>
        <th></th>
    </tr>

    <?php foreach ($incomeCategories as $c) {
    $categoryId = $c->getId();
    $categoryName = $c->getName();
    $deleteHref = $delete_action.'?id='.$categoryId;
    echo "
    <tr>
        <th>$categoryName</th>
        <th>
            <a href='$deleteHref'>Delete</a>
        </th>
    </tr>";
    }
    foreach ($defaultIncomeCategories as $c) {
    $categoryName = $c->getName();
    echo "
    <tr>
        <th>$categoryName</th>
        <th></th>
    </tr>";
    } ?>

</table>

<table class="money-operation">
    <tr>
        <th>Category</th>
        <th></th>
    </tr>

    <?php foreach ($expenseCategories as $c) {
    $categoryId = $c->getId();
    $categoryName = $c->getName();
    $deleteHref = $delete_action.'?id='.$categoryId;
    echo "
    <tr>
        <th>$categoryName</th>
        <th>
            <a href='$deleteHref'>Delete</a>
        </th>
    </tr>";
    }
    foreach ($defaultExpenseCategories as $c) {
    $categoryName = $c->getName();
    echo "
    <tr>
        <th>$categoryName</th>
        <th></th>
    </tr>";
    } ?>

</table>

</body>
</html>






