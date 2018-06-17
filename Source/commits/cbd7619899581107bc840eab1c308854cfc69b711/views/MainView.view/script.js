jq = jQuery.noConflict();

var MainController = (function($) {
	function MainController() {
		this.chatPlaceholder = null;
	};
	
	MainController.prototype.URL_START_CHAT = 'http://drov.io//ajax/apps/tester.php?__REQUEST[ID]=82&__REQUEST[VIEW]=chat&id=82&tab=preview&null&__ASCOP[REQUEST_PATH]=/dashboard/project.php&__ASCOP[REQUEST_SUB]=developers';
	
	MainController.prototype.getChatPlaceholder = function() {
		if (this.chatPlaceholder !== null) {
			this.chatPlaceholder = $('.test-messaging-application .chat-placeholder');
		}
		
		return this.chatPlaceholder;
	};
	
//	MainController.prototype.onChat = function(event, content) {
//		console.log(content);
//	};
	
	MainController.prototype.onChatStartButtonClick = function(event) {
		$.post(MainController.prototype.URL_START_CHAT)
			.done(this.onChatStartSuccess);
	};
	
	MainController.prototype.onChatStartSuccess = function(data) {
		console.log('chat success');
		console.log(data);
	};
	
	return MainController;
} (jq));

jq(document).ready(function($) {
	var c = new MainController();
	$(document).on('click', '.test-messaging-application .chat-button', $.proxy(c.onChatStartButtonClick, c));
//	$(document).on('test_messaging.chat', $.proxy(c.onChat, c));
});