<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(!class_exists('S7upf_MegamenuController'))
{
    class S7upf_MegamenuController{

        static function _init()
        {
            if(function_exists('stp_reg_post_type'))
            {
                add_action('init',array(__CLASS__,'_add_post_type'));
            }
        }

        static function _add_post_type()
        {
            $labels = array(
                'name'               => esc_html__('Mega Menu','fruitshop'),
                'singular_name'      => esc_html__('Mega Menu','fruitshop'),
                'menu_name'          => esc_html__('Mega Menu','fruitshop'),
                'name_admin_bar'     => esc_html__('Mega Menu','fruitshop'),
                'add_new'            => esc_html__('Add New','fruitshop'),
                'add_new_item'       => esc_html__( 'Add New Mega Menu','fruitshop' ),
                'new_item'           => esc_html__( 'New Mega Menu', 'fruitshop' ),
                'edit_item'          => esc_html__( 'Edit Mega Menu', 'fruitshop' ),
                'view_item'          => esc_html__( 'View Mega Menu', 'fruitshop' ),
                'all_items'          => esc_html__( 'All Mega Menu', 'fruitshop' ),
                'search_items'       => esc_html__( 'Search Mega Menu', 'fruitshop' ),
                'parent_item_colon'  => esc_html__( 'Parent Mega Menu:', 'fruitshop' ),
                'not_found'          => esc_html__( 'No mega menu found.', 'fruitshop' ),
                'not_found_in_trash' => esc_html__( 'No mega menu found in Trash.', 'fruitshop' ),

            );

            $args = array(
                'labels'             => $labels,
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'megamenupage' ),
                'capability_type'    => 'page',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_icon'           => get_template_directory_uri().'/assets/admin/image/megamenu.png',
                'menu_position'      => null,
                'supports'           => array( 'title', 'editor', 'author', 'thumbnail' )
            );

            stp_reg_post_type('megamenupage',$args);
        }


    }

    S7upf_MegamenuController::_init();

}