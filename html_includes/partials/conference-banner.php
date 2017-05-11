<?php

$path = get_template_directory_uri();

?>
<div class="conference-banner">
	<div class="row">
		<h2 class="screen-reader-text">Yoast Con</h2>
		<div class="conference--icon--container">
			<img src="<?php echo $path ?>/images/YoastCon_Owl.png"
				 class="conference--icon" alt="">
			<script>
            (function($) {
                var $icon = $('.conference--icon');
                function startInterval() {
                    window.setTimeout( function() {
                        var src = $icon.attr( 'src' );
                        $icon.attr( 'src', src.replace( 'YoastCon_Owl.png', 'YoastCon_Owl_wink.png' ) );

                        window.setTimeout( function() {
                            var src = $icon.attr( 'src' );
                            $icon.attr( "src", src.replace( "YoastCon_Owl_wink.png", "YoastCon_Owl.png" ) );
                            startInterval();
                        }, 200 + Math.random() * 100 );
                    }, 4000 + Math.random() * 2000 );
                }
                startInterval();
            })(jQuery);
			</script>
		</div>
		<p class="conference--info">
			November 2<sup>nd</sup>, 2017<br/>
			Nijmegen, The Netherlands<br/>
		</p>
		<div class="conference--logo--container">
			<div>
			<img src="<?php echo $path ?>/images/Yoastcon_Logo.png"
				 class="conference--logo" alt="Yoast Con - Practical SEO"/>
			</div>
			<div><a href="https://yoast.com/conference/" class="button">Information &raquo;</a></div>
		</div>
	</div>
</div>