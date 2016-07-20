<?php
namespace Yoast\YoastCom\Theme;

$yoast_url = 'https://yoast.com/';
if ( defined( 'YOAST_ENVIRONMENT' ) && YOAST_ENVIRONMENT === 'development' ) {
	$yoast_url = 'http://yoast.dev/';
}
?>
<header role="banner" class="siteheader">

	<div class="row masthead">
		<a href="<?php echo $yoast_url; ?>" class="pagetitle"><span class="visuallyhidden">Yoast</span></a>

		<?php get_template_part( 'html_includes/header-controls-mobile' ); ?>
	</div>

	<?php
	get_template_part( 'html_includes/partials/search' );

	theme_object()->navigation->output_menu_bar();
	?>

	<!-- Decoration -->
	<div class="row">
		<?php if ( Color_Scheme::COURSES === theme_object()->get_color_scheme() ) : ?>
			<div class="boxes boxes--header boxes--courses"></div>
		<?php elseif ( Color_Scheme::PLUGINS === theme_object()->get_color_scheme() ) : ?>
			<div class="boxes boxes--header boxes--plugins"></div>
		<?php elseif ( Color_Scheme::HIRE_US === theme_object()->get_color_scheme() ) : ?>
			<div class="boxes boxes--header boxes--hire-us"></div>
		<?php elseif ( Color_Scheme::HOME === theme_object()->get_color_scheme() ) : ?>
			<div class="boxes boxes--header boxes--home"></div>
		<?php else : ?>
			<div class="boxes boxes--header"></div>
		<?php endif; ?>
	</div>
</header>
