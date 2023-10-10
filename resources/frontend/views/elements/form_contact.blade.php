<section class="bg-default section-md">
    <div class="container">
        <div class="row row-50 justify-content-center">
            <div class="col-12">
                <div class="section-title text-center">
                    <h2>@lang('frontend.title_form')</h2>
                </div>
            </div>
            <div class="col-12 col-lg-9">
                <form class="rd-mailform text-left row row-20" data-form-output="form-output-global" data-form-type="contact" method="post" action="/contact/send">
                    @csrf
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-name">@lang('frontend.your_name') * </label>
                            <input class="form-input" id="contact-name" type="text" name="name" data-constraints="@Required">
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-email">@lang('frontend.your_email') * </label>
                            <input class="form-input" id="contact-email" type="email" name="email" data-constraints="@Email @Required">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-phone">@lang('frontend.your_phone') * </label>
                            <input class="form-input" id="contact-phone" type="text" name="phone" data-constraints="@Numeric @Required">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-wrap">
                            <label class="form-label" for="contact-message">@lang('frontend.your_message') * </label>
                            <textarea class="form-input" id="contact-message" name="message" data-constraints="@Required"></textarea>
                        </div>
                        <div class="form-button text-center">
                            <button class="button button-primary button-circle" type="submit">@lang('frontend.send_message')</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>