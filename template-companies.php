<?php
/**
 * Template Name: Companies
 */

get_header(); ?>

	<?php $companies = get_posts( array(
		'posts_per_page' => -1,
		'post_type' => 'companies'
	) ); ?>

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

		<div class="callout">
			<div class="wrap">
				<div class="row">
					<div class="large-8 columns">
						<h3 class="title">Have you been to one of our events?</h3>
						<p class="description">Get your startup listed here!</p>
					</div>
					<div class="large-4 columns">
						<a href="<?php echo home_url( 'statups/add-yours' ); ?>" class="button block">Add Your Startup</a>
					</div>
				</div>
			</div>
		</div>

		<div class="companies wrap" id="main" role="main">
			<div class="row">
				<article class="hentry large-12 columns">
					<?php the_content(); ?>
				</article>
			</div>

			<div class="row">
				<?php foreach ( $companies as $company ) : ?>
					<div class="company large-4 columns">
						<?php echo get_the_post_thumbnail( $company->ID, 'thumbnail', ['class' => 'logo'] ); ?>
						<h3><?php echo $company->post_title; ?></h3>
						<p><?php echo $company->post_content; ?></p>

						<?php $post_meta = get_post_meta( $company->ID ); ?>
						<a class="icon-link" href="<?php echo $post_meta['wpcf-website'][0]; ?>"></a>
						<?php if ( isset($post_meta['wpcf-twitter']) ) : ?>
							<a class="icon-twitter" href="<?php echo $post_meta['wpcf-twitter'][0]; ?>"></a>
						<?php endif; ?>
						<?php if ( isset($post_meta['wpcf-facebook']) ) : ?>
							<a class="icon-facebook" href="<?php echo $post_meta['wpcf-facebook'][0]; ?>"></a>
						<?php endif; ?>
						<?php if ( isset($post_meta['wpcf-linkedin']) ) : ?>
							<a class="icon-linkedin" href="<?php echo $post_meta['wpcf-linkedin'][0]; ?>"></a>
						<?php endif; ?>
						<a class="icon-mail" href="mailto:<?php echo $post_meta['wpcf-email'][0]; ?>"></a>
					</div>
				<?php endforeach; ?>
			</div>
		</div>

	<?php endwhile; else : ?>

		<article id="post-not-found" class="hentry clearfix">
			<h2>Sorry, post not found.</h2>
		</article>

	<?php endif; ?>

<?php get_footer(); ?>
