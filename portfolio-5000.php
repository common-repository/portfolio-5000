<?php
   /*
   Plugin Name: Portfolio 5000
   Plugin URI: http://mikethetechninja.com
   Description: A plugin to show your portfolio or image gallery in a compact, but wicked cool way. Use the shortcode, [portfolio5000] to display 	your portfolio on any page or post.
   Version: 1.0.1
   Author: Mike the Tech Ninja Whittenberger
   Author URI: http://mikethetechninja.com
   License: GPL2
   */
   
// Register style sheet.
add_action( 'wp_enqueue_scripts', 'register_plugin_styles' );

function register_plugin_styles() {
	wp_register_style( 'portfolio-5000', plugins_url( 'portfolio-5000/css/p5000-style.css' ) );
	wp_enqueue_style( 'portfolio-5000' );
}

// Register Custom Taxonomy - Project Types
// Hook into the 'init' action
add_action( 'init', 'custom_taxonomy', 0 );

function custom_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Project Types', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Project Type', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Portfolio 5000 Project Types', 'text_domain' ),
		'all_items'                  => __( 'All Items', 'text_domain' ),
		'parent_item'                => __( 'Parent Item', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Item:', 'text_domain' ),
		'new_item_name'              => __( 'New Item Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Item', 'text_domain' ),
		'edit_item'                  => __( 'Edit Item', 'text_domain' ),
		'update_item'                => __( 'Update Item', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'project_types', array( 'p5000' ), $args );

}



// Register Custom Taxonomy - Skills List
// Hook into the 'init' action
add_action( 'init', 'create_skills_list', 0 );

function create_skills_list() {

	$labels = array(
		'name'                       => _x( 'Skills', 'Taxonomy General Name', 'text_domain' ),
		'singular_name'              => _x( 'Skill', 'Taxonomy Singular Name', 'text_domain' ),
		'menu_name'                  => __( 'Skills Used', 'text_domain' ),
		'all_items'                  => __( 'All Skills', 'text_domain' ),
		'parent_item'                => __( 'Parent ISkills', 'text_domain' ),
		'parent_item_colon'          => __( 'Parent Skills:', 'text_domain' ),
		'new_item_name'              => __( 'New Skill Name', 'text_domain' ),
		'add_new_item'               => __( 'Add New Skill', 'text_domain' ),
		'edit_item'                  => __( 'Edit Skill', 'text_domain' ),
		'update_item'                => __( 'Update Skill', 'text_domain' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'text_domain' ),
		'search_items'               => __( 'Search Items', 'text_domain' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'text_domain' ),
		'choose_from_most_used'      => __( 'Choose from the most used items', 'text_domain' ),
		'not_found'                  => __( 'Not Found', 'text_domain' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'skills_used', array( 'p5000' ), $args );

}


// Register Custom Post Type - Projects for Portfolio 5000 Plugin
// Hook into the 'init' action
add_action( 'init', 'custom_post_type', 0 );

function custom_post_type() {

	$labels = array(
		'name'                => _x( 'Projects', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Project', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Portfolio 5000 Projects/Items', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Project:', 'text_domain' ),
		'all_items'           => __( 'All Projects', 'text_domain' ),
		'view_item'           => __( 'View Project', 'text_domain' ),
		'add_new_item'        => __( 'Add New Project', 'text_domain' ),
		'add_new'             => __( 'Add New', 'text_domain' ),
		'edit_item'           => __( 'Edit Project', 'text_domain' ),
		'update_item'         => __( 'Update Project', 'text_domain' ),
		'search_items'        => __( 'Search Project', 'text_domain' ),
		'not_found'           => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'  => __( 'Not found in Trash', 'text_domain' ),
	);
	$rewrite = array(
		'slug'                => 'portfolio',
		'with_front'          => true,
		'pages'               => true,
		'feeds'               => true,
	);
	$args = array(
		'label'               => __( 'p5000', 'text_domain' ),
		'description'         => __( 'Portfolio best used for web developers.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', ),
		'taxonomies'          => array( 'project_type', ' skills_used' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5000,
		'can_export'          => true,
		'menu_icon' 		  => plugins_url( 'portfolio5000-icon.png', __FILE__ ),
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'rewrite'             => $rewrite,
		'capability_type'     => 'page',
	);
	register_post_type( 'p5000', $args );

}

//add custom fields for Projects
add_action( 'admin_init', 'my_admin' );

function my_admin() {
    add_meta_box( 'projects_meta_box',
        'Extra Project Details',
        'display_project_meta_box',
        'p5000', 'normal', 'high'
    );
}

//code to show extra project fields
function display_project_meta_box() 
{
	global $post;
	$project_website = esc_html( get_post_meta( $post->ID, 'project_website', true ) );
    ?>
    <table>
        <tr>
            <td style="width: 100%">Website URL for the Project</td>
        </tr>
        <tr>    
            <td><input type="text" size="80" name="project_website" value="<?php echo $project_website; ?>" /></td>
        </tr>
    </table>
    <?php
}

//code to save custom fields for Projects
add_action( 'save_post', 'add_project_fields', 10, 2 );

function add_project_fields( $project_id, $project ) {
    // Check post type for Portfolio 5000
    if ( $project->post_type == 'p5000' ) {
        // Store data in post meta table if present in post data
        if ( isset( $_POST['project_website'] ) && $_POST['project_website'] != '' ) {
            update_post_meta( $project_id, 'project_website', $_POST['project_website'] );
        }
    }
}

//[portfolio5000 shortcode]
add_shortcode( 'portfolio5000', 'portfolio5000_func' );

function portfolio5000_func( $atts ){
	
	$html_display .='
	<div id="prod_disp_gal_main">
	<div id="prod_disp_gallery">';
	
	//Query up the first five projects to show in the image rotator
	$args = array( 'post_type' => 'p5000' );
	$loop = new WP_Query( $args );
	$html_display.='<div id="slideshow">';
	while ( $loop->have_posts() ) : $loop->the_post();
	
	$html_display .= '<div id="rotate">'.get_the_post_thumbnail(get_the_ID(),array(375,375) ).'</div>';
	
	endwhile;
	
	
	$html_display .= '</div><div id="hint">Float your mouse over the images for more information</div><div id="thelist"><ul>';
	
	//Query up the first five projects
	
		$args = array( 'post_type' => 'p5000' );
	$loop = new WP_Query( $args );
	
	
	while ( $loop->have_posts() ) : $loop->the_post();
	
	$terms = wp_get_post_terms(get_the_ID(),'skills_used');
	 $count = count($terms);
	 $x = 1;
	 if ( $count > 0 ){
		 $list = '<div id="skillslist">Skills Used: ';
		 foreach ( $terms as $term ) {
			 if($x<$count)
				$list .= $term->name.", ";
			else
				$list .= $term->name;
			$x++;	
			 }
		$list .= "<br><span class='content'>Click to visit ".esc_html( get_post_meta( get_the_ID(), 'project_website', true ) )."</span></div>";	 
			
		 }
	
	$html_display .='<div><li>
	<a target="_new" href="'.esc_html( get_post_meta( get_the_ID(), 'project_website', true ) ).'">'.get_the_post_thumbnail(get_the_ID(), array(50,50) ).'
	<b><div id="thumbnail">'.get_the_post_thumbnail(get_the_ID(),array(375,375) ).'<br />'.$list.'</div></b>
	<c class="header">
	<span>'.the_title('','',false).'<br/><br /> 
	
	<div class="content">'.str_replace("\r", "<br />", get_the_content('')).'
	</div>
	</span>
	</c></a>
	</li></div>';
		
	endwhile;	
	$html_display .='</ul></div>';
	
	$html_display .='
	<script>
	jQuery("#slideshow > div:gt(0)").hide();
	
	setInterval(function() { 
	  jQuery(\'#slideshow > div:first\')
		.fadeOut(1000)
		.next()
		.fadeIn(1000)
		.end()
		.appendTo(\'#slideshow\');
	},  3000);
	</script>
	';

	
	return $html_display;
}

?>