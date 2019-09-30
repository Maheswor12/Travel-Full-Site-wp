<?php
/**
 * Created by PhpStorm.
 * User: katwalsmacbookpro
 * Date: 3/1/18
 * Time: 10:48 PM
 */
global $post;
$name = get_post_meta( get_the_id(), 'name',true);
$email = get_post_meta( get_the_id(), 'email',true);
$mobileno = get_post_meta( get_the_id(), 'mobileno',true);
$landline = get_post_meta( get_the_id(), 'landline',true);
$dob = get_post_meta( get_the_id(), 'dob',true);
$occupation = get_post_meta( get_the_id(), 'occupation',true);
$countryfrom = get_post_meta( get_the_id(), 'countryfrom',true);
$address = get_post_meta( get_the_id(), 'address',true);


?>
    <table>

        <?php
        if(!empty($name)):
            ?>
            <tr>
                <td>Full Name:</td>
                <td><?php echo $name; ?></td>
            </tr>
            <?php
        endif;
        ?>
        <?php
        if(!empty($email)):
            ?>
            <tr>
                <td>Email:</td>
                <td><?php echo $email; ?></td>
            </tr>
            <?php
        endif;
        ?>
        <?php
        if(!empty($address)):
            ?>
            <tr>
                <td>Address:</td>
                <td><?php echo $address; ?></td>
            </tr>
            <?php
        endif;
        ?>
        <?php
        if(!empty($mobileno)):
            ?>
            <tr>
                <td>Mobile No.:</td>
                <td><?php echo $mobileno; ?></td>
            </tr>
            <?php
        endif;
        ?>
        <?php
        if(!empty($landline)):
            ?>
            <tr>
                <td>Landline No.:</td>
                <td><?php echo $landline; ?></td>
            </tr>
            <?php
        endif;
        ?>
        <?php
        if(!empty($dob)):
            ?>
            <tr>
                <td>Date Of Birth:</td>
                <td><?php echo $dob; ?></td>
            </tr>
            <?php
        endif;
        ?>
        <?php
        if(!empty($occupation)):
            ?>
            <tr>
                <td>Occupation:</td>
                <td><?php echo $occupation; ?></td>
            </tr>
            <?php
        endif;
        ?>
        <?php
        if(!empty($countryfrom)):
            ?>
            <tr>
                <td>Country From:</td>
                <td><?php echo $countryfrom; ?></td>
            </tr>
            <?php
        endif;
        ?>

    </table>
