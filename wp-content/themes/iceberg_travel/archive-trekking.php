<?php
/**
 * Trekking Search Template
 */


get_header();
?>
    <style>
        .mySearch{
            margin-top:8% !important;
        }
    </style>
    <main id="main" role="main">
        <?php
        //edited search start
        get_template_part('test_yk','single');

        //edited search end
        ?>
        <section class="wrap homepage">
            <section class="countdown">
                <h2 class="countdown__title">
                    Search Result
                </h2>
            </section>

            <!--Trekking List-->
            <?php
            if(isset($_GET['s'])){
                $s=$_GET['s'];
                $post_type=$_GET['post_type'];
				if(!empty($_GET['country'])){
					$country=$_GET['country'];
				}else{
					$country='';
				}
				if(!empty($_GET['activity'])){
					$activity=$_GET['activity'];
					
				}else{
					$activity='';
				}
                $orderby='';
                $order='ASC';

                ?>
                <section class='grid grid--offer-cards-homepage'>
                    <ul class="grid-cards__list">
                        <?php
                      $currentpage=(get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
                        $args1=array(
                            'post_type'=>'trekking',
							'posts_per_page'=>'12',
							'title_filter'=>$s,
                            'compare'=>'like',
                            'location'=>$country,
                            'activity_trekking'=>$activity,
                            'paged'=>$currentpage,
                        );
                        $query1=new WP_Query($args1);
                        if($query1->have_posts()){
                            while($query1->have_posts()):$query1->the_post();
                                $postid=$query1->post->ID;
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

                                        <div data-src="<?php the_post_thumbnail_url(); ?>" class="offer-card__image b-lazy" style="background-image: url('<?php the_post_thumbnail_url(); ?>')">

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
                                            <!--                                <ul class="offer-icons">-->
                                            <!--                                    <li class="offer-icons__item js-tooltip tooltip">-->
                                            <!--                                        <svg class="offer-icons__icon">-->
                                            <!--                                            <use xlink:href="#hotel" />-->
                                            <!--                                        </svg>-->
                                            <!--                                        <span class="tooltip__content js-tooltip-content">Med indkvartering</span>-->
                                            <!--                                    </li>-->
                                            <!--                                </ul>-->

                                            <div class="offer-card__price-wrap">
                                                <span class="offer-card__price-from">Price </span>
                                                <span class="offer-card__price-value">NPR.<?php echo $min_price; ?>-</span>
                                                <!--                                    <span class="price-info tooltip js-tooltip" data-bi-event="extra_info_tooltip"-->
                                                <!--                                          data-tooltip-url="/offer/106215/extra_info/?show_price_for_interval=1">-->
                                                <!--                    <svg class="price-info__icon">-->
                                                <!--                        <use xlink:href="#info" />-->
                                                <!--                    </svg>-->
                                                <span class="tooltip__content js-tooltip-content"></span>
<!--                                                 </span> -->
                                            </div>

                                            <ul class="list list--horizontal list--small">
                                                <li class="list__item">Cost per person</li>
                                                <li class="list__item"><?php echo $location; ?></li>
                                            </ul>
                                        </div>
                                    </a>
                                </li>

                                <?php
                            endwhile;
                            ?>
                            <div class="paginat">
                                <?php echo paginate_links(array(
                                   'base'               => '%_%',
	'format'             => '?paged=%#%',
	'total'              => $query1->max_num_pages,
	'current'            => $currentpage,
	'show_all'           => false,
	'end_size'           => 1,
	'mid_size'           => 2,
	'prev_next'          => true,
	'prev_text'          => __('« Previous'),
	'next_text'          => __('Next »'),
	'type'               => 'plain',
	'add_args'           => false,
	'add_fragment'       => '',
	'before_page_number' => '',
	'after_page_number'  => '',
  ));
                                ?>
                            </div>
                            <?php
						} else {
                            ?>
                            <li class="grid-cards__item">

                                <h3>No Tours Available.</h3>

                            </li>
                            <?php
                            // Restore original Post Data
                            wp_reset_postdata();
						}
                        ?>
                    </ul>
                </section>

                <?php
            }else{
                ?>
                <section class='grid grid--offer-cards-homepage'>
                    <ul class="grid-cards__list">
                        <?php
                        $crntpage=get_query_var('paged');
                        $args=array(
							'post_type'=>'trekking',
							'posts_per_page'=>'12',
							'title_filter'=>$s,
                            'paged'=>$crntpage,
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

                <span class="js-button-favorite" data-offer-id="106215" data-favorited="0" data-shape="offercard">
                   <button class="button-favorite">
                    <svg class="button-favorite__icon">
                       <use xlink:href="#heart"/>
                    </svg>
                    <svg class="button-favorite__icon button-favorite__icon--overlay">
                       <use xlink:href="#heart-border"/>
                    </svg>
                   </button>
                </span>

                                        </div>

                                        <div class="offer-card__info">
                                            <h4 class="offer-card__title"><?php the_title(); ?></h4>
                                            <ul class="list list--horizontal">

                                                <li class="list__item"><i
                                                        class="soap-icon-clock yellow-color"></i> <?php echo esc_html($duration); ?>
                                                </li>
                                                <!--                                    <li class="list__item"></li>-->
                                            </ul>
                                            <!--                                <ul class="offer-icons">-->
                                            <!--                                    <li class="offer-icons__item js-tooltip tooltip">-->
                                            <!--                                        <svg class="offer-icons__icon">-->
                                            <!--                                            <use xlink:href="#hotel" />-->
                                            <!--                                        </svg>-->
                                            <!--                                        <span class="tooltip__content js-tooltip-content">Med indkvartering</span>-->
                                            <!--                                    </li>-->
                                            <!--                                </ul>-->

                                            <div class="offer-card__price-wrap">
                                                <span class="offer-card__price-from">Price </span>
                                                <span class="offer-card__price-value">NPR.<?php echo $min_price; ?>-</span>
                                                <!--                                    <span class="price-info tooltip js-tooltip" data-bi-event="extra_info_tooltip"-->
                                                <!--                                          data-tooltip-url="/offer/106215/extra_info/?show_price_for_interval=1">-->
                                                <!--                    <svg class="price-info__icon">-->
                                                <!--                        <use xlink:href="#info" />-->
                                                <!--                    </svg>-->
                                                <span class="tooltip__content js-tooltip-content"></span>
<!--                                                 </span> -->
                                            </div>

                                            <ul class="list list--horizontal list--small">
                                                <li class="list__item">Cost per person</li>
                                                <li class="list__item"><?php echo $location; ?></li>
                                            </ul>
                                        </div>
                                    </a>
                                </li>

                                <?php
                            endwhile;?>
                            <div class="paginat">
                                <?php echo paginate_links(array(
                                    'total' => $query->max_num_pages

                                ));
                                ?>
                            </div>
                            <?php
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

                <?php
            }
            ?>
    </main>
<?php

get_footer();