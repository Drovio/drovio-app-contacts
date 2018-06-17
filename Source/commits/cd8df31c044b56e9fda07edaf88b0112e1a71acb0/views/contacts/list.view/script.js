var jq = jQuery.noConflict();

var ListController = (function($) {
	function ListController(listId, options) {
		this.list = $('#' + listId);
		
		this.options = {
			selectedCls: 'selected'
		};
		this.options = $.merge({}, this.options, options);
	};
	
	ListController.prototype.onContactItemClick = function(event) {
		list.children().removeClass(this.options.selectedCls);
	
		var $item = $(event.currentTarget);
		$item.addClass(this.options.selectedCls);
	};
	
	return ListController;
}(jq))


jq(document).ready(function($) {
	var c = new ListController('contacts-list');
	$(document).on('click', '#contacts-list li', $.proxy(c.onContactItemClick, c));
});