<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Notification from ChatBot {{ $ticket->assignee->name }}</h1>
	<p>There is a question for You from {{ $ticket->client->name }}</p>
	<h4>Topic : {{ $ticket->client->conversationTopic }}</h4>
	@if($ticket->client->conversationDetails)
		<h4>Details : {{ $ticket->client->conversationDetails }}</h4>
	@endif

</body>
</html>