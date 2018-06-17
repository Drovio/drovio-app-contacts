var jq = jQuery.noConflict();

var ListController = (function($) {
	function ListController(options) {
		this.options = {
			listId: 'contacts-list',
			selectedCls: 'selected'
		};
		this.options = $.extend({}, this.options, options);
		
		this.list = null;
	};
	
	ListController.prototype.getList = function() {
		if (this.list === null) {
			this.list = $('#' + this.options.listId);
		}
		
		return this.list;
	};
	
	ListController.prototype.onContactItemClick = function(event) {
		var $item = $(event.currentTarget);
		if ($item.hasClass(this.options.selectedCls)) {
			$item.removeClass(this.options.selectedCls);
			
			return;
		}
		
		this.getList().children().removeClass(this.options.selectedCls);
		$item.addClass(this.options.selectedCls);
	};
	
	return ListController;
}(jq))


jq(document).ready(function($) {
	var c = new ListController();
	$(document).on('click', '#contacts-list li', $.proxy(c.onContactItemClick, c));
});