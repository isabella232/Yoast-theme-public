<?php
function yst_footer_modal_free_plugin_script() {
	?>
    <script>
        jQuery(document).ready(function ($) {

            $('a.free-plugin-download').click(function () {
                $('#free-plugin-download-modal').modal({
                    closeText: '<i class="fa fa-times-circle"></i>'
                });
                position_modal();
            });

            $(window).resize(position_modal);

            function position_modal() {
                $modal_margin_top = ($(window).height() / 2) - ($('#free-plugin-download-modal').outerHeight() / 2) + 'px';
                $modal_margin_left = ($(window).width() / 2) - ($('#free-plugin-download-modal').outerWidth() / 2) + 'px';

                $('#free-plugin-download-modal').css({
                    'top': $modal_margin_top,
                    'left': $modal_margin_left,
                    'position': 'absolute'
                });
            };
        });
    </script>
	<?php
}

wp_enqueue_script( 'jquery-modal' );
add_action( 'wp_footer', 'yst_footer_modal_free_plugin_script', 50 );

?>
<div id="free-plugin-download-modal" style="display: none;">
    <h3>
		<?php _e( 'Great idea to get our free SEO plugin!', 'yoastcom' ); ?>
    </h3>
    <div class="content content-downloading grid">
        <div class="hourglass"><i class="fa fa-hourglass-end" aria-hidden="true"></i></div>
        <div class="notification">
            <h2><?php _e( 'Your plugin is downloading right now.', 'yoastcom' ); ?></h2>
            <p><?php _e( 'You\'ll find it on your computer in a few seconds.', 'yoastcom' ); ?></p>
        </div>
    </div>
    <div class="content content-usps">
        <p><?php printf( __( '%1$sWait!%2$s We get that you’re thrilled to get started, but hear us out…', 'yoastcom '), '<strong>', '</strong>' ); ?><br/>
			<?php _e( 'Why not make sure you get the most out of it?', 'yoastcom' ); ?>
        </p>
        <ul class="list--usp">
            <li><?php _e( 'Get weekly tips on how to optimize your website\'s SEO, usability and conversion.', 'yoastcom' ); ?></li>
            <li><?php _e( 'Be the first to know about new features and other cool (free) plugins.', 'yoastcom' ); ?></li>
            <li><?php printf( __( 'Get our %1$sfree 50-page SEO guide%2$s right away to help you become an SEO genius.', 'yoastcom' ), '<strong>', '</strong>' ); ?></li>
        </ul>
        <form action="https://yoast.us1.list-manage.com/subscribe/post?u=ffa93edfe21752c921f860358&amp;id=972f1c9122"
              method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="grid">
                    <div class="one-half">
                        <label class="visuallyhidden" for="newsletter-email"><?php _e( 'Email', 'yoastcom' ); ?></label>
                        <input type="email" placeholder="<?php _e( 'Enter your email address&hellip;', 'yoastcom' ); ?>"
                               id="newsletter-email" name="EMAIL">
                    </div>
                    <div class="one-half">
                        <button type="submit" class="default"
                                name="Yes, give me your free tips"><?php _e( 'Yes, give me your free tips', 'yoastcom' ); ?></button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>
