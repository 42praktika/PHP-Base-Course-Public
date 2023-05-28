<script>
    $('.btn-buy').click(function () {//клип на кнопку
        var id = $(this).attr('id'); //получаем id этой кнопки
            $.ajax({//передаем ajax-запросом данные
            type: "POST", //метод передачи данных
            url: '/addtocart.php',//php-файл для обработки данных
            data: {id_tov: id},//передаем наши данные
    });
    });
</script>