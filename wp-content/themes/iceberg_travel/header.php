        <?php
        /**
         * The header for our theme
         *
         * This is the template that displays all of the <head> section and everything up until <div id="content">
         *
         * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
         *
         * @package iceberg_travel
         */


        //$args = array(
        //    'post_type' => 'post',
        //    'tax_query' => array(
        //        'relation' => 'AND',
        //        array(
        //            'taxonomy' => 'movie_genre',
        //            'field'    => 'slug',
        //            'terms'    => array( 'action', 'comedy' ),
        //        ),
        //        array(
        //            'taxonomy' => 'actor',
        //            'field'    => 'term_id',
        //            'terms'    => array( 103, 115, 206 ),
        //            'operator' => 'NOT IN',
        //        ),
        //    ),
        //);
        //$query = new WP_Query( $args );
        ?>
        <!doctype html>
        <html  <?php language_attributes(); ?>>
        <head>
			<title > Travel Bird</title>
			 <meta name="keywords" content="travel Bird, travelbird,trekking,tour,travel,travel agency,trip,tourist,nepal">
			<meta name = "description" content="Travel Bird Nepal not only are highly trained, young, motivated and passionate professionals but are also the leading adventure travel Company in Nepal; offering a host of ground breaking programs of highly customized and personalized Culture Tours, Safari, Trekking, Mountaineering and rewarding Adventure Travel Holidays.">
			<meta name="twitter:site" content="The Travel Bird Nepal are highly trained, young, motivated and also one of the best leading adventure travel Company in Nepal.">
            <meta charset="<?php bloginfo( 'charset' ); ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link rel="profile" href="http://gmpg.org/xfn/11">

            <?php
            get_template_part('svg','single');
            wp_head(); ?>
        </head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.1/css/all.css" crossorigin="anonymous">

        <body <?php body_class(); ?>>

            <header>
                <div class="header js-header header--Travelbird">
                    <div class="top_bar">
                        <div class="padd-o marg-4">
                            <ul class="topbar-nav2">
                                <li class="nav-menu__dropdown-title"><a href="#!">Home</a></li>
                                <?php
                                    $args=array(
                                        'post_type'=>'page',
                                    );
                                    $query=new WP_Query($args);
                                    if($query->have_posts()):
                                    while($query->have_posts()):$query->the_post();
                                    $pageid=$query->post->ID;
                                    $menu=get_field('show_in_menu',$pageid);
                                    if($menu==true) {
                                        ?>
                                        <li class="nav-menu__dropdown-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </li>
                                        <?php
                                    }
                                    endwhile;
                               endif;
                               ?>
                            </ul>
                            <ul class="social-links">
                                <li><a href="#!"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#!"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#!"><i class="fab fa-linkedin-in"></i></a></li>
                                <li><a href="#!"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#!"><i class="fab fa-google-plus-g"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="wrap top-header marg-4">
                        <div class="pull-left logo-outer">
                            <div class="logo">
                                <?php the_custom_logo(); ?>
                            </div>
                        </div>
                        <div class="pull-right upper-right clearfix">
                    
                            <!--Info Box-->
                            <div class="upper-column info-box">
                                <div class="icon-box"><i class="fas fa-comment-dots"></i></div>
                                <ul>
                                    <li>quick enquiry</li>
                                    <li><a href="tel:+977 9851029803">+977 9851029803</a></li>
                                </ul>
                            </div>
                                             
                            <!--Info Box-->
                            <div class="upper-column info-box">
                                <div class="icon-box"><i class="fas fa-phone"></i></div>
                                <ul>
                                    <li>CALL US 24/7</li>
                                    <li><a href="tel:01 4700939">+977 1 4700939</a></li>
                                </ul>
                            </div>
                                            
                            <!--Info Box-->
                            <div class="upper-column info-box">
                                <div class="icon-box"><i class="fas fa-envelope"></i></div>
                                <ul>
                                    <li>EMAIL US</li>
                                    <li>info@travelbird.com.np</li>
                                </ul>
                            </div>
                                                
                        </div>

        <!--                        --><?php
        //                        $args=array(
        //                            'theme_location' => 'primary_menu',
        //                            'container'=>'ul',
        //                            'menu_id' => 'js-nav-button',
        //                            'menu_class'=>'nav-menu__dropdown',
        //                            'fallback'=>false,
        //
        //                        );
        //                        wp_nav_menu($args);
                                ?>
                        
                    </div>
                    <!-- breadcrump -->


                    <div class="breadcrumb secondary-menu">
                        <div class="wrap secondary-menu-wrap">
                            <!-- nav menu for sub header1-->
                            <nav class="nav-menu header2-menu-head hammingburg-icon marg-4" id="js-nav-menu-wrap">
                                <ul class="primary-menu-ul">
                                    <?php
                                    $argtax=array(
                                        'taxonomy' =>  'location',
                                        'order' =>  'ASC',
                                        'hide_empty' =>  true,

                                    );

                                    $terms = get_terms($argtax);
                                    $count = count($terms);
                                    $sterm=array();

                                    foreach ($terms as $sorterm){
                                        $tid=$sorterm->term_id;
                                        $a=get_field('menu_order','location_'.$tid);
                                        $b=$sorterm->name;
                                        $sterm[$tid]=$a;

                                    }

                                    asort($sterm);


                                    foreach ($sterm as $key =>$key_value):
                                        $country=get_term($key,'location');
                                        ?>
                                        <li class="primary-menu-li">
                                        <div class="nav-menu__dropdown nav-menu-dropdown">
                                            <a class="nav-menu__dropdown-title main-nav-title"><?php  echo $country->name; ?></a>
                                            <svg class="nav-menu__dropdown-icon">
                                                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#chevron-bottom"></use>
                                            </svg>

                                        </div>

                                            <ul class="nav-menu__main-list" id="js-nav-menu">
                                            <?php
                                            /**
                                             * Tour Menu
                                             */
                                                $uncat1=array();
                                            $activtor=array();
                                            $activtor_tax=array();
                                            $args1=array(
                                                'post_type'=>array('tour'),
                                                'location'=>$country->name,
                                            );
                                            $query1=new WP_Query($args1);
                                                    if($query1->have_posts()) {
                                                        ?>

                                                        <?php
                                                        while ($query1->have_posts()):$query1->the_post();
                                                            $postid = $query1->post->ID;
        //                                        $field1 = get_field_object('activity_tour',$postid);
        //                                        $value1 = $field1['value'];
        //                                        $activtor=$value1->name;
                                                            $field1 = get_the_terms($postid, 'activity_tour');
                                                            if(!empty($field1)) {
                                                                foreach ($field1 as $fields1):
                                                                    array_push($activtor, $fields1->slug);
                                                                endforeach;
                                                            }else{
                                                                array_push($uncat1,$postid);

                                                            }
                                                        endwhile;
                                                        ?>

                                                            <?php
                                                        if(!empty($activtor)) {
                                                        $taxtor = get_terms(array(
                                                            'taxonomy' => 'activity_tour',
                                                            'hide_empty' => true,
                                                        ));
                                                        foreach ($taxtor as $taxtors):
                                                            array_push($activtor_tax, $taxtors->slug);
                                                        endforeach;
                                                        $taxonomy_tour = array_intersect($activtor_tax, $activtor);
                                                        ?>

                                                            <?php

                                                                foreach ($taxonomy_tour as $taxonomy):
                                                                    $final_taxonomy = get_term_by('slug', $taxonomy, 'activity_tour');
                                                                    $termlink=get_term_link($final_taxonomy);
                                                                    ?>

                                                                    <li class="nav-menu__main-item nav-menu__main-item--expandable">
                                                                        <a class="nav-menu__main-link js-nav-expand-button"
                                                                           href="<?php echo $termlink;?>">
                                                                            <span class="nav-menu__main-link-text"><?php echo $final_taxonomy->name; ?></span>
                                                                            <svg class="nav-menu__arrow">
                                                                                <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                                     xlink:href="#chevron-bottom"></use>
                                                                            </svg>
                                                                        </a>
                                                                        <div class="nav-menu__sub-list-wrap js-nav-expand-menu">
                                                                            <?php
                                                                            $args2 = array(
                                                                                'post_type' => 'tour',
                                                                                'location' => $country->slug,
                                                                                'activity_tour' => $final_taxonomy->slug,
                                                                            );
                                                                            $query2 = new WP_Query($args2);
                                                                            if ($query2->have_posts()) {
                                                                                while ($query2->have_posts()):$query2->the_post();
                                                                                    $postid2 = $query2->post->ID;
                                                                                    $title2 = get_the_title($postid2);
                                                                                    $permalink2 = get_permalink($postid2);
                                                                                    ?>
                                                                                    <ul class="nav-menu__sub-list  nav-menu__sub-list--multi">
                                                                                        <li class="nav-menu__sub-item">
                                                                                            <a class="nav-menu__sub-link"
                                                                                               href="<?php echo $permalink2; ?>"><?php echo $title2; ?></a>
                                                                                        </li>

                                                                                    </ul>
                                                                                    <?php
                                                                                endwhile;
                                                                                wp_reset_postdata();
                                                                            }


                                                                            ?>
                                                                        </div>
                                                                    </li>


                                                                    <?php
                                                                endforeach;
                                                            }

                                                        if(!empty($uncat1)){

                                                            ?>
                                                            <li class="nav-menu__main-item nav-menu__main-item--expandable">
                                                                <a class="nav-menu__main-link js-nav-expand-button"
                                                                   href="#!">
                                                                    <span class="nav-menu__main-link-text"><?php echo "Uncategorized tour"; ?></span>
                                                                    <svg class="nav-menu__arrow">
                                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             xlink:href="#chevron-bottom"></use>
                                                                    </svg>
                                                                </a>
                                                                <div class="nav-menu__sub-list-wrap js-nav-expand-menu">
                                                                    <?php

                                                                    foreach ($uncat1 as $uncats1) {
                                                                        $postid6 = $uncats1;
                                                                        $title6 = get_the_title($postid6);
                                                                        $permalink6 = get_permalink($postid6);
                                                                        ?>
                                                                        <ul class="nav-menu__sub-list  nav-menu__sub-list--multi">
                                                                            <li class="nav-menu__sub-item">
                                                                                <a class="nav-menu__sub-link"
                                                                                   href="<?php echo $permalink6; ?>"><?php echo $title6; ?></a>
                                                                            </li>

                                                                        </ul>
                                                                        <?php

                                                                    }


                                                                    ?>
                                                                </div>
                                                            </li>

                                                            <?php
                                                        }


                                                    }

                                            /**
                                             * Trekking Menu
                                            */


                                            $activtor3=array();
                                            $activtor_tax3=array();
                                            $uncat3=array();
                                            $args3=array(
                                                'post_type'=>array('trekking'),
                                                'location'=>$country->name,
                                            );
                                            $query3=new WP_Query($args3);
                                            if($query3->have_posts()) {
                                                while ($query3->have_posts()):$query3->the_post();
                                                    $postid3 = $query3->post->ID;
                                                    //                                        $field1 = get_field_object('activity_tour',$postid);
                                                    //                                        $value1 = $field1['value'];
                                                    //                                        $activtor=$value1->name;
                                                    $field3 = get_the_terms($postid3, 'activity_trekking');

                                                    if(!empty($field3)) {
                                                        foreach ($field3 as $fields3):
                                                            array_push($activtor3, $fields3->slug);
                                                        endforeach;
                                                    }else{
                                                        array_push($uncat3,$postid3);

                                                    }
                                                endwhile;
                                                ?>

                                                    <?php
                                                    if(!empty($activtor3)) {
                                                        $taxtor3 = get_terms(array(
                                                            'taxonomy' => 'activity_trekking',
                                                            'hide_empty' => true,
                                                        ));

                                                        foreach ($taxtor3 as $taxtors3):
                                                            array_push($activtor_tax3, $taxtors3->slug);
                                                        endforeach;
                                                        $taxonomy_tour3 = array_intersect($activtor_tax3, $activtor3);
                                                        ?>

                                                        <?php
                                                        foreach ($taxonomy_tour3 as $taxonomy3):
                                                            $final_taxonomy3 = get_term_by('slug', $taxonomy3, 'activity_trekking');
                                                            $termlink3=get_term_link($final_taxonomy3);
                                                            ?>
                                                            <li class="nav-menu__main-item nav-menu__main-item--expandable">
                                                                <a class="nav-menu__main-link js-nav-expand-button" href="<?php echo $termlink3;?>">
                                                                    <span class="nav-menu__main-link-text"><?php echo $final_taxonomy3->name; ?></span>
                                                                    <svg class="nav-menu__arrow">
                                                                        <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             xlink:href="#chevron-bottom"></use>
                                                                    </svg>
                                                                </a>
                                                                <div class="nav-menu__sub-list-wrap js-nav-expand-menu">
                                                                    <?php
                                                                    $args4 = array(
                                                                        'post_type' => 'trekking',
                                                                        'location' => $country->slug,
                                                                        'activity_trekking' => $final_taxonomy3->slug,
                                                                    );
                                                                    $query4 = new WP_Query($args4);
                                                                    if ($query4->have_posts()) {
                                                                        while ($query4->have_posts()):$query4->the_post();

                                                                            $postid4 = $query4->post->ID;
                                                                            $title4 = get_the_title($postid4);
                                                                            $permalink4 = get_permalink($postid4);
                                                                            ?>
                                                                            <ul class="nav-menu__sub-list  nav-menu__sub-list--multi">
                                                                                <li class="nav-menu__sub-item">
                                                                                    <a class="nav-menu__sub-link"
                                                                                       href="<?php echo $permalink4; ?>"><?php echo $title4; ?></a>
                                                                                </li>

                                                                            </ul>
                                                                            <?php
                                                                        endwhile;
                                                                        wp_reset_postdata();
                                                                    }

                                                                    ?>
                                                                </div>
                                                            </li>


                                                            <?php
                                                        endforeach;

                                                    }

                                                    if(!empty($uncat3)){

                                                        ?>
                                                        <li class="nav-menu__main-item nav-menu__main-item--expandable">
                                                            <a class="nav-menu__main-link js-nav-expand-button"
                                                               href="#!">
                                                                <span class="nav-menu__main-link-text"><?php echo "Uncategorized trek"; ?></span>
                                                                <svg class="nav-menu__arrow">
                                                                    <use xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                         xlink:href="#chevron-bottom"></use>
                                                                </svg>
                                                            </a>
                                                            <div class="nav-menu__sub-list-wrap js-nav-expand-menu">
                                                                <?php

                                                               foreach ($uncat3 as $uncats3) {
                                                                       $postid2 = $uncats3;
                                                                       $title2 = get_the_title($postid2);
                                                                       $permalink2 = get_permalink($postid2);
                                                                       ?>
                                                                       <ul class="nav-menu__sub-list  nav-menu__sub-list--multi">
                                                                           <li class="nav-menu__sub-item">
                                                                               <a class="nav-menu__sub-link"
                                                                                  href="<?php echo $permalink2; ?>"><?php echo $title2; ?></a>
                                                                           </li>

                                                                       </ul>
                                                                       <?php

                                                               }


                                                                ?>
                                                            </div>
                                                        </li>

                                                        <?php
                                                    }

                                            }
                                            ?>
                                            </ul>








    <!--                                        end of trekking menu-->
                                        </li>
                                <?php
                                endforeach;
                                ?>


                                </ul>
                            </nav>

                            <div class="nav-menu-overlay nav-menu-overlay--visible" id="js-nav-overlay" style="top: 45px;display: none;"></div>
                        </div>
                    </div>


                </div>
        </header>

        <?php
        //        $args5 = array(
        //            'post_type' => array('tour','trekking'),
        //            'tax_query' => array(
        //                'relation' => 'AND',
        //                array(
        //                    'taxonomy' => 'location',
        //                    'field'    => 'slug',
        //                    'terms'    => array( 'quotes' ),
        //                ),
        //                array(
        //                    'relation' => 'OR',
        //                    array(
        //                        'taxonomy' => 'activity_tour',
        //                        'field'    => 'slug',
        //                        'terms'    => array('city-tour','day-tour'),
        //                    ),
        //                    array(
        //                        'taxonomy' => 'activity_trekking',
        //                        'field'    => 'slug',
        //                        'terms'    => 'hikking-and-expedition',
        //                    ),
        //                ),
        //            ),
        //
        //        );
        //        $query5 = new WP_Query( $args5 );
        //        $post_id=array();
        //
        //        if($query5->have_posts()){
        //
        //            while($query5->have_posts()):
        //                $id=$query->post->ID;
        //                $post_id[]=$id;
        //            endwhile;
        //            var_dump($post_id);
        //        }
        //
        ?>
        <style>
            html {
                margin-top: 0px !important;
            }
        </style>
        