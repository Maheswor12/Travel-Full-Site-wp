<?php
/**
 * Created by PhpStorm.
 * User: katwalsmacbookpro
 * Date: 3/1/18
 * Time: 11:30 PM
 */
global $post;
$peopleno = get_post_meta( get_the_id(), 'peopleno',true);

?>
<table>

    <?php
    if(!empty($peopleno)):
        ?>
        <tr>
            <td>Number Of People: </td>

                <td><input type="number" name="peopleno" value="<?php if(!empty($peopleno)){echo $peopleno;} ?>"></td>



        </tr>
        <?php
    else:
        ?>
        <tr>
            <td>Number Of People: </td>

                <td><input type="number" name="peopleno" value="<?php if(!empty($peopleno)){echo $peopleno;} ?>"></td>



        </tr>
    <?php
    endif;
    ?>

</table>