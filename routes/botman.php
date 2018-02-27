<?php

use BotMan\BotMan\BotMan;
use App\Http\Controllers\BotManController;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;


BotManController::logResponse(request());


$botman = resolve('botman');






$botman->hears('GET_STARTED', function (BotMan $bot) {
		Log::info('here we started');

    $bot->reply('Hello there!!!');
});


// $botman->hears('bye', function (BotMan $bot) {
// 		Log::info('here we said bye');

//     $bot->reply('Ok looo Bye Lo');
// });

//         $botman->listen();
