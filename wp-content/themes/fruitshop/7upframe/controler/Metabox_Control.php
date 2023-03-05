<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */

add_action('admin_init', 's7upf_custom_meta_boxes');
if(!function_exists('s7upf_custom_meta_boxes')){
    function s7upf_custom_meta_boxes(){
        //Format content
        $format_metabox_post = array(
            'id' => 'block_format_content',
            'title' => esc_html__('Post Settings', 'fruitshop'),
            'desc' => '',
            'pages' => array('post'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'label' => esc_html__('Format setting','fruitshop'),
                    'id' => 'mb_format_setting',
                    'type' => 'tab'
                ),
                array(
                    'id' => 'format_gallery',
                    'label' => esc_html__('Add Gallery', 'fruitshop'),
                    'type' => 'Gallery',
                    'desc' => esc_html__('Create gallery image for gallery format','fruitshop')
                ),
                array(
                    'id' => 'format_media',
                    'label' => esc_html__('Link Media', 'fruitshop'),
                    'type' => 'text',
                    'desc' => esc_html__('Get link video(audio) in youtube, vimeo, soundclound, share host,... then input a link media. Note: Share host: there are 3 supported video formats mp4, ogg, webm ','fruitshop')
                ),
                array(
                    'id' => 'hide_media_single',
                    'label' => esc_html__('Hidden media in detail page', 'fruitshop'),
                    'type' => 'on-off',
                    'desc' => esc_html__('This allow you hidden media, gallery or image in your posts.','fruitshop'),
                    'std' => 'on'
                ),

                array(
                    'id' => 'mb_banner_setting',
                    'label' => esc_html__('Banner setting','fruitshop'),
                    'type' => 'tab'
                ),
                array(
                    'id'          => 'enable_banner_single',
                    'label'       => esc_html__('Enable banner','fruitshop'),
                    'type'        => 'select',
                    'std' => '',
                    'choices'     => array(
                        array(
                            'label'=>esc_html__('-- User in theme option --','fruitshop'),
                            'value'=>'',
                        ),
                        array(
                            'label'=>esc_html__('On','fruitshop'),
                            'value'=>'on'
                        ),
                        array(
                            'label'=>esc_html__('Off','fruitshop'),
                            'value'=>'off'
                        ),
                    ),

                ),
                array(
                    'id' => 'bg_image_banner_blog_single',
                    'label' => esc_html__('Background banner', 'fruitshop'),
                    'desc' => esc_html__('Select image from library.', 'fruitshop'),
                    'type' => 'upload',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_single:is(on)',
                ),
                array(
                    'id' => 'title_banner_blog_single',
                    'label' => esc_html__('Title banner', 'fruitshop'),
                    'desc' => esc_html__('Enter title.', 'fruitshop'),
                    'type' => 'text',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_single:is(on)',
                ),
                array(
                    'id' => 'desc_banner_blog_single',
                    'label' => esc_html__('Description banner', 'fruitshop'),
                    'desc' => esc_html__('Enter description.', 'fruitshop'),
                    'type' => 'text',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_single:is(on)',
                ),
                array(
                    'id' => 'mb_layout_setting',
                    'label' => esc_html__('Layout setting','fruitshop'),
                    'type' => 'tab'
                ),
                array(
                    'id'          => 's7upf_header_page',
                    'label'       => esc_html__( 'Header Page', 'fruitshop' ),
                    'desc'        => esc_html__( 'Include page to Header', 'fruitshop' ),
                    'type'        => 'select',
                    'section'     => 'option_general',
                    'choices'     => s7upf_list_header_page()
                ),
                array(
                    'id'          => 's7upf_footer_page',
                    'label'       => esc_html__( 'Footer Page', 'fruitshop' ),
                    'desc'        => esc_html__( 'Include page to Footer', 'fruitshop' ),
                    'type'        => 'select',
                    'section'     => 'option_general',
                    'choices'     => s7upf_list_footer_page()
                ),
                array(
                    'id'          => 's7upf_sidebar_position',
                    'label'       => esc_html__('Sidebar position ','fruitshop'),
                    'type'        => 'select',
                    'std' => '',
                    'choices'     => array(
                        array(
                            'label'=>esc_html__('--Select--','fruitshop'),
                            'value'=>'',
                        ),
                        array(
                            'label'=>esc_html__('No Sidebar','fruitshop'),
                            'value'=>'no'
                        ),
                        array(
                            'label'=>esc_html__('Left sidebar','fruitshop'),
                            'value'=>'left'
                        ),
                        array(
                            'label'=>esc_html__('Right sidebar','fruitshop'),
                            'value'=>'right'
                        ),
                    ),

                ),
                array(
                    'id'        =>'s7upf_select_sidebar',
                    'label'     =>esc_html__('Selects sidebar','fruitshop'),
                    'type'      =>'sidebar-select',
                    'condition' => 's7upf_sidebar_position:not(no),s7upf_sidebar_position:not()',
                ),
            ),
        );
        $format_metabox_page = array(
            'id' => 'block_format_content',
            'title' => esc_html__('Page Settings', 'fruitshop'),
            'desc' => '',
            'pages' => array('page'),
            'context' => 'normal',
            'priority' => 'high',
            'fields' => array(
                array(
                    'label' => esc_html__('General setting','fruitshop'),
                    'id' => 'mb_general_setting',
                    'type' => 'tab'
                ),
                array(
                    'id'          => 's7upf_header_page',
                    'label'       => esc_html__( 'Header Page', 'fruitshop' ),
                    'desc'        => esc_html__( 'Include page to Header', 'fruitshop' ),
                    'type'        => 'select',
                    'section'     => 'option_general',
                    'choices'     => s7upf_list_header_page()
                ),
                array(
                    'id'          => 's7upf_footer_page',
                    'label'       => esc_html__( 'Footer Page', 'fruitshop' ),
                    'desc'        => esc_html__( 'Include page to Footer', 'fruitshop' ),
                    'type'        => 'select',
                    'section'     => 'option_general',
                    'choices'     => s7upf_list_footer_page()
                ),
                array(
                    'id'          => 'main_color',
                    'label'       => esc_html__('Main color (Default in theme option)','fruitshop'),
                    'type'        => 'colorpicker-opacity',
                    'desc' => esc_html__('This allow you custom color main of page.', 'fruitshop'),
                ),
                array(
                    'id'          => 'secondary_color',
                    'label'       => esc_html__('Secondary color (Default in theme option)','fruitshop'),
                    'type'        => 'colorpicker-opacity',
                    'desc' => esc_html__('This allow you custom color secondary of page.', 'fruitshop'),
                ),
                array(
                    'id'          => 'bg_page',
                    'label'       => esc_html__('Custom background page','fruitshop'),
                    'type'        => 'colorpicker-opacity',
                    'desc' => esc_html__('This allow you custom background body.', 'fruitshop'),
                ),
                array(
                    'id' => 'mb_banner_setting',
                    'label' => esc_html__('Banner setting','fruitshop'),
                    'type' => 'tab'
                ),
                array(
                    'id'          => 'enable_banner_page',
                    'label'       => esc_html__('Enable banner','fruitshop'),
                    'type'        => 'on-off',
                    'std' => 'off',

                ),
                array(
                    'id' => 'bg_image_banner_blog_page',
                    'label' => esc_html__('Background banner', 'fruitshop'),
                    'desc' => esc_html__('Select image from library.', 'fruitshop'),
                    'type' => 'upload',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_page:is(on)',
                ),
                array(
                    'id' => 'title_banner_blog_page',
                    'label' => esc_html__('Title banner', 'fruitshop'),
                    'desc' => esc_html__('Enter title.', 'fruitshop'),
                    'type' => 'text',
                    'section' => 'option_blog',
                    'condition'   => 'enable_banner_page:is(on)',
                ),

            ),
        );
        if(function_exists( 'mc4wp_show_form' )) {
            array_push($format_metabox_page['fields'], array(
                'label' => esc_html__('MailChimp popup','fruitshop'),
                'id' => 'mb_mailchimp',
                'type' => 'tab'
            ));
            array_push($format_metabox_page['fields'], array(
                'label' => esc_html__('Show MailChimp popup','fruitshop'),
                'id' => 'show_popup_mail_chimp',
                'type' => 'on-off',
                'std' => 'off',
            ));
            array_push($format_metabox_page['fields'], array(
                'label' => esc_html__('Title','fruitshop'),
                'id' => 'title_popup_mail_chimp',
                'type' => 'text',
                'desc' => esc_html__('Enter title.', 'fruitshop'),
                'condition'   => 'show_popup_mail_chimp:is(on)',
            ));
            array_push($format_metabox_page['fields'], array(
                'label' => esc_html__('ID Shortcode MailChimp','fruitshop'),
                'id' => 'shortcode_mail_chimp',
                'type' => 'text',
                'desc' => esc_html__('Enter ID.', 'fruitshop'),
                'condition'   => 'show_popup_mail_chimp:is(on)',
            ));
            array_push($format_metabox_page['fields'], array(
                'label' => esc_html__('Placeholder text','fruitshop'),
                'id' => 'placeholder_popup_mail_chimp',
                'type' => 'text',
                'desc' => esc_html__('Placeholder text of mail field.', 'fruitshop'),
                'condition'   => 'show_popup_mail_chimp:is(on)',
            ));
            array_push($format_metabox_page['fields'], array(
                'label' => esc_html__('Title button submit','fruitshop'),
                'id' => 'title_submit_popup_mail_chimp',
                'type' => 'text',
                'desc' => esc_html__('Enter text.', 'fruitshop'),
                'condition'   => 'show_popup_mail_chimp:is(on)',
            ));
            array_push($format_metabox_page['fields'], array(
                'label' => esc_html__('Background image popup','fruitshop'),
                'id' => 'bg_popup_mail_chimp',
                'type' => 'upload',
                'desc' => esc_html__('Select image from library.', 'fruitshop'),
                'condition'   => 'show_popup_mail_chimp:is(on)',
            ));
        }

        if (function_exists('ot_register_meta_box')){
            ot_register_meta_box($format_metabox_post);
            ot_register_meta_box($format_metabox_page);

        }
    }
}
?>