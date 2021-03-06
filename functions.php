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
    //wp_enqueue_style('customize-style', get_stylesheet_uri());
    
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
  return $query;
}
add_filter('pre_get_posts','SearchFilter');


  // function nasa2_admin_notices() {
  //   echo '<div class="error"><p>Selamat datang Happy Coding coy !</p></div>';
  // }
  // add_action('admin_notices', 'nasa2_admin_notices');



  // masukin 
include( get_template_directory() . '/inc/theme-customizer.php');
  // // aktifkan


add_action('customize_register', 'nasa2_customize_register');

  // nambah fungsi enque
function scripts_customizer(){
  wp_enqueue_script('custom', get_template_directory_uri().'/js/custom.js', array('jquery', '
    customize_preview'));
}
add_action('customize_preview_init', 'scripts_customizer');


//fungsi nambah menu

function admin_add_admin_page() {

  //Generate admin Admin Page
  add_menu_page( 'admin Theme Options', 'admin', 'manage_options', 'admin_page', 'admin_theme_create_page');
  
  //Generate admin Admin Sub Pages
  // add_submenu_page( 'admin_page', 'admin Theme Options', 'General', 'manage_options', 'admin_page', 'admin_theme_create_page' );
  // add_submenu_page( 'admin_page', 'admin CSS Options', 'Custom CSS', 'manage_options', 'admin_page_css', 'admin_theme_settings_page');
  
  
  
}
add_action( 'admin_menu', 'admin_add_admin_page' );

//Activate custom settings
add_action( 'admin_init', 'admin_custom_settings' );

function admin_custom_settings() {
  register_setting( 'admin-settings-group', 'first_name' );
  add_settings_section( 'admin-sidebar-options', 'Sidebar Option', 'admin_sidebar_options', 'admin_page');
  add_settings_field( 'sidebar-name', 'First Name', 'admin_sidebar_name', 'admin_page', 'admin-sidebar-options');
}

    function admin_sidebar_options() {
       echo 'Customize your Sidebar Information';
    }

    function admin_sidebar_name() {
      $firstName = esc_attr( get_option( 'first_name' ) );
        echo '<input type="text" name="first_name" value="'.$firstName.'" placeholder="First Name" />';
    }


    function admin_theme_create_page() {
      require_once( get_template_directory() . '/inc/min.php' );
    }

    function admin_theme_settings_page() {

      echo '<h1>admin Custom CSS</h1>';
      
    }




add_action('admin_init', 'add_meta_boxes', 1);

function add_meta_boxes() {
  add_meta_box( 'repeatable-fields', 'Coba Metabox Acc', 'repeatable_meta_box_display', 'post', 'normal', 'high');
}
function repeatable_meta_box_display() {
  global $post;
  $repeatable_fields = get_post_meta($post->ID, 'repeatable_fields', true);


  var_dump($repeatable_fields);

  wp_nonce_field( 'repeatable_meta_box_nonce', 'repeatable_meta_box_nonce' );
?>
  <script type="text/javascript">
jQuery(document).ready(function($) {
  $('.metabox_submit').click(function(e) {
    e.preventDefault();
    $('#publish').click();
  });
  $('#add-row').on('click', function() {
    var row = $('.empty-row.screen-reader-text').clone(true);
    row.removeClass('empty-row screen-reader-text');
    row.insertBefore('#repeatable-fieldset-one tbody>tr:last');
    return false;
  });
  $('.remove-row').on('click', function() {
    $(this).parents('tr').remove();
    return false;
  });
  // $('#repeatable-fieldset-one tbody').sortable({
  //   opacity: 0.6,
  //   revert: true,
  //   cursor: 'move',
  //   handle: '.sort'
  // });
});
  </script>

  <table id="repeatable-fieldset-one" width="100%">
  <thead>
    <tr>
      <th width="2%"></th>
      <th width="30%">Title</th>
      <th width="60%">Desc</th>
      <th width="2%"></th>
    </tr>
  </thead>
  <tbody>
  <?php
  if ( $repeatable_fields ) :
    foreach ( $repeatable_fields as $field ) {
?>
  <tr>
    <td><a class="button remove-row" href="#">-</a></td>
    <td><input type="text" class="widefat" name="title[]" value="<?php if($field['title'] != '') echo esc_attr( $field['title'] ); ?>" /></td>

    <td><input type="text" class="widefat" name="desc[]" value="<?php if ($field['desc'] != '') echo esc_attr( $field['desc'] ); else echo ''; ?>" /></td>
    <td><!-- <a class="sort">|||</a> --></td>
    
  </tr>
  <?php
    }
  else :
    // show a blank one
?>
  <tr>
    <td><a class="button remove-row" href="#">-</a></td>
    <td><input type="text" class="widefat" name="title[]" /></td>


    <td><input type="text" class="widefat" name="desc[]" value="" /></td>
<td><!-- <a class="sort">|||</a> --></td>
    
  </tr>
  <?php endif; ?>

  <!-- empty hidden one for jQuery -->
  <tr class="empty-row screen-reader-text">
    <td><a class="button remove-row" href="#">-</a></td>
    <td><input type="text" class="widefat" name="title[]" /></td>


    <td><input type="text" class="widefat" name="desc[]" value="" /></td>
<td><!-- <a class="sort">|||</a> --></td>
    
  </tr>
  </tbody>
  </table>

  <p><a id="add-row" class="button" href="#">Add another</a>
  <input type="submit" class="metabox_submit" value="Save" />
  </p>
  
  <?php
}
add_action('save_post', 'repeatable_meta_box_save');

function repeatable_meta_box_save($post_id) {
  if ( ! isset( $_POST['repeatable_meta_box_nonce'] ) ||
    ! wp_verify_nonce( $_POST['repeatable_meta_box_nonce'], 'repeatable_meta_box_nonce' ) )
    return;
  if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
    return;
  if (!current_user_can('edit_post', $post_id))
    return;
  $old = get_post_meta($post_id, 'repeatable_fields', true);
  $new = array();
  $names = $_POST['title'];
  $urls = $_POST['desc'];
  $count = count( $names );
  for ( $i = 0; $i < $count; $i++ ) {
    if ( $names[$i] != '' ) :
      $new[$i]['title'] = stripslashes( strip_tags( $names[$i] ) );
    if ( $urls[$i] == '' )
      $new[$i]['desc'] = '';
    else
      $new[$i]['desc'] = stripslashes( $urls[$i] ); // and however you want to sanitize
    endif;
  }
  if ( !empty( $new ) && $new != $old )
    update_post_meta( $post_id, 'repeatable_fields', $new );
  elseif ( empty($new) && $old )
    delete_post_meta( $post_id, 'repeatable_fields', $old );
}


// add_filter('show_admin_bar', '___return_false');


// menyembunyikan new post di nav bar admin

function change_world(){
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('new-post');
    // $wp_admin_bar->remove_menu('new-link');
    // $wp_admin_bar->remove_menu('new-media');
}

add_action('wp_before_admin_bar_render', 'change_world');

// ngilangin color scheme

function admin_color_scheme(){
  global $_wp_admin_css_colors;
  $_wp_admin_css_colors = 0;
}
add_action('admin_head', 'admin_color_scheme');

// add contact in users
add_action( 'show_user_profile', 'add_contact' );
add_action( 'edit_user_profile', 'add_contact' );
add_action('user_new_form', 'add_contact');

function add_contact( $user ) {
?>
  <table class="form-table">
    <tr>
      <th>
        <label for="hp"><?php _e('hp', 'your_textdomain'); ?>
      </label></th>
      <td>
        <input type="text" name="hp" id="hp" value="<?php echo esc_attr( get_the_author_meta( 'hp', $user->ID ) ); ?>" class="regular-text" /><br />
        <span class="description"><?php _e('Masukkan No HP', 'your_textdomain'); ?></span>
      </td>
    </tr>
  </table>
<?php }

function save_contact_user( $user_id ) {
  
  if ( !current_user_can( 'edit_user', $user_id ) )
    return FALSE;
  
  update_usermeta( $user_id, 'hp', $_POST['hp'] );
}

//fungsi untuk register di contact

add_action( 'personal_options_update', 'save_contact_user' );
add_action( 'edit_user_profile_update', 'save_contact_user' );
add_action('user_register','save_contact_user');







// function new_contact_methods( $contactmethods ) {
//     $contactmethods['phone'] = 'Phone Number';
//     return $contactmethods;
// }
// add_filter( 'user_contactmethods', 'new_contact_methods', 10, 1 );


// function new_modify_user_table( $column ) {
//     $column['phone'] = 'Phone';
//     return $column;
// }
// add_filter( 'manage_users_columns', 'new_modify_user_table' );

// function new_modify_user_table_row( $val, $column_name, $user_id ) {
//     switch ($column_name) {
//         case 'phone' :
//             return get_the_author_meta( 'phone', $user_id );
//             break;
//         default:
//     }
//     return $val;
// }
// add_filter( 'manage_users_custom_column', 'new_modify_user_table_row', 10, 3 );


// add_action( 'admin_init', 'my_remove_menu_pages' );
// function my_remove_menu_pages() {
 
// global $user_ID;
 
// if ( current_user_can( 'contributor' ) ) {
// remove_menu_page( 'edit.php' );

// }
// }

/**
 * Force the 'mine' view on the 'edit-post' screen
 */

// $user = wp_get_current_user();
// $allowed_roles = array('editor', 'administrator', 'contributor');
// {
// if( array_intersect($allowed_roles, $user->roles ) )
//     return $views;
//    echo "asdadsasdasdasdasdasdasdasddsdasdasda";
//    echo "asdadsasdasdasdasdasdasdasddsdasdasda";
// }


// $user = wp_get_current_user();
// $allowed_roles = array('editor', 'administrator', 'contributor');

// fungsi filter untuk admin ada bagian trash , dan contributor ga ada trash

add_filter( 'views_edit-post', function( $views )
{
    if( current_user_can( 'delete_others_posts' ) )
        return $views;

    $remove_views = ['trash' ];

    foreach( (array) $remove_views as $view )
    {
        if( isset( $views[$view] ) )
            unset( $views[$view] );
    }
    return $views;
} );

// if ( ! current_user_can('delete_others_posts') ) {
  
//     add_action( 'admin_menu', 'notadmin_remove_menus', 999 ); 
  
// } 
// function notadmin_remove_menus() {
  
//     // INSERT MENU ITEMS TO REMOVE HERE
  
// }




// add_action( 'init', 'wpsites_remove_contributor_capabilities' );

// function wpsites_remove_contributor_capabilities() {

// $contributor = get_role( 'contributor' );

// $caps = array(

//     'delete_posts',
// );

// foreach ( $caps as $cap ) {

//     $contributor->remove_cap( $cap );
//     }
// }



// add_action( 'init', 'wpsites_remove_contributor_capabilities' );

// function wpsites_remove_contributor_capabilities() {

// $contributor = get_role( 'contributor' );

// $caps = array(
//     'delete_posts',
// );

// foreach ( $caps as $cap ) {

//     $contributor->remove_cap( $cap );
//     }
// }

//nggo backup

// function allow_contrib_upload() {

//     // get the role
//     $contrib = get_role( 'contributor' );

//     // add the upload capability
//     $contrib->add_cap('edit_published_posts');

//     $contrib->add_cap( 'upload_files' );
// }
// add_action( 'admin_init', 'allow_contrib_upload', 11 );