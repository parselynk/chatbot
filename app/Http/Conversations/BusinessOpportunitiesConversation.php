<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\ElementButton;

class BusinessOpportunitiesConversation extends Conversation
{
    
	public function selectOption()
	{
		$this->say(ButtonTemplate::create('Select one from below')
	     ->addButton(ElementButton::create('Looking for app development')->type('postback')->payload('appdevelopment'))
	     ->addButton(ElementButton::create('Joining as business partner')->type('postback')->payload('businesspartner')));
	}


    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->selectOption();
    }
}
