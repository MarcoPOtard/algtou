<?php
$appointment_options=theme_setup_data();
$news_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options );
if($news_setting['home_blog_enabled'] == 0 ) { ?>
<div class="blog-section section-background">
	<div class="container">
	
		<!-- Section Title -->
		<div class="row">
			<div class="col-md-12">
				<div class="section-heading-title">
					<h2><?php echo $news_setting['blog_heading']; ?></h2>
					<p><?php echo $news_setting['blog_description']; ?></p>
				</div>
			</div>
		</div>
		<!-- /Section Title -->
		
		<div class="index-news-block-container">
            <?php

            $cat_id = array();
            $cat_id = $news_setting['blog_selected_category_id'];
            $no_of_post = $news_setting['post_display_count'];

            $args = array( 'post_type' => 'post','ignore_sticky_posts' => 1 , 'category__in' => $cat_id, 'posts_per_page' => $no_of_post);
            $news_query = new WP_Query($args);

            $i=1;
            while($news_query->have_posts() ) : $news_query->the_post();
			    if ($i <= 3) {
                    ?>
                        <div class="index-news-block">

                            <div class="inb-picture">
                                <?php $defalt_arg =array('class' => "img-responsive"); ?>
                                <?php if(has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('', $defalt_arg); ?>
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