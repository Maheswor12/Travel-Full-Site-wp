<?php
/**
 * Created by PhpStorm.
 * User: katwalsmacbookpro
 * Date: 3/1/18
 * Time: 11:30 PM
 */
global $post;
$posttype = get_post_meta( get_the_id(), 'posttype',true);
$activity = get_post_meta( get_the_id(), 'activity',true);
$destination = get_post_meta( get_the_id(), 'destination',true);
$price = get_post_meta( get_the_id(), 'price',true);
$discount = get_post_meta( get_the_id(), 'discount',true);


?>
<table>

    <?php
    if(!empty($posttype)):
        ?>
        <tr>
            <td>Trip Type:</td>
            <td><?php echo $posttype; ?></td>
        </tr>
        <?php
    endif;
    ?>
    <?php
    if(!empty($activity)):
        ?>
        <tr>
            <td>Activity:</td>
            <td><?php echo $activity; ?></td>
        </tr>
        <?php
    endif;
    ?>
    <?php
    if(!empty($destination)):
        ?>
        <tr>
            <td>Destination:</td>
            <td><?php echo $destination; ?></td>
        </tr>
        <?php
    endif;
    ?>
    <?php
    if(!empty($price)):
        ?>
        <tr>
            <td>Price Per Person:</td>
            <td><?php echo 'USD'.$price; ?></td>
        </tr>
        <?php
    endif;
    ?>
    <?php
    if(!empty($discount)):
        ?>
        <tr>
            <td>Discount:</td>
            <td><?php echo $discount; ?></td>
        </tr>
        <?php
    endif;
    ?>


</table>
