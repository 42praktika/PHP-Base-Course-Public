<?php
//Вкрапление html в код
echo "<html><body>\n";
echo "<h1>Последние новости:</h1>";
$file = fopen("news.txt", "rb");
$counter = 0;
while (($news = fgets($file, 4096)) !== false) {
    $counter ++;
    echo "<li>$counter-ая новость: $news</li>";
}
fclose($file);
echo "</body></html>\n";
