<?php
namespace Yoast\YoastCom\Theme;
?>
<header role="banner" class="siteheader">

	<div class="row masthead">
		<a href="<?php echo esc_attr( home_url() ); ?>" class="pagetitle"><span class="visuallyhidden">Yoast</span></a>

		<?php get_template_part( 'html_includes/header-controls-mobile' ); ?>
	</div>

	<?php get_template_part( 'html_includes/partials/search', array( 'type' => 'mobile' ) ); ?>

	<?php get_template_part( 'html_includes/header-controls-desktop' ); ?>

	<nav role="navigation" class="sitenav sticky" data-sticky data-sticky-desktop aria-hidden="true">
		<?php wp_nav_menu( array(
			'theme_location'  => 'primary',
			'container_class' => 'mainnav',
			'walker'          => new Menu_Walker(),
		) ); ?>
	</nav>

	<nav role="navigation" class="sitenav sitenav--offcanvas">
		<?php wp_nav_menu( array(
			'theme_location'  => 'primary',
			'container_class' => 'mainnav',
			'walker'          => new Menu_Walker(),
		) ); ?>
	</nav>

	<!-- Decoration -->
	<div class="row">
		<?php if ( Color_Scheme::ACADEMY === theme_object()->get_color_scheme() ) : ?>
			<div class="boxes boxes--header boxes--academy"></div>
		<?php elseif ( Color_Scheme::SOFTWARE === theme_object()->get_color_scheme() ) : ?>
			<div class="boxes boxes--header boxes--software"></div>
		<?php elseif ( Color_Scheme::REVIEW === theme_object()->get_color_scheme() ) : ?>
			<div class="boxes boxes--header boxes--review"></div>
		<?php elseif ( Color_Scheme::ABOUT === theme_object()->get_color_scheme() ) : ?>
			<div class="boxes boxes--header boxes--about"></div>
		<?php endif; ?>
	</div>
</header>
