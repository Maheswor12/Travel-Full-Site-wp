<?php
/**
 * Template Name:Contact Us
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
<!-- contact us design -->
<main id="main" class="contact-main" role="main">
                
<!-- contact main head -->
<section class="contact-head">
    <h1 class="contact-head__title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Need Any help? </font></font></h1>
    <p class="contact-availability__title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Our travel advisors are available:</font></font></p>
    <p class="contact-availability__text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Everyday from 9:00 to 21:00 </font></font><br><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Weekend from 10:00 to 18:00</font></font><br><br></p>
</section>
<!-- end of contact main head -->

<!-- contact socials -->
<section class="contact-section flex-container">
    <div class="flex-container__column">
        <div class="contact-method contact-method--social">
          <div class="contact-method__group">
            <div class="contact-method__image">
              <img class="contact-method__icon" src="//d3sxhanqns5a1i.cloudfront.net/static/img/2016/social/facebook-messenger.e4ff0a5f733a.svg" alt="facebook messenger icon">
            </div>
            <div class="contact-method__copy">
              <p class="contact-method__text">Contact Us On  Facebook</p>
              <a class="contact-method__text--secondary" href="http://m.me/TravelBirdDK" target="_blank">Via Facebook messenger</a>
            </div>
          </div>
        </div>
    </div>
    <div class="flex-container__column">
        <div class="contact-method contact-method--phone">
            <div class="contact-method__group">
              <div class="contact-method__image">
                  <img class="contact-method__icon contact-method__icon--small" src="//d3sxhanqns5a1i.cloudfront.net/static/img/2016/icons/phone_green.8c2f49690aa4.svg" alt="phone icon">
              </div>
              <div class="contact-method__copy">
                <p class="contact-method__text">Call Us</p>
                <a class="contact-method__text--secondary" href="#"> 014700939 ,  +977 9851029803</a>
              </div>
            </div>
        </div>
    </div>
</section>
<!-- end of contact socials -->
<?php

if(isset( $_POST['send'] )) {

    $name = $_POST['contact-name'];
    $email = $_POST['contact-email'];
    $subject = $_POST['contact-subject'];
    $phone = $_POST['contact-phone'];
    $information = $_POST['contact-information'];

    $post_information = array(
        'post_title' => wp_strip_all_tags($subject),
        'post_content' => $information,
        'post_type' => 'contact',
        'post_status' => 'publish'
    );
    $post_id = wp_insert_post($post_information);

    if ($post_id) {
        add_post_meta($post_id, 'name', $name, true);
        add_post_meta($post_id, 'email', $email, true);
        add_post_meta($post_id, 'contactno', $phone, true);
    echo 'Successfully Submitted';
    }else{
        echo 'Failed to Submit';
    }
}
?>

<section class="contact-section contact-section--bottom flex-container">
  <div class="flex-container__column">
    <div id="js-contact-form__wrapper">
      <h3 class="contact-info__headline"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Send us an email</font></font></h3>
        
        <form action="#!" method="post" class="contact-form js-contact-form">


            <div class="input-group input-group--contact ">
                <label class="contact-form__label" for="contact-name"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Your name</font></font></label>
                <input id="id_name" maxlength="100" name="contact-name" placeholder="Full Name Here" type="text" required="">
                
            </div>

            <div class="input-group input-group--contact ">
                <label class="contact-form__label" for="contact-email"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Your e-mail address</font></font></label>
                <input id="id_email" name="contact-email" placeholder="E-mail Address Here" type="email" required="">
                
            </div>
            <div class="input-group input-group--contact">

                <label class="contact-form__label" for="contact-subject"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Subject</font></font></label>
                <input class="reference" id="id_reference_number" name="contact-subject" placeholder="Subject Here" type="text">
                <i class="info js-tooltip tooltip" data-tooltip-cache="false">
                </i>
            </div>

            <div class="js-form-phone input-group input-group--contact input-group--contact-phone ">
                <label class="contact-form__label" for="phone"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fill in your phone number and we will contact you as soon as possible.</font></font></label>
                <input id="id_phone" maxlength="100" name="contact-phone" placeholder="Phone Number Here" type="number">
            </div>
            <div class="input-group input-group--contact ">
                <label class="contact-form__label" for="contact-information"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Fill out the information</font></font></label>
                <textarea cols="40" id="id_description" name="contact-information" placeholder="Details Here" rows="6" required=""></textarea>
            </div>

            <div class="input-group input-group--contact">
                <font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><input class="button" type="submit" name="send" value="Send"></font></font></font></font>
            </div>
        </form>
    </div>
  </div>
  <div class="flex-container__column">
    <div class="contact-info">
      <h3 class="contact-info__headline">Address</h3>
      <ul class="contact-info__text">
        <li>TravelBird Nepal</li>
        <li>Thamel</li>
        <li>Kathmandu,Bagmati</li>
        <li>Nepal</li>
      </ul>
      
      <div id="js-contact-info__map" class="contact-info__map map-inline" style="position: relative; overflow: hidden;"></div>
      <h3 class="contact-info__headline">Bank Details</h3>
      <p>Name of Bank: EVEREST BANK LIMITED.<br/>
          Swift code no: EVBLNPKA<br/>
          A/C No: 03500105200810 (NPR ACCOUNT)<br/>
          Name of account holder: TRAVEL BIRD NEPAL PVT. LTD.<br/>
          Address: A One Business Complex, First Floor, Thamel, Kathmandu</p>
  </div>
  
</section>
</main>
<!-- end of contact us page -->

<script>
      function initMap() {
        var uluru = {lat: 27.716921, lng: 85.308944};
        var map = new google.maps.Map(document.getElementById('js-contact-info__map'), {
          zoom: 10,
          center: uluru,
          scrollwheel: false,
          gestureHandling: 'greedy'
        });
        var marker = new google.maps.Marker({
          position: uluru,
          map: map
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhij5OFTMR5Igv5gVCAqBfwb7TsgNsmd4&callback=initMap">
    </script>
    
    <style>
        .contact-method__image {
            min-width: 40px;
            max-width: 40px;
        }
        section.contact-section.contact-section--bottom.flex-container {
            max-width: unset;
            margin: 0 auto;
            padding: 0 60px;
        }
        .flex-container__column .input-group--contact .dropdown{
           width: 100%;
        }
        .contact-section {
            padding: 0 60px 24px;
        }
        .flex-container {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -webkit-flex-direction: row;
            -ms-flex-direction: row;
            flex-direction: row;
        }
        .flex-container {
             display: -webkit-box;
             display: -webkit-flex; 
             display: -ms-flexbox;
             display: flex; 
             -webkit-flex-wrap: wrap; 
             -ms-flex-wrap: wrap;
             flex-wrap: wrap; 
        }
       .flex-container__column .input-group--contact .dropdown,.flex-container__column input[type=email]:focus,.flex-container__column input[type=password]:focus,.flex-container__column input[type=tel]:focus,.flex-container__column input[type=text]:focus,.flex-container__column textarea:focus {
            border-color: #0a8de9;
            background-color: #fff;
            color: #282b40;
            outline: none;
        }

        .flex-container__column .input-group--contact{
            flex-direction: column;
            position: relative;
            width: 100%;
            padding: 0 0 12px; 
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
        }  
        
        @media screen and (min-width: 1024px){
            .flex-container__column {
                margin: 0px 30px;
                width: 45%;
            }
            .flex-container__column:first-child {
              /*margin-left: 0;*/
            }
            .flex-container__column input[type=email],.flex-container__column input[type=password],.flex-container__column input[type=tel],.flex-container__column input[type=text],.flex-container__column textarea {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                padding: 12px 16px;
                font-size: 16px;
                width: 100%;
                max-width: none;
                border-radius: 4px;
                border: 1px solid #bebfc5;
                display: inline-block;
                font-family: FFMarkWebProBook,Helvetica;
                line-height: normal;
            }
            .flex-container__column .input-group--contact textarea {
                padding: 10px 16px;
                resize: vertical;
                max-height: 260px;
                min-height: 48px;
            }
            .flex-container__column .button {
                width:100%;
                display: inline-block;
                vertical-align: middle;
                min-height: 48px;
                padding: 13px 24px;
                background-color: #ff9000;
                border: 0;
                border-radius: 4px;
                color: #fff;
                text-align: center;
                cursor: pointer;
                -webkit-transition: background-color .15s linear;
                transition: background-color .15s linear;
                font-size: 14px;
                font-family: FFMarkWebProBold,Helvetica;
                line-height: 1.5;
                letter-spacing: -.1px;
            }
        }
        
        *, :after, :before {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }
        .contact-info__map {
            width: 100%;
            margin-bottom: 32px;
            height: 300px;
        }
        .contact-head {
            text-align: center;
            padding: 48px 0;
        }
        .contact-availability__text {
            margin-bottom: 0;
        }
        .contact-method {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-flex: 1;
            -webkit-flex: 1;
            -ms-flex: 1;
            flex: 1;
            -webkit-box-pack: justify;
            -webkit-justify-content: space-between;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -webkit-box-align: start;
            -webkit-align-items: flex-start;
            -ms-flex-align: start;
            align-items: flex-start;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -webkit-flex-direction: column;
            -ms-flex-direction: column;
            flex-direction: column;
            padding: 24px;
            border: 1px solid #e9e9eb;
            border-radius: 4px;
        }
        .contact-method__group {
            display: -webkit-box;
            display: -webkit-flex;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: center;
            -webkit-align-items: center;
            -ms-flex-align: center;
            align-items: center;
        }
        .contact-method__copy {
            -webkit-flex-basis: 100%;
            -ms-flex-preferred-size: 100%;
            flex-basis: 100%;
            margin: 0;
            padding: 0 24px;
            color: #282b40;
            text-align: left;
        }
        .contact-info__headline {
            font-size: 18px;
            font-family: FFMarkWebProBold,Helvetica;
            line-height: 1.5;
            letter-spacing: -.1px;
            margin: 0 auto 16px;
        }
        .contact-info__text {
            margin: 0 auto 32px;
            padding: 0;
            color: #93959f;
            list-style-type: none;
            font-size: 16px;
            line-height: 1.5;
        }
        @media screen and (min-width: 1024px){
            .contact-main{
               padding-bottom: 90px; 
            }   
                
            .contact-method {
                padding: 32px;
                text-align: center;
            }
            .contact-head {
                padding-bottom: 88px;
            }
            .contact-head__title {
                font-family: FFMarkWebProBold,Helvetica;
                margin-bottom: 32px;
                font-size: 64px;
                line-height: 1.25;
                letter-spacing: -.5px;
            }
            .flex-container {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -webkit-flex-direction: row;
                -ms-flex-direction: row;
                flex-direction: row;
            }
        }
        @media screen and (min-width: 768px){
            .contact-method {
                -webkit-box-align: center;
                -webkit-align-items: center;
                -ms-flex-align: center;
                align-items: center;
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -webkit-flex-direction: row;
                -ms-flex-direction: row;
                flex-direction: row;
            }
        }
    </style>
<?php

get_footer();
