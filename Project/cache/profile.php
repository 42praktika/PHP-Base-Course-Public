<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Профиль </title>
    
<link rel="stylesheet" type="text/css" href="../web/css/main.css">
<link rel="stylesheet" type="text/css" href="../web/css/profile.css">
<link rel="stylesheet" type="text/css" href="../web/css/optionSelection.css">

</head>
<body>
   

<div class="container">
    <h1>Дневник расходов и доходов</h1>

    <div class="sidebar">
        <p class="greetings">Добрый день, <?php echo $username ?>!</p>

        <div class="cash-savings">
            <?php if ($savings)
            echo "<h2>Сбережения</h2>";
            echo "<br>";
            foreach ($savings as $saving) {
            $n = $saving->getName();
            $s = $saving->getSum();
            $href = $edit_saving_action.'?id='.$saving->getId();
            echo "<div class='cash-saving'><h3>$n</h3><p>$s</p><a href='$href'>Редактировать</a></div>";
            } ?>
        </div>
    </div>

    <div class="main">

        <div class="month-data">
            <a class="main-widget" href="<?php echo $history_expense_action ?>">Мои расходы с начала месяца: <?php echo $expenses ?></a>
            <a class="main-widget" href="<?php echo $history_income_action ?>">Мои доходы с начала месяца: <?php echo $income ?></a>
        </div>

        <div class="control-buttons">
            <a class="control-button" href="<?php echo $add_income_action ?>">Добавить доход</a>
            <a class="control-button" href="<?php echo $add_expense_action ?>">Добавить расход</a>
            <a class="control-button" href="<?php echo $add_cash_savings_action ?>">Добавить сбережение</a>
        </div>

    </div>
</div>



</body>
</html>






