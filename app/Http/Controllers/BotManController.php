<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;
use App\Conversations\ExampleConversation;
use App\Http\Conversations\CustomerConversation;
use App\Http\Conversations\BusinessOpportunitiesConversation;
use App\Http\Conversations\ContactInfoConversation;
use App\Http\Conversations\AppDevelopmentConversation;
use App\Http\Conversations\DeveloperTypeConversation;
use App\Http\Conversations\AboutGLNConversation;
use App\Http\Conversations\JoinGLNConversation;
use App\Http\Conversations\BusinessPartnerConversation;
use App\Http\Conversations\ExistingProductConversation;
use App\Http\Controllers\Listen;
use Illuminate\Support\Facades\Log;
use BotMan\BotMan\Drivers\FacebookDriver;
use App\Repositories\Contracts\TicketInterface;




class BotManController extends Controller
{
    

    /**
     * Place your BotMan logic here.
     */
    public function handle(TicketInterface $ticket)
    {
       
               
        $botman = app('botman');

        $botman->hears('getstarted', function (BotMan $bot) {
            Log::info('here we started');
            $bot->startConversation(new CustomerConversation());
        }); 
 
        
        $botman->hears('businessopportunities', function (BotMan $bot) {
            $bot->startConversation(new BusinessOpportunitiesConversation());
        });

        $botman->hears('joingln', function (BotMan $bot) {
            $bot->startConversation(new JoinGLNConversation());
        });

        $botman->hears('aboutgln', function (BotMan $bot) {
            $bot->startConversation(new AboutGLNConversation());
        });
        
        $botman->hears('developerjobtype', function (BotMan $bot) {
            $bot->startConversation(new DeveloperTypeConversation());
        });

        $botman->hears('appdevelopment', function (BotMan $bot) {
            $bot->startConversation(new AppDevelopmentConversation());
        });

        $botman->hears('businesspartner', function (BotMan $bot) {
            $bot->startConversation(new BusinessPartnerConversation());
        });

        $botman->hears('existingproduct', function (BotMan $bot) {
            $bot->startConversation(new ExistingProductConversation());
        });

        $botman->hears('.*(contactinfo)', function ($bot) use ($ticket) {
            $bot->startConversation(new ContactInfoConversation($ticket, $this->getPostback()));
        });

        $botman->hears('hello', function (BotMan $bot) {
            Log::info('here we started');
            $bot->startConversation(new CustomerConversation());
        }); 
 
 
        $botman->hears("hello I'm {name}", Listen\HelloBotCommandsController::class.'@handleSayHelloWithName');


        $botman->fallback(function($bot) {
            $user = $bot->getUser();
            $id = $user->getId();
            Log::info("User: $id issued an unknown command");
                //$bot->reply('Sorry, I Don\'t get You');
                $bot->startConversation(new CustomerConversation());
            });

        $botman->listen();
    }

    public static function logResponse(Request $request)
    {        
        Log::info(print_r($request->getContent(),1));
    }


    public function getPostback(){
        return request('entry')[0]['messaging'][0]['postback'];
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function tinker()
    {
        return view('tinker');
    }
}
