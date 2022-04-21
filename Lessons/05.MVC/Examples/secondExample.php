<!--Вставка кода в шаблон  -->
<html><body>
<h1>Последние новости:</h1>
<?php
$file = fopen("news.txt", "rb");
$counter = 0;
?>
<?php while (($news = fgets($file, 4096)) !== false) {
    $counter ++;?>
    <li><?=$counter?>-ая новость: <?=$news?></li>
<?php }
fclose($file);?>
</body></html>