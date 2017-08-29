<?php
namespace Yoast\YoastCom\Theme;

if ( ! isset( $template_args['class'] ) ) {
	$template_args['class'] = '';
}
?>
<?php
if (strpos($template_args['class'], 'arrow-top') !== false) {
	echo "<hr>";
}
?>

<div class="announcement newsletter <?php echo esc_attr( $template_args['class'] ); ?>">
    <div class="row">
        <h2><?php _e( 'Get more free tips like this!', 'yoastcom' ); ?></h2>
        <ul class="list--usp">
            <li><?php _e( 'Get weekly tips on how to optimize your website\'s SEO, usabillity and conversation', 'yoastcom '); ?></li>
            <li><?php _e( 'Be the first to know about new features and other cool (free) plugins.', 'yoastcom '); ?></li>
            <li><?php printf( __( 'Get our %1$sfree 50-page SEO guide%2$s right away to help you become an SEO genius.', 'yoastcom '), '<strong>', '</strong>'); ?></li>
        </ul>
        <form action="https://yoast.us1.list-manage.com/subscribe/post?u=ffa93edfe21752c921f860358&amp;id=972f1c9122" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="grid">
                    <div class="one-third medium-one-third">
                        <label class="visuallyhidden" for="newsletter-name"><?php _e( 'Name', 'yoastcom' ); ?></label>
                        <input type="text" placeholder="<?php _e( 'Enter your name&hellip;', 'yoastcom' ); ?>" id="newsletter-name" name="NAME">
                    </div>
                    <div class="one-third medium-one-third">
                        <label class="visuallyhidden" for="newsletter-email"><?php _e( 'Email', 'yoastcom' ); ?></label>
                        <input type="email" placeholder="<?php _e( 'Enter your email address&hellip;', 'yoastcom' ); ?>" id="newsletter-email" name="EMAIL">
                    </div>
                    <div class="one-third medium-one-third">
                        <button type="submit" class="default" name="<?php _e( 'Yes, give me your free tips', 'yoastcom' ); ?>"><?php _e( 'Yes, give me your free tips', 'yoastcom' ); ?></button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
</div>

<?php
if (strpos($template_args['class'], 'arrow-bottom') !== false) {
    echo "<hr>";
}
?>



