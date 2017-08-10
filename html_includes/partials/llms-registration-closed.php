<?php

namespace Yoast\YoastCom\Theme;

$academy_overview = apply_filters( 'yoast:url', 'academy_overview');

?>
<div class="col-2 llms-new-person-form-wrapper">
	<h2 class="llms-title llms-h2"><?php _e( 'Add a new course', 'lifterlms' ); ?></h2>

	<?php
	_e( '<p>You can only access Yoast Academy after buying and activating one or more of our courses. In addition 
    to our <a href="' . $academy_overview . 'course/yoast-seo-wordpress-training">Yoast SEO for WordPress course</a>,
    we offer a <a href="' . $academy_overview . 'course/basic-seo-training/">basic SEO course</a> and multiple 
    in-depth courses on topics like SEO copywriting, site structure, and technical SEO. Please visit our
    <a href="' . $academy_overview . 'courses/">courses page</a> to find Yoast courses that suit your needs. 
    Enhance your SEO skills with a Yoast course!</p>
    <p>
    Have you already bought a course? <a href="https://kb.yoast.com/kb/access-training-course/">This article</a> 
    explains how to activate your courses and gain access to your Yoast Academy account.
    </p>' );
	?>
</div>
