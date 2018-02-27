<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\ElementButton;

class ExistingProductConversation extends Conversation
{
    
	public function selectOption()
	{
		$this->say(ButtonTemplate::create('Which platform?')
	     ->addButton(ElementButton::create('Sportify')->type('postback')->payload('sportifyprojectcontactinfo'))
	     ->addButton(ElementButton::create('MsWinkly')->type('postback')->payload('mswinklyprojectcontactinfo'))
	     ->addButton(ElementButton::create('Others')->type('postback')->payload('otherprojectcontactinfo'))
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
