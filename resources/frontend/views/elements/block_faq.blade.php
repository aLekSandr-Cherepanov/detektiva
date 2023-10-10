<section class="section-md bg-gray-700">
    <div class="container">
        <div class="row row-50 justify-content-center">
            <div class="col-lg-11">
                <div class="section-title text-center">
                    <h2>Часто задаваемые вопросы</h2>
                    <p>Если Вы впервые хотите воспользоваться услугами частного детектива в Берлине или частного детективного агентства в Германии и не знаете об основных моментах - этот раздел для Вас.</p>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card-group-custom card-group-minimal" id="accordion1" role="tablist" aria-multiselectable="false">

                    @foreach($faqs as $faq)
                        <article class="card card-custom card-corporate card-minimal">
                            <div class="card-header" role="tab">
                                <div class="card-title">
                                    <a class="heading-4 collapsed" id="accordion1-card-head-wviqtdbq" data-toggle="collapse" data-parent="#accordion1" href="#accordion1-card-body-heoyovvf"
                                       aria-controls="accordion1-card-body-heoyovvf" aria-expanded="true" role="button">{{ $faq->translate(App::getLocale())->title }}<div class="card-arrow"></div>
                                    </a>
                                </div>
                            </div>
                            <div class="collapse" id="accordion1-card-body-heoyovvf" aria-labelledby="accordion1-card-head-wviqtdbq" data-parent="#accordion1" role="tabpanel">
                                <div class="card-body">
                                    {!! $faq->translate(App::getLocale())->content !!}
                                </div>
                            </div>
                        </article>
                        @endforeach

                </div>
            </div>
        </div>
    </div>
</section>