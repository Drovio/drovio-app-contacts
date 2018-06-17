var jq = jQuery.noConflict();

var ListController = (function($) {
	function ListController() {
	};
	
	ListController.prototype.onContactItemClick = function(event) {
		var $item = $(event.currentTarget);
		$item.addClass('selected');
	};
	
	return ListController;
}(jq))


jq(document).ready(function($) {
	var c = new ListController();
	$('#contacts-list li').on('click', c.onContactItemClick);
});