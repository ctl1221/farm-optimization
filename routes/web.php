<?php

Route::get('/calculator','CalculatorController@entry');
Route::post('/Feeds-calculator','CalculatorController@calculateFeeds');
Route::get('/rates-BPI','RatesController@BPI');
Route::get('/rates-FCR','RatesController@FCR');
Route::get('/rates-FCRi','RatesController@FCRi');
Route::get('/rates-HR','RatesController@HR');
Route::get('/rates-ALW','RatesController@ALW');
Route::post('/HR-calculator','CalculatorController@calculateHR');