<?php get_header(); ?>

	<header>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	</header>

	<h1 class="title-bar"><?php the_title(); ?></h1>

	<?php $focus = get_post_meta( get_the_ID(), 'focus_image' ); ?>

	<?php if ( $focus ) : ?>
		<div class="focus">
			<?php echo $focus; ?>
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
