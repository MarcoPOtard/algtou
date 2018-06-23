<?php
$id_accueil = get_option('page_on_front');
$post_accueil = get_post($id_accueil);
$post_accueil_title = $post_accueil -> post_title;

$our_program_title = get_post_meta( $id_accueil, 'home_programmes_personnalisés_titre', true );
$our_program_category = get_post_meta( $id_accueil, 'home_programmes_personnalisés_categorie', true );

$id_category = get_cat_ID( $our_program_category );


$appointment_options=theme_setup_data();
$news_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
if($news_setting['home_blog_enabled'] == 0 ) { ?>
<div class="blog-section section-background">
	<div class="container">
	
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-heading-title">
					<h2><?php echo $our_program_title; ?></h2>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		
		<div class="index-news-block-container">
            <?php

            $args = array( 'post_type' => 'post','ignore_sticky_posts' => 1 , 'cat' => $id_category, 'posts_per_page' => 3);
            $news_query = new WP_Query($args);

            $i=1;
            while($news_query->have_posts() ) : $news_query->the_post();
			    if ($i <= 3) {
                    ?>
                        <div class="index-news-block">

                            <div class="inb-picture">
                                <?php if(has_post_thumbnail()): ?>
                                <?php appointment_post_thumbnail('','img-responsive'); ?>
                                <?php endif; ?>
                            </div>
                            <div class="inb-infos">
                                <?php $appointment_options=theme_setup_data();
                                  $news_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
                                if($news_setting['home_meta_section_settings'] == '' ) { ?>

                                    <?php
                                }
                                $inb_price = get_post_meta( get_the_ID(), 'sejour_prix', true );
                                $inb_infos_comp = get_post_meta( get_the_ID(), 'sejour_info_complementaire', true );
                                $inb_date = get_post_meta( get_the_ID(), 'sejour_date_duree', true );

                                ?>
                                <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                <?php
                                if($inb_price != '') {
                                    ?>
                                    <p class="inb-i-price"><?php echo $inb_price; ?></p>
                                    <?php
                                }
                                ?>
                                <?php
                                if($inb_date != '' && $inb_infos_comp != '') {
                                    ?>
                                    <p class="">
                                        <?php echo ($inb_date != '') ? $inb_date . '<br>' : ''; ?>
                                        <?php echo ($inb_infos_comp != '') ? $inb_infos_comp : ''; ?>
                                    </p>
                                    <?php
                                }
                                ?>

                                <div class="inb-button">
                                    <a href="<?php the_permalink(); ?>" class="at-btn-more"><?php _e("Read +","shk-corporate"); ?></a>
                                </div>
                                <?php
                                ?>
                            </div>
                        </div>
                    <?php
                      $i++;
                      wp_reset_postdata();
                }
			endwhile;
            $sejours_ID = get_category_by_slug( 'destinations' )->cat_ID;
            $sejours_link = get_category_link( $sejours_ID )
            ?>

	    </div>
        <div class="section-programs-button">
            <a href="<?php echo $sejours_link; ?>" class="at-btn-all"><?php _e("See all our programs","shk-corporate");?></a>
        </div>
	</div>
<?php } ?>
</div>