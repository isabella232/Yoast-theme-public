window.fbAsyncInit = function() {
	// FB hooks
	FB.Event.subscribe( 'edge.create', function( targetUrl ) {
			__gaTracker( 'send', 'social', 'facebook', 'like', targetUrl );
		}
	);
	FB.Event.subscribe( 'edge.remove', function( targetUrl ) {
			__gaTracker( 'send', 'social', 'facebook', 'unlike', targetUrl );
		}
	);
};
(function( d, s, id ) {
	var js, fjs = d.getElementsByTagName( s )[ 0 ];
	if ( d.getElementById( id ) ) return;
	js = d.createElement( s );
	js.id = id;
	js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=156530927787130";
	fjs.parentNode.insertBefore( js, fjs );
}( document, 'script', 'facebook-jssdk' ));

jQuery( document ).ready( function( $ ) {
		// Load Tweet Button Script
		var e = document.createElement( 'script' );
		e.type = "text/javascript";
		e.async = true;
		e.src = '//platform.twitter.com/widgets.js';
		document.getElementsByTagName( 'head' )[ 0 ].appendChild( e );
		$( e ).load( function() {
				function tweetIntentToAnalytics( intentEvent ) {
					if ( intentEvent ) {
						__gaTracker( 'send', 'social', 'twitter', intentEvent.type, intentEvent.region );
					}
				}
				function followIntentToAnalytics( intentEvent ) {
					if ( intentEvent ) {
						__gaTracker( 'send', 'social', 'twitter', intentEvent.type, intentEvent.region );
					}
				}
				twttr.events.bind( 'tweet', tweetIntentToAnalytics );
				twttr.events.bind( 'follow', followIntentToAnalytics );
			}
		);
		document.getElementsByTagName( 'head' )[ 0 ].appendChild( e );
		// Load PrintFriendly
		var e = document.createElement( 'script' );
		e.type = "text/javascript";
		e.async = true;
		e.src = 'https://pf-cdn.printfriendly.com/ssl/main.js';
		document.getElementsByTagName( 'head' )[ 0 ].appendChild( e );
	}
);
