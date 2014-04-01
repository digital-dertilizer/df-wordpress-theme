<?php get_header(); ?>

	<div class="focus">
		<img src="<?php echo get_template_directory_uri(); ?>/library/images/slider/welcome.jpg" alt="">
	</div>

	<div id="content">
		<div id="about" class="about">
			<div id="main" role="main" class="wrap">
				<?php global $post; ?>

				<div class="row">
					<div class="content large-8 columns">
						<h3>What is Digital Fertilizer?</h3>
						<?php echo wpautop( $post->post_content ); ?>
					</div>

					<div class="newsletter content-secondary large-4 columns">
						<h4>Sign Up To Get The Digital Dirt</h4>
						<p>Get a monthly recap of past events, upcoming events, job postings, and area startup news!</p>

						<form action="http://DigitalFertilizer.us5.list-manage.com/subscribe/post?u=080eab8ec7c6fb04021cf3766&amp;id=9ba679660e" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate mailchimp-signup" target="_blank" novalidate>
							<div style="position: absolute; left: -5000px;">
								<input type="text" name="b_080eab8ec7c6fb04021cf3766_9ba679660e" value="">
							</div>
							<div>
								<input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL" placeholder="Email Address">
								<input type="submit" value="Sign Up" name="subscribe" id="mc-embedded-subscribe" class="button">
							</div>
						</form>
					</div>
				</div>
			</div> <!-- end #main -->
		</div> <!-- end #inner-content -->

		<hr>

		<div id="events" class="events">
			<div class="wrap">
				<h2>What Does Digital Fertilizer Do?</h2>

				<div class="row">
					<div class="large-4 columns">
						<img src="<?php echo get_template_directory_uri() ?>/library/images/icon-connect.png" alt="">
						<h4>Connect</h4>
					</div>
					<div class="large-4 columns">
						<img src="<?php echo get_template_directory_uri() ?>/library/images/icon-engage.png" alt="">
						<h4>Engage</h4>
					</div>
					<div class="large-4 columns">
						<img src="<?php echo get_template_directory_uri() ?>/library/images/icon-empower.png" alt="">
						<h4>Empower</h4>
					</div>
				</div>
			</div>
		</div>

		<div id="upcoming-events" class="upcoming-events content-secondary">
			<div class="wrap">
				<h2>Upcoming Events</h2>

				<div class="row">
					<?php
					$meetup_key = '47f4c54263d4b5c435839e6510174';
					$json = file_get_contents( 'http://api.meetup.com/2/events.json/?group_urlname=digital-fertilizer&page=2&key=' . $meetup_key );
					$events = json_decode( $json );

					foreach ( $events->results as $event ) : ?>
						<div class="event large-6 columns">
							<h3 class="date-time"><?php echo date('l, F jS', ($event->time + $event->utc_offset) / 1000); ?></h3>
							<h4 class="venue"><?php echo $event->venue->name; ?></h4>
							<h2 class="title"><a href="<?php echo $event->event_url; ?>"><?php echo $event->name; ?></a></h2>
							<?php if ( strlen(strip_tags($event->description)) > 225 ) : ?>
								<p class="description"><?php echo substr(strip_tags($event->description), 0, 225); ?>...</p>
							<?php else: ?>
								<div class="description"><?php echo $event->description; ?></div>
							<?php endif; ?>
							<a href="<?php echo $event->event_url; ?>" class="button hollow">RSVP &rarr;</a>
						</div>
					<?php endforeach; ?>
				</div>

				<p class="more-events">Need more startup action? Take a look at our <a href="/startup-digest">Startup Digest calendar</a> or checkout our <a href="http://events.digitalfertilizer.org">Meetup group</a>!</p>
			</div>
		</div>

		<div id="news" class="news">
			<div class="wrap">
				<h2>Latest News</h2>

				<?php
				$posts = get_posts( 'posts_per_page=1' );
				$first = 'first';
				?>

				<div class="row">
					<?php foreach ( $posts as $post ) : ?>
						<?php setup_postdata( $post ); ?>

						<div class="post large-6 columns">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="post-meta">By <?php the_author_link(); ?> on <?php the_date(); ?></p>
							<div class="post-excerpt">
								<?php echo get_the_excerpt(); ?>
							</div>
						</div>
					<?php endforeach; ?>

					<div class="twitter large-6 columns">
						<a class="twitter-timeline" href="https://twitter.com/DigitalFertilzr" data-widget-id="320175309087457280" data-chrome="nofooter noborders transparent">Tweets by @DigitalFertilzr</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- end #content -->

<?php get_footer(); ?>
