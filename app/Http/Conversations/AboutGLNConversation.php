<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\ElementButton;

class AboutGLNConversation extends Conversation
{
	public function selectOption()
	{
		$this->say(ButtonTemplate::create('GLN is providing mobile solution to enterprise ...')
	     ->addButton(ElementButton::create('Looking for business opportunities')->type('postback')->payload('businessopportunities'))
	     ->addButton(ElementButton::create('Joining GLN')->type('postback')->payload('joingln'))
	     ->addButton(ElementButton::create('Others')->type('postback')->payload('otherquestioncontactinfo'))
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
