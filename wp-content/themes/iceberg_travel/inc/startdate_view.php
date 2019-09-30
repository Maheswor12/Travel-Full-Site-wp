<?php
/**
 * Created by PhpStorm.
 * User: katwalsmacbookpro
 * Date: 3/1/18
 * Time: 11:31 PM
 */
global $post;
$startdate = get_post_meta( get_the_id(), 'startdate',true);
$tripbook_type=get_post_meta(get_the_id(),'tripbook_type',true);

?>
<table>

    <?php
    if(!empty($startdate)):
        $time = strtotime($startdate);

        $newformat = date('d/m/Y',$time);

        ?>
        <tr>
            <td>Start Date:</td>
            <?php
            if($tripbook_type=='fixed'){
                ?>
                <td><input type="hidden" name="stdate" value="<?php if(!empty($startdate)){echo $newformat;} ?>"><?php if(!empty($startdate)){echo $newformat;} ?></td>

                <?php
            }else {

                ?>
<!--                <td><input type="date" name="stdate" value="--><?php //if(!empty($startdate)){echo date("m/d/Y",$startdate);} ?><!--"></td>-->
                <td><input type="date" name="stdate" value="<?php if(!empty($startdate)){echo $startdate;} ?>"></td>

                <?php
            }
            ?>
        </tr>
        <?php
    endif;
    ?>

</table>