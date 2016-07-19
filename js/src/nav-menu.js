jQuery( document ).ready( function( $ ) {

	/**
	 * Sets jQuery event listeners to improve the visual flow of 'current menu item parents'.
	 */
	function init() {
		var parent_class = 'current-menu-parent';
		var active_item = $( '.' + parent_class );
		var all_items = $( '#yoast-main-menu .menu-item' );
		var non_active_items = $( '#yoast-main-menu .menu-item:not(.' + parent_class + ')' );

		non_active_items.hover(
			function() {
				active_item.removeClass( parent_class );
			},
			function() {
				active_item.addClass( parent_class );
			}
		);

		/**
		 * Set the clicked menu item as the new parent, unbind current event listeners and reinitialise the event listeners for the new 'current parent'.
		 */
		non_active_items.click( function( evt ) {
			// Cleanup.
			all_items.unbind( 'hover' );
			all_items.unbind( 'click' );
			all_items.removeClass( parent_class );

			var clicked_menu_item = $( evt.target ).closest( '.menu-item' );
			active_item = clicked_menu_item;
			clicked_menu_item.addClass( parent_class );

			init();
		} );
	}

	init();
} );
