<!DOCTYPE html>
<!--[if lte IE 9]><html class="old-ie" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html lang="en"><!--<[endif]-->
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><?php wp_title(); ?></title>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php
do_action( 'yst_body_open' );

$wp_signup_heading = sprintf(
	'<h1><a href="%1$s" tabindex="-1">%2$s</a></h1>',
	esc_url( network_home_url() ),
	get_bloginfo( 'name' )
);
?>
<div class="login my-yoast-login__wrapper my-yoast-login__wp-signup">
<?php echo $wp_signup_heading . "\n"; ?>
