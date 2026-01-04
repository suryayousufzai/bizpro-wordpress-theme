<?php
/**
 * Custom Post Types
 *
 * @package BizPro
 */

// Register Services Post Type
function bizpro_register_services() {
    $labels = array(
        'name'                  => 'Services',
        'singular_name'         => 'Service',
        'menu_name'             => 'Services',
        'name_admin_bar'        => 'Service',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Service',
        'new_item'              => 'New Service',
        'edit_item'             => 'Edit Service',
        'view_item'             => 'View Service',
        'all_items'             => 'All Services',
        'search_items'          => 'Search Services',
        'not_found'             => 'No services found.',
        'not_found_in_trash'    => 'No services found in Trash.',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'services' ),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-admin-tools',
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'          => true,
    );

    register_post_type( 'service', $args );
}
add_action( 'init', 'bizpro_register_services' );

// Register Team Members Post Type
function bizpro_register_team() {
    $labels = array(
        'name'                  => 'Team Members',
        'singular_name'         => 'Team Member',
        'menu_name'             => 'Team',
        'name_admin_bar'        => 'Team Member',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Team Member',
        'new_item'              => 'New Team Member',
        'edit_item'             => 'Edit Team Member',
        'view_item'             => 'View Team Member',
        'all_items'             => 'All Team Members',
        'search_items'          => 'Search Team Members',
        'not_found'             => 'No team members found.',
        'not_found_in_trash'    => 'No team members found in Trash.',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'team' ),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-groups',
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'show_in_rest'          => true,
    );

    register_post_type( 'team', $args );
}
add_action( 'init', 'bizpro_register_team' );

// Register Portfolio Post Type
function bizpro_register_portfolio() {
    $labels = array(
        'name'                  => 'Portfolio',
        'singular_name'         => 'Portfolio Item',
        'menu_name'             => 'Portfolio',
        'name_admin_bar'        => 'Portfolio Item',
        'add_new'               => 'Add New',
        'add_new_item'          => 'Add New Portfolio Item',
        'new_item'              => 'New Portfolio Item',
        'edit_item'             => 'Edit Portfolio Item',
        'view_item'             => 'View Portfolio Item',
        'all_items'             => 'All Portfolio Items',
        'search_items'          => 'Search Portfolio',
        'not_found'             => 'No portfolio items found.',
        'not_found_in_trash'    => 'No portfolio items found in Trash.',
    );

    $args = array(
        'labels'                => $labels,
        'public'                => true,
        'publicly_queryable'    => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'query_var'             => true,
        'rewrite'               => array( 'slug' => 'portfolio' ),
        'capability_type'       => 'post',
        'has_archive'           => true,
        'hierarchical'          => false,
        'menu_position'         => 7,
        'menu_icon'             => 'dashicons-portfolio',
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'show_in_rest'          => true,
    );

    register_post_type( 'portfolio', $args );
}
add_action( 'init', 'bizpro_register_portfolio' );

// Register Custom Taxonomies for Portfolio
function bizpro_register_portfolio_taxonomy() {
    // Portfolio Categories
    $labels = array(
        'name'              => 'Portfolio Categories',
        'singular_name'     => 'Portfolio Category',
        'search_items'      => 'Search Categories',
        'all_items'         => 'All Categories',
        'edit_item'         => 'Edit Category',
        'update_item'       => 'Update Category',
        'add_new_item'      => 'Add New Category',
        'new_item_name'     => 'New Category Name',
        'menu_name'         => 'Categories',
    );

    register_taxonomy(
        'portfolio_category',
        'portfolio',
        array(
            'labels'            => $labels,
            'hierarchical'      => true,
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => array( 'slug' => 'portfolio-category' ),
            'show_in_rest'      => true,
        )
    );
}
add_action( 'init', 'bizpro_register_portfolio_taxonomy' );

// Add custom meta boxes for Team Members
function bizpro_add_team_meta_boxes() {
    add_meta_box(
        'team_details',
        'Team Member Details',
        'bizpro_team_meta_box_callback',
        'team',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'bizpro_add_team_meta_boxes' );

function bizpro_team_meta_box_callback( $post ) {
    wp_nonce_field( 'bizpro_save_team_meta', 'bizpro_team_meta_nonce' );
    
    $position = get_post_meta( $post->ID, '_team_position', true );
    $email = get_post_meta( $post->ID, '_team_email', true );
    $phone = get_post_meta( $post->ID, '_team_phone', true );
    $linkedin = get_post_meta( $post->ID, '_team_linkedin', true );
    $twitter = get_post_meta( $post->ID, '_team_twitter', true );
    ?>
    
    <p>
        <label for="team_position"><strong>Position/Title:</strong></label><br>
        <input type="text" id="team_position" name="team_position" value="<?php echo esc_attr( $position ); ?>" style="width: 100%;">
    </p>
    
    <p>
        <label for="team_email"><strong>Email:</strong></label><br>
        <input type="email" id="team_email" name="team_email" value="<?php echo esc_attr( $email ); ?>" style="width: 100%;">
    </p>
    
    <p>
        <label for="team_phone"><strong>Phone:</strong></label><br>
        <input type="text" id="team_phone" name="team_phone" value="<?php echo esc_attr( $phone ); ?>" style="width: 100%;">
    </p>
    
    <p>
        <label for="team_linkedin"><strong>LinkedIn URL:</strong></label><br>
        <input type="url" id="team_linkedin" name="team_linkedin" value="<?php echo esc_attr( $linkedin ); ?>" style="width: 100%;">
    </p>
    
    <p>
        <label for="team_twitter"><strong>Twitter URL:</strong></label><br>
        <input type="url" id="team_twitter" name="team_twitter" value="<?php echo esc_attr( $twitter ); ?>" style="width: 100%;">
    </p>
    
    <?php
}

function bizpro_save_team_meta( $post_id ) {
    if ( ! isset( $_POST['bizpro_team_meta_nonce'] ) ) {
        return;
    }
    
    if ( ! wp_verify_nonce( $_POST['bizpro_team_meta_nonce'], 'bizpro_save_team_meta' ) ) {
        return;
    }
    
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    
    $fields = array( 'team_position', 'team_email', 'team_phone', 'team_linkedin', 'team_twitter' );
    
    foreach ( $fields as $field ) {
        if ( isset( $_POST[ $field ] ) ) {
            update_post_meta( $post_id, '_' . $field, sanitize_text_field( $_POST[ $field ] ) );
        }
    }
}
add_action( 'save_post_team', 'bizpro_save_team_meta' );

// Add custom meta boxes for Portfolio
function bizpro_add_portfolio_meta_boxes() {
    add_meta_box(
        'portfolio_details',
        'Portfolio Details',
        'bizpro_portfolio_meta_box_callback',
        'portfolio',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'bizpro_add_portfolio_meta_boxes' );

function bizpro_portfolio_meta_box_callback( $post ) {
    wp_nonce_field( 'bizpro_save_portfolio_meta', 'bizpro_portfolio_meta_nonce' );
    
    $client = get_post_meta( $post->ID, '_portfolio_client', true );
    $url = get_post_meta( $post->ID, '_portfolio_url', true );
    $date = get_post_meta( $post->ID, '_portfolio_date', true );
    ?>
    
    <p>
        <label for="portfolio_client"><strong>Client Name:</strong></label><br>
        <input type="text" id="portfolio_client" name="portfolio_client" value="<?php echo esc_attr( $client ); ?>" style="width: 100%;">
    </p>
    
    <p>
        <label for="portfolio_url"><strong>Project URL:</strong></label><br>
        <input type="url" id="portfolio_url" name="portfolio_url" value="<?php echo esc_attr( $url ); ?>" style="width: 100%;">
    </p>
    
    <p>
        <label for="portfolio_date"><strong>Completion Date:</strong></label><br>
        <input type="date" id="portfolio_date" name="portfolio_date" value="<?php echo esc_attr( $date ); ?>" style="width: 100%;">
    </p>
    
    <?php
}

function bizpro_save_portfolio_meta( $post_id ) {
    if ( ! isset( $_POST['bizpro_portfolio_meta_nonce'] ) ) {
        return;
    }
    
    if ( ! wp_verify_nonce( $_POST['bizpro_portfolio_meta_nonce'], 'bizpro_save_portfolio_meta' ) ) {
        return;
    }
    
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }
    
    if ( isset( $_POST['portfolio_client'] ) ) {
        update_post_meta( $post_id, '_portfolio_client', sanitize_text_field( $_POST['portfolio_client'] ) );
    }
    
    if ( isset( $_POST['portfolio_url'] ) ) {
        update_post_meta( $post_id, '_portfolio_url', esc_url_raw( $_POST['portfolio_url'] ) );
    }
    
    if ( isset( $_POST['portfolio_date'] ) ) {
        update_post_meta( $post_id, '_portfolio_date', sanitize_text_field( $_POST['portfolio_date'] ) );
    }
}
add_action( 'save_post_portfolio', 'bizpro_save_portfolio_meta' );