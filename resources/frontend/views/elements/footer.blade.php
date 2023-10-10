<footer class="section footer-classic context-dark bg-gray-700">
    <div class="footer-classic-top section-sm">
        <div class="container">
            <div class="row row-50">
                <div class="col-sm-6 col-lg-3">
                    <a class="footer-logo" href="/">
                        <img src="{{ asset('images/logo.png') }}" alt="" width="159" height="40"/>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <h5 class="footer-title">Представительство <br>в&nbsp;Германии:</h5>
                    <ul class="list">
                        <li>90402, Германия,</li>
                        <li>Нюрнберг, Лоренцер штрассе 11</li>
                        <li><a href="tel:+4917611070707">+49 (176) 1107-07-07</a></li>
                        <li><a href="tel:+4991125396488">+49 (911) 25396488</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <h5 class="footer-title">Адрес <br>в&nbsp;Росcии:</h5>
                    <ul class="list">
                        <li>240/254/21155, Россия, Москва,</li>
                        <li>Малый Сухаревский переулок</li>
                        <li>д.9 С1</li>
                        <li><a href="tel:+74991131791">+7 (499) 113-17-91</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <h5 class="footer-title">Полезные <br>ссылки</h5>
                    <ul class="list">
                        <li><a href="/">Главная</a></li>
                        <li><a href="/faq">Вопросы / ответы</a></li>
                        <li><a href="/node/98">Цены</a></li>
                        <li><a href="/contacts">Контакты</a></li>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="container">
        <hr>
    </div>
    <div class="footer-classic-bottom">
        <div class="container">
            <div class="row row-30">
                <div class="col-md-9 order-md-1">
                    <p class="rights">
                        <div style="float:left;margin-right:5px;">&copy;&nbsp;2010 – {{ date('Y') }} Все права защищены.</div>
                        <div style="float:left;">Детективное агентство Private detektei Genadi Najda.</div>
                    </p>
                </div>
                <div class="col-md-3 order-md-2 text-md-right">
                    <ul class="list-inline list-inline-sm social-list">
                        @include('elements.block_networks_icons')
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>