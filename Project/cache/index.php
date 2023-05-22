<?php class_exists('app\core\Template') or exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Hello </title>
</head>
<body>

<h2>Hello</h2>
<form action="http://127.0.0.1:8042/<?php echo $post_action ?>" method="post">
    First name: <input type="text" name="first_name"><br>
    Second name: <input type="text" name="second_name"><br>
    Age: <input type="text" name="age"><br>
    Job: <input type="text" name="job"><br>
    E-mail: <input type="text" name="email"><br>
    Phone: <input type="text" name="phone"><br>
    <input type="submit" value="Submit">
</form>

</body>
</html>

