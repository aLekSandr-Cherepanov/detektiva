@extends('layouts.app')

@section('content')
    <div class="ie-panel"><a href="https://windows.microsoft.com/en-US/internet-explorer/"><img src="{{ asset('images/ie8-panel/warning_bar_0000_us.jpg') }}" height="42" width="820"
                                                                                                alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>

    @include('elements.preloader')

    <div class="page">
        <!-- Page Header-->
    @include('elements.header')

    <!-- Swiper-->
        <section class="section swiper-container swiper-slider swiper-slider-1" data-loop="false" data-autoplay="false" data-simulate-touch="false" data-slide-effect="fade">
            <div class="swiper-wrapper text-center text-lg-left">
                <div class="swiper-slide" data-slide-bg="images/slider.jpg">
                    <div class="swiper-slide-caption section-md">
                        <div class="container">
                            <div class="row justify-content-lg-end">
                                <div class="col-lg-7 col-xl-5">
                                    <h1 data-caption-animate="fadeInUp" data-caption-delay="100">Международное бюро расследований</h1>
                                    <p data-caption-animate="fadeInUp" data-caption-delay="250">ДОБРО ПОЖАЛОВАТЬ<br>
                                        на сайт Международного бюро расследований <br>
                                        <strong>Private detektei Genadi Najda</strong>
                                        </p>
                                    <a class="button button-primary button-circle" href="#form-contact" data-caption-animate="fadeInUp" data-caption-delay="450">Задать вопрос детективу</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-wrapper text-center text-lg-left">
                <div class="swiper-slide" data-slide-bg="images/swiper-slide-2.jpg">
                    <div class="swiper-slide-caption section-md">
                        <div class="container">
                            <div class="row justify-content-lg-end">
                                <div class="col-lg-7 col-xl-5">
                                    <h1 data-caption-animate="fadeInUp" data-caption-delay="100">Международное бюро расследований</h1>
                                    <p data-caption-animate="fadeInUp" data-caption-delay="250">ДОБРО ПОЖАЛОВАТЬ<br>
                                        на сайте детективного агентства!</p>
                                    <a class="button button-primary button-circle" href="#" data-caption-animate="fadeInUp" data-caption-delay="450">Задать вопрос детективу</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-default section-md pt-lg-0 section-relative">
            <div class="container">
                <div class="block-icon-modern-items">
                    <div class="block-icon-modern block-icon-secondary">
                        <div class="icon-figure"><span class="icon icon-xl thin-icon-briefcase-2"></span></div>
                        <div class="block-icon-caption">
                            <h4 class="block-icon-title"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-privat">Услуги для бизнеса</a></h4>
                            <p>Business requires strong legislative background to operate well.</p>
                        </div>
                    </div>
                    <div class="block-icon-modern block-icon-primary">
                        <div class="icon-figure"><span class="icon icon-xl thin-icon-user"></span></div>
                        <div class="block-icon-caption">
                            <h4 class="block-icon-title"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-jura">Услуги частным лицам</a></h4>
                            <p>We advocate for our clients, seeking a fair resolution within a timeframe.</p>
                        </div>
                    </div>
                    <div class="block-icon-modern block-icon-secondary">
                        <div class="icon-figure"><span class="icon icon-xl thin-icon-document-edit"></span></div>
                        <div class="block-icon-caption">
                            <h4 class="block-icon-title"><a href="/uslugi-detektiva-berlin-info">Экспресс расследования</a></h4>
                            <p>Insurance issues require excellent knowledge and great intuition.</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row row-30">
                    <div class="col-md-6 col-lg-4">
                        <div class="section-title section-title-left">
                            <h2 class="">Целью деятельности Детективного агентства<br>
                                <span class="text-italic text-primary">является:</span>
                            </h2>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-8 pt-lg-5">
                        <ul class="list-marked">
                            <li>оказание сыскных услуг юридическим и физическим лицам в целях защиты их интересов на основе взаимоуважения и соблюдения прав и свобод человека и гражданина;</li>
                            <li>содействие правоохранительным и судебным органам в повышении результативности работы по предупреждению и раскрытию преступлений;</li>
                            <li>обеспечение безопасности бизнеса, а также физических лиц;</li>
                        </ul>
                        <p>Частное Детективное агентство в Берлине осуществляет свою деятельность как на территории Берлина, так и по всей Германии, а также в Мире. Наличие обширных зарубежных связей с действующими частными детективами и детективными агентствами в Европе, Азии, Африке, Латинской Америке, Австралии позволяет дистанционно разрешать многие проблемы наших клиентов, а в случае необходимости – выезжать нашим детективам в эти страны.
                        </p>

                        <a class="button button-circle button-primary" href="/detektiv-berlin-detektivnoe-agenstvo-germania">Подробнее...</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="parallax-container" data-parallax-img="images/parallax-img-1.jpg">
            <div class="parallax-content section-md context-dark text-center bg-gray-700-filter-70">
                <div class="container">
                    <div class="row row-50">
                        <div class="col-12">
                            <div class="section-title">
                                <h2>{{ date('Y') - 2010 }} лет опыта в различных делах</h2>
                                <p>Мы гордимся тем, что предлагаем первоклассные услуги в России, Украине, Германии и по всей Европе!</p>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row row-30 row-bordered">
                                <div class="col-6 col-md-3">
                                    <!-- Box counter-->
                                    <article class="box-counter">
                                        <div class="box-counter-main heading-2">
                                            <div class="counter">2010</div>
                                        </div>
                                        <p class="box-counter-title">начало <br> деятельности</p>
                                    </article>
                                </div>
                                <div class="col-6 col-md-3">
                                    <!-- Box counter-->
                                    <article class="box-counter">
                                        <div class="box-counter-main heading-2">
                                            <div class="counter">409</div>
                                        </div>
                                        <p class="box-counter-title">расследованных<br>дел</p>
                                    </article>
                                </div>
                                <div class="col-6 col-md-3">
                                    <!-- Box counter-->
                                    <article class="box-counter">
                                        <div class="box-counter-main heading-2">
                                            <div class="counter">400</div>
                                        </div>
                                        <p class="box-counter-title">положительных<br>отзывов</p>
                                    </article>
                                </div>
                                <div class="col-6 col-md-3">
                                    <!-- Box counter-->
                                    <article class="box-counter">
                                        <div class="box-counter-main heading-2">
                                            <div class="counter">500</div>
                                        </div>
                                        <p class="box-counter-title">довольных<br>клиентов</p>
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-default section-md">
            <div class="container">
                <div class="section-title text-center">
                    <h2>Услуги частного детектива</h2>
                </div>
                <div class="row row-30">
                    <div class="col-sm-6 col-lg-4">
                        <div class="block-icon-modern">
                            <div class="icon-figure"><span class="icon icon-xl thin-icon-user"></span></div>
                            <div class="block-icon-caption">
                                <h4 class="block-icon-title"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-rosysk-propavchih-besvesti">Розыск пропавших <br>без вести</a></h4>
                                <p>Если вам нужно разыскать человека — мы готовы помочь. Мы занимаемся всеми видами поисковой деятельности.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="block-icon-modern">
                            <div class="icon-figure"><span class="icon icon-xl thin-icon-money"></span></div>
                            <div class="block-icon-caption">
                                <h4 class="block-icon-title"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-vosvrat-dolgov">Розыск должников, <br>возврат долгов</a></h4>
                                <p>Профессиональная помощь в решении финансовых, коммерческих и других сложных деловых вопросов.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="block-icon-modern">
                            <div class="icon-figure"><span class="icon icon-xl thin-icon-home"></span></div>
                            <div class="block-icon-caption">
                                <h4 class="block-icon-title"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-rosysk-utrachenogo-imuschestva">Розыск утраченного имущества</a></h4>
                                <p>Мы знаем, что надо делать и имеем опыт, чтобы найти и вернуть ваше утраченное имущество.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="block-icon-modern">
                            <div class="icon-figure"><span class="icon icon-xl thin-icon-umbrella"></span></div>
                            <div class="block-icon-caption">
                                <h4 class="block-icon-title"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-informazionnaja-besopastnost">Информационная безопасность</a></h4>
                                <p>Оказание услуг, связанных с обеспечением информационной безопасности предприятий и граждан.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="block-icon-modern">
                            <div class="icon-figure"><span class="icon icon-xl thin-icon-briefcase-2"></span></div>
                            <div class="block-icon-caption">
                                <h4 class="block-icon-title"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-besopastnost-bisnes">Безопасность <br>бизнеса</a></h4>
                                <p>Наше агентство предлагает услуги, которые обеспечивают экономическую безопасность вашего бизнеса.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="block-icon-modern">
                            <div class="icon-figure"><span class="icon icon-xl thin-icon-book"></span></div>
                            <div class="block-icon-caption">
                                <h4 class="block-icon-title"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-proverka-partnera">Проверка партнера, контрагента</a></h4>
                                <p>We work in an open dialogue with you in order to devise the strategy which will best serve your interests.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="parallax-container" data-parallax-img="images/parallax-img-2.jpg">
            <div class="parallax-content section-md context-dark text-center bg-gray-700-filter-70">
                <div class="container">
                    <div class="row row-50">
                        <div class="col-12">
                            <div class="section-title text-center">
                                <h2>УСЛУГИ ЧАСТНОГО ДЕТЕКТИВА</h2>
                            </div>
                        </div>
                        <div class="col-12">
                            <!-- Owl Carousel-->
                            <div class="owl-carousel" data-items="1" data-md-items="2" data-lg-items="3" data-dots="true" data-nav="false" data-stage-padding="15" data-loop="false" data-margin="30" data-mouse-drag="false">

                                <div class="post-classic">
                                    <h4 class="post-classic-title">ФИЗИЧЕСКИМ ЛИЦАМ</h4>
                                    <ul class="post-classic-meta">
                                            <li class="leaf first"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-vosvrat-dolgov">Розыск должников. Возврат долгов.</a></li>
                                        <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-voprosy-suprugi">Выявление супружеской неверности</a></li>
                                            <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-proverka-obrasa-jisni-detei-podrostkov">Проверка образа жизни детей и других членов семьи</a></li>
                                            <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-rosysk-propavchih-besvesti">Розыск пропавших без вести</a></li>
                                            <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-rosysk-utrachenogo-imuschestva">Розыск утраченного имущества</a></li>
                                            <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-saschita-prosluchivanie">Профессиональная защита от прослушивания</a></li>
                                            <li class="leaf active-trail"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-skrytoe-video">Скрытое видеонаблюдение</a></li>
                                            <li class="leaf last"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-besopasnost-nedvigimost">Безопасность сделок с недвижимостью</a></li>

                                    </ul>
                                </div>

                                <div class="post-classic">
                                    <h4 class="post-classic-title">ЮРИДИЧЕСКИМ ЛИЦАМ</h4>
                                        <ul class="post-classic-meta">
                                            <li class="leaf first"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-besopastnost-bisnes">Обеспечение безопасности бизнеса</a></li>
                                            <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-proverka-partnera">Проверка контрагента, проверка партнера</a></li>
                                            <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-informazionnaja-besopastnost">Информационная безопасность</a></li>
                                            <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-preduprigdenie-hischenii">Предупреждение хищений</a></li>
                                            <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-audit-informazionnaja-besopastnost">Аудит информационной безопасности</a></li>
                                            <li class="leaf last"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-polirograf">Проверка на полиграфе (детекторе лжи)</a></li>
                                        </ul>
                                </div>

                                <div class="post-classic">
                                    <h4 class="post-classic-title">ПОЛЕЗНАЯ ИНФОРМАЦИЯ</h4>
                                    <ul class="post-classic-meta">
                                        <li class="leaf first"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-uslugi-chastnogo-detektiva">Услуги частного детектива</a></li>
                                        <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-prinzypy-chastnogo-detektiva">Принципы частного детектива</a></li>
                                        <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-kodeks-detektiva">Кодекс детектива</a></li>
                                        <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-predostavljaemaja-informazia">Предоставляемая информация</a></li>
                                        <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-detektiv-advokat">Детектив и адвокат</a></li>
                                        <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-juredicheskie-uslugi">Юридические услуги</a></li>
                                        <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-detektiv-expertisa">Частный детектив - независимая экспертиза.</a></li>
                                        <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-chastnyi-sysk">Частный сыск</a></li>
                                        <li class="leaf last"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-istoria-sysk">История частного сыска</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-default section-md text-center" style="padding-bottom: 0px;">
            <div class="container">
                <div class="row row-bordered align-items-center">
                    <div class="col-md-3" style="max-width: 20%;">
                        <div class="block-partners"><img src="/images/community/v-1.png.webp"></div>
                    </div>
                    <div class="col-md-3" style="max-width: 20%;">
                        <div class="block-partners"><img src="/images/community/v-2.png.webp"></div>
                    </div>
                    <div class="col-md-3" style="max-width: 20%;">
                        <div class="block-partners"><img src="/images/community/v-3.png.webp"></div>
                    </div>
                    <div class="col-md-3" style="max-width: 20%;">
                        <div class="block-partners"><img src="/images/community/v-4.png.webp"></div>
                    </div>
                    <div class="col-md-3" style="max-width: 20%;">
                        <div class="block-partners"><img src="/images/community/v-5.png.webp"></div>
                    </div>
                </div>
            </div>
        </section>

        <a name="form-contact"></a>
        @include('elements.form_contact')

        @include('elements.footer')

    </div>
    <div class="snackbars" id="form-output-global"></div>
    <!-- #page -->
@endsection
