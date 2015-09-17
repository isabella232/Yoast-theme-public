<?php

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader' ); ?>

<div class="site">
	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<div class="row">
			<h1 id="seo-plugins"><?php _e( 'SEO plugins by Yoast' ); ?></h1>
			<ul class="list list--unstyled">
				<li><a href="#ga-plugins"><?php _e( 'Google Analytics plugins', 'yoastcom' ); ?> &raquo;</a></li>
				<li><a href="#other-plugins"><?php _e( 'Other plugins', 'yoastcom' ); ?> &raquo;</a></li>
			</ul>
			<?php get_template_part( 'html_includes/partials/more-pluginlist', array( 'categories' => array( 303 ) ) ); ?>

			<div class="island">
				<blockquote>
					<?php _e( 'News SEO by Yoast makes sure we can keep up to date with the changing requirements by Google', 'yoastcom' ); ?>
				</blockquote>
			</div>
		</div>

		<?php get_template_part( 'html_includes/partials/announcement', array(
			'class' => 'announcement--pointer-top fill--tertiary',
			'text'  => 'Want to know how to improve your site? Order an SEO Website Review &raquo;',
			'url'   => home_url( '/hire-us/website-review/' ),
		) ); ?>

		<div class="announcement announcement--pointer fill fill--secondary">
			<div class="row">
				<h2 class="h3"><?php _e( 'Bundle plugins and save money!', 'yoastcom' ); ?></h2>
				<?php get_template_part( 'html_includes/partials/more-bundleplugin' ); ?>
			</div>
		</div>


		<section class="row island iceberg">
			<h2 class="h1" id="ga-plugins"><?php _e( 'Google Analytics by Yoast plugins', 'yoastcom' ); ?></h2>

			<ul class="list list--unstyled">
				<li><a href="#seo-plugins"><?php _e( 'WordPress SEO plugins', 'yoastcom' ); ?> &raquo;</a></li>
				<li><a href="#other-plugins"><?php _e( 'Other plugins', 'yoastcom' ); ?> &raquo;</a></li>
			</ul>
			<?php get_template_part( 'html_includes/partials/more-pluginlist', array( 'categories' => array( 407 ) ) ); ?>
		</section>

		<hr>

		<section class="row island">
			<?php get_template_part( 'html_includes/partials/testimonial' ); ?>
		</section>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe', array( 'class' => "announcement--pointer-top" ) ); ?>

		<div class="row iceberg">
			<h2 class="h1" id="other-plugins"><?php _e( 'Other plugins', 'yoastcom' ); ?></h2>
			<ul class="list list--unstyled">
				<li><a href="#seo-plugins"><?php _e( 'WordPress SEO plugins', 'yoastcom' ); ?> &raquo;</a></li>
				<li><a href="#ga-plugins"><?php _e( 'Google Analytics plugins', 'yoastcom' ); ?> &raquo;</a></li>
			</ul>
			<?php get_template_part( 'html_includes/partials/promoblocks-plugins' ); ?>
		</div>

		<hr class="hr--no-pointer">

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
