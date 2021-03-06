<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php if(!has_tag('footer')) : ?>
							<div id="post-<?php the_ID(); ?>" class="mywaves">
							<canvas id="waves-<?php the_ID(); ?>" class="waves" width="100%" height="100px"></canvas>
							<div class="post_wrapper">
							<article id="post-<?php the_ID(); ?>" <?php post_class( 'cf' ); ?> role="article">

								<header class="article-header">

									<!-- <p class="byline vcard">
										<?php // printf( __( 'Posted', 'bonestheme' ) . ' <time class="updated" datetime="%1$s" pubdate>%2$s</time> ' . __('by', 'bonestheme' ) . ' <span class="author">%3$s</span>', get_the_time('Y-m-j'), get_the_time(get_option('date_format')), get_the_author_link( get_the_author_meta( 'ID' ) )); ?>
									</p> -->

								</header>
								<?php if(has_tag('crew')){
									echo '<h1 class="h1 entry-title">'; 
									the_title();
									echo '</h1>';
									echo '<section class="entry-content cf crew">';
									the_content();
									echo '</section>';
								} else if(has_tag('ports')) {
									echo '<section class="entry-content cf">';
									the_content();
									echo '</section>';
								} else {
									echo '<h1 class="h1 entry-title">'; 
									the_title();
									echo '</h1>';
									echo '<section class="entry-content cf">';
									the_content();
									echo '</section>';
								}
					
									?>


								<!-- <footer class="article-footer cf">
									<p class="footer-comment-count">
										<?php // comments_number( __( '<span>No</span> Comments', 'bonestheme' ), __( '<span>One</span> Comment', 'bonestheme' ), _n( '<span>%</span> Comments', '<span>%</span> Comments', get_comments_number(), 'bonestheme' ) );?>
									</p>



                 	<?php // printf( '<p class="footer-category">' . __('filed under', 'bonestheme' ) . ': %1$s</p>' , get_the_category_list(', ') ); ?>

                  <?php // the_tags( '<p class="footer-tags tags"><span class="tags-title">' . __( 'Tags:', 'bonestheme' ) . '</span> ', ', ', '</p>' ); ?>


								</footer> -->

							</article>
							<div id="whale-<?php the_ID(); ?>" class="whale">
							
					</div>
						</div>
						</div>

							<?php endif; endwhile; ?>

									<?php bones_page_navi(); ?>

							<?php else : ?>

									<article id="post-not-found" class="hentry cf">
											<header class="article-header">
												<h1><?php _e( 'Oops, Post Not Found!', 'bonestheme' ); ?></h1>
										</header>
											<section class="entry-content">
												<p><?php _e( 'Uh Oh. Something is missing. Try double checking things.', 'bonestheme' ); ?></p>
										</section>
										<footer class="article-footer">
												<p><?php _e( 'This is the error message in the index.php template.', 'bonestheme' ); ?></p>
										</footer>
									</article>

							<?php endif; ?>


						
					</div>
					<?php if (!is_front_page()) {
						get_sidebar();
					} ?>

				</div>

			</div>


<?php get_footer(); ?>
