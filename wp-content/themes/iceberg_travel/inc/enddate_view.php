<?php
/**
 * Created by PhpStorm.
 * User: katwalsmacbookpro
 * Date: 3/1/18
 * Time: 11:31 PM
 */
global $post;
$enddate = get_post_meta( get_the_id(), 'enddate',true);
$tripbook_type=get_post_meta(get_the_id(),'tripbook_type',true);

?>
<table>

    <?php
    if(!empty($enddate)):
        $time = strtotime($enddate);

        $newformat = date('d/m/Y',$time);


        ?>
        <tr>
            <td>End Date:</td>
            <?php
            if($tripbook_type=='fixed'){
            ?>
                <td><input type="hidden" name="edate" value="<?php if(!empty($enddate)){echo $newformat;} ?>"><?php if(!empty($enddate)){echo $newformat; } ?></td>

                <?php
            }else {

                ?>
                <td><input type="date" name="edate" value="<?php if (!empty($enddate)) {echo $enddate;
                    } ?>"></td>
                <?php
            }
            ?>
        </tr>
        <?php
    endif;
    ?>

</table>