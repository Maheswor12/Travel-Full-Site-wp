 <div class="usp-list">
            <form role="search" method="get" id="searchform" class="tour-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                <ul class="usp-list__list mySearch col-sm-12">
                    <?php if(is_home() || is_front_page()) { ?>
                        <li class="col-sm-2">
                            <span class="usp-list__text searchText">
                                Search Your Trip
                            </span>
                        </li>
                        <li class="col-sm-2">
                            <select name="post_type" class="full-width searchHome">
                                <option value="tour"><?php _e('Tour') ?></option>
                                <option value="trekking"><?php _e('Trekking') ?></option>
                            </select>
                        </li>
                        <?php
                    }
                    ?>
                    <?php if(!is_home() || !is_front_page()) {
                        if (is_post_type_archive('tour')) {
                            ?>
                            <input type="hidden" name="post_type" value="tour">
                            <li>
                            <select name="country" class="full-width searchHome">
                                <option value="">Country</option>
                                <?php
                                $terms = get_terms( array(
                                    'taxonomy' => 'location',
                                    'hide_empty' => true,
                                ) );
                                foreach ($terms as $categories): ?>
                                <option value="<?php echo $categories->slug;?>"><?php echo $categories->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </li>
                            <li>
                            <select name="activity" class="full-width searchHome searchActivity">
                                <option value="">Activities</option>
                                <?php
                                $terms = get_terms( array(
                                    'taxonomy' => 'activity_tour',
                                    'hide_empty' => true,
                                ) );
                                foreach ($terms as $categories): ?>
                                    <option value="<?php echo $categories->slug;  ?>"><?php echo $categories->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </li>
                            <?php
                        }
                        if (is_post_type_archive('trekking')) {
                            ?>
                            <input type="hidden" name="post_type" value="trekking">
                            <li>
                            <select name="country" class="full-width searchHome searchActivity">
                                <option value="">Country</option>
                                <?php
                                $terms = get_terms( array(
                                    'taxonomy' => 'location',
                                    'hide_empty' => true,
                                ) );
                                foreach ($terms as $categories): ?>
                                    <option value="<?php echo $categories->slug ; ?>"><?php echo $categories->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </li>
                            <li>
                            <select name="activity" class="full-width searchHome">
                                <option value="">Activities</option>
                                <?php
                                $terms = get_terms( array(
                                    'taxonomy' => 'activity_trekking',
                                    'hide_empty' => true,
                                ) );
                                foreach ($terms as $categories): ?>
                                    <option value="<?php echo $categories->slug;  ?>"><?php echo $categories->name; ?></option>
                                <?php endforeach; ?>
                            </select>
                            </li>
                        <?php }
                    }?>
                    <li class="col-sm-4">
                                <input size="25" type="text" name="s" class="input-text full-width searchTextfield" placeholder="<?php _e( 'Enter a destination name') ?>" />
                    </li>

                    <li class="col-sm-2">
                            <span class="usp-list__text">
                                <button type="submit" class="full-width icon-check animated btnSearchnow" data-animation-type="bounce" data-animation-duration="1"><?php _e( 'SEARCH NOW', 'trav') ?></button>
                            </span>
                    </li>
                    <li class=col-sm-2"">
                            <span class="usp-list__text">
                                <button type="submit" class="full-width icon-check animated customizeTrip" data-animation-type="bounce" data-animation-duration="1"><?php _e( 'CUSTOMIZE MY TRIP', 'trav') ?></button>
                            </span>
                    </li>
                </ul>
                <?php if(is_home() || is_front_page()): ?>
                    <style>
                        .mySearch {
                            margin-top: -55px;
                        }
                        @media screen and (max-width: 1024px){
                            .mySearch {
                                margin-top: -50px;
                            }
                        }
                        @media screen and (max-width: 768px){
                            .searchTextfield {
                                margin-top: -2px;
                            }
                            .btnSearchnow {
                                margin-top: -2px;
                            }
                        }
                    </style>
                <?php else: ?>
                    <style>
                        .mySearch {
                            margin-top: 0px;
                        }
                        @media screen and (max-width: 1024px){
                            .mySearch {
                                margin-top: 0px;
                            }
                        }
                        @media screen and (max-width: 768px){
                            .searchTextfield {
                                margin-top: -10px;
                                width: 260px;
                            }
                            .btnSearchnow {
                                margin-top: -10px;
                            }
                        }
                        @media screen and (max-width: 425px){
                            .searchActivity {
                                margin: 0px;
                            }
                            .searchTextfield{
                                width: 293px !important;
                            }
                            button, [type=submit], [type=button], .button{
                                padding:12px 11px !important;
                            }
                        }
                    </style>
                <?php endif; ?>
            </form>
        </div>



