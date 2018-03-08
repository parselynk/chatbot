var dropDownBtn = $('#live-chat button');
var btnGroup = $('#live-chat .btn-group .btn');
var messagHistorry = $('#live-chat .chat-history');
var messages = $('#live-chat .chat-history .chat-message');
var now;



(function() {

	$('#live-chat header').on('click', function() {

		$('.chat').slideToggle(300, 'swing');
		$('.chat-message-counter').fadeToggle(300, 'swing');

	});

	$('.chat-close').on('click', function(e) {
		e.preventDefault();
		$('#live-chat').fadeOut(300);
	});

	$('#live-chat #message-text').keypress(function(e){
		// if enter key is pressed
		if (e.which == 13) {
	  		e.preventDefault();
  			if ($(this).val() != ''){
  				disableUI();
				addMessage($(this).val());
				sendData($(this).val(), $(this).val(), controlInput );
				scrollDown(300);
				resetInput();
				return false;
			}
		}
	});

	function disableUI(){
		$('#live-chat #message-text').prop('disabled' , true);
		$('#live-chat .chat-history .chat-message button').prop('disabled' , true);
		$('#live-chat .btn-group .btn').prop('disabled' , true);
		$('.chat-feedback').show(500);

	}

	enableUI = function(){
		$('#live-chat #message-text').prop('disabled' , false);
		$('#live-chat .chat-history .chat-message button').prop('disabled' , false);
		$('#live-chat .btn-group .btn').prop('disabled' , false);
		$('.chat-feedback').hide();
	}

	$('#live-chat').on('click', '.chat-history .chat-message button' , function(){
		disableUI();
		var payload = $(this).data('payload');
		var title = $(this).text();
		addMessage($(this).text());
		sendData(payload, title, controlInput);
		scrollDown();
		resetInput();
		return false;
	});

	$('#live-chat').on('click', '.btn-group .btn', function(){
		disableUI();
		var payload = $(this).find('input:radio').val();
		var title = $(this).text();
		addMessage(payload);
		sendData(payload, title, controlInput);
		scrollDown();
		resetInput();
		return false;
	});

}) ();




function addMessage(text){
	var messagHistorry = $('#live-chat .chat-history');
	messagHistorry.append('<hr><div class="chat-message clearfix"><div class="chat-message-content clearfix"><span class="chat-time">'+messageTime()+'</span><h5>You</h5><p>'+text+'</p></div></div>');
}

function addResponseMessageLayout(){
	var messagHistorry = $('#live-chat .chat-history');
	$('<hr><div class="chat-message clearfix"><div class="chat-message-content clearfix"><span class="chat-time">'+messageTime()+'</span><h5>GLN</h5><div class="messenger-response"></div></div></div>').appendTo(messagHistorry);
}

function scrollDown($speed){
	var messages = $('#live-chat .chat-history .chat-message');
	var height = 0;
	messages.each(function(i, value){
    	height += parseInt($(this).height()) + 50;
	});
	$('#live-chat .chat-history').animate({scrollTop: height} , $speed);
}

function resetInput(){
	$('#live-chat #message-text').val('');
}

function setPayload(payload){
	if (payload.indexOf("contactinfo") > -1 ) {
		return payload + 'web';
	}
	return payload;
}

var controlInput = function(status){
	
	$('#live-chat #message-text').prop('disabled' , true);

	if(status){
		$('#live-chat #message-text').prop('disabled' , false);
		$('#live-chat #message-text').focus();
	}
}

function appendMessageAsHTML(data, controlInput){
	var enableUI = function(){
		$('#live-chat .chat-history .chat-message button').prop('disabled' , false);
		$('#live-chat .btn-group .btn').prop('disabled' , false);
		$('.chat-feedback').hide();
	}
	for(var i = 0, len = data.messages.length; i < len; i++){
		console.log(data.messages[i].type);
		if (data.messages[i].type == 'buttons'){
			generateText(data.messages[i]);
			controlInput(false);
			generateButtons(data.messages[i].buttons);
		} else if (data.messages[i].type == 'actions'){
			generateText(data.messages[i]);
			controlInput(false);
			generateActions(data.messages[i].actions);
		} else {
			generateText(data.messages[i]);
			controlInput(true);
		}
	}
	enableUI();
}

function generateText(message){
	var responseTitle;
		var responseTitle = $('<div class="alert alert-secondary" role="alert">'+message.text+'</div>');
		responseTitle.appendTo('#live-chat .chat-history .chat-message:last .messenger-response');
}

function generateActions(actions){
	var generatedAction;
	$('<div class="btn-group btn-group-toggle" data-toggle="buttons"></div>').appendTo('#live-chat .chat-history .chat-message:last .messenger-response');
          
                          
	for(var i = 0, len = actions.length; i < len; i++){
		generatedAction = $('<label class="btn btn-secondary"><input type="radio" name="options" id="option'+ i +'" value="'+actions[i].value+'" autocomplete="off">' +actions[i].text+ '</label>');
		generatedAction.appendTo('#live-chat .chat-history .chat-message:last .messenger-response .btn-group');
	}
}

function generateButtons(buttons){
	var generatedButton;
	for(var i = 0, len = buttons.length; i < len; i++){
		generatedButton = $('<button type="button" data-payload='+setPayload(buttons[i].payload)+' class="btn btn-primary btn-block">'+buttons[i].title+'</button>');
		generatedButton.appendTo('#live-chat .chat-history .chat-message:last .messenger-response');
	}

}

function sendData(message, title, callback){
	     title = typeof title !== 'undefined' ? title : 'General question';
	     $.ajax({
         type: 'POST',
         url:  'https://lidev02.chimaera.my:7777/botman',
         dataType : 'json',
         data: 
         { 
         	message: message,
         	payload: message,
         	title: title,
         	driver: 'web'
         },
      })
         .done( function (response) {
         	var htmlContext = '';
            // Triggered if response status code is 200 (OK)
            addResponseMessageLayout();
            appendMessageAsHTML(response, callback);
            scrollDown(1000);
			resetInput();
         })
         .fail( function (jqXHR, status, error) {
            // Triggered if response status code is NOT 200 (OK)
            alert(jqXHR.responseText);
         })
         .always( function() {
            // Always run after .done() or .fail()
           // $('p:first').after('<p>Thank you.</p>');
         });
}

function messageTime(){
	now =  new Date();
	 return now.getHours() + ':' +now.getMinutes();
}

$( document ).ready(function() {
	messagHistorry.append('<hr><div class="chat-message clearfix"><div class="chat-message-content clearfix"><span class="chat-time">'+messageTime()+'</span><h5>GLN</h5><p>Hi, Welcome to GLN</p></div></div>');
	sendData('hello','hello', controlInput);
});


