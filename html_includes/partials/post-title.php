<?php

if ( has_post_thumbnail() ) {
	$thumbnail = get_the_post_thumbnail();

	?>
	<div class="post-header">
		<div class="post-header__image"><?php echo $thumbnail ?></div>
		<div class="post-header__title">
			<div class="post-header__title__container">
				<h1><?php

					$custom_title_top = get_post_meta( get_the_ID(), 'title_top_line', true );
					$custom_title_bottom = get_post_meta( get_the_ID(), 'title_bottom_line', true );

					if ( empty( $custom_title_bottom ) || empty( $custom_title_top ) ) {
						the_title();
					}
					else {
						printf( '%s<br><span class="post-header__title--second-line">%s</span>', $custom_title_top, $custom_title_bottom );
					}
					
					?></h1>

			</div>
		</div>
	</div>
	<div class="content__after-post-header"></div>
	<div class="meta__after-post_header"></div>
	<?php
}
else {
?>
<h1><?php the_title(); ?></h1>

<?php
}