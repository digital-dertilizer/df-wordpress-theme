<?php get_header(); ?>

<div id="content">
	<div id="inner-content" class="row">
		<div id="main" class="large-8 columns" role="main">

			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
				<header class="article-header">
					<h1><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
					<p class="byline vcard"><?php
						printf(__('Posted <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span> <span class="amp">&</span> filed under %4$s.', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
					?></p>
				</header> <!-- end article header -->

				<section class="entry-content clearfix">
					<?php the_content(); ?>
				</section> <!-- end article section -->

				<footer class="article-footer">
					<p class="tags"><?php the_tags('<span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', ''); ?></p>
				</footer> <!-- end article footer -->

				<section class="author-bio clearfix">
					<?php echo get_avatar( get_the_author_meta( 'email' ), $size = '80' ); ?>
					<div class="author-info">
						<h3 class="title">Written by <?php the_author_link(); ?></h3>
						<ul class="social">
							<?php
							$twitter_url = get_the_author_meta( 'twitter_url' );
							if ( !empty( $twitter_url ) ) {
								echo '<li><a class="icon-twitter" href="' . esc_url( $twitter_url ) . '"></a></li>';
							}

							$facebook_url = get_the_author_meta( 'facebook_url' );
							if ( !empty( $facebook_url ) ) {
								echo '<li><a class="icon-facebook" href="' . esc_url( $facebook_url ) . '"></a></li>';
							}

							$linkedin_url = get_the_author_meta( 'linkedin_url' );
							if ( !empty( $linkedin_url ) ) {
								echo '<li><a class="icon-linkedin" href="' . esc_url( $linkedin_url ) . '"></a></li>';
							}

							$google_url = get_the_author_meta( 'google_url' );
							if ( !empty( $google_url ) ) {
								echo '<li><a class="icon-google" href="' . esc_url( $google_url ) . '"></a></li>';
							} ?>
						</ul>
						<p class="bio"><?php the_author_meta( 'description' ); ?></p>
					</div>
				</section>

				<?php comments_template(); ?>

			</article> <!-- end article -->

			<?php endwhile; ?>

				<?php if (function_exists('bones_page_navi')) { ?>
					<?php bones_page_navi(); ?>
				<?php } else { ?>
					<nav class="wp-prev-next">
						<ul class="clearfix">
							<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
							<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
						</ul>
					</nav>
				<?php } ?>

			<?php else : ?>

				<article id="post-not-found" class="hentry clearfix">
					<header class="article-header">
						<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
					</header>
					<section class="entry-content">
						<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
					</section>
					<footer class="article-footer">
						<p><?php _e("This is the error message in the index.php template.", "bonestheme"); ?></p>
					</footer>
				</article>

			<?php endif; ?>

		</div> <!-- end #main -->

		<?php get_sidebar(); ?>

	</div> <!-- end #inner-content -->
</div> <!-- end #content -->

<?php get_footer(); ?>
