<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Tool API Routes
|--------------------------------------------------------------------------
|
| Here is where you may register API routes for your tool. These routes
| are loaded by the ServiceProvider of your tool. They are protected
| by your tool's "Authorize" middleware by default. Now, go build!
|
*/

Route::get('/config', 'Dniccum\CustomEmailSender\Http\Controllers\CustomEmailSenderController@config');
Route::post('/send', 'Dniccum\CustomEmailSender\Http\Controllers\CustomEmailSenderController@send');
Route::post('/preview', 'Dniccum\CustomEmailSender\Http\Controllers\CustomEmailSenderController@preview');
Route::get('/search', 'Dniccum\CustomEmailSender\Http\Controllers\CustomEmailSenderController@search');

// Nebula Sender specific routes
Route::get('/nebula-sender-drafts', 'Dniccum\CustomEmailSender\Http\Controllers\NebulaSenderController@drafts');
