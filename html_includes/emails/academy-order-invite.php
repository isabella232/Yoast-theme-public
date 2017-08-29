<?php

namespace Yoast\YoastCom\Theme;

?>
Thank you for buying the <?php echo $template_args['title']; ?>!

All that's left now is activating your course.
<ol>
    <li><a href="<?php echo esc_url( $template_args['url'] ); ?>">Click this link.</a></li>
    <li>Login or create an account.</li>
    <li>Activate your course by clicking the button 'Add <?php echo $template_args['title']; ?> to this account'.</li>
    <li>Your course is now available in <a href="https://yoast.academy/my-courses/">My Academy</a>.</li>
</ol>

If you cannot click on the link, paste this url in your browser: <?php echo esc_url( $template_args['url'] ); ?>

Happy learning!
Team Yoast