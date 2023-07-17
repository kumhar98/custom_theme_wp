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

