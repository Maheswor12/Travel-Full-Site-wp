<?php
/**
 * Created by PhpStorm.
 * User: katwalsmacbookpro
 * Date: 2/27/18
 * Time: 1:58 PM
 */
get_header();
    $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
    $pagename=$term->name;
    $taxid=$term->term_id;
    $coverimg=get_field('activity_image', $term->taxonomy . '_' . $term->term_id);
    $covercntnt=term_description($taxid);
//    $covercntnt=get_field('activity_content', $term->taxonomy . '_' . $term->term_id);
    $covervdo=get_field('activity_video', $term->taxonomy . '_' . $term->term_id);
    ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <!-- slider image wrapper  -->
            <div class="slideshow singlepage-slideshow">
                <section class="hero-offer js-prevent-cookie" id="gallery">
                    <section class="card-content card-content--yellow card-content--giftcard">
                        <div class="card-content__visual js-open-giftcard-video">

                                <?php if(!empty($covervdo)){?>
                                    <div class="html5video-container html5video-container--giftcard initial-state">
                                        <?php    echo $covervdo;?>
                                    </div>
                                <?}else{?>
                                    <div class="hero-image-wrapper" style="background:url('<?php echo $coverimg['url'];?>');background-repeat: no-repeat;background-size: cover;"></div>
                                    <style>
                                        .hero-image-wrapper{height: 100%;width: 100%;border-radius: 5px;background-position: 45%;}    
                                        .card-content.card-content--yellow.card-content--giftcard{height:380px;}
                                        .card-content--giftcard .card-content__visual{padding-right:15px;padding-bottom: 2px;}
                                    </style>
                                 <?php  } ?>
                        </div>
                        <div class="card-content__content">
                            <div class="card-content__copy-wrap">
                                <p class="card-content__copy"><?php echo $covercntnt;?></p>
                            </div>
                        </div>
                    </section>
                </section>
            </div>
            <!-- end of slider image wrapper-->
            <section class="wrap homepage">
                <section class="countdown">
                    <h2 class="countdown__title">

                        Trip Related To <?php echo $pagename; ?>
                    </h2>
                </section>
                <section class="grid grid--offer-cards-homepage">
                    <ul class="grid-cards__list">
                        <?php

                        if ( have_posts() ) :

                            if ( is_home() && ! is_front_page() ) : ?>
                                <header>
                                    <h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
                                </header>
                                <?php
                            endif;

                            /* Start the Loop */
                            while ( have_posts() ) : the_post();
                                $postid=get_the_ID();
                                $duration= get_field( 'duration',$postid );
								$discount_rate=get_field('discount_rate',$postid);
                                $price=get_field( 'price_per_person', $postid );
                                $field = get_field_object('location',$postid);
                                $value = $field['value'];
                                $location=$value->name;
                                ?>

                                <li class="grid-cards__item">


                                    <a href="<?echo get_permalink()?>" target="_self" class="offer-card" data-offer-id="106215" data-js-component="offerCard">

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
                                            <h4 class="offer-card__title"><?php echo get_the_title();?></h4>
                                            <ul class="list list--horizontal">

                                                <li class="list__item"><i class="soap-icon-clock yellow-color"></i><?php echo $duration?> </li>
                                            </ul>


                                            <div class="offer-card__price-wrap">
                                                <span class="offer-card__price-from">Price </span>
                                                <span class="offer-card__price-value">NPR.<?php echo $price?>-</span><br>

                                                <ul class="list list--horizontal list--small">
                                                    <li class="list__item">Cost per person</li>
                                                    <li class="list__item"><?php echo $location;?></li>
                                                </ul>
                                            </div>


                                        </div>
                                    </a>
                                </li>




                                <?php
//                    get_template_part( 'template-parts/content', get_post_format() );

                            endwhile;
                        ?>
                            <div class="paginat">
                                <?php echo paginate_links();
                                ?>
                            </div>
                            <?php
                        else :

                            echo 'NO Results available! Please, do look for the next Activity types.';

                        endif; ?>
                    </ul>
                </section>
                <!-- end of code added by bijay -->

            </section><!-- #wrap homepage -->

            <?php $rterm = get_terms( array(
                'taxonomy' => 'activity_tour',
                'hide_empty' => true,
                'exclude'=>$term->term_id,
            ) );
            if(!empty($rterm)){
            ?>
            <div class="new-carousel wrap--carousel new-carousel--listing">
                <div class="new-carousel__title-container">
                    <div class="new-carousel__title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Other Related Activities</font></font></div>

                </div>
                <div class="new-carousel__container">
                    <button class="new-carousel__btn new-carousel__btn--prev new-carousel__btn--disable prev" data-event-category="Carousel" data-event-action="Arrow click Other categories" data-event-label="Left" style="top: 99.1953px;">
                        <svg class="carousel__btn__icon">         <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/static/common/img/sprite.686b4a0d6871.svg#chevron-left"></use>     </svg>
                    </button>
                    <button class="new-carousel__btn new-carousel__btn--next next" data-event-category="Carousel" data-event-action="Arrow click Other categories" data-event-label="Right" style="top: 99.1953px;">
                        <svg class="carousel__btn__icon">         <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="/static/common/img/sprite.686b4a0d6871.svg#chevron-right"></use>     </svg>
                    </button>
                    <div class="new-carousel__wrapper">
                        <div class="new-carousel__scroller">
                            <div class="new-carousel__list">
                                <?php
                                foreach ($rterm as $rterms):
                                    $actiname=$rterms->name;
                                    $actid=$rterms->term_id;
                                    $actimg=get_field('activity_image', $rterms->taxonomy . '_' . $rterms->term_id);
                                    $defaultimg='https://travelbird.com.np/wp-content/uploads/2018/02/cropped-travel_logo.png';

                                ?>
                                <div class="new-carousel__item">
                                    <a class="new-carousel__item-container collection-cover" href="<?php echo get_term_link($actid);?>" data-event-category="Carousel" >
                                        <div class="collection-cover__image">
                                            <img srcset="" src="<?php if(!empty($actimg)){echo $actimg['url'];}else{echo $defaultimg;}?>">
                                        </div>
                                        <div class="collection-cover__title"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;"><?php echo $actiname; ?></font></font></div>
                                    </a>
                                </div>
                                    <?php endforeach;?>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>

        </main><!-- #main -->
    </div><!-- #primary -->
<?php
get_footer();
