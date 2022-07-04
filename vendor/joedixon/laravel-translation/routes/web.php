<?php

Route::group(config('translation.route_group_config') + ['namespace' => 'JoeDixon\\Translation\\Http\\Controllers'], function ($router) {
    $router->get(config('translation.ui_url'), 'LanguageController@index')->middleware('LanguageSwitcher','auth:customer')
        ->name('languages.index');

    $router->get(config('translation.ui_url').'/create', 'LanguageController@create')->middleware('LanguageSwitcher','auth:customer')
        ->name('languages.create');

    $router->post(config('translation.ui_url'), 'LanguageController@store')->middleware('LanguageSwitcher','auth:customer')
        ->name('languages.store');

    $router->get(config('translation.ui_url').'/{language}/translations', 'LanguageTranslationController@index')->middleware('LanguageSwitcher','auth:customer')
        ->name('languages.translations.index');

    $router->post(config('translation.ui_url').'/{language}', 'LanguageTranslationController@update')->middleware('LanguageSwitcher','auth:customer')
        ->name('languages.translations.update');

    $router->get(config('translation.ui_url').'/{language}/translations/create', 'LanguageTranslationController@create')->middleware('LanguageSwitcher','auth:customer')
        ->name('languages.translations.create');

    $router->post(config('translation.ui_url').'/{language}/translations', 'LanguageTranslationController@store')->middleware('LanguageSwitcher','auth:customer')
        ->name('languages.translations.store');
});
