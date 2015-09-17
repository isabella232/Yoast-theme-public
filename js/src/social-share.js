(function (d, s, id) {
	var js, fjs = d.getElementsByTagName(s)[0];
	if (d.getElementById(id)) return;
	js = d.createElement(s);
	js.id = id;
	js.src = "//connect.facebook.net/en_GB/all.js#xfbml=1&appId=156530927787130";
	fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

jQuery(document).ready(function ($) {
	// Load Tweet Button Script
	var e = document.createElement('script');
	e.type = "text/javascript";
	e.async = true;
	e.src = '//platform.twitter.com/widgets.js';
	document.getElementsByTagName('head')[0].appendChild(e);
	$(e).load(function () {
		function tweetIntentToAnalytics(intent_event) {
			if (intent_event) {
				var label = intent_event.data.tweet_id;
				_gaq.push(['_trackEvent', 'twitter_web_intents',
					intent_event.type, label]);
				clicky.log(document.location.href, 'Twitter ' + label);
			}
		}

		function followIntentToAnalytics(intent_event) {
			if (intent_event) {
				var label = intent_event.data.user_id + " (" +
					intent_event.data.screen_name + ")";
				_gaq.push(['_trackEvent', 'twitter_web_intents',
					intent_event.type, label]);
				clicky.log(document.location.href, 'Twitter ' + label);
			}
		}

		twttr.events.bind('tweet', tweetIntentToAnalytics);
		twttr.events.bind('follow', followIntentToAnalytics);
	});
	document.getElementsByTagName('head')[0].appendChild(e);
	// Load PrintFriendly
	var e = document.createElement('script');
	e.type = "text/javascript";
	e.async = true;
	e.src = 'https://pf-cdn.printfriendly.com/ssl/main.js';
		document.getElementsByTagName('head')[0].appendChild(e);
});
