<!--<div id="post---><?php //the_ID(); ?><!--" --><?php //post_class('blog-lg-area-left'); ?>
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
<!--</div>-->

