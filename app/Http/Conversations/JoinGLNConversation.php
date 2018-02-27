<?php

namespace App\Http\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\Drivers\Facebook\Extensions\ButtonTemplate;
use BotMan\Drivers\Facebook\Extensions\ElementButton;

class JoinGLNConversation extends Conversation
{
    
	public function selectOption()
	{
		$this->say(ButtonTemplate::create('What position are You looking at?')
	     ->addButton(ElementButton::create('Developer')->type('postback')->payload('developerjobtype'))
	     ->addButton(ElementButton::create('Marketing')->type('postback')->payload('marketingjobcontactinfo'))
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
