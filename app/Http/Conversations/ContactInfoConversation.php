<?php

namespace App\Http\Conversations;


use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Conversations\Conversation;
use App\Http\Conversations\AboutGLNConversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use Illuminate\Http\Request;
use Spatie\Regex\Regex;
use App\Mail\Welcome;
use App\Mail\NewChatBotNotification;
use App\Repositories\Contracts\TicketInterface;
use Illuminate\Support\Facades\Log;



class ContactInfoConversation extends Conversation
{

    public $ticket;
    protected $payload;
    public $client;
    public $email;


    public function __construct(TicketInterface $ticket,Array $posback)
    {
    	
        $this->payload = $posback['payload'];
        $this->ticket = $ticket;
        $this->client = $this->ticket->client;
        $this->client->setConversationTopic($posback['title']);
    }


    public function askForMoreInfo()
    {
        
        $question = Question::create('Ok, do you want to share some more info about the reason you have contacted us? ')
         ->fallback('Unable to explain more')
         ->callbackId('explain_more')
         ->addButtons([
            Button::create('Yes')->value('yes'),
            Button::create('No that\'s all')->value('no'),
         ]);

    	$this->ask($question, function (Answer $answer) {

        // $reply = ($answer->isInteractiveMessageReply()) ? $answer->getValue() : ($this->messagePayload('driver') === 'web') ? $this->messagePayload('message') : null;

        Log::info('Button is clicked: ' . $answer->isInteractiveMessageReply());
        // Detect if button was clicked:
    	   if ($answer->isInteractiveMessageReply()) { 
                $reply = $answer->getValue();
            } else {
                if ($this->messagePayload('driver') === 'web'){
                    $reply = $this->messagePayload('message');
                }
            }
           Log::info('Answer is: ' . $answer->getValue() . ' Replay is: '. $reply);
    	   if($reply == 'yes'){
    	       $this->askForDetails();
    	   } else{	            		        	    		
    	       $this->askFirstname();
    	   }
    	});
	}

	public function askForDetails()
    {
            $this->ask('Great, I\'m listening', function($answer) {
            // Save result
            $this->client->setConversationDetails($answer->getText());
            $this->say('Thanks for further details.');
            $this->askFirstname();
        });

    }

    protected function messagePayload($index){
        if ($index && $this->bot->getMessage()->getPayload()[$index] ) {
            return $this->bot->getMessage()->getPayload()[$index];
        }
        return  $this->bot->getMessage()->getPayload();
    }

    public function askFirstname()
    {
        $this->say('Ok, now I need to ask for some details: ');
            $this->ask('What is your name?', function($answer) {
            // Save result
            $this->client->setName($answer->getText());
            $this->say('Nice to meet you '.$this->client->name);
            $this->askEmail('What is your email?');
        });

    }

    public function askEmail($emailquestion)
    {
    	
        
        $assignee = $this->ticket->issue($this->payload)->assignee;

        $welcomeEmail = new Welcome($this->ticket);
        $adminNotification = new NewChatBotNotification($this->ticket);
    	$this->ask($emailquestion, function(Answer $answer) use($welcomeEmail, $adminNotification){
            // Save result
            $this->email = $this->validateEmail($answer->getText()) ? $answer->getText() : null;
            if ($this->email) {
                $this->client->setEmail($this->email);
                \Mail::to($this->client)->send($welcomeEmail);
                $assignee = $this->ticket->issue($this->payload)->assignee;
                \Mail::to($assignee)->send($adminNotification);
         	   $this->say('Great - that is all we need, '. $this->client->name .'. We will contact You soon.');
               $this->say('Meanwhile, maybe you would like to know more about GLN');
               $this->bot->startConversation(new AboutGLNConversation());
        	} else {
                unset($this->email);
        		$this->say('I think You have entered a wrong Email.');            
        		$this->askEmail('Please enter Your Email one more time');
        	}
        });
    }

    
    protected function validateEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }


    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->askForMoreInfo();
    }
}
