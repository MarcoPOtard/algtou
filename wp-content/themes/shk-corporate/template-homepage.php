<?php
/**
Template Name: Home Page Algérie Tours
 */
get_header();
		//****** get index static banner  ********
		get_template_part('index', 'slider');

		//****** Texte de la page d'accueil ********
			if( $post->post_content != "" ) {
			    if( have_posts()) :  the_post();
			        the_content();
				endif;
			}
//<!--        get_template_part('index', 'text-home');-->

		//****** get index Programme personnalisé  ********
		get_template_part('index', 'news');

        //****** get index informations utiles  ********
		get_template_part('index', 'usefull-informations');


		//****** Orange Sidebar Area ********
//		get_sidebar('orange');
		//****** get index service  ********
//		get_template_part('index', 'service');

		//****** get Home call out
//		get_template_part('index','home-callout');


		get_footer();
?>