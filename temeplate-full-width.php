<?php
/**
 * Template Name: Full Width
 */

get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<header>
			<h1 class="title-bar"><?php the_title(); ?></h1>
		</header>

		<?php $focus = get_post_meta( get_the_ID(), 'focus' ); ?>
		<?php if ( ! empty( $focus ) ) : ?>
			<div class="focus">
				<img class="focus-image" src="<?php echo $focus[0]; ?>" alt="">
			</div>
		<?php endif; ?>

		<div class="wrap" id="main" role="main">
			<article class="hentry clearfix">
				<?php the_content(); ?>
			</article>
		</div>

	<?php endwhile; else : ?>

		<article id="post-not-found" class="hentry clearfix">
			<h2>Sorry, post not found.</h2>
		</article>

	<?php endif; ?>

<?php get_footer(); ?>
