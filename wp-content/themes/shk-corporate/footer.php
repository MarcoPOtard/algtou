<!-- Footer Section -->
<?php
//****** get index partenaires  ********
get_template_part('index', 'partners');


$appointment_options=theme_setup_data();
$footer_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
if ( is_active_sidebar( 'footer-widget-area' ) ) { ?>
<div class="footer-section">
	<div class="container">	
		<div class="row footer-widget-section">
			<?php  dynamic_sidebar( 'footer-widget-area' );	} ?>	
			<div class="clearfix"></div>
		</div>
	</div>
</div>
<!-- /Footer Section -->
<div class="clearfix"></div>
<!-- Footer Copyright Section -->
<div class="footer-copyright-section">
	<div class="container">
        <div class="footer-top">
            <div class="footer-top-logo">
                <a href="/" title="Algérie Tours - Créateur de voyage"><img src="/wp-content/themes/shk-corporate/images/logo-algerie-tours-blanc-long.png" alt="logo Algérie Tours"> </a>
            </div>
            <div class="footer-top-menu">
                <?php
                wp_nav_menu ( array (
                    'theme_location' => 'footer-menu' ,
                    'container' => false,
                    'menu_class' => 'footer-menu'
                ) );
                ?>
            </div>
            <div class="footer-top-menu-second">
                <?php
                wp_nav_menu ( array (
                    'theme_location' => 'footer-menu-secondary' ,
                    'container' => false,
                    'menu_class' => 'footer-menu-secondary'
                ) );
                ?>
            </div>
        </div>
        <div class="footer-bottom">
            <?php if($footer_setting['footer_social_media_enabled'] == 0 ) {
                $footer_facebook = $footer_setting['footer_social_media_facebook_link'];
                $footer_twitter = $footer_setting['footer_social_media_twitter_link'];
                $footer_linkdin = $footer_setting['footer_social_media_linkedin_link'];
                $footer_googleplus = $footer_setting['footer_social_media_googleplus_link'];
                $footer_skype = $footer_setting['footer_social_media_skype_link'];
                ?>
                <ul class="footer-contact-social">
                    <?php if($footer_setting['footer_social_media_facebook_link']!='') { ?>
                    <li class="facebook"><a href="<?php echo esc_url($footer_facebook); ?>" <?php if($footer_setting['footer_facebook_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-facebook"></i></a></li>
                    <?php } if($footer_setting['footer_social_media_twitter_link']!='') { ?>
                    <li class="twitter"><a href="<?php echo esc_url($footer_twitter); ?>" <?php if($footer_setting['footer_twitter_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-twitter"></i></a></li>
                    <?php } if($footer_setting['footer_social_media_linkedin_link']!='') { ?>
                    <li class="linkedin"><a href="<?php echo esc_url($footer_linkdin); ?>" <?php if($footer_setting['footer_linkedin_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-pinterest"></i></a></li>
                    <?php } if($footer_setting['footer_social_media_googleplus_link']!='') { ?>
                    <li class="googleplus"><a href="<?php echo esc_url($footer_googleplus); ?>" <?php if($footer_setting['footer_googleplus_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-google-plus"></i></a></li>
                    <?php } if($footer_setting['footer_social_media_skype_link']!='') { ?>
                    <li class="skype"><a href="<?php echo esc_url($footer_skype); ?>" <?php if($footer_setting['footer_skype_media_enabled']==1){ echo "target='_blank'"; } ?> ><i class="fa fa-instagram"></i></a></li>
                    <?php } ?>
                </ul>
                <br>
            <?php } ?>

            <div class="footer-copyright">
                <?php
                if( $footer_setting['footer_menu_bar_enabled'] == 0) {
                    echo "<p>".$footer_setting[ 'footer_copyright_text']."</p>";
                } ?>
                <p>Central Canebière - 10, rue de la République - 13001 Marseille - France.</p>
                <p>Immatriculation : IM013140023</p>

            </div>


        </div>
	</div>
</div>
<!-- /Footer Copyright Section -->
<!--Scroll To Top--> 
<a href="#" class="hc_scrollup"><i class="fa fa-chevron-up"></i></a>
<!--/Scroll To Top--> 
<?php wp_footer(); ?>
</body>
</html>