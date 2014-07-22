			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap cf">

					<nav role="navigation">
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
                            console.log(postPos);
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
                // Basic options for a simple Google Map
                // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
                var mapOptions = {
                    // How zoomed in you want the map to start at (always required)
                    zoom: 11,

                    // The latitude and longitude to center the map (always required)
                    center: new google.maps.LatLng(40.6700, -73.9400), // New York

                    // How you would like to style the map. 
                    // This is where you would paste any style found on Snazzy Maps.
                    styles: [   {       featureType:'water',        stylers:[{color:'#00516C'},{visibility:'on'}]   },{     featureType:'landscape',        stylers:[{color:'#f2f2f2'}] },{     featureType:'road',     stylers:[{saturation:-100},{lightness:45}]  },{     featureType:'road.highway',     stylers:[{visibility:'simplified'}] },{     featureType:'road.arterial',        elementType:'labels.icon',      stylers:[{visibility:'off'}]    },{     featureType:'administrative',       elementType:'labels.text.fill',     stylers:[{color:'#444444'}] },{     featureType:'transit',      stylers:[{visibility:'off'}]    },{     featureType:'poi',      stylers:[{visibility:'off'}]    }]
                };

                // Get the HTML DOM element that will contain your map 
                // We are using a div with id="map" seen below in the <body>
                var mapElement = document.getElementById('map1');

                // Create the Google Map using out element and options defined above
                var map = new google.maps.Map(mapElement, mapOptions);

                  var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(40.6700, -73.9400),
                    map: map,
                    title: 'Hello World!',
                    icon: '<?php echo get_template_directory_uri(); ?>/library/images/map marker 02.svg'
                });
            }


    	</script>
	</body>

</html> <!-- end of site. what a ride! -->
