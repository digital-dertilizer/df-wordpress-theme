<?php
/**
 * Template Name: Full Width
 */

get_header(); ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

		<header>
			<h1 class="title-bar"><?php the_title(); ?></h1>
		</header>

		<?php if ( has_post_thumbnail() ) : ?>
			<?php $image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' ); ?>
			<div class="focus">
				<img class="focus-image" src="<?php echo $image_url[0]; ?>" alt="">
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
