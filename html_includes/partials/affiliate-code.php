<script src="//static.tapfiliate.com/tapfiliate.js" type="text/javascript" async></script>
<script type="text/javascript">

	function yoastReadCookie(name) {
		var nameEQ = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length;i++) {
			var c = ca[i];
			while (c.charAt(0)==' ') {
				c = c.substring(1,c.length);
			}
			if (c.indexOf(nameEQ) == 0) {
				return c.substring(nameEQ.length,c.length);
			}
		}
		return null;
	}

	function yoastCreateCookie(name,value,days) {
		if (days) {
			var date = new Date();
			date.setTime(date.getTime()+(days*24*60*60*1000));
			var expires = "; expires="+date.toGMTString();
		}
		else {
			var expires = "";
		}
		document.cookie = name+"="+value+expires+"; path=/";
	}

	function yoastEraseCookie(name) {
		yoastCreateCookie(name,"",-1);
	}

	window['TapfiliateObject'] = i = 'tap';
	window[i] = window[i] || function () {
		(window[i].q = window[i].q || []).push(arguments);
	};

	tap('create', '<?php echo $template_args['account_id'] ?>');

	var conversion = yoastReadCookie('yst_affiliate_conversion');
	if ( conversion === null ) {
		tap('detectClick');
	} else {
		var parsed_conversion = JSON.parse( decodeURIComponent( conversion ) );
		tap( 'conversionMulti', parsed_conversion.order_id, {}, parsed_conversion.commissions );
		yoastEraseCookie( 'yst_affiliate_conversion' );
	}

</script>