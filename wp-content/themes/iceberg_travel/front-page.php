<?php
/**
 * Created by PhpStorm.
 * User: katwalsmacbookpro
 * Date: 1/14/18
 * Time: 10:36
 * FrontPage template i.e home page
 */


get_header();
?>
<?php echo do_shortcode('[rev_slider alias="homepage"]');?>


        <?php
        //edited search startt
        get_template_part('test_yk','single');

        //edited search end
        ?>
        
        <!-- demo content only -->

        <ul class="fixed-departure-home-wrapper">
    <li class="review-home-wrapper">
        <div class="review-container">
            <div class="review-row">
                <div class="review-top-header">
                    <h3>Top Reviews</h3>
                </div>
                <div class="review-all-link">
                    <a href="#!">View All</a>
                </div>
            </div>
            <?php echo do_shortcode('[RICH_REVIEWS_SHOW num="all"] ');?>
        </div>
<!-- 		<h1>
			
		</h1> -->
    </li>
    <li class="fixed-departure-wrapper">
        <div class="category-card">
            <div class="fixed-departure-heading img-pos" style="background-image: url('https://travelbird.com.np/wp-content/uploads/2018/01/lumbini-2.jpg');">
                <h3>
                    <span>Join Our Fixed Departures</span>
                </h3>
            </div>
                <ul class="fixed-departure-body">
                <?php
                $args6=array(
                    'post_type'=>array('tour','trekking'),
					'orederby' => 'rand',
					'posts_per_page' => '-1',
                );
                $query6=new WP_Query($args6);
                $count6=0;
                $i=1;
				
                while($query6->have_posts()){$query6->the_post();
                    $postid6=$query6->post->ID;
                    $post_title6=get_the_title($postid6);
                    $departure_content=get_field('fixed_departure_content',$postid6);
					
                    if(have_rows('fixed_departure')){
					$indcnt=0;
                        while(have_rows('fixed_departure')){the_row();
                            $start_date=get_sub_field('start_date');
                            $end_date=get_sub_field('end_date');
                            $maxpeople=get_sub_field('max_people');
                            $spacerow=$i;
                            $sdate= date($start_date);
                            $cdate= date('Ymd');
								
                            if($sdate>$cdate) {
								
								
                                if ($count6 < 5) {
									if($indcnt<1){
                                    ?>

                                    <li>
                 <span class=" fixed-title">
<!--                     --><?php //echo esc_url(home_url('/')); ?><!--booking-list/?post_id=--><?php //echo $postid6; ?><!--&start_date=--><?php //echo $start_date; ?><!--&end_date=--><?php //echo $end_date; ?><!--&maxpeople=--><?php //echo $maxpeople; ?><!--&spacerow=--><?php //echo $spacerow; ?>
                    <a href="<?php echo get_the_permalink()?>"
                       title="View Details"><?php echo $post_title6; ?></a>
                 </span>
                                        <span class="text-right ">
                      <strong><?php echo date('F j, Y', strtotime($start_date)); ?>
                          - <?php echo date('F j, Y', strtotime($end_date)); ?></strong>
                  </span>
                                    </li>
                                    <?php
									
								} else {
										break;
									}
								}
                               $count6++;
                            		 $indcnt++;
                            }
                            $i++;
														   }
											}
					}
                wp_reset_postdata();
                ?>

            </ul>
        </div>
    </li>
</ul>
        
        
        
        <section class="wrap homepage">
            <section class="countdown">
                <h2 class="countdown__title">
                   Best Selling Package 2018/2019
                </h2>
<!--                <p class="countdown__subtitle" id="timer" data-countdown='{"time": "midnight","format": "&lt;span&gt;%H timer %M minutter %S sekunder&lt;/span&gt; indtil næste udvalg"}'>&nbsp;</p>-->

            </section>

             <section class='grid grid--offer-cards-homepage'>
                <ul class="grid-cards__list">
                <?php
                $arg3=array(
                    'post_type'=>array('tour','trekking'),
					'meta_key'=>'offer',
					'orderby'=>'meta_value_num',
                    'order'=>'DESC',
                    'meta_query' => array(
                        array(
                            'key' => 'offer'
                        ),
                        array(
                            'key' => 'offer',
                            'value' => 0,
                            'compare' => '>',
                        )
                    ),
                    
                    'posts_per_page'=>'6',
                );
                $query3=new WP_Query($arg3);
					
                if($query3->have_posts()):
                    while($query3->have_posts()):$query3->the_post();
                        $postid3=$query3->post->ID;
                   $discount_rate = get_field( 'discount_rate', $postid3 );
                       $duration = get_field(  'duration',$postid3 );
                        $min_price = get_field( 'price_per_person', $postid3 );
					
                       $brief = get_the_excerpt($postid3);
                        $field = get_field_object('location',$postid3);
                       $value = $field['value'];
                       $location=$value->name;
						$offer = get_field('offer',$postid3);
                           
                         if($offer== 'true'){
							                     
                            //echo "No Offer package available";
                       }else{
//                        $city = trav_tour_get_city($postid);
//                        $country = trav_tour_get_country($postid);

                            ?>
                            <li class="grid-cards__item">


                                <a href="<?php the_permalink(); ?>" target="_self"
                                   class="offer-card" data-offer-id="106215" data-js-component="offerCard">

                                    <div data-src="<?php the_post_thumbnail_url(); ?>" class="offer-card__image b-lazy"
                                         style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
                                        <?php 
										if(($discount_rate>0)){
										?>   
										<span class="ribbon1">
                                                <span>Discount Offer <?php echo $discount_rate;?>%</span>
                                            </span>
										<?php }?>
                                    </div>

                                    <div class="offer-card__info">
                                        <h4 class="offer-card__title"><?php the_title(); ?></h4>
                                        <ul class="list list--horizontal">

                                            <li class="list__item"><i class="soap-icon-clock yellow-color"></i> <?php echo esc_html($duration); ?></li>
                                            <!--                                    <li class="list__item"></li>-->
                                        </ul>
                                        <div class ="package-rating"><?php  echo do_shortcode( '[RICH_REVIEWS_SNIPPET stars_only="true"]' ); ?></div>
                                        <!--                                <ul class="offer-icons">-->
                                        <!--                                    <li class="offer-icons__item js-tooltip tooltip">-->
                                        <!--                                        <svg class="offer-icons__icon">-->
                                        <!--                                            <use xlink:href="#hotel" />-->
                                        <!--                                        </svg>-->
                                        <!--                                        <span class="tooltip__content js-tooltip-content">Med indkvartering</span>-->
                                        <!--                                    </li>-->
                                        <!--                                </ul>-->

                                        <div class="offer-card__price-wrap">
                                            <span class="offer-card__price-from">Price <span class="offer-card__price-value">$<?php echo $min_price; ?>-</span></span><br/>
                                            <!--                                    <span class="price-info tooltip js-tooltip" data-bi-event="extra_info_tooltip"-->
                                            <!--                                          data-tooltip-url="/offer/106215/extra_info/?show_price_for_interval=1">-->
                                            <!--                    <svg class="price-info__icon">-->
                                            <!--                        <use xlink:href="#info" />-->
                                            <!--                    </svg>-->
<!--                                            <span class="tooltip__content js-tooltip-content"></span>-->
<!--                                            </span>-->
                                            <ul class="list list--horizontal list--small">
                                                <li class="list__item">Cost per person</li>
                                                <li class="list__item"><?php echo $location; ?></li>
                                            </ul>
                                        </div>


                                    </div>
                                </a>
                            </li>

                            <?php
                        }

                    endwhile;
                        wp_reset_postdata();
                else :
                    ?>
                    <li class="grid-cards__item">

                        <h3>No Tours Available.</h3>

                    </li>
                    <?php
                    // Restore original Post Data
                    wp_reset_postdata();
                        endif;
                    ?>
                </ul>
            </section>
            <!--Tour List-->
            <section class="countdown">
                <h2 class="countdown__title">
                    Tours Package
                </h2>
                <!--                <p class="countdown__subtitle" id="timer" data-countdown='{"time": "midnight","format": "&lt;span&gt;%H timer %M minutter %S sekunder&lt;/span&gt; indtil næste udvalg"}'>&nbsp;</p>-->

            </section>

            <section class='grid grid--offer-cards-homepage'>
                <ul class="grid-cards__list">
                    <?php
                    $args=array(
                        'post_type'=>'tour',
                        'posts_per_page'=>'6',

                    );
                    $query=new WP_Query($args);
                    if($query->have_posts()):
                        while($query->have_posts()):$query->the_post();
                            $postid=$query->post->ID;
                            $discount_rate = get_field( 'discount_rate', $postid );
                            $duration = get_field(  'duration',$postid );
                            $min_price = get_field( 'price_per_person', $postid );
                            $brief = get_the_excerpt($postid);
                            $field = get_field_object('location',$postid);
                            $value = $field['value'];
                            $location=$value->name;


//                        $city = trav_tour_get_city($postid);
//                        $country = trav_tour_get_country($postid);

                                ?>
                                <li class="grid-cards__item">


                                    <a href="<?php the_permalink(); ?>" target="_self"
                                       class="offer-card" data-offer-id="106215" data-js-component="offerCard">

                                        <div data-src="<?php the_post_thumbnail_url(); ?>" class="offer-card__image b-lazy"
                                             style="background-image: url('<?php the_post_thumbnail_url(); ?>')">
											 <?php 
										if(($discount_rate>0)){
										?>   
										<span class="ribbon1">
                                                <span>Discount Offer <?php echo $discount_rate;?>%</span>
                                            </span>
										<?php }?>

                                        </div>

                                        <div class="offer-card__info">
                                            <h4 class="offer-card__title"><?php the_title(); ?></h4>
                                            <ul class="list list--horizontal">

                                                <li class="list__item"><i
                                                            class="soap-icon-clock yellow-color"></i> <?php echo esc_html($duration); ?>
                                                </li>
                                                <!--                                    <li class="list__item"></li>-->
                                            </ul>
											
											<div class ="package-rating"><?php  echo do_shortcode( '[RICH_REVIEWS_SNIPPET stars_only="true"]' ); ?></div>
                                            <!--                                <ul class="offer-icons">-->
                                            <!--                                    <li class="offer-icons__item js-tooltip tooltip">-->
                                            <!--                                        <svg class="offer-icons__icon">-->
                                            <!--                                            <use xlink:href="#hotel" />-->
                                            <!--                                        </svg>-->
                                            <!--                                        <span class="tooltip__content js-tooltip-content">Med indkvartering</span>-->
                                            <!--                                    </li>-->
                                            <!--                                </ul>-->

                                            <div class="offer-card__price-wrap">
                                                <span class="offer-card__price-from">Price<span class="offer-card__price-value">$<?php echo $min_price; ?>-</span></span><br/>
                                                <!--                                    <span class="price-info tooltip js-tooltip" data-bi-event="extra_info_tooltip"-->
                                                <!--                                          data-tooltip-url="/offer/106215/extra_info/?show_price_for_interval=1">-->
                                                <!--                    <svg class="price-info__icon">-->
                                                <!--                        <use xlink:href="#info" />-->
                                                <!--                    </svg>-->
                                                <!--<span class="tooltip__content js-tooltip-content"></span>-->
                                                <!--</span>-->
                                                <ul class="list list--horizontal list--small">
                                                    <li class="list__item">Cost per person</li>
                                                    <li class="list__item"><?php echo $location; ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </a>
                                </li>

                                <?php
                        endwhile;
                    else :
                        ?>
                        <li class="grid-cards__item">

                            <h3>No Tours Available.</h3>

                        </li>
                        <?php
                        // Restore original Post Data
                        wp_reset_postdata();
                    endif;
                    ?>
                </ul>
            </section>

            <!--Trekking list-->

            <section class="countdown">
                <h2 class="countdown__title">
                    Trekking Package
                </h2>
                <!--                <p class="countdown__subtitle" id="timer" data-countdown='{"time": "midnight","format": "&lt;span&gt;%H timer %M minutter %S sekunder&lt;/span&gt; indtil næste udvalg"}'>&nbsp;</p>-->

            </section>

            <section class='grid grid--offer-cards-homepage'>
                <ul class="grid-cards__list">
                    <?php
                    $args=array(
                        'post_type'=>'trekking',
                        'posts_per_page'=>'6',
                    );
                    $query=new WP_Query($args);
                    if($query->have_posts()):
                        while($query->have_posts()):$query->the_post();
                            $postid=$query->post->ID;

                            $discount_rate = get_field( 'discount_rate', $postid );
                            $duration = get_field(  'duration',$postid );
                            $min_price = get_field( 'price_per_person', $postid );
                            $brief = get_the_excerpt($postid);
                            $field = get_field_object('location',$postid);
                            $value = $field['value'];
                            $location=$value->name;

                            ?>
                            <li class="grid-cards__item">


                                <a href="<?php the_permalink();?>" target="_self"
                                   class="offer-card" data-offer-id="106215" data-js-component="offerCard">

                                    <div data-src="<?php the_post_thumbnail_url();?>" class="offer-card__image b-lazy" style="background-image: url('<?php the_post_thumbnail_url();?>')">

                <?php 
										if(($discount_rate>0)){
										?>   
										<span class="ribbon1">
                                                <span>Discount Offer <?php echo $discount_rate;?>%</span>
                                            </span>
										<?php }?>

                                    </div>

                                    <div class="offer-card__info">
                                        <h4 class="offer-card__title"><?php the_title();?></h4>
                                        <ul class="list list--horizontal">

                                            <li class="list__item"><i class="soap-icon-clock yellow-color"></i> <?php echo esc_html($duration);?></li>
                                           
                                        </ul>
                                      <div class ="package-rating"><?php  echo do_shortcode( '[RICH_REVIEWS_SNIPPET stars_only="true"]' ); ?></div>

                                        <div class="offer-card__price-wrap">
                                            <span class="offer-card__price-from">Price <span class="offer-card__price-value">$<?php echo  $min_price; ?>-</span></span><br/>
                                            <!--                                    <span class="price-info tooltip js-tooltip" data-bi-event="extra_info_tooltip"-->
                                            <!--                                          data-tooltip-url="/offer/106215/extra_info/?show_price_for_interval=1">-->
                                            <!--                    <svg class="price-info__icon">-->
                                            <!--                        <use xlink:href="#info" />-->
                                            <!--                    </svg>-->
                                            <!--<span class="tooltip__content js-tooltip-content"></span>-->
                                            <!--</span>-->
                                            <ul class="list list--horizontal list--small">
                                                <li class="list__item">Cost per person </li>
                                                <li class="list__item"><?php echo $location;?></li>
                                            </ul>
                                        </div>
                                    </div>
                                </a>
                            </li>

                            <?php
                        endwhile;
                    else :
                        ?>
                        <li class="grid-cards__item">

                            <h3>No Trekkings Available.</h3>

                        </li>
                        <?php
                        // Restore original Post Data
                        wp_reset_postdata();
                    endif;
                    ?>
                </ul>
            </section>




            <ul class="category-card-list category-blog-wrapper">
                <?php
                $args2=array(
                    'post_type'=>'post',
                    'posts_per_page'=>'9',
                );
                $query2=new WP_Query($args2);
                if($query2->have_posts()):
                    $i=0;
                    while($query2->have_posts()):$query2->the_post();
                    $post_id=$query2->post->ID;
                    $image=get_the_post_thumbnail_url($post_id);

                        if($i==0 || $i==3 || $i==8):
                    ?>
                            <li class="category-card-list__item category-card-list__item--2">
                                <a href="#!" class="category-card">
                                    <div class="category-card__image-wrapper" style="width:auto;background-size: cover;height: 380px;background-position: 19% 50%;background-repeat: no-repeat;background-image: url('<?php echo $image;?>');">
                                        <!--     <img class="category-card__image b-lazy" src="" data-src="https://travelbird.imgix.net/listingpage-image/697/QA6TH427?auto=compress%2Cenhance%2Cformat&amp;crop=faces%2Cedges%2Ccenter&amp;dpr=2&amp;fit=crop&amp;h=352&amp;w=736">-->
                                    </div>
                                    <span class="category-card__title"><?php the_title();?></span>
                                    <span class="category-card__subtitle"><?php the_excerpt();?></span>
                                </a>
                            </li>
                        <?php
                        elseif($i==1 || $i==2 || $i==4 || $i==5 || $i==6 ||$i==7):
                            ?>
                            <li class="category-card-list__item category-card-list__item--1">
                                <a href="#!" class="category-card">
                                    <div class="category-card__image-wrapper" style="width:auto;background-size: cover;height: 380px;background-position: 60% 50%;background-repeat: no-repeat;background-image: url('<?php echo $image;?>');">
                                    </div>

                                    <span class="category-card__title"><?php the_title();?></span>
                                    <span class="category-card__subtitle"><?php the_excerpt();?></span>
                                </a>
                            </li>


                            <?php

                        endif;
                       $i++;
                    ?>
                    <?php
                endwhile;

                    endif;
                ?>
                
            </ul>

        <section>
            <?php
                if(have_posts()):
                    while(have_posts()):the_post();
                the_content();
                endwhile;
                    endif;
                    ?>
        </section>
        </section>
<?php

get_footer();