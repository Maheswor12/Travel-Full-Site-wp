(function($){
"use strict"; // Start of use strict
/*==============================
    Is mobile
==============================*/
var isMobile = {
        Android: function() {
            return navigator.userAgent.match(/Android/i);
        },
        BlackBerry: function() {
            return navigator.userAgent.match(/BlackBerry/i);
        },
        iOS: function() {
            return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Opera: function() {
            return navigator.userAgent.match(/Opera Mini/i);
        },
        Windows: function() {
            return navigator.userAgent.match(/IEMobile/i);
        },
        any: function() {
            return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
        }
    };

    /*==============================
        end of Is mobile code
    ==============================*/

    $(document).ready(function() {
       
       /* header menu height*/
         $('.primary-menu-li').on('mouseover',function (){
            var subCategoryMenu   = $(this).find('.nav-menu__main-list').outerHeight(true)+1;
            $('.nav-menu__sub-list-wrap').css({'min-height':subCategoryMenu+"px"});
        });
       
        /*  itinerary tab */
        // $('.category-list a').click(function(){
        //     var $index = $(this).closest('li').index();
        //     $('.category-list a').removeClass('active');
        //     $('.category-list li').eq($index).find('a').addClass('active');
        //     $('.tab-contents-package').hide().eq($index).fadeIn();
        //     return false;
        // });
        /* end of itinerary tab */

        /*  itinerary tab */
        $('.departure-tab a').click(function(){
            var $index = $(this).closest('li').index();
            $('.departure-tab a').removeClass('active');
            $('.departure-tab li').eq($index).find('a').addClass('active');
            $('.departure-tab-content').hide().eq($index).fadeIn();
            return false;
        });
        /* end of itinerary tab */

        /* faq */
        $('.faq-plusSign-div').click(function (){
            $(this).hide();
            $(this).parent('.offer-block__unit-title').find('.faq-minusSign-div').show();
            $(this).parents('.faq-container').find('.faq-answer').slideDown("slow");
        });
        $('.faq-minusSign-div').click(function () {
            $(this).hide();
            $(this).parent('.offer-block__unit-title').find('.faq-plusSign-div').show();
            $(this).parents('.faq-container').find('.faq-answer').slideUp("slow");
        });
        /*end of faq */

        /* single page gallery*/
        $('.imageGallery-lightbox li:gt(5)').css('display','none');
        if($('.imageGallery-lightbox.js-Gallery__list.Gallery__list li').size()>6){
            var remainingImage = $('.imageGallery-lightbox.js-Gallery__list.Gallery__list li').size() - 6; 
            $('.imageGallery-lightbox li:nth-child(3)').find('a').prepend( '<span style="right: 4%;font-size: 22px;font-weight: 600;color: #ffffff;width: inherit;bottom: 36%;border-top-left-radius: 20px;padding:  5px;z-index:  999999;position:absolute;">+'+remainingImage+' more</span>');
        }

    });
    /* homepage review slider */
    jQuery(document).ready(function($){
       
        $('.review-container .testimonial_group').bxSlider({
            auto:true,
            nextText:">",
            prevText:"<",
            hideControlOnEnd:true,
            minSlides:1,
            maxSlides: 1,
            autoStart:true,
            pause:20000
        });
       
        $('.related_package .grid-cards__list').bxSlider({
            pager:false,
            minSlides:1,
            maxSlides:15,
            slideWidth:370,
        });
       
        //Open it when #opener is clicked
        $(".productButton li:last-child").click(function () {
            $('.customize-trip-model').dialog({
                autoOpen: false,
                modal : true,
                closeOnEscape : true,
                show: {
                    effect: "blind",
                    duration: 500
                },
                hide: {
                    effect: "explode",
                    duration: 1000
                },
                resizable:false,
                width:1000,
                close: function(event, ui) {
                    $(this).dialog("destroy");
                },
            });
            $(".customize-trip-model").dialog("open");
        });
        
        $(document).on('click', ".customizeMytrip a" , function () {
            $('.customize-trip-model').dialog({
                autoOpen: false,
                modal : true,
                closeOnEscape : true,
                show: {
                    effect: "blind",
                    duration: 500
                },
                hide: {
                    effect: "explode",
                    duration: 1000
                },
                resizable:false,
                width:1000,
                close: function(event, ui) {
                    $(this).dialog("destroy");
                },
            });
            $(".customize-trip-model").dialog("open");
        });
        
        $(document).on('submit','*[rel=submitDemo]', function(e){
            e.preventDefault();
            var data = new FormData(this);
            console.log(data);
        });
        
    
         $(".customizeTrip").click(function () {
            $('.customize-trip-model').dialog({
                autoOpen: false,
                modal : true,
                closeOnEscape : true,
                show: {
                    effect: "blind",
                    duration: 500
                },
                hide: {
                    effect: "explode",
                    duration: 1000
                },
                resizable:false,
                width:1000,
                close: function(event, ui) {
                    $(this).dialog("destroy");
                },
            });
            $(".customize-trip-model").dialog("open");
        });
       
       //load previous active tab on reload
       $(function() {
        //  Define friendly index name
        var index = 'key';
        //  Define friendly data store name
        var dataStore = window.sessionStorage;
        //  Start magic!
        try {
            // getter: Fetch previous value
            var oldIndex = dataStore.getItem(index);
        }catch(e) {
            // getter: Always default to first tab in error state
            var oldIndex = 0;
        }
        $('.jquery-tabs').tabs({
            // The zero-based index of the panel that is active (open)
            active : oldIndex,
            // Triggered after a tab has been activated
            activate : function( event, ui ){
                //  Get future value
                var newIndex = ui.newTab.parent().children().index(ui.newTab);
                //  Set future value
                dataStore.setItem( index, newIndex )
            }
        });
    });
        
       if(isMobile.any()){
             $('.header .nav-menu__main-list').css({'position':'unset','display':'none'});
             $('.header2-menu-head .primary-menu-ul').css({'display':'none'});
    
          $('.nav-menu.header2-menu-head.hammingburg-icon').click(function(){
             event.stopPropagation();
             $('.header2-menu-head .primary-menu-ul').slideToggle('slow'); 
          });
          
          $('.header2-menu-head .primary-menu-li').click(function(){
              event.stopPropagation();
             $(this).find('.nav-menu__main-list').slideToggle('slow'); 
          });
       }
    });
    /* end of homapage review slider */

    /* itinerary page sidebar scroll effect */
        // $(function() {
        //     var $sidebar   = $(".right_sidebar__section:last-child"),
        //         $window    = $(window),
        //         offset     = $sidebar.offset(),
        //         topPadding = 20,
        //         sectionPackage = $(".tab-contents-package");
    
        //     $window.scroll(function() {
        //         console.log($window.scrollTop());
        //         if($window.scrollTop() > offset.top){
        //             $sidebar.stop().animate({
        //                 marginTop: $window.scrollTop() - offset.top + topPadding
        //             });
        //         }else {
        //             $sidebar.stop().animate({
        //                 marginTop: 0
        //             });
        //         }
        //     });
        // });
    /* end of itinerary sidebar effect */    
})(jQuery);

