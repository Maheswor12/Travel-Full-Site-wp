<?php
/**
 * Template Name:Travel Display Content
 * Created by PhpStorm.
 * User: katwalsmacbookpro
 * Date: 2/27/18
 * Time: 2:18 PM
 */
get_header();
?>

    <!--Content Here-->
    <section>
        <?php
        if(have_posts()):
            while(have_posts()):the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </section>

<?php

get_footer();
