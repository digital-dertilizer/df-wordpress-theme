<?php get_header(); ?>

	<div id="slider" class="slider flexslider">
		<ul class="slides">
			<li>
				<img src="http://placehold.it/1200x450" alt="">
			</li>
			<li>
				<img src="http://placehold.it/1200x450?text=Hello+Slide+2" alt="">
			</li>
		</ul>
	</div>

	<div id="content">
		<div id="about" class="about">
			<div id="main" role="main" class="wrap">
				<?php global $post; ?>

				<div class="clearfix">
					<div class="content eightcol first">
						<h4><?php echo $post->post_title; ?></h4>
						<?php echo wpautop( $post->post_content ); ?>
					</div>

					<div class="newsletter content-secondary fourcol last">
						<h4>Sign Up To Get The Digital Dirt</h4>
						<p>Get a monthly recap of past events, upcoming events, job postings, and area startup news!</p>

						<!-- TODO: Setup MailChimp form -->
						<form action="" class="mailchimp-signup">
							<div>
								<input type="email" placeholder="Email Address">
								<button type="submit" class="button">Sign Up</button>
							</div>
						</form>
					</div>
				</div>
			</div> <!-- end #main -->
		</div> <!-- end #inner-content -->

		<hr>

		<div id="events" class="events">
			<div class="wrap">
				<h2>Types of Events</h2>

				<div class="clearfix">
					<div class="threecol first">
						<img src="<?php echo get_template_directory_uri() ?>/library/images/icon-event-type-seed.png" alt="">
						<h4>Seed</h4>
						<p>Designed to help you find direction and define your market, we focus on business formation & planning because you can’t harvest from soil that isn’t seeded correctly.</p>
					</div>
					<div class="threecol">
						<img src="<?php echo get_template_directory_uri() ?>/library/images/icon-event-type-fertilize.png" alt="">
						<h4>Fertilize</h4>
						<p>Helping to educate you on the top in tech and get the right people involved to execute your vision is the boost you need to go from a plan to validating and creating your MVP.</p>
					</div>
					<div class="threecol">
						<img src="<?php echo get_template_directory_uri() ?>/library/images/icon-event-type-grow.png" alt="">
						<h4>Grow</h4>
						<p>Our vision to ultimately help you grow into the company you want to be, is a co-working space that surrounds you with the right resources, events, and motivational people.</p>
					</div>
					<div class="threecol last">
						<img src="<?php echo get_template_directory_uri() ?>/library/images/icon-event-type-harvest.png" alt="">
						<h4>Harvest</h4>
						<p>When it’s time to Harvest, It’s show time! Turn down the lights and help your company secure funding to scale faster, or possibly even exit by means of an outright sale.</p>
					</div>
				</div>
			</div>
		</div>

		<div id="upcoming-events" class="upcoming-events content-secondary">
			<div class="wrap">
				<h2>Upcoming Events</h2>

				<div class="clearfix">
					<?php
					$meetup_key = '47f4c54263d4b5c435839e6510174';
					$json = file_get_contents( 'http://api.meetup.com/2/events.json/?group_urlname=digital-fertilizer&page=2&key=' . $meetup_key );
					$events = json_decode( $json );
					$first = 'first';

					foreach ( $events->results as $event ) : ?>
						<div class="event sixcol <?php echo $first; ?>">
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
						<?php if ( $first == 'first' ) {
							$first = 'last';
						} else {
							$first = 'first';
						} ?>
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

				<div class="clearfix">
					<?php foreach ( $posts as $post ) : ?>
						<?php setup_postdata( $post ); ?>

						<div class="post sixcol <?php echo $first; ?>">
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="post-meta">By <?php the_author_link(); ?> on <?php the_date(); ?></p>
							<div class="post-excerpt">
								<?php echo get_the_excerpt(); ?>
							</div>
						</div>

						<?php if ($first == 'first') $first = 'last'; ?>
					<?php endforeach; ?>

					<div class="twitter sixcol last">
						<a class="twitter-timeline" href="https://twitter.com/DigitalFertilzr" data-widget-id="320175309087457280" data-chrome="nofooter noborders transparent">Tweets by @DigitalFertilzr</a>
						<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- end #content -->

<?php get_footer(); ?>
