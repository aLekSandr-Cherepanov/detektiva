<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Frontend\PageController;
    use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

    /*
    |--------------------------------------------------------------------------
    | Frontend
    |--------------------------------------------------------------------------
    */

    Route::group(
        [
            'prefix'     => LaravelLocalization::setLocale(),
            'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
        ], function () {
        // Home page
        Route::get('/', [PageController::class, 'index'])->name('home');

        Route::get('/contacts', [PageController::class, 'contact'])->name('contact');
        Route::get('/faq', [PageController::class, 'faq'])->name('faq');

        Route::get('/testt', [PageController::class, 'test'])->name('testt');

        // Any page
        Route::get('/node/{id}', [PageController::class, 'node'])->name('node');
        Route::get('/{alias}', [PageController::class, 'page'])->name('page');
    });

    Route::post('/contact/send', [PageController::class, 'contactSend'])->name('contact/send');

    Route::get('/sites/default/files/image/{filename}', [PageController::class, 'oldRootImage']);









