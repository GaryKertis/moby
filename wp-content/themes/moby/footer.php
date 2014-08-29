			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap cf">



                    <?php if (have_posts()) : while (have_posts()) : the_post();

                                if(has_tag('footer')){
                                echo '<div class="post_wrapper">';
                                echo '<article id="post-<?php the_ID(); ?>" class="';
                                echo post_class( 'cf' );
                                echo '" role="article">';
                                    echo '<h1 class="h1 entry-title">'; 
                                    echo the_title();
                                    echo '</h1>';
                                    echo '<section class="entry-content cf footer">';
                                    echo the_content();
                                    echo '</section>';
                                    echo '</article>';
                                    echo '</div>';}
                    endwhile;
                    endif;
                    ?>

					<nav role="navigation" class="footer-navigation">
						<?php wp_nav_menu(array(
    					'container' => '',                              // remove nav container
    					'container_class' => 'footer-links cf',         // class of container (should you choose to use it)
    					'menu' => __( 'Footer Links', 'bonestheme' ),   // nav name
    					'menu_class' => 'nav footer-nav cf',            // adding custom nav class
    					'theme_location' => 'footer-links',             // where it's located in the theme
    					'before' => '',                                 // before the menu
        			'after' => '',                                  // after the menu
        			'link_before' => '',                            // before each link
        			'link_after' => '',                             // after each link
        			'depth' => 0,                                   // limit the depth of the nav
    					'fallback_cb' => 'bones_footer_links_fallback'  // fallback function
						)); ?>
					</nav>

					<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>.</p>

				</div>

			</footer>

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
		<script type="text/javascript">


              var hashTagActive = "";
                jQuery(".scroll").click(function (event) {
        if(hashTagActive != this.hash) { //this will prevent if the user click several times the same link to freeze the scroll.
            event.preventDefault();
            //calculate destination place
            var dest = 0;
            if (jQuery(this.hash).offset().top > jQuery(document).height() - jQuery(window).height()) {
                dest = jQuery(document).height() - jQuery(window).height();
            } else {
                dest = jQuery(this.hash).offset().top;
            }
            //go to destination
            jQuery('html,body').animate({
                scrollTop: dest
            }, 1000, 'swing');
            hashTagActive = this.hash;
            }
            });

            jQuery(window).resize(function () {
                setSizes();
            });

            postPos = 0; 

            jQuery(window).scroll(function () {
                var newPos = jQuery(window).scrollTop();

                jQuery('.header').css({'-webkit-transform': 'translate3d(0px,' + newPos + 'px,0px)',
                                        '-mozilla-transform': 'translate3d(0px,' + newPos + 'px,0px)',
                                        'transform': 'translate3d(0px,' + newPos + 'px,0px)'
                                    });

                    //jQuery(this).css('-webkit-transform', 'translate3d(0px,'+postPos+'px,0px)');
                                        

                        if (newPos > jQuery('.whale').offset().top - 100) {
                            //50% in view, begin animation.

                            postPos = newPos - (jQuery('.whale').offset().top - 100);
                            if (postPos <= jQuery(window).height()/2) jQuery('.whale').css({'background-position': 'center '+postPos+'px'});
;

                    }
                replaceHeader();


            });

            function replaceHeader() {

                currentPos = jQuery('#main').offset().top;
                if (!jQuery('#inner-header').hasClass('whaletale') && jQuery('.header').offset().top > currentPos) {
                    jQuery('#inner-header').addClass('whaletale')
                } else if (jQuery('#inner-header').hasClass('whaletale') && jQuery('.header').offset().top <= currentPos) {
                    jQuery('#inner-header').removeClass('whaletale')
                }
            }

            function setSizes() {

                jQuery('#content').css('margin-top', jQuery('.header').height() + jQuery('.navigation').height());

                jQuery('.waves').each(function (index, canvas) {
                    canvas.width = document.body.clientWidth;
                    canvas.height = 50;
                    context = canvas.getContext('2d');
                    context.globalCompositeOperation = 'source-out';
                    context.fillStyle = jQuery(this).next().css('background-color');


                    context.lineWidth = 1;

                    //context.fillStyle = 'rgb(182,207,208)';
                    var x = 0;
                    var y = -71;
                    var radius = 100;
                    var startAngle = 0.25 * Math.PI;
                    var endAngle = 0.75 * Math.PI;
                    context.beginPath();
                    for (i = 0; i < canvas.width; i++) {


                        context.arc(x, y, radius, startAngle, endAngle, false);
                        x += (radius + 40);
                    }
                    context.closePath();
                    context.fill();
                    context.fillRect(0, 0, canvas.width, canvas.height);


                });

            }

            setSizes();

            // When the window has finished loading create our google map below
            google.maps.event.addDomListener(window, 'load', init);
        
            function init() {

                jQuery('.map').each(function(index, map){ 

                lat = parseFloat(jQuery(this).text().split(',')[0]);
                lon = parseFloat(jQuery(this).text().split(',')[1]);

                latLng = new google.maps.LatLng(lat, lon);
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 13,

                    // The latitude and longitude to center the map (always required)
                    center: latLng, // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [   {       featureType:'water',        stylers:[{color:'#00516C'},{visibility:'on'}]   },{     featureType:'landscape',        stylers:[{color:'#f2f2f2'}] },{     featureType:'road',     stylers:[{saturation:-100},{lightness:45}]  },{     featureType:'road.highway',     stylers:[{visibility:'simplified'}] },{     featureType:'road.arterial',        elementType:'labels.icon',      stylers:[{visibility:'off'}]    },{     featureType:'administrative',       elementType:'labels.text.fill',     stylers:[{color:'#444444'}] },{     featureType:'transit',      stylers:[{visibility:'off'}]    },{     featureType:'poi',      stylers:[{visibility:'off'}]    }],
                    scrollwheel: false, // Disable Mouse Scroll zooming (Essential for responsive sites!)
                    // All of the below are set to true by default, so simply remove if set to true:
                    panControl:false, // Set to false to disable
                    mapTypeControl:false, // Disable Map/Satellite switch
                    scaleControl:false, // Set to false to hide scale
                    streetViewControl:false, // Set to disable to hide street view
                    overviewMapControl:false, // Set to false to remove overview control
                    rotateControl:false // Set to false to disable rotate control
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = map;

                // Create the Google Map using out element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                  var marker = new google.maps.Marker({
                    position: latLng,
                    map: map,
                    icon: '<?php echo get_template_directory_uri(); ?>/library/images/map marker 02.svg'
                });

                var infowindow = new google.maps.InfoWindow({ // Create a new InfoWindow
                content:'<div id="infowindow">' + jQuery('.infowindowcontent')[index].innerHTML + '</div>'// HTML contents of the InfoWindow
                });

                //google.maps.event.addListener(marker, 'click', function() { // Add a Click Listener to our marker
                infowindow.open(map,marker); // Open our InfoWindow
                //});

              });
            }


    	</script>
	</body>

</html> <!-- end of site. what a ride! -->
