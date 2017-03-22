(function($) {
	$( 'body' ).ready( function() {
		$( '.free-plugin-download' ).click( trackFreeDownload );
	} );

	function trackFreeDownload( event ) {
		__gaTracker(
			'send',
			'event',
			{
				eventCategory: 'download',
				eventAction: event.target.href,
				eventLabel: 'free version'
			},
			'click',
			{
				nonInteraction: true
			}
		);
	}
})( jQuery );
