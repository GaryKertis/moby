<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap cf">

						<div id="main" class="m-all cf" role="main">

							<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<div id="post-<?php the_ID(); ?>" class="mywaves">
							<canvas id="waves-<?php the_ID(); ?>" class="waves" width="100%" height="100px"></canvas>
							<div class="post_wrapper">
							<article id="post-<?php the_ID(); ?>" class="post type-post status-publish format-image hentry category-uncategorized cf" role="article">

								<h1 class="h1 entry-title"><?php the_title(); ?></h1>

								<section class="entry-content cf">
									<?php
										// the content (pretty self explanatory huh)
										the_content();

									?>
								</section> 
							</article>							
						</div>
						</div>
							<?php endwhile; ?>

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

				</div>

			</div>


<?php get_footer(); ?>