      <footer class="footer" role="contentinfo">
        <div class="footer-top">
          <div class="wrap clearfix">
            <div class="sevencol first">
              <h4>Connect With Us</h4>
              <!-- AddThis Button BEGIN -->
              <div class="addthis_toolbox addthis_default_style" style="margin-bottom: 25px;">
                <a class="addthis_button_tweet"></a>
                <a class="addthis_button_linkedin_counter"></a>
                <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
              </div>
              <script type="text/javascript">var addthis_config = {"data_track_addressbar":true};</script>
              <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-53292d084e5118b5"></script>
              <!-- AddThis Button END -->

              <nav class="clearfix">
                <div class="threecol first">
                  <img class="logo" src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" alt="Digital Fertilizer">
                </div>
                <div class="threecol">
                  <a href="">Resources</a>
                  <a href="">Job Board</a>
                  <a href="">Sponsorships</a>
                </div>
                <div class="threecol">
                  <a href="">About</a>
                  <a href="">Events</a>
                </div>
                <div class="threecol last">
                  <a href="">Contact</a>
                  <a href="">Blog</a>
                </div>
              </nav>
            </div>
            <div class="newsletter content-secondary fivecol last">
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
        </div>
        <div class="footer-bottom clearfix">
          <p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?></p>
        </div>
      </footer> <!-- end footer -->
    </div> <!-- end #container -->

    <!-- all js scripts are loaded in library/bones.php -->
    <?php wp_footer(); ?>

  </body>
</html>
