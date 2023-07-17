<?php
// menu register function
register_nav_menus(
	array(
		'menu-1' => esc_html__('Primary', 'gabpals'),
	)
);
// Featured image function
add_theme_support('post-thumbnails');


// logo image add option code 
add_theme_support('custom-header');

// side bar add visite option admin panel 

register_sidebar([
	'name' => 'sidebar location',
	'id' => 'sidebar'
]);
// this function use to add option background image admin panel
add_theme_support('custom-background');

// add excerpt option admin panel page
add_post_type_support('page', 'excerpt');
// add excerpt option admin panel post 
add_post_type_support('post', 'excerpt');
// this code use for include external file
// include get_theme_file_path('custom_post.php');

// add option page in admin panel
if (function_exists('acf_add_options_page')) {

	acf_add_options_page();
}
// this function use to save category wish  data and post data
add_action('init', 'process_form_submission');
function process_form_submission()
{
	if (isset($_POST['btn_submit'])) {
		error_log('Form submitted'); // Output a message to the error log
		$id =  wp_insert_post([
			'post_type' => 'movies',
			'post_satus' => 'draft',
			"post_title" => $_POST['name'],
			"post_content" => $_POST['lname']
		]);
		// wp_set_object_terms($id, $_POST['cat_name'], 'php' );

		// Redirect to the index page
		wp_redirect(home_url());
		exit();
	}
}



// add meta box custom field admin panel 
/* Create one or more meta boxes to be displayed on the post editor screen. */
// Step 2: Display the meta box
function add_custom_meta_field() {
    add_meta_box(
        'custom_meta_field',       // Meta box ID
        'Custom Meta Field',       // Meta box title
        'render_custom_meta_field',// Callback function to render the meta box
        'movies',                  // Post type to display the meta box
        'normal',                  // Context (normal, side, advanced)
        'default'                  // Priority (high, core, default, low)
    );
}
add_action('add_meta_boxes', 'add_custom_meta_field');

// Callback function to render the meta box
function render_custom_meta_field($post) {
    // Retrieve the current meta value
    $custom_meta_value = get_post_meta($post->ID, 'custom_meta_field', true);

    // Display the meta field input
    echo '<label for="custom_meta_field">Custom Meta Field:</label>';
    echo '<input type="text" id="custom_meta_field" name="custom_meta_field" value="' . esc_attr($custom_meta_value) . '" />';
}

// Save the custom meta field value
function save_custom_meta_field($post_id) {
    if (isset($_POST['custom_meta_field'])) {
        update_post_meta($post_id, 'custom_meta_field', sanitize_text_field($_POST['custom_meta_field']));
    }
}
add_action('save_post_movies', 'save_custom_meta_field');




































// Add a custom meta box
function custom_meta_box() {
    add_meta_box(
        'custom_meta_box', // Unique ID
        'Custom Meta Box', // Box title
        'custom_meta_box_callback', // Content callback function
        'custom_page', // Admin menu page slug
        'normal', // Context
        'default' // Priority
    );
}
add_action('admin_menu', 'add_custom_menu_page');
add_action('add_meta_boxes_custom_page', 'custom_meta_box');

// Callback function to render the meta box content
function custom_meta_box_callback() {
    // Output the HTML markup for the meta box options
    ?>
    <label for="custom_field">Custom Field:</label>
    <input type="text" id="custom_field" name="custom_field">
    <?php
}

// Save the meta box data
function save_custom_meta_box_data($post_id) {
    // Save the custom field value
    if (isset($_POST['custom_field'])) {
        update_post_meta($post_id, 'custom_field', sanitize_text_field($_POST['custom_field']));
    }
}
add_action('save_post_custom_page', 'save_custom_meta_box_data');

// Add a custom admin menu page
function add_custom_menu_page() {
    add_menu_page(
        'Custom Page', // Page title
        'Custom Page', // Menu title
        'manage_options', // Capability
        'custom_page', // Menu slug
        'custom_menu_page_callback', // Callback function
        'dashicons-admin-generic', // Icon
        25 // Position
    );
}

// Callback function to render the custom menu page
function custom_menu_page_callback() {
    ?>
    <div class="wrap">
        <h1>Custom Page</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('custom_page_settings');
            do_settings_sections('custom_page');
            submit_button('Save Changes');
            ?>
        </form>
    </div>
    <?php
}

// Register settings and fields for the custom menu page
function register_custom_menu_page_settings() {
    register_setting('custom_page_settings', 'custom_field_option');
    add_settings_section('custom_section', 'Custom Section', 'custom_section_callback', 'custom_page');
    add_settings_field('custom_field_option', 'Custom Field Option', 'custom_field_option_callback', 'custom_page', 'custom_section');
}
add_action('admin_init', 'register_custom_menu_page_settings');

// Callback function to render the custom section
function custom_section_callback() {
    // Output any additional section content
}

// Callback function to render the custom field option
function custom_field_option_callback() {
    $custom_field_option = get_option('custom_field_option');
    ?>
    <input type="text" name="custom_field_option" value="<?php echo esc_attr($custom_field_option); ?>">
    <?php
}








function custom_post_type() {
    // Set UI labels for Custom Post Type
        $labels = array(
            'name'                => _x( 'Movies', 'Post Type General Name', 'twentytwentyone' ),
            'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'twentytwentyone' ),
            'menu_name'           => __( 'Movies', 'twentytwentyone' ),
            'parent_item_colon'   => __( 'Parent Movie', 'twentytwentyone' ),
            'all_items'           => __( 'All Movies', 'twentytwentyone' ),
            'view_item'           => __( 'View Movie', 'twentytwentyone' ),
            'add_new_item'        => __( 'Add New Movie', 'twentytwentyone' ),
            'add_new'             => __( 'Add New', 'twentytwentyone' ),
            'edit_item'           => __( 'Edit Movie', 'twentytwentyone' ),
            'update_item'         => __( 'Update Movie', 'twentytwentyone' ),
            'search_items'        => __( 'Search Movie', 'twentytwentyone' ),
            'not_found'           => __( 'Not Found', 'twentytwentyone' ),
            'not_found_in_trash'  => __( 'Not found in Trash', 'twentytwentyone' ),
            

           
        );
          
    // Set other options for Custom Post Type
          
        $args = array(
            'label'               => __( 'movies', 'twentytwentyone' ),
            'description'         => __( 'Movie news and reviews', 'twentytwentyone' ),
            'labels'              => $labels,
            'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
            'hierarchical'        => false,
            'public'              => true,
            'show_ui'             => true,
            'show_in_menu'        => true,
            'show_in_nav_menus'   => true,
            'show_in_admin_bar'   => true,
            'menu_position'       => 5,
            'can_export'          => true,
            'has_archive'         => true,
            'exclude_from_search' => false,
            'publicly_queryable'  => true,
            'capability_type'     => 'post',
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-format-video',



           

      
        );
          
        // Registering your Custom Post Type
        register_post_type( 'movies', $args );
      
    }
      
  
    add_action( 'init', 'custom_post_type');


function register_custom_taxonomy()
{
    $labels = array(
        'name'              => _x('Locations', 'taxonomy general name'),
        'singular_name'     => _x('Location','taxonomy singular name'),
        'search_items'      => __('Search Location'),
        'all_items'         => __('All Location'),
        'parent_item'       => __('Parent Location'),
        'parent_item_colon' => __('Parent Location:'),
        'edit_item'         => __('Edit Location'),
        'update_item'       => __('Update Location'),
        'add_new_item'      => __('Add New Location'),
        'new_item_name'     => __('New Location Name'),
        'menu_name'         => __('Locations'),
    );

    $args = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest' => true,
        'rewrite'    => array('slug' => 'locations'),
        'meta_box_cb' => 'category_add_form_fields_callback', // Custom callback for meta box
    );

    register_taxonomy('locations', 'movies', $args); // Register Taxonomy
}
add_action('init', 'register_custom_taxonomy');

function register_tag_taxonomy()
{
    $labels = array(
        'name'              => _x('home', 'taxonomy general name'),
        'singular_name'     => _x('home','taxonomy singular name'),
        'search_items'      => __('Search home'),
        'all_items'         => __('All home'),
        'parent_item'       => __('Parent home'),
        'parent_item_colon' => __('Parent home:'),
        'edit_item'         => __('Edit home'),
        'update_item'       => __('Update home'),
        'add_new_item'      => __('Add New home'),
        'new_item_name'     => __('New home Name'),
        'menu_name'         => __('home'),
    );

    $args = array(
        'hierarchical'      => true, // make it hierarchical (like categories)
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'show_in_rest' => true,
        'meta_box_cb' => 'home_add_form_fields_callback', // Custom callback for meta box

        'rewrite'    => array('slug' => 'homes'),

    );

    register_taxonomy('homes', 'movies', $args); // Register Taxonomy
}

add_action('init', 'register_tag_taxonomy');




// ****************this code in theme custom plugin

   
// this code add image option custom texonomy
function category_add_form_fields_callback()
{
	$image_id = null;
?>

	<div id="category_custom_image"></div>
	<input type="hidden" id="category_custom_image_url" name="category_custom_image_url">
	<div style="margin-bottom: 20px;">
		<span>Category Image </span>
		<a href="#" class="button custom-button-upload" id="custom-button-upload">Upload image</a>
		<a href="#" class="button custom-button-remove" id="custom-button-remove" style="display: none">Remove image</a>
	</div>

<?php
}
add_action( 'category_add_form_fields', 'category_add_form_fields_callback' );
add_action( 'location_add_form_fields', 'category_add_form_fields_callback' );
add_action( 'home_add_form_fields', 'category_add_form_fields_callback' );



add_action('admin_enqueue_scripts', 'admin_enqueue_scripts_callback');
function admin_enqueue_scripts_callback()
{

	// WordPress media uploader scripts
	if (!did_action('wp_enqueue_media')) {
		wp_enqueue_media();
	}
	// our uploader.js 
	wp_enqueue_script('uploaderjs', get_stylesheet_directory_uri() . '/uploader.js', array(), "1.0", true);
}






function custom_create_term_callback($term_id) {
    // add term meta data
    add_term_meta( 
        $term_id, 
        'term_image',   
        esc_url($_REQUEST['category_custom_image_url'])
    );
    
}
add_action( 'create_term', 'custom_create_term_callback' );

function category_edit_form_fields_callback($ttObj, $taxonomy) {

    $term_id = $ttObj->term_id;
    $image = '';
    $image = get_term_meta( $term_id, 'term_image', true );

    ?>
    <tr class="form-field term-image-wrap">
      <th scope="row"><label for="image">Image</label></th>
	<td>
        <?php if ( $image ): ?>
        <span id="category_custom_image">
           <img src="<?php echo $image; ?>" style="width: 100%"/>
        </span>
        <input 
           type="hidden" 
           id="category_custom_image_url" 
           name="category_custom_image_url">
                
        <span>
           <a href="#" 
             class="button custom-button-upload" 
             id="custom-button-upload">Update image</a>
           <!-- <a href="#" class="button custom-button-remove">Remove image</a>                     -->
        </span>
        <?php else: ?>
        <span id="category_custom_image"></span>
        <input 
            type="hidden" 
            id="category_custom_image_url" 
            name="category_custom_image_url">
        <span>
           <a href="#" 
              class="button custom-button-upload" 
              id="custom-button-upload">Upload image</a>
           <a href="#" 
              class="button custom-button-remove" 
              style="display: none">Remove image</a>
        </span>
        <?php endif; ?>
        </td>
    </tr>
        
    <?php
    
}

add_action ( 'location_edit_form_fields', 'category_edit_form_fields_callback', 10, 2 );
function edit_term_callback($term_id) {
    $image = '';
    $image = get_term_meta( $term_id, 'term_image' );

    if ( $image )
    update_term_meta( 
        $term_id, 
        'term_image', 
        esc_url( $_POST['category_custom_image_url']) );

    else
    add_term_meta( 
        $term_id, 
        'term_image', 
        esc_url( $_POST['category_custom_image_url']) );

}
add_action( 'edit_term', 'edit_term_callback' );

?>
