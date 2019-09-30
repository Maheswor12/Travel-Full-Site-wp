<?php
if(isset( $_POST['quick_form2'] )=='Send'){
    $post_information = array(
        'post_title' => wp_strip_all_tags( $_POST['title'] ),
        'post_content' => $_POST['content'],
        'post_type' => 'quick-form',
        'post_status' => 'pending'
    );
    $email=$_POST['email'];
    $name=$_POST['name'];

    $post_id = wp_insert_post( $post_information );
    // var_dump( $post_id);
    // die();
    if($post_id ){
        $taxonomy = 'quick-form-type';
//        $termObj  = get_term_by( 'id', 15, $taxonomy);
        $term_taxonomy_ids=wp_set_post_terms($post_id,'quick-enquiry', $taxonomy);
        if ( is_wp_error( $term_taxonomy_ids ) ) {
            // There was an error somewhere and the terms couldn't be set.
            echo 'failed';
        } else {
            // Success! The post's categories were set.
            echo 'Form Successfully Submitted!';
        }

        add_post_meta( $post_id, 'name' , $name, true );
        add_post_meta( $post_id, 'email' , $email, true );
    }
}
?>
<ul>
    <form method="post" action="#!">
        <li><label>Name: </label><input type="text" name="name" required=""></li>
        <li><label>Email: </label><br/><input type="email" name="email" required="" class="enquiry-form-email"></li>
        <li><label>Title: </label><input type="text" name="title"></li>
        <li><label>Detail: </label><textarea name="content" cols="14" required=""></textarea></li>
        <li class="enquiry_btn_rt"><input type="submit" value="Send" name="quick_form2" class="enquiry-form-btn"></li>
    </form>
</ul>
