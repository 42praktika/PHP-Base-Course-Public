<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="assets/css/main.css">

    <style>
        *{
            margin: 0;
            padding: 50px;
            box-sizing: border-box;
            background-color: mediumslateblue;
        }

        body{
            height: 100vh;
            display: flex;
            algin-items: center;
            justify-content: center;
            font-family: "Brush Script MT", "Brush Script std", cursive;
        }
        a{
            color: crimson;
        }
        a:hover{
            color: fuchsia;
        }
        .pop-outin {
            animation: 2s anim ease infinite;
        }

        @keyframes anim {
            0% {
                color: black;
                transform: scale(0);
                opacity: 0;
                text-shadow: 0 0 0 rgba(0, 0, 0, 0);
            }
            25% {
                color: red;
                transform: scale(2);
                opacity: 1;
                text-shadow: 3px 10px 5px rgba(0, 0, 0, 0.5);
            }
            50% {
                color: black;
                transform: scale(1);
                opacity: 1;
                text-shadow: 1px 0 0 rgba(0, 0, 0, 0);
            }
            100% {
                /* animate nothing to add pause at the end of animation */
                transform: scale(1);
                opacity: 1;
                text-shadow: 1px 0 0 rgba(0, 0, 0, 0);
            }
        }

        p{
            margin: 10px 0;
        }


        form{
            display: flex;
            flex-direction: column;
            width: 400px;
        }
        input{
            margin: 10px 0;
            padding: 10px;
            border-bottom: 2px solid #e3e3e3;
            outline: none;
        }

        button{
            padding: 10px;
            background: #e3e3e3;
            border: unset;
            cursor: pointer;



        }
    </style>

</head>
<body>
<!-- Форма -->
<form action="" method="">

    <form>
        <p> О вас: </p>
        <p> Имя: <?php echo $_POST['name']; ?> </p>
        <p> Email: <?php echo $_POST['email']; ?> </p>
        <p> Возраст: <?php echo $_POST['age']; ?> </p>
    </form>
    <span id="button1" style="position:relative;z-index:10" onmouseOver="moveIt()" onfocus="moveIt();this.blur()">
<button style="background-color:lightgreen;height:50px; width:70px;" onmouseDown="moveIt()" onmouseover="moveIt()" onfocus="moveIt();this.blur()">Выход</button>
</span>
</form>
<script>
    function getObj(objID)
    {
        if (document.getElementById) {return document.getElementById(objID);}
        else if (document.all) {return document.all[objID];}
        else if (document.layers) {return document.layers[objID];}
    }
    var ie4=document.all;
    var ns6=document.getElementById&&!document.all;
    cobj=getObj("button1");

    function moveIt(){
        y=Math.floor(Math.random()*301);
        x=Math.floor(Math.random()*401);
        if (ie4){
            cobj.style.top  = y;
            cobj.style.left = x;
        }
        else if (ns6){
            cobj.style.top  = y+"px";
            cobj.style.left = x+"px";
        }
    }
</script>

</body>


</html>



