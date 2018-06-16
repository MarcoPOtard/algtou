<!-- Slider Section -->	
<?php 
$appointment_options=theme_setup_data(); 
$slider_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options);
if($slider_setting['home_banner_enabled'] == 0 ) {
    ?>
    <div class="blog-section section-background">
        <div class="container">

            <!-- Section Title -->
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading-title">
                        <h2>Nos partenaires</h2>
                    </div>
                </div>
            </div>

            <div class="home-carousel-partners">
                <div id="carousel-partners" class="carousel slide <?php echo $slider_setting['slider_options']; ?> multi-item-carousel"data-ride="carousel" data-interval="2000" >
                    <!-- Indicators -->
                    <?php
                        $query_args = array( 'cat' => 7);
                        $t=true;

                        $the_query = new WP_Query($query_args);
                    ?>
                    <div class="carousel-inner" role="listbox">
                        <?php
                        //echo '<pre>';print_r($the_query); wp_die();
                        if ( $the_query->have_posts() ) {
                            while ( $the_query->have_posts() ) {
                                $the_query->the_post();

                                ?>
                                <div class="item <?php if($t==true){echo 'active';}$t=false; ?>">
                                    <div class="col-xs-4">
                                        <?php
                                        $default_arg =array('class' => "img-responsive");
                                        if(has_post_thumbnail()){
                                            the_post_thumbnail('', $default_arg);
                                        }
                                        if(!has_post_thumbnail()){
                                            echo '<img class="img-responsive" src="'.WEBRITI_TEMPLATE_DIR_URI.'/images/slide/no-image.jpg">';
                                        }
                                        ?>
                                    </div>
                                </div>
                                <?php
                            }
                            wp_reset_postdata();
                        }
                        ?>

                    </div>
                    <!-- Pagination -->
                    <?php
                    if($i>1){ ?>
                        <ul class="carou-direction-nav">
                            <li><a class="carou-prev" href="#carousel-example-generic" data-slide="prev"></a></li>
                            <li><a class="carou-next" href="#carousel-example-generic" data-slide="next"></a></li>
                        </ul>
                        <?php
                    } ?>
                    <!-- /Pagination -->
                </div>
                <!-- /Slider Section -->
            </div>
        </div>
    </div>
<?php } ?>