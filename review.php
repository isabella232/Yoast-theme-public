<?php
/**
 * Template Name: Review
 */

namespace Yoast\YoastCom\Theme;
?>
<?php get_header(); ?>

<?php get_template_part( 'html_includes/siteheader' ); ?>

<div class="site">
	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main" id="main">

		<section class="row iceberg">
			<h1>Review your site</h1>
			<?php get_template_part( 'html_includes/partials/promoblocks-review' ); ?>
		</section>

		<div class="full-banner sticky" data-sticky data-sticky-stacked data-sticky-desktop style="background-image: url(<?php echo esc_attr( get_template_directory_uri() ); ?>/images/banner-academy.jpg)"></div>

		<div class="announcement fill fill--transparent takeout">
			<div class="row">
				<p>
					<a href="./ebooks.html" class="link--naked">Our eBooks give practical tips on technical aspects, copywriting, site structure, content writing and much more! Buy one of our eBooks now! &raquo;</a>
				</p>
			</div>
		</div>

		<div class="rowholder">
			<article class="row island">
				<div class="content">
					<h2>SEO Websites Reviews &raquo;</h2>

					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>

					<ul class="list--usp">
						<li>Improve your SEO</li>
						<li>Improve user experience</li>
						<li>Optimize content &amp; code</li>
						<li>Improve your site speed</li>
					</ul>

					<a class="button default">Order a SEO Website Review for $699 &raquo;</a>

				</div>

				<div class="island">
					<?php get_template_part( 'html_includes/partials/quote' ); ?>
				</div>

			</article>

			<hr>

			<article class="row island iceberg">
				<div class="content">
					<h2>Conversion Reviews &raquo;</h2>

					<p>
						Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
					</p>

					<ul class="list--usp">
						<li>Improve your SEO</li>
						<li>Improve user experience</li>
						<li>Optimize content &amp; code</li>
						<li>Improve your site speed</li>
					</ul>

					<a class="button default">Order a Conversion Review for $1,999 &raquo;</a>

				</div>

			</article>
		</div>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe', array( 'class' => '' ) ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
