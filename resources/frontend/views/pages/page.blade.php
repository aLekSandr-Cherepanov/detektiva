@extends('layouts.app')

@section('title', $page->title . ' | ')

@section('content')
    <div class="ie-panel"><a href="https://windows.microsoft.com/en-US/internet-explorer/"><img src="{{ asset('images/ie8-panel/warning_bar_0000_us.jpg') }}" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>

    @include('elements.preloader')

    <div class="page">
        <!-- Page Header-->
        @include('elements.header_page')

        <section class="breadcrumbs-custom bg-image context-dark" style="background-image: url({{ asset('images/breadcrumbs-bg.jpg') }});">
            <div class="container">
                <h4 class="breadcrumbs-custom-title">{{ $page->title }}</h4>
                <ul class="breadcrumbs-custom-path">
                    <li><a href="/">@lang('frontend.menu.home')</a></li>
                    <li class="active">{{ $page->title }}</li>
                </ul>
            </div>
        </section>

        <section class="bg-default section-md section-relative">
            <div class="container">
                <div class="row row-50 justify-content-xl-between">
                    <div class="col-lg-9 col-xl-8">
                        <div class="section-title section-title-left">
                            <h3 class="text-capitalize">{{ $page->title }}</h3>
                        </div>

                        {!! $page->content !!}

                        <div class="share-block text-right">
                            <ul class="list-inline list-inline-sm">
                                @include('elements.block_networks_icons')
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 pt-lg-5">
                        <div class="block-aside">
                            <div class="block-aside-item">
                                <!-- RD Search-->
                                <form class="rd-search" action="https://livedemo00.template-help.com/wt_prod-20957/search-results.html" method="GET">
                                    <div class="form-wrap">
                                        <label class="form-label" for="rd-search-form-input">Search</label>
                                        <input class="form-input" id="rd-search-form-input" type="text" name="s" autocomplete="off">
                                        <button class="rd-search-form-submit fa-search" type="submit"></button>
                                    </div>
                                </form>
                            </div>

                            <div class="block-aside-item">
                                <h4 class="block-aside-item-title">УСЛУГИ ЧАСТНОГО ДЕТЕКТИВА ФИЗИЧЕСКИМ ЛИЦАМ</h4>
                                <ul class="list-marked">
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-voprosy-suprugi" title="У вас есть опасения, что ваш супруг вам изменяет? Вы думаете, что ваша жена завела любовника? Или просто хотите убедиться, что вашему семейному счастью ничего не угрожает?   Значит, вам нужно обратиться в детективное агентство.
">Выявление супружеской неверности</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-vosvrat-dolgov" title="Розыск должников, мошенников, Возврат долгов.Детективное агентство в Германии является структурой, ориентированной на помощь организациям и физическим лицам в возвращении задолженностей на территории Германии(Европы). ">Розыск должников, мошенников. Возврат долгов.</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-vnebrachnye-svjasi-ismena" title="Супружеская неверность. Выявление фактов супружеской измены">Измена мужа, измена жены, внебрачные связи</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-proverka-obrasa-jisni-detei-podrostkov" title="Если у вас есть основания заподозрить ребенка в не совсем чем-то хорошем, либо вам не совсем нравится его окружение, или же вы просто хотите быть уверенным в том, что с ним все в порядке, тогда предлагаем вам воспользоваться услугой с проверки образа жизни детей. Частный детектив, незаметно и негласно для ребенка, не унижая его достоинства, проведет наблюдение за его окружением и жизнью, выявит его интересы.">Проверка образа жизни детей и других членов семьи</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-rosysk-propavchih-besvesti" title="Розыск пропавших без вести
">Розыск пропавших без вести</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-rosysk-utrachenogo-imuschestva" title="Розыск утраченного имущества.Если вы все же столкнулись с этим неприятным фактом, не расстраивайтесь, ничего бесследно не пропадает. В 99 % случаев находится и утрата, и виновное в хищении физическое или юридическое лицо.">Розыск утраченного имущества</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-saschita-prosluchivanie" title="Профессиональная защита от прослушивания.Для того, чтобы исключить возможность утечки информации в будущем частные детективные агентства предлагают использовать, устройства, позволяющие блокировать сигналы прослушивающих устройств, расположенных в помещении.">Профессиональная защита от прослушивания</a></li>
                                    <li class="leaf active-trail"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-skrytoe-video" title="Скрытое видеонаблюдение.Служба техничесой безопасности нашего детективного агентства специализируется на проектировании, монтаже и обслуживании систем видеонаблюдения, контроля доступа и безопасности с помощью применения оборудования и технологий ведущих мировых производителей." class="active">Скрытое видеонаблюдение</a></li>
                                    <li class="leaf last"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-besopasnost-nedvigimost" title="Услуги детектива в Германии -безопасность сделок с недвижимостью.Обращение к частному детективу при совершении сомнительной или ответственной сделки позволит вам избежать серьезных финансовых последствий. ">Безопасность сделок с недвижимостью</a></li>
                                </ul>
                            </div>

                            <div class="block-aside-item">
                                <h4 class="block-aside-item-title">УСЛУГИ ЧАСТНОГО ДЕТЕКТИВА ЮРИДИЧЕСКИМ ЛИЦАМ</h4>
                                <ul class="list-marked">
                                    <li class="leaf first"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-besopastnost-bisnes" title="Обеспечение безопасности бизнеса">Обеспечение безопасности бизнеса</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-proverka-partnera" title="Проверка контрагента, проверка партнера">Проверка контрагента, проверка партнера</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-informazionnaja-besopastnost" title="Информационная безопасность">Информационная безопасность</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-preduprigdenie-hischenii" title="Предупреждение хищений">Предупреждение хищений</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-audit-informazionnaja-besopastnost" title="Аудит информационной безопасности">Аудит информационной безопасности</a></li>
                                    <li class="leaf last"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-polirograf" title="Проверка на полиграфе (детекторе лжи) в детективном агентстве">Проверка на полиграфе (детекторе лжи)</a></li>
                                </ul>
                            </div>

                            <div class="block-aside-item">
                                <h4 class="block-aside-item-title">ПОЛЕЗНАЯ ИНФОРМАЦИЯ</h4>
                                <ul class="list-marked">
                                    <li class="leaf first"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-uslugi-chastnogo-detektiva" title="Частное детективное агенство предоставляет услуги частного детектива: частный сыск, поиск, розыск пропавшего человека, без вести пропавших, преступников, машин, адреса, телефона, по фамилии, по телефону.">Услуги частного детектива</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-prinzypy-chastnogo-detektiva" title="">Принципы частного детектива</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-kodeks-detektiva" title="Кодекс детектива">Кодекс детектива</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-predostavljaemaja-informazia" title="Предоставляемая информация">Предоставляемая информация</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-detektiv-advokat" title="Детектив и адвокат">Детектив и адвокат</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-juredicheskie-uslugi" title="Юридические услуги">Юридические услуги</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-detektiv-expertisa" title="Частный детектив - независимая экспертиза.">Частный детектив - независимая экспертиза.</a></li>
                                    <li class="leaf"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-chastnyi-sysk" title="Частный сыск">Частный сыск</a></li>
                                    <li class="leaf last"><a href="/detektiv-berlin-detektivnoe-agenstvo-germania-istoria-sysk" title="История частного сыска">История частного сыска</a></li>
                                </ul>
                            </div>

                        </div>
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



