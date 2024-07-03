<?php
add_action( 'restrict_manage_posts', 'rudr_taxonomy_filter_bantin' );

function rudr_taxonomy_filter_bantin( $post_type ){
	// let's decide about post type first
	if( 'ban-tin' !== $post_type ){
		return;
	}
    if( 'ban-tin' === $post_type ){
        // pass multiple taxonomies as an array of their slugs
        $taxonomies = array( 'bantin_categories' );
        rudr_taxonomy_render( $taxonomies );
	}
}


function rudr_taxonomy_render( $taxonomies ){
    // for every taxonomy we are going to do the same
    foreach( $taxonomies as $taxonomy ){
            
        $taxonomy_object = get_taxonomy( $taxonomy );
        $selected = isset( $_GET[ $taxonomy ] ) ? $_GET[ $taxonomy ] : '';
        
        wp_dropdown_categories( 
            array(
                'show_option_all' =>  $taxonomy_object->labels->all_items,
                'taxonomy'        =>  $taxonomy,
                'name'            =>  $taxonomy,
                'orderby'         =>  'name', // slug / count / term_order etc
                'value_field'     =>  'slug',
                'selected'        =>  $selected,
                'hierarchical'    =>  true,
            )
        );
    }
}