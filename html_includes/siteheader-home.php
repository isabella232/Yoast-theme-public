<?php
namespace Yoast\YoastCom\Theme;
?>
	<header role="banner" class="siteheader <?php if ( isset( $template_args['home'] ) ) : ?> siteheader--home<?php endif; ?>" <?php if ( isset( $template_args['home'] ) ) : ?> data-header-home<?php endif; ?>>

	<?php if ( isset( $template_args['home'] ) ) : ?>
	<div class="row masthead">
		<h1 class="promoblock promoblock--hometitle">
			<a href="<?php echo esc_attr( home_url() ); ?>" class="pagetitle pagetitle--home"><span class="visuallyhidden">Yoast</span></a>
		</h1>

		<?php get_template_part( 'html_includes/header-controls-mobile' ); ?>
	</div>

	<?php get_template_part( 'html_includes/partials/search', array( 'type' => 'mobile' ) ); ?>

	<p class="h2 tagline fill fill--transparent">
		<?php echo esc_html( get_bloginfo( 'description' ) ); ?>
	</p>
	<?php endif; ?>

	<?php if ( isset( $template_args['home-sub'] ) ) : ?>
		<div class="row masthead">
			<a href="<?php echo esc_attr( home_url() ); ?>" class="pagetitle">
				<span class="visuallyhidden">Yoast</span>
			</a>

			<?php get_template_part( 'html_includes/header-controls-mobile' ); ?>
		</div>

		<?php get_template_part( 'html_includes/partials/search', array( 'type' => 'mobile' ) ); ?>
	<?php endif; ?>

	<?php get_template_part( 'html_includes/header-controls-desktop' ); ?>

	<nav role="navigation" class="sitenav sitenav--home sticky" data-sticky data-sticky-desktop>
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
		)); ?>
	</nav>

	<?php if ( isset( $template_args['home-sub'] ) ) : ?>
		<!-- Decoration -->
		<div class="row">
			<div class="boxes boxes--header boxes--header-home"></div>
		</div>

	<?php endif; ?>
</header>

<?php if ( isset( $template_args['home'] ) ) { get_template_part( 'html_includes/partials/fullbanner-home' ); }
