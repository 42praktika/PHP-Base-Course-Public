<html lang="ru">
<head>
    <title>feedback</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    <link rel="stylesheet" href="../web/assets/css/feedback.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
    <a class="p-3 border bg-light me-4 py-2 link-body-emphasis text-decoration-none" href="/">На главную</a>
</nav>
<div class="koguvcavis-varazdel">
    <div class="sestim-donials">
        <h1>Отзывы</h1>
        <div class="sectionesag"></div>
        <div class="sagestim-lonials">
            <div class="vemotau-vokusipol">
                <div class="testimonial">
                    <img src="http://zornet.ru/_fr/83/7890600.jpg" alt="">
                    <div class="gecedanam">Шафинский Даниил</div>
                    <div class="apogered-gselected">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>

                    <p>Хочу поблагодарить сотрудников прокатной компании KazanPremAuto. В прокат брал автомобиль впервые, поэтому очень боялся всяких «подводных камней». Выбирал из нескольких прокатов в интернете, в итоге остановился на вашей компании. Менеджер подробно проконсультировал меня по телефону и помог забронировать автомобиль.</p>
                </div>
            </div>

            <div class="vemotau-vokusipol">
                <div class="testimonial">
                    <img src="http://zornet.ru/_fr/83/2047084.jpg" alt="">
                    <div class="gecedanam">Кузнецов Алексей</div>
                    <div class="apogered-gselected">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="far fa-star"></i>
                    </div>
                    <p>Брали ниссан кашкай на прошлой неделе в прокат на четыре дня, когда были в гостях у родственников в Нижнем Новгороде. Именно этот, потому что хочу приобрести аналогичный. Порадовало, что машина была чистая, и снаружи, и в салоне. Едет тихо, расход маленький, все исправно. Очень удобный сервис, всем рекомендую!</p>
                </div>
            </div>

            <div class="vemotau-vokusipol">
                <div class="testimonial">
                    <img src="http://zornet.ru/_fr/83/5640570.jpg" alt="">
                    <div class="gecedanam">Трифонов Руслан</div>
                    <div class="apogered-gselected">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p>Всем привет. У меня только позитивный опыт аренды машин в KazanPremAuto. Все машины свежие и ухоженные. В этот раз достался новый хэтч Форд Фокус. Для меня идеальная машинка и за нормальные деньги. Пробег за все время был около 4 тыс. км. Движок наверное мог бы быть и помощнее, но за то очень экономный. Очень доволен! Всем рекомендую!</p>
                </div>
            </div>
        </div>
          <iframe name="dummyframe" id="dummyframe" style="display: none;"></iframe>
          <form action="http://127.0.0.1:8042/feedBack" method="post" target="dummyframe">
              <div class="container">
                  <label for="name"><b>Представьтесь</b></label>
                  <input type="text" name="name_of_reviewer" required>
                  <br>
                  <label for="star"><b>Укажите кол-во звезд от 1 до 5</b></label>
                  <br>
                  <input type="radio" id="1" value="1" name="stars">
                  <label for="1">1</label>

                  <input type="radio" id="2" value="2" name="stars">
                  <label for="2">2</label>

                  <input type="radio" id="3" value="3" name="stars">
                  <label for="3">3</label>

                  <input type="radio" id="4" value="4" name="stars">
                  <label for="4">4</label>

                  <input type="radio" id="5" value="5" name="stars">
                  <label for="5">5</label>

                  <p><b>Оставьте ваш отзыв:</b></p>
                  <p><label>
                          <textarea name="review"></textarea>
                      </label></p>
              </div>
              <input name="submit" type="submit">
          </form>
          <script src="../web/assets/js/feedback.js"></script>
  </body>
  </html>