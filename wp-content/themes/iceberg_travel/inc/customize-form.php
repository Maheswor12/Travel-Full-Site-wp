<?php
if(isset( $_POST['quick_form1'] )=='Submit'){
    $post_information = array(
        'post_title' => wp_strip_all_tags( $_POST['trip_title'] ),
        'post_content' => $_POST['description'],
        'post_type' => 'quick-form',
        'post_status' => 'pending'
    );
    $email=$_POST['email'];
    $name=$_POST['name'];
    $contactno=$_POST['phone'];
    $post_id = wp_insert_post( $post_information );
    // var_dump( $post_id);
    // die();
    if($post_id ){
        $taxonomy = 'quick-form-type';
        $term_taxonomy_ids=wp_set_post_terms($post_id,'customize-trip', $taxonomy);
        if ( is_wp_error( $term_taxonomy_ids ) ) {
            // There was an error somewhere and the terms couldn't be set.
            echo 'failed';
        } else {
            // Success! The post's categories were set.
            echo 'Form Successfully Submitted!';
        }

        add_post_meta( $post_id, 'name' , $name, true );
        add_post_meta( $post_id, 'email' , $email, true );
        add_post_meta( $post_id, 'contactno' , $contactno, true );
    }
}

?>

<div id="js-contact-form__wrapper">
    <h3 class="contact-info__headline"> Please fill in our tailor-made request form</h3>

    <form action="#!" method="post" class="contact-form js-contact-form" id="js-contact-form">
        <div class="input-group input-group--contact small-input">
            <label class="contact-form__label" for="name">Your name</label>
            <input id="id_name" maxlength="100" name="name" placeholder="Full Name Here" type="text" required="">
        </div>
        <div class="input-group input-group--contact small-input">
            <label class="contact-form__label" for="email">Your e-mail address</label>
            <input id="id_email" name="email" placeholder="E-mail address here" type="text" required="">
        </div>
        <div class="input-group input-group--contact small-input">
            <label class="contact-form__label" for="reference_number">Trip Title</label>
            <input class="reference" id="trip_title" name="trip_title" placeholder="Trip Title" type="text" required="">
        </div>
        <div class="input-group input-group--contact small-input"><!-- class name input-group--contact-phone -->
            <label class="contact-form__label" for="phone">Contact Number</label>
            <input id="id_reference_number" maxlength="100" name="phone" placeholder="Phone Number" type="text" required="">
        </div>
        <div class="input-group input-group--contact">
            <label class="contact-form__label" for="description">Fill out the information</label>
            <textarea cols="40" id="id_description" name="description" placeholder="Fill the Information" rows="6" required=""></textarea>
        </div>
        <div class="input-group input-group--contact type_submit">
            <input type="submit" value="Submit" name="quick_form1" class="input_type_submit">
        </div>
    </form>
</div>
