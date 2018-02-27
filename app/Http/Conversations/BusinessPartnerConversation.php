<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\ElementButton;

class BusinessPartnerConversation extends Conversation
{
    

	public function selectOption()
	{
		$this->say(ButtonTemplate::create('Select one from below')
	     ->addButton(ElementButton::create('New business opportunity')->type('postback')->payload('businessopportunitycontactinfo'))
	     ->addButton(ElementButton::create('Existing Product')->type('postback')->payload('existingproduct')));
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
