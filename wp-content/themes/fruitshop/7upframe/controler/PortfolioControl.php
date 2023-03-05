<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(!class_exists('S7upf_PortfolioController'))
{
    class S7upf_PortfolioController{

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
                'name'               => esc_html__('Portfolio','fruitshop'),
                'singular_name'      => esc_html__('Portfolio','fruitshop'),
                'menu_name'          => esc_html__('Portfolio','fruitshop'),
                'name_admin_bar'     => esc_html__('Portfolio','fruitshop'),
                'add_new'            => esc_html__('Add New','fruitshop'),
                'add_new_item'       => esc_html__( 'Add New Portfolio','fruitshop' ),
                'new_item'           => esc_html__( 'New Portfolio', 'fruitshop' ),
                'edit_item'          => esc_html__( 'Edit Portfolio', 'fruitshop' ),
                'view_item'          => esc_html__( 'View Portfolio', 'fruitshop' ),
                'all_items'          => esc_html__( 'All Portfolio', 'fruitshop' ),
                'search_items'       => esc_html__( 'Search Portfolio', 'fruitshop' ),
                'parent_item_colon'  => esc_html__( 'Parent Portfolio:', 'fruitshop' ),
                'not_found'          => esc_html__( 'No Portfolio found.', 'fruitshop' ),
                'not_found_in_trash' => esc_html__( 'No Portfolio found in Trash.', 'fruitshop' )
            );

            $args = array(
                'labels'             => $labels,
                'public'             => true,
                'publicly_queryable' => true,
                'show_ui'            => true,
                'show_in_menu'       => true,
                'query_var'          => true,
                'rewrite'            => array( 'slug' => 'portfolio' ),
                'capability_type'    => 'post',
                'has_archive'        => true,
                'hierarchical'       => false,
                'menu_position'      => null,
                'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt' )
            );

            stp_reg_post_type('portfolio',$args);
            self::_add_taxonomy();
            self::_add_meta_box();
        }

        static  function  _add_taxonomy (){
            stp_reg_taxonomy(
                'portfolio_category',
                'portfolio',
                array(
                    'label' => esc_html__( 'Portfolio Category', 'fruitshop' ),
                    'rewrite' => array( 'slug' => 'portfolio_category', 'fruitshop' ),
                    'hierarchical' => true,
                    'query_var'  => true
                )
            );
        }

        static function _add_meta_box (){
            $my_meta_box = array(
                'id'        => 'portfolio_option',
                'title'     => esc_html__(  'Portfolio Option' , 'fruitshop' ),
                'desc'      => '',
                'pages'     => array( 'portfolio' ),
                'context'   => 'normal',
                'priority'  => 'high',
                'fields'    => array(                    
                    array(
                        'id'                => 'icon',
                        'label'             => esc_html__('Choose icon', 'fruitshop'),
                        'desc'              => esc_html__('Choose font awesome icon','fruitshop'),
                        'type'              => 'text',
                        'class'             => 'sv_iconpicker'
                    ),
                    array(
                        'id'                => 'featured_special',
                        'label'             => esc_html__('Special Featured Image', 'fruitshop'),
                        'desc'              => esc_html__('Upload Image','fruitshop'),
                        'type'              => 'upload'
                    )
                )
            );

            if ( function_exists( 'ot_register_meta_box' ) )
                ot_register_meta_box($my_meta_box );
        }
    }

    S7upf_PortfolioController::_init();

}