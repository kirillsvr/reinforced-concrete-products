<?php

require_once 'inc/ajax_functions.php';


add_action( 'init', 'true_jquery_register' ); 
function true_jquery_register() {
	if ( !is_admin() ) {
		$theme_uri = get_template_directory_uri();

		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', (  $theme_uri .'/js/jquery-2.1.4.min.js' ), false, null, true );
		wp_enqueue_script( 'jquery' );

		//Підключення стилів
	 	
	 	wp_register_style('reset', $theme_uri.'/styles/reset.css', false, '0.1');
	    wp_enqueue_style('reset');

	    wp_register_style('style', $theme_uri.'/style.css', false, '0.1');
	    wp_enqueue_style('style');

	    
	    wp_register_style('font-awesome', $theme_uri.'/fonts/font-awesome/css/font-awesome.css', false, '0.1');
	    wp_enqueue_style('font-awesome');
	    
	    wp_register_style('animate', $theme_uri.'/styles/animate.css', false, '0.1');
	    wp_enqueue_style('animate');

	    //All pages script
	   	wp_register_script('popup_js', $theme_uri.'/js/popup/dist/jquery.magnific-popup.min.js', array('jquery'), '0.1');
	    wp_enqueue_script('popup_js');
	    wp_register_style('popup_css', $theme_uri.'/js/popup/dist/magnific-popup.css', false, '0.1');
	    wp_enqueue_style('popup_css');

	    //Jquery UI
	    wp_register_style('jquery_ui_style', $theme_uri.'/js/jqueryUi/jquery-ui.min.css', false, '0.1');
	    wp_enqueue_style('jquery_ui_style');
	    wp_register_script('jquery_ui', $theme_uri.'/js/jqueryUi/jquery-ui.min.js', array('jquery'), '0.1');
	    wp_enqueue_script('jquery_ui');

	    wp_register_script('lightslider', $theme_uri.'/js/lightslider/dist/js/lightslider.min.js', array('jquery'), '0.1');
	    wp_enqueue_script('lightslider');
	    wp_register_style('lightslider_style', $theme_uri.'/js/lightslider/dist/css/lightslider.min.css', false, '0.1');
	    wp_enqueue_style('lightslider_style');

	    wp_register_script('lightgallery', $theme_uri.'/js/lightGallery/dist/js/lightgallery.min.js', array('jquery'), '0.1');
	    wp_enqueue_script('lightgallery');
	    wp_register_style('lightgallery_style', $theme_uri.'/js/lightGallery/dist/css/lightgallery.min.css', false, '0.1');
	    wp_enqueue_style('lightgallery_style');


	    /*wp_register_script('qtip', $theme_uri.'/js/qtip/jquery.qtip.min.js', array('jquery'), '0.1');
	    wp_enqueue_script('qtip');
	    wp_register_style('qtip_style', $theme_uri.'/js/qtip/jquery.qtip.min.css', false, '0.1');
	    wp_enqueue_style('qtip_style');*/

	    wp_register_script('bxslider', $theme_uri.'/js/jquery.bxslider/jquery.bxslider.min.js', array('jquery'), '0.1');
	    wp_enqueue_script('bxslider');
	    wp_register_style('bx_style', $theme_uri.'/js/jquery.bxslider/jquery.bxslider.css', false, '0.1');
	    wp_enqueue_style('bx_style');

	    /*wp_register_script('slick', $theme_uri.'/js/slick/slick.min.js', array('jquery'), '0.1');
	    wp_enqueue_script('slick');
	    wp_register_style('slick_style', $theme_uri.'/js/slick/slick.css', false, '0.1');
	    wp_enqueue_style('slick_style');*/

	    /*wp_register_script('tablesorter', $theme_uri.'/js/tablesorter/jquery.tablesorter.min.js', array('jquery'), '0.1');
	    wp_enqueue_script('tablesorter');
	    wp_register_style('tablesorter_style', $theme_uri.'/js/tablesorter/style.css', false, '0.1');
	    wp_enqueue_style('tablesorter_style');

	    wp_register_script('datetimepicker', $theme_uri.'/js/datetimepicker/jquery.datetimepicker.full.min.js', array('jquery'), '0.1');
	    wp_enqueue_script('datetimepicker');
	    wp_register_style('datetimepicker_style', $theme_uri.'/js/datetimepicker/jquery.datetimepicker.css', false, '0.1');
	    wp_enqueue_style('datetimepicker_style');
	    */

	    /*wp_register_style('owl', $theme_uri.'/js/owl-carousel/owl.carousel.css', false, '0.1');
	    wp_enqueue_style('owl');
	    wp_register_style('owl_theme', $theme_uri.'/js/owl-carousel/owl.theme.css', false, '0.1');
	    wp_enqueue_style('owl_theme');
	    wp_register_script('owl_js', $theme_uri.'/js/owl-carousel/owl.carousel.min.js', array('jquery'), '0.1');
	    wp_enqueue_script('owl_js');*/

	    //wp_register_script('countUp', $theme_uri.'/js/countUp.min.js', array('jquery'), '0.1');
	    //wp_enqueue_script('countUp');


	    //wp_register_script('sly', $theme_uri.'/js/sly.min.js', array('jquery'), '0.1');
	    //swp_enqueue_script('sly');

	    //wp_register_script('sticky', $theme_uri.'/js/jquery.sticky.min.js', array('jquery'), '0.1');
	    //wp_enqueue_script('sticky');
	    
	    wp_register_script('sticky_table', $theme_uri.'/js/jquery.stickytableheaders.min.js', array('jquery'), '0.1');
	    wp_enqueue_script('sticky_table');

	    //All pages script
	   	wp_register_script('customjs', $theme_uri.'/js/custom.js', array('jquery'), '0.1');
	    wp_enqueue_script('customjs');


	    wp_register_script('input_mask', $theme_uri.'/js/inputmask/dist/inputmask/jquery.inputmask.min.js', array('jquery'), '0.1');
	    wp_enqueue_script('input_mask');

	}
}

function mytheme_enqueue_front_page_scripts() {
    if( is_front_page() )
    {
        wp_register_script('homejs', get_template_directory_uri().'/js/home.js', array('jquery'), '0.1');
		    wp_enqueue_script('homejs');
    }
}
add_action( 'wp_enqueue_scripts', 'mytheme_enqueue_front_page_scripts' );




//приховування верхньої панелі від користувачів
function themeblvd_disable_admin_bar() { 
	if( ! current_user_can('edit_posts') )
		add_filter('show_admin_bar', '__return_false');	
}
add_action( 'after_setup_theme', 'themeblvd_disable_admin_bar' );
 

function themeblvd_redirect_admin(){
	if ( ! current_user_can( 'edit_posts' ) && $_SERVER['REQUEST_URI'] != '/wp-admin/admin-ajax.php'){
		wp_redirect( site_url() );
		exit;		
	}
}
add_action( 'admin_init', 'themeblvd_redirect_admin' );


function rmgroup_setup(){
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );

	add_image_size('thumbnail-post', 589, 290, true);

	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) );
}	
add_action( 'after_setup_theme', 'rmgroup_setup' );


add_filter( 'image_size_names_choose', 'my_custom_sizes' );
 
function my_custom_sizes( $sizes ) {
    return array_merge( $sizes, array(
        'thumbnail-product' => __( 'для товаров и остального' ),
    ) );
}





function wplift_pagination($query = false) {
    global $wp_query;
    $wp_query = $query ? $query : $wp_query;
    $big = 999999999; // need an unlikely integer
    if($wp_query->max_num_pages > 1){
    	echo '<div class="pagination">';
	    echo paginate_links( array(
	        'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
	        'format' => '?paged=%#%',
	        'current' => max( 1, get_query_var('paged') ),
	        'end_size' => 1,
	        'mid_size' => 1,
	        'prev_text' => '<i class="fa fa-angle-left"></i> <div>Пред</div>',
	        'next_text' => '<div>След</div> <i class="fa fa-angle-right"></i>',
	        'total' => $wp_query->max_num_pages,
	    ) );
	    echo '</div>';
	  }
}




//Подключение меню
function register_my_menus()
{
register_nav_menus
(
	array( 'header_menu1' => 'Главное меню', 'footer_menu' => 'Меню в футере', 'footer_catalog_menu' => 'Меню каталог в футере')
);
}
if (function_exists('register_nav_menus'))
{
	add_action( 'init', 'register_my_menus' );
}




$args = array(
	'name'          => __( 'Sidebar Left', 'theme_text_domain' ),
	'id'            => 'sidebar_left',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id=" %1 " class="widget %2 content-block sidebar-block">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => '</h4>'
);

register_sidebar( $args );

$args = array(
	'name'          => __( 'Sidebar Left Fixed', 'theme_text_domain' ),
	'id'            => 'sidebar_left_fixed',
	'description'   => '',
	'class'         => '',
	'before_widget' => '<div id=" %1 " class="widget %2 sidebar-fixed-block">',
	'after_widget'  => '</div>',
	'before_title'  => '<h4 class="widgettitle">',
	'after_title'   => '</h4>'
);

register_sidebar( $args );



function wpdocs_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );

function wpdocs_custom_excerpt_length( $length ) {
    return 30;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );



if( function_exists('acf_add_options_sub_page') )
{
    acf_add_options_sub_page( 'Site Options' );
}





function show_term_link($id, $taxonomy){
	$term = get_term_by( 'id', $id, $taxonomy );
	return '<a href="'.get_term_link($term, $taxonomy).'">'.$term->name.'</a>';
}





function the_telephone(){
	$str = get_field('opt_telephone', 'options');
	echo '<span>'.substr($str, 0, 5).'</span>'.substr($str, 5);
}













// Register Custom Post Type
function register_products() {

	$labels = array(
		'name'                => _x( 'Каталог', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Товары', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Товары', 'text_domain' ),
		'name_admin_bar'      => __( 'Товары', 'text_domain' ),
		'parent_item_colon'   => __( 'Родительский товар', 'text_domain' ),
		'all_items'           => __( 'Все товары', 'text_domain' ),
		'add_new_item'        => __( 'Добавить новый товар', 'text_domain' ),
		'add_new'             => __( 'Добавить новый', 'text_domain' ),
		'new_item'            => __( 'Новый товар', 'text_domain' ),
		'edit_item'           => __( 'Редактировать', 'text_domain' ),
		'update_item'         => __( 'Обновить', 'text_domain' ),
		'view_item'           => __( 'Посмотреть', 'text_domain' ),
		'search_items'        => __( 'Search Item', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Товар', 'text_domain' ),
		'description'         => __( 'Post Type Description', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor'),
		'hierarchical'        => true,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 10,
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'post',
		'rewrite' => array(
			'slug' => 'katalog'
		)
	);
	register_post_type( 'product', $args );


}

// Hook into the 'init' action
add_action( 'init', 'register_products', 0 );



// Register Custom Taxonomy
function create_taxonomies() {

	$labels = array(
		'name'                       => _x( 'Вид продукции', 'Taxonomy General Name', 'dental_theme' ),
		'singular_name'              => _x( 'Виды продукции', 'Taxonomy Singular Name', 'dental_theme' ),
		'menu_name'                  => __( 'Виды продукции', 'dental_theme' ),
		'all_items'                  => __( 'Все виды', 'dental_theme' ),
		'parent_item'                => __( 'Родительский вид', 'dental_theme' ),
		'parent_item_colon'          => __( 'Родительский вид продукции:', 'dental_theme' ),
		'new_item_name'              => __( 'Новый вид продукции', 'dental_theme' ),
		'add_new_item'               => __( 'Добавить новый вид продукции', 'dental_theme' ),
		'edit_item'                  => __( 'Редактировать вид продукции', 'dental_theme' ),
		'update_item'                => __( 'Обновить вид продукции', 'dental_theme' ),
		'view_item'                  => __( 'Посмотреть вид продукции', 'dental_theme' ),
		'separate_items_with_commas' => __( 'Separate categories with commas', 'dental_theme' ),
		'add_or_remove_items'        => __( 'Добавить или удалить виды продукции', 'dental_theme' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'dental_theme' ),
		'popular_items'              => __( 'Popular categories', 'dental_theme' ),
		'search_items'               => __( 'Search categories', 'dental_theme' ),
		'not_found'                  => __( 'Not Found', 'dental_theme' ),
		'no_terms'                   => __( 'No categories', 'dental_theme' ),
		'items_list'                 => __( 'Categories list', 'dental_theme' ),
		'items_list_navigation'      => __( 'Categories list navigation', 'dental_theme' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => false,
		'rewrite' => array(
        'slug' => 'product-category',
    )
	);
	register_taxonomy( 'product_category', array( 'product' ), $args );


}
add_action( 'init', 'create_taxonomies', 0 );








function wpa60728_pre_get_posts( $query ) {
	if(!is_admin() && (is_archive() || is_tax('product_category')) && $query->is_main_query() && !is_category()){
		

		if(is_tax('product_category')){
			$posts_per_page = -1;
			$query->set( 'posts_per_page', $posts_per_page );
			$query->set( 'order', 'ASC' );
			$query->set( 'orderby', 'title' );
			/*$query->set( 'orderby', 'meta_value_num' );
			if(isset($_GET['price'])){
				$query->set( 'meta_key', 'price' );
				if($_GET['price'] == 'up'){
					$query->set( 'order', 'ASC' );
				}else{
					$query->set( 'order', 'DESC' );
				}
			}else{
				$query->set( 'meta_key', 'position_number' );
				$query->set( 'order', 'DESC' );
			}*/
		}
	}
		
}

add_action( 'pre_get_posts', 'wpa60728_pre_get_posts' );




function the_short_title(){
	if($title = get_field('short_title')){
		echo $title;
	}else{
		the_title();
	}
}


function the_social_link($field, $fa){
	if($link = get_field($field, 'options')) : ?>
		<li>
			<a href="<?=$link?>" target="_blank"><i class="fa fa-<?=$fa?>"></i></a>
		</li>
	<?php endif;
}