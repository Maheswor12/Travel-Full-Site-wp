<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package iceberg_travel
 */

?>



<footer class="footer footer--Travelbird footer--Travelbird__DK  footer--duck">
    <!--    --><?php //include 'award-container-inside-footer.php'; ?>
    <div class="footer-trust-logos trust-logos-list-container">
        <ul class="wrap">

            <?php dynamic_sidebar('footer-1');?>
        </ul>
    </div>

    

    <div class="footer-newsletter">
        <form class=" input-group" method="get" action="#!">
            <label>Sign up for our latest email news & offers</label>
            <input class="js-mailinglist__email" id="newsletter_email" type="email" name="email" placeholder="E-mail address" required="">
            <input class="button" type="submit" value="Sign Up" name="sign_up">
            <div class="js-mailinglist__error error-message"></div>
        </form>
    </div>

    <div class="section-divider">

    </div>

    <div class="footer-nav" style="background-image: url('<?php echo get_template_directory_uri();?>/images/footer/Untitled-1.png');background-repeat:no-repeat;background-size:contain;background-position:center bottom !important;">
        
        
         <!-- footer links middle -->
        <div class="main-nav">
        <!-- right side of footer -->
        <div class="footer-nav-right">
            <div class="about-us">
                <ul>
                <?php dynamic_sidebar('footer-part-4');?>
                </ul>

            </div>


        </div>

        <!-- left middle side footer -->
        <div class="footer-nav-middle-left">
            <div class="activities">
                <ul>
                    <?php dynamic_sidebar('footer-part-3');?>
                </ul>
            </div>  <!--activities-->
            
        </div>

        <!-- middle right footer -->
        <div class="footer-nav-middle-right">
            <div class="styles">
                <ul>
                    <?php dynamic_sidebar('footer-part-2');?>
                </ul>
                <div class="toll-free-wrap">
                    <div class="toll-free">
                        Call us for more details.<br><span><a href="tel:+9779851029803">+9779851029803</a></span>
                    </div>
            </div>
            </div>  <!--styles-->
            
            <!-- Modal -->
        </div>

        <!-- left side slider -->
        <div class="footer-nav-left">
            <ul>
                <?php dynamic_sidebar('footer-part-1');?>
            </ul>
            
        </div>
    </div>
    <!--  end of footer links middleww -->    
        
        <div class="footer-nav-list">
            <ul class="social">
<!--                <li>-->
<!--                    <a href="https://www.facebook.com/TravelBirdBE" target="_blank">-->
<!--                        <svg width="20" height="20" fill="#ffffff" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M1.104 20C.494 20 0 19.506 0 18.896V1.104C0 .494.494 0 1.104 0h17.792C19.506 0 20 .494 20 1.104v17.792c0 .61-.494 1.104-1.104 1.104H13.8v-7.745h2.6l.39-3.02H13.8V7.31c0-.874.242-1.47 1.496-1.47h1.598v-2.7c-.277-.037-1.225-.12-2.33-.12-2.304 0-3.88 1.407-3.88 3.99v2.226H8.075v3.02h2.607V20h-9.58z" fill="gray" fill-rule="evenodd"></path></svg>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="https://twitter.com/TravelBirdBE" target="_blank">-->
<!--                        <svg width="23" height="20" viewBox="0 0 23 20" xmlns="http://www.w3.org/2000/svg"><path d="M22.667 3.004c-.81.368-1.68.617-2.592.728.932-.572 1.648-1.48 1.985-2.56-.873.53-1.838.915-2.868 1.122-.822-.9-1.995-1.46-3.294-1.46-2.49 0-4.512 2.072-4.512 4.627 0 .364.04.716.116 1.055-3.75-.193-7.076-2.034-9.304-4.837-.39.686-.61 1.482-.61 2.33 0 1.604.796 3.02 2.007 3.85-.738-.02-1.436-.232-2.045-.576v.057c0 2.242 1.556 4.113 3.622 4.537-.378.11-.777.163-1.19.163-.29 0-.574-.028-.85-.082.576 1.838 2.24 3.177 4.217 3.212-1.545 1.242-3.493 1.983-5.606 1.983-.365 0-.725-.022-1.077-.064 1.997 1.31 4.37 2.077 6.918 2.077 8.304 0 12.843-7.052 12.843-13.168 0-.202-.004-.404-.012-.6.882-.654 1.648-1.468 2.25-2.396" fill="gray" fill-rule="evenodd"></path></svg>-->
<!--                    </a>-->
<!--                </li>-->
<!--                <li>-->
<!--                    <a href="https://instagram.com/travelbird" target="_blank">-->
<!--                        <svg width="20" height="20" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd"><path d="M8 0C5.827 0 5.555.01 4.702.048 3.85.088 3.27.222 2.76.42c-.526.204-.973.478-1.417.923-.445.444-.72.89-.923 1.417-.198.51-.333 1.09-.372 1.942C.008 5.555 0 5.827 0 8s.01 2.445.048 3.298c.04.852.174 1.433.372 1.942.204.526.478.973.923 1.417.444.445.89.72 1.417.923.51.198 1.09.333 1.942.372.853.04 1.125.048 3.298.048s2.445-.01 3.298-.048c.852-.04 1.433-.174 1.942-.372.526-.204.973-.478 1.417-.923.445-.444.72-.89.923-1.417.198-.51.333-1.09.372-1.942.04-.853.048-1.125.048-3.298s-.01-2.445-.048-3.298c-.04-.852-.174-1.433-.372-1.942-.204-.526-.478-.973-.923-1.417-.444-.445-.89-.72-1.417-.923-.51-.198-1.09-.333-1.942-.372C10.445.008 10.173 0 8 0zm0 1.44c2.136 0 2.39.01 3.233.048.78.036 1.203.166 1.485.276.374.145.64.318.92.598.28.28.453.546.598.92.11.282.24.705.276 1.485.038.844.047 1.097.047 3.233s-.01 2.39-.05 3.233c-.04.78-.17 1.203-.28 1.485-.15.374-.32.64-.6.92-.28.28-.55.453-.92.598-.28.11-.71.24-1.49.276-.85.038-1.1.047-3.24.047s-2.39-.01-3.24-.05c-.78-.04-1.21-.17-1.49-.28-.38-.15-.64-.32-.92-.6-.28-.28-.46-.55-.6-.92-.11-.28-.24-.71-.28-1.49-.03-.84-.04-1.1-.04-3.23s.01-2.39.04-3.24c.04-.78.17-1.21.28-1.49.14-.38.32-.64.6-.92.28-.28.54-.46.92-.6.28-.11.7-.24 1.48-.28.85-.03 1.1-.04 3.24-.04zm0 2.452c-2.27 0-4.108 1.84-4.108 4.108 0 2.27 1.84 4.108 4.108 4.108 2.27 0 4.108-1.84 4.108-4.108 0-2.27-1.84-4.108-4.108-4.108zm0 6.775c-1.473 0-2.667-1.194-2.667-2.667 0-1.473 1.194-2.667 2.667-2.667 1.473 0 2.667 1.194 2.667 2.667 0 1.473-1.194 2.667-2.667 2.667zm5.23-6.937c0 .53-.43.96-.96.96s-.96-.43-.96-.96.43-.96.96-.96.96.43.96.96z" fill="gray"></path></svg>-->
<!--                    </a>-->
<!--                </li>-->
                <?php dynamic_sidebar('social-icon');?>
            </ul>
            <ul class="links">
                <?php
                $args=array(
                        'theme_location'=>'menu-1',
                    'fallback'=>false

                );
                wp_nav_menu($args);
                ?>
            </ul>

            <div class="copyright">
                <div class="copyright__text">TravelBird Nepal</div>
                <div class="copyright__year">© 2018</div>
            </div>
        </div>
    </div>

<!-- model 1 -->
    <div class="customize-trip-model" id="" style="display:none;">
       <?php
            get_template_part('inc/customize-form');
        ?>
    </div>
<!-- end of model1 -->

</footer>
<script async src="//static.zotabox.com/a/5/a5cdc4d687041090ad6bbccc53f299ac/widgets.js"></script>

</body>

</html>

