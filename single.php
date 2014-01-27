<?php get_header(); ?>

			<div id="content">
				<div id="inner-content" class="wrap clearfix">
					<div id="main" role="main">

						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

							<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

								<header class="article-header">
									<h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
									<p class="byline vcard"><?php
										printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&amp;</span> filed under %4$s.', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
									?></p>
								</header> <!-- end article header -->

								<section class="entry-content clearfix" itemprop="articleBody">
									<?php the_content(); ?>
								</section> <!-- end article section -->

								<footer class="article-footer">
									<?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', '</p>'); ?>
								</footer> <!-- end article footer -->

							</article><!-- end article -->

							<section class="author-bio clearfix">
								<?php echo get_avatar( get_the_author_meta( 'email' ), $size = '80' ); ?>
								<div class="author-info">
									<h3 class="title">Written by <?php the_author_link(); ?></h3>
									<ul class="social">
										<?php
										$twitter_url = get_the_author_meta( 'twitter_url' );
										if ( !empty( $twitter_url ) ) {
											echo '<li><a class="icon twitter" href="' . esc_url( $twitter_url ) . '">&#62217;</a></li>';
										}

										$facebook_url = get_the_author_meta( 'facebook_url' );
										if ( !empty( $facebook_url ) ) {
											echo '<li><a class="icon facebook" href="' . esc_url( $facebook_url ) . '">&#62220;</a></li>';
										}

										$linkedin_url = get_the_author_meta( 'linkedin_url' );
										if ( !empty( $linkedin_url ) ) {
											echo '<li><a class="icon linkedin" href="' . esc_url( $linkedin_url ) . '">&#62232;</a></li>';
										}

										$google_url = get_the_author_meta( 'google_url' );
										if ( !empty( $google_url ) ) {
											echo '<li><a class="icon google" href="' . esc_url( $google_url ) . '">&#62223;</a></li>';
										} ?>
									</ul>
									<p class="bio"><?php the_author_meta( 'description' ); ?></p>
								</div>
							</section>

							<?php comments_template(); ?>

						<?php endwhile; else : ?>

							<article id="post-not-found" class="hentry clearfix">
								<header class="article-header">
									<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
								</header>
								<section class="entry-content">
									<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
								</section>
								<footer class="article-footer">
									<p><?php _e("This is the error message in the single.php template.", "bonestheme"); ?></p>
								</footer>
							</article>

						<?php endif; ?>

					</div> <!-- end #main -->
				</div> <!-- end #inner-content -->
			</div> <!-- end #content -->

<?php get_footer(); ?>
