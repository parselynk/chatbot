<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\ElementButton;

class DeveloperTypeConversation extends Conversation
{
    
	public function selectOption()
	{
		$this->say(ButtonTemplate::create('Which platform?')
	     ->addButton(ElementButton::create('Mobile')->type('postback')->payload('mobilejobcontactinfo'))
	     ->addButton(ElementButton::create('Web')->type('postback')->payload('webjobcontactinfo'))
	     ->addButton(ElementButton::create('Backend')->type('postback')->payload('backendcontactinfo'))
	 );
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
