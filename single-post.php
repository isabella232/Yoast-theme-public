<?php
/**
 * Template Name: Article
 */

namespace Yoast\YoastCom\Theme;
?>
<?php use Yoast\YoastCom\Settings\Hide_Comments;

get_header(); ?>

<?php get_template_part( 'html_includes/siteheader', array( 'academy-sub' => true ) ); ?>
<div class="site">

	<div class="row">
		<?php get_template_part( 'html_includes/partials/breadcrumbs' ); ?>
	</div>

	<main role="main">

		<article class="row">
			
			<?php get_template_part( 'html_includes/partials/post-title'); ?>
			
			<?php get_template_part( 'html_includes/partials/meta-full' ); ?>

			<div class="content content__first">
				<?php the_content(); ?>
			</div>

			<?php get_template_part( 'html_includes/partials/social-share' ); ?>
		</article>

		<hr class="hr--no-pointer">

		<?php get_template_part( 'html_includes/partials/bio' ); ?>

		<hr>

		<aside>
			<section class="row">
				<h2><?php _e( 'You might also like', 'yoastcom' ); ?></h2>
				<?php get_template_part( 'html_includes/partials/recent-articles' ); ?>
			</section>
		</aside>

		<hr>

		<?php if ( ! Hide_Comments::hide_comments() ) : ?>
			<?php $comments_number = get_comments_number(); ?>
			<?php if ( $comments_number > 0 ) : ?>
				<div class="entry-comments" id="comments">
					<div class="row" >
						<h3><?php printf( _n( '%d Response', '%d Responses', $comments_number ), $comments_number ); ?></h3>
					</div>
					<?php comments_template(); ?>
				</div>
			<?php endif; ?>

			<?php if ( comments_open() ) : ?>
				<?php comment_form(); ?>
			<?php endif; ?>
		<?php endif; ?>

		<hr>

		<aside>
			<section class="row iceberg">
				<h2 class="color-academy--secondary"><?php _e( 'Check out our Must Read Articles' ); ?></h2>
				<?php get_template_part( 'html_includes/partials/more-articles', array( 'must_read' => true ) ); ?>
			</section>
		</aside>

		<?php get_template_part( 'html_includes/partials/newsletter-subscribe', array( 'class' => 'fill--secondary' ) ); ?>

	</main>

	<div class="rowholder">
		<?php get_template_part( 'html_includes/fullfooter' ); ?>
	</div>

</div>

<?php get_footer(); ?>
