<?php
	
namespace App\Http\Controllers\Listen;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;




/**
* 
*/
class HelloBotCommandsController extends Controller
{
	/**
     * Handle when user says "hello"
     * @param $bot
     */
    public function handleSayHello($bot)
    {
       		Log::info('here it is');
       $bot->reply("Hello, I'm Hello World bot!");
    }

    /**
     * Handle when user says "hello, I'm {name}"
     * @param $bot
     * @param $name
     */
    public function handleSayHelloWithName($bot, $name)
    {
        $bot->reply("Hello, $name. I'm Hello World bot");
    }
}