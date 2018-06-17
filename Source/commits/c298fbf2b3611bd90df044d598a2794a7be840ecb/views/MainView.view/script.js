jq = jQuery.noConflict();

var MainController = (function($) {
	function MainController() {
	};
	
	MainCotroller.prototype.onChatStartButton = function(event) {
		var button = $(event.currentTarget);
		console.log('post');
	};
} (jq));

jq(document).ready(function($) {
	var c = new MainController();
	$(document).on('click', '.test-messaging-application .chat-button', $.proxy(c.onChatStartButton, c));
});