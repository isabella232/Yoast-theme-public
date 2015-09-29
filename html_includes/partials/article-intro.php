<?php
namespace Yoast\YoastCom\Theme;
?>
<h2 class="tight"><a href="<?php echo get_permalink(); ?>"><?php the_title(); ?></a></h2>
<div class="meta">
	<p><?php the_time( 'j F Y' ); ?> <?php _e( 'by', 'yoastcom' ); ?> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'nicename' ) ) ); ?>"><?php the_author(); ?> &raquo;</a>
	<?php if ( get_comments_number() > 0 ) : ?>
		- <a href="<?php the_permalink(); ?>#comments"><?php get_template_part( 'html_includes/partials/comments-number' ); ?></a>
	<?php endif; ?>
	</p>
</div>
<div class="media media--nofloat">
	<a href="<?php the_permalink(); ?>" class="imgExt">
		<?php the_post_thumbnail( 'thumbnail-recent-articles' ); ?>
	</a>
	<article class="bd">
		<?php the_excerpt(); ?>
		<?php if ( 'post' === get_post_type() ) { ?>
			<?php echo _n( 'Category:', 'Categories:', count( get_the_category( get_the_ID() ) ) ); ?>
			<?php the_category( ', ' ); ?>
		<?php } ?>
	</article>
</div>
