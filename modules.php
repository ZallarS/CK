<?php
function print_footer(){
    echo '<footer class="text-center text-lg-start bg-body-tertiary text-muted" style="background: #2c2c2c">

    <section style="padding: 1px">
        <div class="container text-center text-md-start mt-5">

            <div class="row mt-3">

                <div class="col mb-4">

                    <h4 id="contacts" class="text-uppercase fw-bold mb-1 text-center">Цифровая кафедра на карте</h4>

                </div>

                <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A5caf7b52ec4b38370c57e2efaae4bdf14fa6b44b3ffa065f39328b1e3594e508&amp;width=600&height=600&amp;lang=ru_RU&amp;scroll=true"></script>

                <div class="mb-4"></div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h4 class="text-uppercase fw-bold mb-4">Телефон:</h4>
                    <h5>(4722) 30-12-94</h5>
                    <h4 class="text-uppercase fw-bold mb-4">Полезные ссылки:</h4>
                    <a href="https://bsuedu.ru/bsu/"  title="Сайт НИУ &quotБелГУ&quot" target="_blank"><img style="width:60px" src="images/icons/BelGU_LOGO.png"></a>
                    <a href="https://t.me/CKBelGU" title="Telegram канал" target="_blank"><img style="width:60px" src="/images/icons/telegramm_LOGO.png"></a>
                    <a href="http://iten.bsu.edu.ru/iten/" title="Сайт института информационных и цифровых технологий" target="_blank"><img style="width:60px" src="images/icons/IIICT_LOGO.png"></a><br><br>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h4 class="text-uppercase fw-bold mb-4">Руководитель кафедры:</h4>
                    <h5>к.т.н., доцент, Ломакин Владимир Васильевич</h5>
                </div>

                <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                    <h4 class="text-uppercase fw-bold mb-4">Адреса кафедр:</h4>
                    <h5>г. Белгород, ул. Победы, д. 85к13, каб 2-25</h5>
                    <h5>ул.Студенческая  д. 14к1, каб 415</h5>
                </div>

                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                    <!-- Links -->
                    <h4 class="text-uppercase fw-bold mb-4"> Адреса электронной почты: </h4>
                    <h5>lomakin@bsu.edu.ru</h5>
                    <h5>varmonger2002@gmail.com</h5>
                </div>

            </div>

        </div>
    </section>

    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        '.date("Y").' :
        <a class="text-reset fw-bold" href="index.php">Цифровая кафедра</a>
    </div>
</footer>';
}
function print_nav(){
    echo '
          <nav class="nav justify-content-center" style="background: #e6e6e6; padding: 7px 15px 15px 15px">
              <li class=""><a href="index.php" title="Цифровая кафедра НИУ &quot;БелГУ&quot;" style="margin: 0 15px 52px 0px;"><img style="border-radius: 15px; width:35px;" src="images/icons/LOGO_500 500_round_V2.png"></a></li>
              <li class=""><a href="schedule.php"  style="margin: 0 15px 0px 0px;" title="Расписание цифровой кафедры НИУ «БелГУ»"><img style="width:35px;" src="images/icons/schedule.png"></a></li>
              <li class=""><a href="arhive.php" style="margin: 0 15px 0px 0px;" title="Архив новостей"><img style="width:35px; " src=" images/icons/arhive.png"></a></li>
              <li class=""><a href="https://mail.bsu.edu.ru" style="margin: 0 15px 0px 0px;" title="Электронная почта НИУ «БелГУ»"><img style="width:35px;" src="images/icons/mail.png"></a></li>
          </nav>';
}

