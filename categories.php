<?php
/**
 * Template Name: Categories
 */

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'academy-sub' => true ) ); ?>
<div class="site">

	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">
			<h1 class="visuallyhidden">All Categories</h1>

			<section class="row">
				<span id="mustread" class="anchor"></span>
				<?php get_template_part( 'html_includes/partials/promo-links', array(
					'classset1' => 'fill fill--secondary helper-border-academy--secondary',
					'classset2' => 'theme-academy--secondary',
					'classset3' => 'theme-academy--secondary',
					'classset1a' => 'color--white',
					'classset1b' => 'color-academy--secondary',
					'classset1c' => 'color-academy--secondary',
				) ); ?>
			</section>
			<hr>
			<article class="row">
				<h2><a href="#">The Definitive Guide to Higher Rankings for WordPress websites &raquo;</a></h2>
				<div class="content">
					<p>
						While writing our book ‘Optimizing your WordPress site’ I worked closely together with Joost in creating a section on Search Engine Optimization. The first chapter — after the introduction in SEO — had to be keyword research.
					</p>
					<p>
						‘Keyword research is the basis of all Search Engine Optimization,’ Joost explained to me, ‘without proper keyword research, all &hellip;
						<a href="#" class="rightaligned color-cta">Read more &raquo;</a>
					</p>
				</div>
			</article>

			<div class="banner banner--academy"></div>

			<article class="row">
				<h2>Duplicate content: causes and solutions</h2>
				<div class="content">
					<p>
						While writing our book ‘Optimizing your WordPress site’ I worked closely together with Joost in creating a section on Search Engine Optimization. The first chapter — after the introduction in SEO — had to be keyword &hellip;
						<a href="#" class="rightaligned color-cta">Read more &raquo;</a>
					</p>
				</div>
			</article>

		<?php get_template_part( 'html_includes/partials/announcement', array( 'text' => "Want to learn more long tail keywords and keyword research? Check out our eBook Optimize your WordPress site / Optimize your website &raquo;" ) ); ?>

		<section class="row">
			<span id="series" class="anchor"></span>
			<?php get_template_part( 'html_includes/partials/promo-links', array(
				'classset1' => 'theme-academy--secondary',
				'classset2' => 'fill fill--secondary helper-border-academy--secondary',
				'classset3' => 'theme-academy--secondary',
				'classset1a' => 'color-academy--secondary',
				'classset1b' => 'color--white',
				'classset1c' => 'color-academy--secondary',
			) ); ?>
		</section>

		<hr>

		<section class="row">
			<?php get_template_part( 'html_includes/partials/list-series' ); ?>
		</section>

		<hr>

		<section class="row">
			<?php get_template_part( 'html_includes/partials/list-series' ); ?>
		</section>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe', array( 'class' => "fill--secondary", ) ); ?>

		<section class="row">
			<span id="browse" class="anchor"></span>
			<?php get_template_part( 'html_includes/partials/promo-links', array(
				'classset1' => 'theme-academy--secondary',
				'classset2' => 'theme-academy--secondary',
				'classset3' => 'fill fill--secondary helper-border-academy--secondary',
				'classset1a' => 'color-academy--secondary',
				'classset1b' => 'color-academy--secondary',
				'classset1c' => 'color--white',
			) ); ?>
		</section>

		<hr>

		<section class="row iceberg">
			<?php get_template_part( 'html_includes/partials/list-categories' ); ?>
		</section>

		<hr>
		<section class="row">
			<h2 class="color-academy--tertiary">Recent Posts</h2>
			<?php get_template_part( 'html_includes/partials/recent-articles', array( 'class2' => 'color-academy--tertiary' ) ); ?>
		</section>

		<?php get_template_part( 'html_includes/partials/announcement-addonmodules', array( 'class' => "fill--secondary" ) ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
