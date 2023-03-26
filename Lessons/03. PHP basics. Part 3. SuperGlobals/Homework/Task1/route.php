<?php
    spl_autoload_register(function ($class) {
        if (is_file("./controller/".$class.".php")) {
            include "./controller/".$class.".php";
            if (!class_exists($class, false)) {
                exit("Class ".$class." not found");
            }
        } else {
            exit("Module ".$class." not found");
        }
    });

    if (isset($_GET['m']) && preg_match("/^[a-z.-_]{3,24}$/i", $_GET['m'])) {
        $controller = new $_GET['m'];
        if (!method_exists($_GET['m'], "Init")) {
            exit("Method Init not found");
        } else {
            $res = $controller -> Init();
            if (isset($res['tpl']) && is_file("./view/".$res['tpl'].".php")) {
                include "./view/".$res['tpl'].".php";
            }
        }
    }
?>
