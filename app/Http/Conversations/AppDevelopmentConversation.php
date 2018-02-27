<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\ElementButton;

class AppDevelopmentConversation extends Conversation
{
    

	public function selectOption()
	{
		$this->say(ButtonTemplate::create('Select one from below')
	     ->addButton(ElementButton::create('I have an app idea')->type('postback')->payload('appideacontactinfo'))
	     ->addButton(ElementButton::create('Digitalize my business')->type('postback')->payload('businessdigitalcontactinfo')));
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
