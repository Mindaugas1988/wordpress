<?php
include('my_widgets/recent_posts.php');
include('my_widgets/recent_comments.php');

function load_scripts(){
    wp_enqueue_style( 'reset', get_template_directory_uri().'/css/reset.css',$media = 'all' );
    wp_enqueue_style( 'tamplate', get_template_directory_uri().'/css/style.css',$media = 'all' );
};


add_theme_support( 'post-thumbnails' );


add_action( 'widgets_init', 'theme_slug_widgets_init' );
function theme_slug_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Main Sidebar', 'theme-slug' ),
        'id' => 'master_sidebar',
        'description' => 'Her Sidebar. You can add widget',
        'before_widget' => '<div  class="widget_wrapper">',
        'after_widget'  => '</div>',
	     'before_title'  => '<img src="'.get_template_directory_uri().'/images/arrow.png"/><h6 class="widget_title">',
	     'after_title'   => '</h6>',
    ) );
}


add_filter( 'get_search_form', 'my_search_form' );
function my_search_form($form) {
    $home = esc_url( home_url( '/' ) );
    $form = '<div id="srch">
          <form role="search" method="get" id="searchform" class="searchform" action="'.$home.'">
            <input type="search" placeholder="Paieška..." value="" name="s" id="search" required/>
    				<input type="image" id="searchsubmit" value="" />
    			</form>
      </div>';

    return $form;
}





function wpdocs_custom_excerpt_length( $length ) {
    return 5;
}
add_action('wp_enqueue_scripts','load_scripts');
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );


?>
