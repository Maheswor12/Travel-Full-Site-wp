<?php
/**
 * Single before-booking-trip Page Template
 */
/**
 * Created by PhpStorm.
 * User: katwalsmacbookpro
 * Date: 1/30/18
 * Time: 12:51 PM
 */

get_header();



if(have_posts()) {
    while (have_posts()):the_post();
        $postid = get_the_ID();

    $title=the_title();
    $content=the_content();
    ?>
       <p> <h2><?php echo $title;?></h2></p>
        <p>
            <?php echo $content;?>
        </p>
<?php
    endwhile;
}
?>
</main>

<?php
get_footer();
?>




