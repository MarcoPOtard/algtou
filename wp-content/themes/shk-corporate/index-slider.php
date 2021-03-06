<!-- Slider Section -->	
<?php 
$appointment_options=theme_setup_data(); 
$slider_setting = wp_parse_args(  get_option( 'appointment_options', array() ), $appointment_options);
if($slider_setting['home_banner_enabled'] == 0 ) {

?>
<div class="homepage-mycarousel">
    <div id="carousel-example-generic" class="carousel slide <?php echo $slider_setting['slider_options']; ?>"data-ride="carousel"
        <?php if($slider_setting['slider_transition_delay'] != '') { ?> data-interval="<?php echo $slider_setting['slider_transition_delay']; } ?>" >
        <!-- Indicators -->
            <?php
                $query_args = array();

                $featured_slider_post = $slider_setting['featured_slider_post'];

                $slider_select_category = array();
                $slider_select_category = $slider_setting['slider_select_category' ];

                if (pll_current_language() == 'fr') {
                    $query_args = array( 'category__in'  => $slider_select_category,'ignore_sticky_posts' => 1 ,'posts_per_page' =>$featured_slider_post);
                } elseif (pll_current_language() == 'en') {
                    $catIdInt = (int)$slider_select_category[0];
                    $catIdEn = pll_get_term($catIdInt);
                    $catIdEnString = (string)$catIdEn;
                    $query_args = array( 'category__in'  => $catIdEnString,'ignore_sticky_posts' => 1 ,'posts_per_page' =>$featured_slider_post);

                }


                $t=true;

                $the_query = new WP_Query($query_args);

            ?>
                <ol class="carousel-indicators">
                    <?php
                    $i=0;
                    if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                    $the_query->the_post();  ?>
                    <li data-target="#carousel-example-generic" data-slide-to="<?php echo $i;?>" class="<?php if($i==0){ echo 'active';} ?>"></li>
                <?php $i++; } }?>
                </ol>
            <div class="carousel-inner" role="listbox">
                <?php
                //echo '<pre>';print_r($the_query); wp_die();
                if ( $the_query->have_posts() ) {
                    while ( $the_query->have_posts() ) {
                        $the_query->the_post();

                        ?>
                        <div class="item <?php if($t==true){echo 'active';}$t=false; ?>">
                            <?php $default_arg =array('class' => "img-responsive"); ?>
                            <?php if(has_post_thumbnail()){
                                the_post_thumbnail('', $default_arg);
                            }
                            if(!has_post_thumbnail()) {
                                 echo '<img class="img-responsive" src="'.WEBRITI_TEMPLATE_DIR_URI.'/images/slide/no-image.jpg">'; ?>
                                 <div class="container slide-caption">
                                    <?php
                                    if($post->post_title !="") {
                                        ?>
                                        <div class="slide-text-bg1"><h2><?php the_title();?></h2></div>
                                        <?php
                                    }
                                    if($post->post_content !="") {
                                        echo get_the_excerpt();
                                    }?>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="container slide-caption">
                                 <?php
                                 if($post->post_title !="") {?>
                                    <div class="slide-text-bg1"><h2><?php the_title();?></h2></div>
                                    <?php
                                 }
                                if($post->post_content !="") {
                                    echo the_content();
                                 }?>
                                </div>
                                <?php
                            } ?>
                        </div>
                        <?php
                    } wp_reset_postdata();
                }  ?>
        </div>
        <!-- Pagination -->
        <?php  if($i>1){ ?>
        <ul class="carou-direction-nav">
            <li><a class="carou-prev" href="#carousel-example-generic" data-slide="prev"></a></li>
            <li><a class="carou-next" href="#carousel-example-generic" data-slide="next"></a></li>
        </ul>
        <?php } ?>
        <!-- /Pagination -->
    </div>
</div>
<!-- /Slider Section -->

    <?php
    $id_accueil = get_option('page_on_front');
    $text_under_slider = get_post_meta( $id_accueil, 'home_texte_sous_slider', true );
    $anchor_under_slider = get_post_meta( $id_accueil, 'home_texte_lien_sous_slider', true );
    $mail_under_slider = get_post_meta( $id_accueil, 'home_texte_mail_sous_slider', true );
    $phone_under_slider = get_post_meta( $id_accueil, 'home_texte_phone_sous_slider', true );
    $phone_under_slider_change = '+33(0)'.substr(str_replace('.','', $phone_under_slider), 1);
        if (pll_current_language() == 'fr') {
            $thePage = 20;
        } else {
            $thePage = 413;
        }


    ?>
    <div class="home-big-cta">
        <a href="mailto:<?php echo $mail_under_slider ?>" class="home-big-cta-mail"><?php echo $mail_under_slider ?></a>
        <p class="home-big-cta-text"><?php echo $text_under_slider; ?></p>
        <a href="<?php echo get_page_link($thePage); ?>" class="home-big-cta-cta"><?php echo $anchor_under_slider; ?></a>
        <a href="tel:<?php echo $phone_under_slider_change; ?>" class="home-big-cta-phone"><?php echo $phone_under_slider; ?></a>
    </div>
<?php } ?>