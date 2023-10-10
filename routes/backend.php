<?php

    use Illuminate\Support\Facades\Route;
    use App\Http\Controllers\Backend\Auth\AuthenticatedController;
    use App\Http\Controllers\Backend\DashboardController;
    use App\Http\Controllers\Backend\Admins\AdminsController;
    use App\Http\Controllers\Backend\Admins\RolesController;
    use App\Http\Controllers\Backend\Pages\PagesController;
    use \App\Http\Controllers\Backend\Blocks\FaqController;

    /*
    |--------------------------------------------------------------------------
    | Backend
    |--------------------------------------------------------------------------
    */

    // Admin panel
    Route::group(['prefix' => config('backend.prefix'), 'as' => 'backend.', 'middleware' => ['localeBackend']], function () {

        Route::get('/', [AuthenticatedController::class, 'create'])->name('home');

        // Authentication routes...
        Route::post('login', [AuthenticatedController::class, 'store']);
        Route::get('login', [AuthenticatedController::class, 'create'])->name('login');

        Route::middleware(['auth:admin'])->group(function () {
            Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
            Route::any('logout', [AuthenticatedController::class, 'destroy'])->name('logout');
            //Switch language
            Route::get('locale/{locale}', [DashboardController::class, 'setLocale'])->name('setLanguage');
            // Admin users
            Route::resource('admins', AdminsController::class)->parameter('', 'admin');
            // Admin roles
            Route::resource('roles', RolesController::class)->parameter('', 'role');
            // Admin pages
            Route::resource('pages', PagesController::class)->parameter('', 'page');

            // Admin Images Block
            Route::group(['prefix' => 'blocks', 'as' => 'blocks.'], function () {
                Route::resource('faq', FaqController::class)->parameter('', 'faq')->except('show');
            });
        });

    });


