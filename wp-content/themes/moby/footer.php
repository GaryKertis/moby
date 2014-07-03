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
    		var s = skrollr.init();
    		jQuery('.waves').each(function(index, canvas) {
    		 canvas.width = document.body.clientWidth;
    		 canvas.height = 50;
    		 context = canvas.getContext('2d');
	
		    context.lineWidth = 1;

		    context.fillStyle = 'white';
		   	var x = 0;
    		var y = -71;
    		var radius = 100;
    		var startAngle = 0.25 * Math.PI;
    		var endAngle = 0.75 * Math.PI;

    		for (i=0;i<canvas.width;i++) {

    		context.beginPath();
    		context.arc(x, y, radius, startAngle, endAngle, false);
    		context.fill();
			x += (radius+40);
    	}
    });

    	</script>
	</body>

</html> <!-- end of site. what a ride! -->
