<?php

/**
 * theme_wp_setup
 * setup dasar untuk konfigurasi theme
 */
function theme_wp_setup()
{
  add_theme_support('automatic-feed-links');
    //nambah support ini
  add_theme_support('html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
  ));
    // pengganti tag <title></title>
  add_theme_support('title-tag');

    // mengaktifkan post thumbnail
  add_theme_support('post-thumbnails');

  /* Register Menu */
  register_nav_menus(array(
    'primary_menu' => 'Primary Menu', 
    'information' => 'Information Menu',
    'footer' => 'Footer Menu',
    
  ));

  
  
}

add_action('after_setup_theme', 'theme_wp_setup');

add_image_size( 'test', 150, 150, true );

/**
 * Menambahkan Scipts Javascript dan CSS
 */
function theme_wp_scripts()
{
    /*
     * Adds JavaScript to pages with the comment form to support
     * sites with threaded comments (when in use).
     */
    if (is_singular() && comments_open() && get_option('thread_comments')) {
      wp_enqueue_script('comment-reply');
    }

    wp_enqueue_style('nasa_jsc-style-css', get_template_directory_uri() . '/style.css');
    
    
    // style.css
    wp_enqueue_style('customize-style', get_stylesheet_uri());
    
    /**
     * JAVASCRPIPT
     */
    // jquery di js/jquery
    // wp_enqueue_script(
    //     'jquery-script', get_template_directory_uri() . '/js/jquery.min.js', array(), '', true);
    // wp_enqueue_script(
    //     'bootstrap-script',
    //     get_template_directory_uri() . '/js/bootstrap.min.js', array(), '', true);
    // wp_enqueue_script(
    //     'cleanblog-script',
    //     get_template_directory_uri() . '/js/clean-blog.min.js', array(), '', true);
  }



  add_action('wp_enqueue_scripts', 'theme_wp_scripts');


  function widgets_init() {
   register_sidebar( array(
    'name' => __( 'Sidebar', 'wedevs' ),
    'id' => 'sidebar-1',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h6 class="widget-title">',
    'after_title' => '</h6>',
  ) );
 }

 add_action( 'widgets_init', 'widgets_init' );


/**
 * @param  $more from global variable
 * mengganti tanda '[...]' menjadi '....'
 */
function new_excerpt_more($more)
{
  return '....';
}

add_filter('excerpt_more', 'new_excerpt_more');

// custom wp_nav_menu untuk nav-bar bootstrap
//require get_template_directory() . '/bootstrap-walker.php';

function add_classes_on_li($classes, $item, $args) {

  $classes[] = 'list-group-item';

  if( $args->theme_location == 'information' )
    return $classes;
}
add_filter('nav_menu_css_class','add_classes_on_li',1,3);

function wpse_page_category() {
  register_taxonomy_for_object_type( 'category', 'page' );    
}
add_action( 'init', 'wpse_page_category', 999  );



/* materi Custom post type dan metaBox */

function cw_post_type_book() {

  $supports = array(
    'title', // post title
    'editor', // post content
    'author', // post author
    'thumbnail', // featured images
    'revisions', // post revisions
    'post-formats', // post formats
    'metabox',
    'page-attributes'
  );
  
  $labels = array(
    'name' => _x('book', 'plural'),
    'singular_name' => _x('book', 'singular'),
    'menu_name' => _x('book', 'admin menu'),
    'name_admin_bar' => _x('book', 'admin bar'),
    'add_new' => _x('Add New', 'add new'),
    'add_new_item' => __('Add New book'),
    'new_item' => __('New book'),
    'edit_item' => __('Edit book'),
    'view_item' => __('View book'),
    'all_items' => __('All book'),
    'search_items' => __('Search book'),
    'not_found' => __('No news found.'),
  );
  
  $args = array(

    'supports' => $supports, //manggil dari variabel support
    'labels' => $labels,
    'public' => true,
    'menu-icon' => 'dashicons-star-half',
    'query_var' => true,
    'rewrite' => array('slug' => 'book'),
    'has_archive' => true,
    'hierarchical' => true,
    
  );
  register_post_type('book', $args);
  flush_rewrite_rules();
}
add_action('init', 'cw_post_type_book');
flush_rewrite_rules();

    //mendaftarkan metabox

function wp_register_metabox(){

  add_meta_box("nasa2-page-id", " MetaBox ","wp_nasa2_pages_function", "book","normal", "high");
}

add_action("add_meta_boxes","wp_register_metabox");

function wp_nasa2_pages_function(){

  global $post;
  $meta = get_post_meta($post->ID,"book_publisher_name", true); 
        //var_dump($meta);

  
  ?>
  <!-- <p>hmmm</p> -->
  <div> 
    <label for="txtNamaPublisher">Publisher Nama</label>
    <?php 
    $publisher_nama = get_post_meta($post->ID,"book_publisher_name", true);
    ?>

    <input type="text" name="txtNamaPublisher" value="<?php echo $publisher_nama; ?>" placeholder="Publisher Nama"/>
  </div>

  <div>
    <label for="rating">Rating </label>
    
    <?php 
    $rating = get_post_meta($post->ID,"rating_book", true);
    ?>
    
    <input type="number" name="rating" min="1" max="10" value="<?php echo $rating; ?>" placeholder="Rating Buku"/>
  </div>
  
  <div>
    <label for="user-wp" class="user-wp">Author</label>
    <select name="user-wp" id="user-wp">
      <option value="red" <?php selected( $selected, 'red'); ?>> Red</option>
      <option value="blue" <?php selected( $selected, 'blue'); ?>> Blue</option>

    </select>
  </div>





  <div>
    <label for="genre-wp" class="genre-wp"><?php _e( 'Pilih Genre', 'genre-wp' )?></label>
    
    <?php
	    // Create and display the dropdown menu.
    wp_dropdown_categories(
     array(

	    'taxonomy'        => 'Genre', // Only include posts with the taxonomy of 'tools'.
	    'name'            => 'Genre', // Change this to the

   ) );
   ?>

 </div>

 

 <?php
}

add_action("save_post", "wp_nasa2_save_metabox_data",10,2);


     // fungsi simpan metabox

function wp_nasa2_save_metabox_data($post_id, $post){

  $post_slug = "book";
  if ($post_slug != $post->post_type){
    return;
  }
  
  $pub_name = '';
  if(isset($_POST['txtNamaPublisher'])){
    $pub_name = $_POST['txtNamaPublisher'];
  }else{
    $pub_name = '';
  }

  $rt = '';
  if(isset($_POST['rating'])){
    $rt = $_POST['rating'];
  }else{
    $rt = '';
  }

  $userwp = '';
  if(isset($_POST['user-wp'])){
    $userwp = $_POST['user-wp'];
  }else{
    $userwp = '';
  }

  update_post_meta($post_id,"book_publisher_name",$pub_name);
  update_post_meta($post_id,"rating_book",$rt);
  update_post_meta($post_id,"user-wp",$userwp);
}

/* bagian taxonomy custom */


add_action( 'init', 'crunchify_create_deals_custom_taxonomy',0);


function crunchify_create_deals_custom_taxonomy() {

  $labels = array(
    'name' => _x( 'Genre', 'taxonomy general name' ),
    'singular_name' => _x( 'Genre', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Genre' ),
    'all_items' => __( 'All Genre' ),
    'parent_item' => __( 'Parent Genre' ),
    'parent_item_colon' => __( 'Parent Genre:' ),
    'edit_item' => __( 'Edit Genre' ), 
    'update_item' => __( 'Update Genre' ),
    'add_new_item' => __( 'Add New Genre' ),
    'new_item_name' => __( 'New Genre Name' ),
    'menu_name' => __( 'Genre' ),
  ); 	
  
  register_taxonomy('Genre',array('book'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    //'rewrite' => array( 'slug' => 'book' ),
  ));
}

//nambah kolom di wp admin

add_filter( 'manage_book_posts_columns', 'nasa2_filter_posts_columns' );
function nasa2_filter_posts_columns( $columns ) {
  $columns['image'] = __( 'Image' );
  $columns['Publisher'] = __( 'Publisher', 'nasa2' );
  $columns['Rating'] = __( 'Rating', 'nasa2' );
 // $columns['Category'] = __( 'Category', 'nasa2' );
  return $columns;
}

add_action( 'manage_book_posts_custom_column', 'smashing_realestate_column', 10, 2);
function smashing_realestate_column( $column, $post_id ) {

  // bagian kolom admin
  if ( 'image' === $column ) {
    echo get_the_post_thumbnail( $post_id, array(80, 80) );
  }
  if ('Publisher' === $column ){
    echo get_post_meta($post_id, "book_publisher_name", true); 
  }
  if ('Rating' === $column){
    echo get_post_meta($post_id, "rating_book", true); 
  }
  
}

function SearchFilter($query) {
    // If 's' request variable is set but empty
  if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
    $query->is_search = true;
    $query->is_home = false;
  }
  return $query;}
  add_filter('pre_get_posts','SearchFilter');


  function nasa2_admin_notices() {
    echo '<div class="error"><p>Selamat datang Happy Coding coy !</p></div>';
  }
  add_action('admin_notices', 'nasa2_admin_notices');



  // masukin 
  include( get_template_directory() . '/inc/theme-customizer.php');
  // aktifkan
  add_action('customize_register', 'nasa2_customize_register');

