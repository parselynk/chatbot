<?php

namespace App\Http\Conversations;

use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\ElementButton;


class CustomerConversation extends Conversation
{
    
	public function startConversation()
	{
		$this->say(ButtonTemplate::create('What are You looking for?')
	     ->addButton(ElementButton::create('Looking for business opportunities?')->type('postback')->payload('businessopportunities'))
	     ->addButton(ElementButton::create('Joining GLN?')->type('postback')->payload('joingln'))
	     ->addButton(ElementButton::create('About GLN')->type('postback')->payload('aboutgln')));
	}

    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->startConversation();
    }
}
