<?php
/**
 * Created by PhpStorm.
 * User: katwalsmacbookpro
 * Date: 3/1/18
 * Time: 10:22 AM
 */

	$save_value = get_post_meta( get_the_ID(),  'booking_status', true );

?>
<select name="booking_status">
    <option value="0" <?php if( $save_value==0 ){ echo 'selected'; } ?>>Pending</option>
    <option value="1" <?php if( $save_value==1 ){ echo 'selected'; } ?>>Approved</option>
    <option value="2" <?php if( $save_value==2 ){ echo 'selected'; } ?>>Rejected</option>
</select>