<?php
/**
 * Single Trekking Page Template
 */
/**
 * Created by PhpStorm.
 * User: katwalsmacbookpro
 * Date: 1/30/18
 * Time: 12:51 PM
 */
get_header();
?>

<?php


if(have_posts()) {
while (have_posts()):the_post();

$postid = get_the_ID();
$post_type=get_post_type($postid);
$post_name=get_post();
$post_title=get_the_title();
$discount_rate = get_field('discount_rate', $postid);
$duration = get_field('duration', $postid);
$min_price = get_field('price_per_person', $postid);
$overview = get_the_content();
$itenary = get_field('itenary', $postid);
$gallery = acf_photo_gallery('gallery', $postid);
$brief = get_the_excerpt($postid);
$field = get_field_object('location', $postid);
$value = $field['value'];
$location = $value->name;
$max_people=get_field('max_people',$postid);
$included=get_field('trip_included');
$excluded=get_field('trip_excluded');
$departure_content=get_field('fixed_departure_content');
$route_image=get_field('route_map');
$video=get_field('video');
$maximum_altitude=get_field('maximum_altitude',$postid);
$fitness_level=get_field('fitness_level');
$arrival_on=get_field('arrival_on');
$departure_from=get_field('departure_from');
$meals=get_field('meals');
$accomodation=get_field('accomodation');
$printable_file=get_field('downloadable_file');
$activity_type=get_the_terms( $postid, 'activity_trekking' );
$befo_book=get_field_object('before_booking',$postid);
$befo_booking=$befo_book['value'];

?>

<!-- tab sections -->
<section class="page-width">
        <div class="card-title__wrapper">
            <div class="card-title__summary ">
                        <h1 class="card-title__title">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;"><?php the_title();?></font>
                            </font>
                        </h1>
                        <ul class="list list--horizontal">
                            <li class="list__item">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Tour</font>
                                </font>
                            </li>
                            <li class="list__item">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"><?php echo $duration?></font>
                                </font>
                            </li>
                            <li class="list__item">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;"><?php $location?></font>
                                </font>
                            </li>
                        </ul>
                        <!-- Reviews -->
                        <div class="card-title__reviews-labels"></div>
                    </div>
            <div class="card-title__summary_right">
                        <div class="social-icons">
                            <ul class="social-share-links">
                                <?php //dynamic_sidebar('social-icon'); 
                                echo do_shortcode('[ssba-buttons]'); ?>
                            </ul>
                        </div>
                        <div class="trip-btn">
                            <a class="btn_book_now_top" href="<?php echo esc_url( home_url()); ?>/booking-list/?post_id=<?php echo $postid;?>&start_date=&end_date=&maxpeople=&spacerow=">Book Now</a>
                        </div> <!--trip-btn-->
                    </div>
        </div>
                
    <!-- Left Side Content -->
    <section class="inner_content_main">
        <!-- Package Detail Focused Overview -->
        <section class="offer-block offer-block--title card-title ">
            
            <!-- Expired offer-->
            <div class="offer-block__wrapper">
                <div class="slideshow">
                    <section class="hero-offer js-prevent-cookie" id="gallery">
                        <picture class="hero-image" style="background-image:url('<?php the_post_thumbnail_url(); ?>')">
                            <div class="trip-cost">
                                <div class="price-from">
                                    <h5>All inclusive price</h5>
                                    <span class="currency-sign">$</span> <span class="prd-cost"><?php echo $min_price;?></span> <span class="currency">USD</span>
                                </div><!--price-from-->
                            </div>
                            <!--<img style="max-height:100%;" src=" <?php the_post_thumbnail_url(); ?>">-->
                        </picture>
                        <div class="hero-offer__badge-wrapper "></div>
                    </section>
                </div>
                <!--<ul class="offer-icons offer-icons--large">-->
                <!--    <li class="offer-icons__item js-tooltip tooltip" data-tooltip-cache="false">-->
                <!--        <svg class="offer-icons__icon">-->
                <!--            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#airplane"></use>-->
                <!--        </svg>-->
                <!--        <span class="tooltip__content js-tooltip-content">-->
                <!--               <font style="vertical-align: inherit;">-->
                <!--                   <font style="vertical-align: inherit;">Flights included</font>-->
                <!--               </font>-->
                <!--           </span>-->
                <!--    </li>-->
                <!--    <li class="offer-icons__item js-tooltip tooltip" data-tooltip-cache="false">-->
                <!--        <svg class="offer-icons__icon">-->
                <!--            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#hotel"></use>-->
                <!--        </svg>-->
                <!--        <span class="tooltip__content js-tooltip-content">-->
                <!--               <font style="vertical-align: inherit;">-->
                <!--                   <font style="vertical-align: inherit;">Accommodation included</font>-->
                <!--               </font>-->
                <!--           </span>-->
                <!--    </li>-->
                <!--</ul>-->
            </div>
            
            <!-- gallery -->
            <?php if(!empty($gallery)):?>
            <section class="offer-block offer-block--gallery ">
                    <div class="offer-block__wrapper">
                        <div class="js-Gallery Gallery gallery">
                            <ul class="imageGallery-lightbox js-Gallery__list Gallery__list">
                                <?php foreach($gallery as $image ):
                                    $id = $image['id']; // The attachment id of the media
                                    $title = $image['title']; //The title
                                    $caption= $image['caption']; //The caption
                                    $ful_image_url= $image['full_image_url']; //Full size image url
                                    $full_image_url = acf_photo_gallery_resize_image($ful_image_url, 262, 160); //Resized size to 262px width by 160px height image url
                                    $thumbnail_image_url= $image['thumbnail_image_url']; //Get the thumbnail size image url 150px by 150px
                                    $url= $image['url']; //Goto any link when clicked
                                    $target= $image['target']; //Open normal or new tab
                                    $alt = get_field('photo_gallery_alt', $id); //Get the alt which is a extra field (See below how to add extra fields)
                                    $class = get_field('photo_gallery_class', $id); //Get the class which is a extra field (See below how to add extra fields)
                                    ?>
    
                                    <li>
                                        <a href="<?php echo $ful_image_url;?>" title="<?php echo $caption; ?>">
                                            <img src="<?php echo $full_image_url; ?>"
                                                 title="<?php echo $title; ?>"
                                                 data-image="<?php echo $full_image_url; ?>">
                                        </a>
                                    </li>
                                    <?php
                                endforeach;
                                ?>
                            </ul>
                        </div>
                    </div>
            </section>
            <?php
            endif;
            ?>
        </section>

        <section class="section jquery-tabs">
            <ul class="category-list" data-options="deep_linking: true">
                <li class="category" id="category-overview">
                    <a href="#home" data-toggle="tab">
                        <span style="vertical-align: inherit;">Trip Overview</span>
                    </a>
                </li>
                <li class="category" id="category-115000615685">
                    <a href="#itinerary" data-toggle="tab">
                        <span style="vertical-align: inherit;">Itinerary</span>
                    </a>
                </li>
                <li class="category" id="category-115000592269">
                    <a href="#reviews" data-toggle="tab">
                        <span style="vertical-align: inherit;">Reviews</span>
                    </a>
                </li>
                <li class="category" id="category-201050111">
                    <a href="#faq" data-toggle="tab">
                        <span style="vertical-align: inherit;">FAQ's</span>
                    </a>
                </li>
                <li class="category" id="category-200980721">
                    <a href="#booking" data-toggle="tab">
                        <span style="vertical-align: inherit;">Bookings</span>
                    </a>
                </li>
                <li class="category" id="category-included">
                    <a href="#included" data-toggle="tab">
                        <span style="vertical-align: inherit;">Included</span>
                    </a>
                </li>
            </ul>


            <!-- tab content sections -->
            <section class="about-us">
                <!-- tab 1-->
                <section class="tab-contents-package offer-block offer-block--accommodation-card " id="home" style="display: block;">
                    <div class="offer-block__wrapper">
                        <!-- trip overview table -->
                        <div class="trip-overview">
                            <table width="100%" class="table responsive mobile-overview">
                                <tbody>
                                <tr>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#groupOfPeople"></use>
                                        </svg>
                                        <span class="desctiption-title"> Group size:</span></td>
                                    <td><?php if(!empty($max_people)){ echo $max_people;}else{echo 'N/A';}?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#altitude"></use>
                                        </svg>
                                        <span class="desctiption-title">Max-Altitude:</span>
                                    </td>
                                    <td><?php if(!empty($maximum_altitude)){echo $maximum_altitude;}else{echo 'N/A';}?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#globe"></use>
                                        </svg>
                                        <span class="desctiption-title"> Destination:</span></td>
                                    <td><?php if(!empty($location)){echo $location;}else{echo 'N/A';}?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#heartbeat"></use>
                                        </svg>
                                        <span class="desctiption-title"> Fitness level:</span></td>
                                    <td colspan="3"><a href="http://www.himalayanglacier.com/trek-grading.html" class="tooltips"><?php if(!empty($fitness_level)){echo $fitness_level;}else{echo 'N/A';}?><span class="gradeIcon grade2">&nbsp;</span></a>	</td>
                                </tr>
                                <tr>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#airplane"></use>
                                        </svg>
                                        <span class="desctiption-title"> Arrival on:</span></td>
                                    <td><?php if(!empty($arrival_on)){echo $arrival_on;}else{echo 'N/A';}?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#airplane"></use>
                                        </svg>
                                        <span class="desctiption-title"> Departure from:</span></td>
                                    <td><?php if(!empty($departure_from)){echo $departure_from;}else{echo 'N/A';}?></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cutlery"></use>
                                        </svg>
                                        <span class="desctiption-title"> Meals:</span>
                                         <table>
                                            <tr><td colspan="2" class="noborder"><?php if(!empty($meals)){echo $meals;}else{echo 'N/A';}?></td></tr>
                                       </table>
                                        </td>
                                </tr>
                                <tr>
                                    <td  colspan="2">
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#hotel"></use>
                                        </svg>
                                        <span class="desctiption-title"> Accommodation:</span>
                                    <table>
                                        <tr><td colspan="2" class="noborder"> <?php if(!empty($accomodation)){echo $accomodation;}else{echo 'N/A';}?></td></tr>
                                    </table>
                                    </td>
                                </tr>
                                </tbody></table>
                            
                            <table width="100%" class="table responsive desktop-overview">
                                <tbody>
                                <tr>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#groupOfPeople"></use>
                                        </svg>
                                        <span class="desctiption-title"> Group size:</span></td>
                                    <td><?php if(!empty($max_people)){ echo $max_people;}else{echo 'N/A';}?>
                                    </td>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#altitude"></use>
                                        </svg>
                                        <span class="desctiption-title"> Max-Altitude:</span></td>
                                    <td>
                                        <?php if(!empty($maximum_altitude)){echo $maximum_altitude;}else{echo 'N/A';}?>                                             </td>
                                </tr>
                                <tr>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#globe"></use>
                                        </svg>
                                        <span class="desctiption-title"> Destination:</span></td>
                                    <td><?php if(!empty($location)){echo $location;}else{echo 'N/A';}?></td>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#heartbeat"></use>
                                        </svg>
                                        <span class="desctiption-title"> Fitness level:</span></td>
                                    <td colspan="3">	 <a href="http://www.himalayanglacier.com/trek-grading.html" class="tooltips"><?php if(!empty($fitness_level)){echo $fitness_level;}else{echo 'N/A';}?><span class="gradeIcon grade2">&nbsp;</span></a>	</td>
                                </tr>
                                <tr>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#airplane"></use>
                                        </svg>
                                        <span class="desctiption-title"> Arrival on:</span></td>
                                    <td><?php if(!empty($arrival_on)){echo $arrival_on;}else{echo 'N/A';}?></td>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#airplane"></use>
                                        </svg>
                                        <span class="desctiption-title"> Departure from:</span></td>
                                    <td><?php if(!empty($departure_from)){echo $departure_from;}else{echo 'N/A';}?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#cutlery"></use>
                                        </svg>
                                        <span class="desctiption-title"> Meals:</span></td>
                                    <td colspan="3"> <?php if(!empty($meals)){echo $meals;}else{echo 'N/A';}?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <svg class="offer-block__title-icon">
                                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#hotel"></use>
                                        </svg>
                                        <span class="desctiption-title"> Accommodation:</span></td>
                                    <td colspan="3"> <?php if(!empty($accomodation)){echo $accomodation;}else{echo 'N/A';}?></td>
                                </tr>
                                </tbody></table>    
                        </div>
                           <!--end of trip overview table -->
                           
                        <?php echo $overview;?>
                        
                        <section class="included">
                            <h3>
                                Cost Includes
                            </h3>
                            <?php echo html_entity_decode(wp_strip_all_tags($included));?>
                        </section>

                    </div>

                </section>


                <!-- tab2 -->
                <section class="tab-contents-package offer-block offer-block--accommodation-card " id="itinerary" style="display: none;">
                    <div class="offer-block__wrapper">
                        <?php echo html_entity_decode(wp_strip_all_tags($itenary));?>
                    </div>
                </section>

                <!-- tab 3 -->
                <section class="tab-contents-package" style="display: none;" id="reviews">
                    <div class="wrap">
                        
                        <!-- end of write review btn -->
                        <form class="write_review_form">
                               <button class="button write_review_btn">Write Review</button>
                               <style>
                                   .write_review_btn{
                                       min-height: 35px;
                                       text-transform: capitalize;
                                       padding: 0px 10px;
                                       float: right;
                                       height: 17px;
                                       background: #ffaf00;
                                       font-size: 16px;
                                       font-family: "Helvetica";
                                       font-weight: 400;
                                       color: #fff;
                                   }
                               </style>
                           </form>
                           <!-- end of write review btn -->
                           
                        <div class="review-title">
                            <?php  echo do_shortcode( '[RICH_REVIEWS_SNIPPET]' ); ?>
                        </div>
                        <div class="display-review">
                            <?php  echo do_shortcode( '[RICH_REVIEWS_SHOW]' ); ?>
                        </div>



                        <!-- <div id="TA_selfserveprop311" class="TA_selfserveprop">
                        <ul id="kwa7oym" class="TA_links Mwwd5NjlkrSC">
                        <li id="bAo6IReI" class="ykrOUsrAu78">
                        <a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
                        </li>
                        </ul>
                        </div>
                        <script async src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=311&amp;locationId=10239059&amp;lang=en_US&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=true&amp;display_version=2"></script> -->



                    </div>

                </section>

                <!-- tab 4 -->
                <section class="tab-contents-package offer-block offer-block--accommodation-card" id="faq" style="display: none;">
                    <div class="offer-block__wrapper">
                        <h2 class="offer-block__title">
                            <span class="offer-block__title-main">FAQ's</span>
                        </h2>
                    </div>
                    <?php if( have_rows('faqs') ): ?>


                        <?php while( have_rows('faqs') ): the_row();

                            // vars
                            $question = get_sub_field('question');
                            $answer = get_sub_field('answer');

                            ?>
                            <!--faq 1-->
                            <div class="offer-block__units faq-container">
                                <h4 class="offer-block__unit-title">
                           <span class="faq-plusSign-div">
                               <svg class="offer-block__title-icon faq-plus-sign">
                                   <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#plus-sign"></use>
                               </svg>
                           </span>
                                    <span class="faq-minusSign-div">
                               <svg class="offer-block__title-icon faq-minus-sign" x="0px" y="0px" xml:space="preserve">
                                   <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#minus-sign"></use>
                               </svg>
                           </span>
                                    <?php echo $question;?>
                                </h4>
                                <div class="offer-block__unit-content faq-answer"><p><?php echo $answer;?></p></div>
                            </div>
                            <?php
                        endwhile;
                    endif;
                    ?>

                </section>

                <!-- tab 5 -->
                <section class="tab-contents-package offer-block offer-block--accommodation-card " id="booking" style="display: none;">

                    <section class="section departure-section">
                        <ul class="departure-tab">
                            <li class="category">
                                <a href="#fixed-departure" class="active">
                                    <span style="vertical-align: inherit;">Fixed Departure</span>
                                </a>
                            </li>
                            <li class="category">
                                <a href="#!">
                                    <span style="vertical-align: inherit;">Customize My Trip</span>
                                </a>
                            </li>
                        </ul>
                    </section>

                    <!-- departure tab 1 -->
                    <div class="offer-block__wrapper departure-tab-content" id="fixed-departure">
                        <?php if (!empty($departure_content)):?>
                            <div class="fixed-departure-description offer-block__description offer-block__description--short">
                                <p><?php echo html_entity_decode(wp_strip_all_tags($departure_content));?></p>
                            </div>
                        <?php endif;

                        if(isset($_POST['monthRange'])) {

                            ?>

                            <!-- fix departure design -->
                            <div class="row">
                                <div class="fixed-departure-title">
                                    <h2><a href="#!">Join our Fixed Departure</a></h2>
                                </div>
                                <div class="fixed-departure-option-right">
                                    <form method="post" action="#" id="form-departure-schedules">
                                        <select name="monthRange" id="monthRange" class="departure-date-select"
                                                onchange='this.form.submit()'>
                                            <option value="">Select Month</option>
                                            <?php
                                            $cdate = date('Ymd');
                                            //                                       $date = date('Y-m', strtotime('2018-04-21'));

                                            for ($i = 0; $i <= 24; $i++) {
                                                $months = date("Y-m", strtotime(date('Y-m') . " +$i months"));
                                                ?>
                                                <option value="<?php echo $months; ?>"><?php echo $months; ?></option>
                                                <?php
                                            }
                                            ?>


                                        </select>
                                        <noscript><input type="submit" value="Submit"></noscript>
                                    </form>
                                </div>
                            </div>

                            <div class="table_container listitem table-responsive clearfix" id="listtables">
                                <table class="fixed-departure-table">
                                    <thead>
                                    <tr>

                                        <th><strong>Trip Dates</strong></th>
                                        <th class="text-center"><strong>Price</strong></th>
                                        <th class="text-center"><strong>Space Left</strong></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="infinitescrolllist">
                                    <?php
                                    if (have_rows('fixed_departure')):
                                        $i = 1;
                                        while (have_rows('fixed_departure')):the_row();

                                            $spacerow = $i;
                                            $start_date = get_sub_field('start_date');
                                            $sdate = date($start_date);
                                            $end_date = get_sub_field('end_date');
                                            $fmax_people = get_sub_field('max_people');
                                            $monthRange=$_POST['monthRange'];
                                            $searchdate = date('Y-m', strtotime($monthRange));
                                            $stdate=date('Y-m', strtotime($sdate));
                                            $maxpeople = get_sub_field('max_people');
                                            // if ($sdate > $cdate) {

                                            if ($searchdate == $stdate) {

                                                ?>


                                                <tr>
                                                    <!--                                           <td data-title="Trip"><span><img-->
                                                    <!--                                                           src="-->
                                                    <?php //echo esc_url(get_template_directory_uri()); ?><!--/images/peak.png"-->
                                                    <!--                                                           alt="Trek"> &nbsp; </span> -->
                                                    <?php //echo $post_title ?><!--</td>-->
                                                    <td data-title="Trip Dates"><span><img
                                                                src="<?php echo esc_url(get_template_directory_uri()); ?>/images/trip-calendar.png"
                                                                width="16" border="0"
                                                                alt="calendar"> &nbsp; </span> <?php echo date('F j, Y', strtotime($start_date)); ?>
                                                        - <?php echo date('F j, Y', strtotime($end_date)); ?></td>
                                                    <td class="text-center" data-title="Price"><span
                                                            class="hidden-xs"><img
                                                                src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tag.png"
                                                                alt="tag"> &nbsp; </span> <?php echo 'NRs. ' . $min_price; ?>
                                                    </td>
                                                    <td class="text-center" data-title="Space Left"><span><img
                                                                src="<?php echo esc_url(get_template_directory_uri()); ?>/images/member.png"
                                                                alt="member"> &nbsp; </span><?php echo $fmax_people; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?php echo esc_url(home_url()); ?>/booking-list/?post_id=<?php echo $postid; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&maxpeople=<?php echo $maxpeople; ?>&spacerow=<?php echo $spacerow; ?>"
                                                           title="Book Now" class="fix-departure-book-btn"
                                                           rel="noindex,nofollow">Book Now</a>
                                                    </td>
                                                </tr>
                                                <?php
                                                // }
                                            }
                                            $i++;
                                        endwhile;

                                    else:
                                        echo '<div class="nodeparture">NO Fixed Departure!</div>';
                                    endif;

                                    ?>
                                    </tbody>
                                </table>
                                <div class="paginat">
                                    <?php echo paginate_links(array(
                                        'base' => get_permalink() . '%#%' . '/',
                                        'format' => '?page=%#%',
                                        'current' => $page,
                                        'total' => $pages
                                    ));
                                    ?>
                                </div>
                            </div>
                            <?php
                        }
                        else{


                            if( get_query_var('page') ) {
                                $page = get_query_var( 'page' );
                            } else {
                                $page = 1;
                            }

                            // Variables
                            $row = 0;
                            $fxdepart_per_page = 12; // How many images to display on each page
                            $fxdepart = get_field( 'fixed_departure' );
                            $total = count( $fxdepart );
                            $pages = ceil( $total / $fxdepart_per_page );
                            $min = ( ( $page * $fxdepart_per_page ) - $fxdepart_per_page ) + 1;
                            $max = ( $min + $fxdepart_per_page ) - 1;

                            ?>

                            <!-- fix departure design -->
                            <div class="row">
                                <div class="fixed-departure-title">
                                    <h2><a href="#!">Join our Fixed Departure</a></h2>
                                </div>
                                <div class="fixed-departure-option-right">
                                    <form method="post" action="#" id="form-departure-schedules">
                                        <select name="monthRange" id="monthRange" class="departure-date-select"
                                                onchange='this.form.submit()'>
                                            <option value="">Select Month</option>
                                            <?php
                                            $cdate = date('Ymd');
                                            //                                       $date = date('Y-m', strtotime('2018-04-21'));

                                            for ($i = 0; $i <= 24; $i++) {
                                                $months = date("Y-m", strtotime(date('Y-m') . " +$i months"));
                                                ?>
                                                <option value="<?php echo $months; ?>"><?php echo $months; ?></option>
                                                <?php
                                            }
                                            ?>


                                        </select>
                                        <noscript><input type="submit" value="Submit"></noscript>
                                    </form>
                                </div>
                            </div>

                            <div class="table_container listitem table-responsive clearfix" id="listtables">
                                <table class="fixed-departure-table">
                                    <thead>
                                    <tr>
                                        <!--                                        <th><strong>Trip</strong></th>-->
                                        <th><strong>Trip Dates</strong></th>
                                        <th class="text-center"><strong>Price</strong></th>
                                        <th class="text-center"><strong>Space Left</strong></th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody class="infinitescrolllist">
                                    <?php
                                    if (have_rows('fixed_departure')):
                                        $i = 1;
                                        while (have_rows('fixed_departure')):the_row();

                                            $spacerow = $i;
                                            $start_date = get_sub_field('start_date');
                                            $sdate = date($start_date);
                                            $end_date = get_sub_field('end_date');
                                            $fmax_people = get_sub_field('max_people');
                                            $searchdate = date('Y-m', strtotime($start_date));
                                            $maxpeople = get_sub_field('max_people');

                                            if ($sdate > $cdate) {

//                                   if ($searchdate == $date) {

                                                $row++;
                                                if ($row < $min) {
                                                    continue;
                                                }
                                                if ($row > $max) {
                                                    break;
                                                }
                                                ?>


                                                <tr>
                                                    <!--                                           <td data-title="Trip"><span><img-->
                                                    <!--                                                           src="-->
                                                    <?php //echo esc_url(get_template_directory_uri()); ?><!--/images/peak.png"-->
                                                    <!--                                                           alt="Trek"> &nbsp; </span> -->
                                                    <?php //echo $post_title ?><!--</td>-->
                                                    <td data-title="Trip Dates"><span><img
                                                                src="<?php echo esc_url(get_template_directory_uri()); ?>/images/trip-calendar.png"
                                                                width="16" border="0"
                                                                alt="calendar"> &nbsp; </span> <?php echo date('F j, Y', strtotime($start_date)); ?>
                                                        - <?php echo date('F j, Y', strtotime($end_date)); ?></td>
                                                    <td class="text-center" data-title="Price"><span
                                                            class="hidden-xs"><img
                                                                src="<?php echo esc_url(get_template_directory_uri()); ?>/images/tag.png"
                                                                alt="tag"> &nbsp; </span> <?php echo 'NRs. ' . $min_price; ?>
                                                    </td>
                                                    <td class="text-center" data-title="Space Left"><span><img
                                                                src="<?php echo esc_url(get_template_directory_uri()); ?>/images/member.png"
                                                                alt="member"> &nbsp; </span><?php echo $fmax_people; ?>
                                                    </td>
                                                    <td class="text-center">
                                                        <a href="<?php echo esc_url(home_url()); ?>/booking-list/?post_id=<?php echo $postid; ?>&start_date=<?php echo $start_date; ?>&end_date=<?php echo $end_date; ?>&maxpeople=<?php echo $maxpeople; ?>&spacerow=<?php echo $spacerow; ?>"
                                                           title="Book Now" class="fix-departure-book-btn"
                                                           rel="noindex,nofollow">Book Now</a>
                                                    </td>
                                                </tr>
                                                <?php
//                                   }
                                            }
                                            $i++;
                                        endwhile;
                                        ?>

                                    <?php else:
                                        echo '<div class="nodeparture">NO Fixed Departure!</div>';
                                    endif;

                                    ?>
                                    </tbody>
                                </table>
                                <div class="paginat">
                                    <?php echo paginate_links(array(
                                        'base' => get_permalink() . '%#%' . '/',
                                        'format' => '?page=%#%',
                                        'current' => $page,
                                        'total' => $pages
                                    ));
                                    ?>
                                </div>
                            </div>
                            <!-- end of fix departure design -->
                            <?php
                        }
                        ?>
                    </div>

                    <!-- departure tab 2 -->
                    <div class="offer-block__wrapper departure-tab-content" id="" style="display: none;">
                        <div class="tailor-trip-description offer-block__description offer-block__description--short">
                            <p>It is in the heart of the Isola 2000 ski resort, in the southern French Alps, that this friendly hotel has come to install its cozy rooms close to the ski slopes.On the program: a beautiful indoor swimming pool, a terrace with deck chairs to enjoy the sun, snowshoeing and a pleasant sauna, all on the slopes.It's simple: just leave the hotel to enter the ski area!</p>
                        </div>

                        <?php
                        get_template_part('inc/customize-form');
                        ?>
                    </div>
                </section>


                <!-- tab 6 -->
                <section class="tab-contents-package offer-block offer-block--accommodation-card " id="included" style="display: none;">
                    <div class="offer-block__wrapper">
                        <?php if(!empty($included)):?>
                            <section class="included">
                                 <h2>Included</h2>
                                <?php echo html_entity_decode(wp_strip_all_tags($included));?>
                            </section>
                        <?php endif;
                        if (!empty($excluded)):
                            ?>
                            <section class="excluded">
                                <h2>Excluded</h2>
                                <?php echo html_entity_decode(wp_strip_all_tags($excluded));?>
                            </section>
                        <?php endif;?>
                    </div>
                </section>
            </section>
            
                    <!-- print itinerary options -->
                    <div class="productButton">
                      <ul>
                          <li>
                              <?php ;
                                //$permfile = $printable_file['url'];

                              $permfile = "https://travelbird.com.np/wp-content/uploads/2018/02/upworkcoverletter.txt";
                              //    $tmpfile = download_url( $url, $timeout = 300 );
                              //    copy( $tmpfile, $permfile );
                              //
                              //            unlink($tmpfile);

                              ?>
                              <iframe src="<?php echo $permfile;?>" style="display:none;" name="frame"></iframe>
                              <input type="button" onclick="frames['frame'].print()" class="button button-product" value="Itinerary print">
                          </li>
                          <li>
                              <a href="#!" rel="external" class="button button-product"><span class="glyphicon glyphicon-random"></span>Tailormade Trip</a>
                          </li>
                      </ul>
                    </div>
                    <!--end of print itinerary options -->
        </section>
        
           
    <?php
    endwhile;
    }
    ?>


    
    <!-- start of related package -->

                <?php
                if(!empty($activity_type)) {
                    $activity=array();

                    foreach($activity_type as $activity_types){

                        array_push($activity,$activity_types->slug);
                    }

                    $args2=array(
                        'post__not_in' => array($postid),
                        'activity_trekking'=>$activity,
                    );

                    $query2= new WP_Query($args2);


                    if($query2->have_posts()) {
                        ?>
                        <section class="related_package">
                            <section class="countdown">
                                <h2 class="countdown__title">Related  Trekking</h2>
                            </section>
                            <section class="grid grid--offer-cards-homepage">
                                <ul class="grid-cards__list">
                                    <?php  while($query2->have_posts()):
                                        $query2->the_post();
                                        $rpostid=$query2->post->ID;
                                        $rtitle=get_the_title();
                                        $rduration=get_field('duration', $rpostid);
                                       
                                        ?>
                                        <li class="grid-cards__item">
                                            <a href="<?php echo the_permalink();?>" target="_self"
                                               class="offer-card" data-offer-id="106215" data-js-component="offerCard">
                                                <div data-src="<?php echo get_the_post_thumbnail_url($rpostid);?>"
                                                     class="offer-card__image b-lazy"
                                                     style="background-image: url('<?php echo get_the_post_thumbnail_url($rpostid);?>')">
                                            <span class="js-button-favorite" data-offer-id="106215" data-favorited="0"
                                                  data-shape="offercard"></span>
                                                </div>
                                                <div class="offer-card__info">
                                                    <h4 class="offer-card__title"><?php echo $rtitle;?></h4>
                                                    <ul class="list list--horizontal">
                                                        <li class="list__item"><i class="soap-icon-clock yellow-color"></i>
                                                            <?php echo $rduration;?>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </a>
                                        </li>
                                    <?php endwhile;

                                    ?>

                                </ul>
                            </section>
                        </section>
                        <?php
                    }
                }
                ?>
                <!-- end of related package -->
</section>
    <!-- Right Side Content -->
    <div class="right_sidebar">
        <!-- right sidebar 1 -->
        <section class="right_sidebar__section right_sidebar__the-nest section__full-width">
            <div class="right_sidebar__section-inner">
                <h2 class="right_sidebar__section-title">
                   Why Choose Us
                </h2>
                <?php
//                $args1= array(
//                    'post_type'=>'before-booking-trip',
//
//                );
//                $the_query =new WP_Query( $args1 );
//                $befor_arr=array();
//                if ( $the_query->have_posts() ) {
//                    echo '<ul>';
//                    while ( $the_query->have_posts() ):
//                        $the_query->the_post();
//                        $post_object=get_field('tour_or_trek_type');
//                        echo $the_query->the_title();
//                        $count=0;
//                        foreach ($post_object as $post_value):
//                            $meta_postid= $post_value->ID;
//
//                            if($meta_postid==$postid):
//                                $count++;
//                                ?>
<!---->
<!--                                <li><a href="--><?php //echo the_permalink()?><!--">--><?php //echo the_title(); ?><!--</a></li>-->
<!---->
<!---->
<!--                                --><?php
//                            endif;
//                        endforeach;
//
//                        ?>
<!---->
<!--                        --><?php
//                    endwhile;
//                    if($count==0){
//                        ?>
<!--                        <li>No List Available.</li>-->
<!---->
<!--                        --><?php
//                    }
//                    wp_reset_postdata();
//                    ?>
<!---->
<!--                    --><?php
//                    echo '</ul>';
//                }
//                ?>
                <ul>
                    <?if(!empty($befo_booking)){
                        foreach($befo_booking as $befo_bookings){


                            $befo_id=$befo_bookings->ID;


                            ?>
                            <li> <a href="<?php echo get_permalink($befo_id); ?>"><?php echo $befo_bookings->post_title; ?></a></li>
                            <?php
                        }
                    wp_reset_postdata();
                    }else{
                        echo'<li>No List Available.</li>';
                    } ?>

                </ul>
            </div>
        </section>

        <!-- right sidebar 2 -->
        <?php
        if(!empty($route_image)):
            ?>
            <section class="right_sidebar__section right_sidebar__the-nest section__full-width">
                <div class="right_sidebar__section-inner">
                    <h2 class="right_sidebar__section-title">
                        Route Map
                    </h2>
                    <a href="<?php echo $route_image['url'];?>"  class="route-map-img">
                        <img src="<?php echo $route_image['url'];?>" data-image="<?php echo $route_image['url'];?>">
                    </a>
                </div>
            </section>
            <?php
        endif;
        if(!empty($video)){
            ?>
            <section class="right_sidebar__section right_sidebar__the-nest section__full-width">
                <div class="right_sidebar__section-inner">
                    <h2 class="right_sidebar__section-title">
                        Video
                    </h2>
                    <?php echo $video;?>

                </div>
            </section>
        <?php } ?>

        <!-- right sidebar 3 -->
        <section class="right_sidebar__section right_sidebar__the-nest section__full-width">
            <div class="right_sidebar__section-inner">
                <h2 class="right_sidebar__section-title">
                    Trip Advisor Review
                </h2>
                <!--                     <p class="right_sidebar__section-txt"> -->

                <div id="TA_selfserveprop311" class="TA_selfserveprop">
                    <ul id="kwa7oym" class="TA_links Mwwd5NjlkrSC">
                        <li id="bAo6IReI" class="ykrOUsrAu78">
                            <a target="_blank" href="https://www.tripadvisor.com/"><img src="https://www.tripadvisor.com/img/cdsi/img2/branding/150_logo-11900-2.png" alt="TripAdvisor"/></a>
                        </li>
                    </ul>
                </div>
                <script async src="https://www.jscache.com/wejs?wtype=selfserveprop&amp;uniq=311&amp;locationId=10239059&amp;lang=en_US&amp;rating=true&amp;nreviews=5&amp;writereviewlink=true&amp;popIdx=true&amp;iswide=false&amp;border=true&amp;display_version=2"></script>

            </div>
        </section>

        <!-- right sidebar 4 -->
        <section class="right_sidebar__section right_sidebar__the-nest section__full-width">
            <div class="right_sidebar__section-inner">
                <h2 class="right_sidebar__section-title">
                    Quick Enquiry
                </h2>
                <?php
                get_template_part('inc/enquiry-form');
                ?>

            </div>
        </section>
    </div>
</section>


<?php
get_footer();
?>
<script>
    /* image gallery lightbox */
    jQuery(document).ready(function($) {

        $('.imageGallery-lightbox li a').simpleLightbox();
        $('.route-map-img').simpleLightbox();
    });
    /* end of image gallery lightbox */

</script>