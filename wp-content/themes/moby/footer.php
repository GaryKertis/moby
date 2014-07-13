			<!-- <footer class="footer" role="contentinfo">

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

			</footer> -->

		</div>

		<?php // all js scripts are loaded in library/bones.php ?>
		<?php wp_footer(); ?>
		<script type="text/javascript">

            var whale; 

            jQuery(window).resize(function () {
                setSizes();
            });

            jQuery(window).scroll(function () {
                var newPos = jQuery(window).scrollTop();
                replaceHeader();
                whalePos = -newPos * .5;

                jQuery('.header').css('-webkit-transform', 'translate3d(0px,' + newPos + 'px,0px)');
                //jQuery('#whale').css('-webkit-transform', 'translate3d(0px,' + whalePos + 'px,0px)');
                jQuery('.mywaves').each(function (index, canvas) {

                    postPos = newPos/3;

                    //jQuery(this).css('-webkit-transform', 'translate3d(0px,'+postPos+'px,0px)');
                    makeTail(jQuery(this).find('.whale').get(0),postPos);
                });
            });

            function replaceHeader() {
                currentPos = jQuery('#main').offset().top;
                if (!jQuery('#inner-header').hasClass('whaletale') && jQuery('.header').offset().top > currentPos) {
                    console.log('changed to whale tale');
                    jQuery('#inner-header').addClass('whaletale')
                } else if (jQuery('#inner-header').hasClass('whaletale') && jQuery('.header').offset().top <= currentPos) {
                    console.log('changed back to header');
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

            function makeTail(canvas,postPos) {
                whale = canvas;
                console.log(postPos);
                width = document.body.clientWidth;
                whale.width = width;
                height = whale.height;
                centerX = whale.width / 2;
                centerY = whale.height / 2;
                context = whale.getContext('2d');
                context.beginPath();

                context.moveTo(centerX, centerY - height / 2 + postPos); // A1

                context.bezierCurveTo(
                    centerX + width / 4, centerY - height / 2 + postPos, // C1
                    centerX + width / 4, centerY + height / 2 + postPos, // C2
                    centerX, centerY + height / 2 + postPos); // A2

                context.bezierCurveTo(
                    centerX - width / 4, centerY + height / 2 + postPos, // C3
                    centerX - width / 4, centerY - height / 2 + postPos, // C4
                    centerX, centerY - height / 2 + postPos); // A1

                context.fillStyle = "red";
                context.fill();
                context.closePath();
            }
            setSizes();

    	</script>
	</body>

</html> <!-- end of site. what a ride! -->
