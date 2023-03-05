<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
if(class_exists('Vc_Manager')){
    function s7upf_add_custom_shortcode_param( $name, $form_field_callback, $script_url = null ) {
        return WpbakeryShortcodeParams::addField( $name, $form_field_callback, $script_url );
    }
    //Add adv
    s7upf_add_custom_shortcode_param('add_advantage', 's7upf_add_advantage', get_template_directory_uri(). '/assets/js/vc_js.js');

    function s7upf_add_advantage($settings, $value)
    {
        $val = $value;
        $html = '<div class="wrap-param">';
        $html .=    '<div class="param-list">';
        
        parse_str(urldecode($value), $advantage);
        if(is_array($advantage)) 
        {
            $i = 1;
            foreach ($advantage as $key => $value) {
                if(!isset($value['url'])) $value['url'] = '';
                $html .=    '<div class="param-item" data-item="'.$i.'">';
                 $html .=       '<strong>'.esc_html__("Image",'fruitshop').' '.$i.':</strong></br>';
                    $html .=    '<div class="wpb_el_type_attach_image edit_form_line">
                                    <input type="hidden" class="param-field wpb_vc_param_value gallery_widget_attached_images_ids images attach_images" name="'.$i.'[image]" value="'.$value['image'].'">
                                    <div class="gallery_widget_attached_images">
                                        <ul class="gallery_widget_attached_images_list ui-sortable">';
                    if(!empty($value['image'])){
                        $img = wp_get_attachment_image_src( $value['image'] );
                        $html .=            '<li class="added ui-sortable-handle">
                                                <img rel="'.$value['image'].'" src="'.esc_url($img[0]).'">
                                                <a href="#" class="icon-remove"></a>
                                            </li>';
                    }
                    $html .=            '</ul>
                                    </div>
                                    <div class="gallery_widget_site_images"></div>
                                    <a class="gallery_widget_add_images" href="#" use-single="true" title="'.esc_html__("Add images",'fruitshop').'">'.esc_html__("Add images",'fruitshop').'</a>
                                    <span class="vc_description vc_clearfix">'.esc_html__("Select images from media library.",'fruitshop').'</span>
                                </div>';
                    $html .=    '<label>'.esc_html__("Title",'fruitshop').' </label><input style="width:65%;margin-right:10px;margin-bottom:15px" class="param-field" name="'.$i.'[title]" value="'.$value['title'].'" type="text" ></br>';
                    $html .=    '<label>'.esc_html__("Description 1",'fruitshop').' </label><input style="width:65%;margin-right:10px;margin-bottom:15px" class="param-field" name="'.$i.'[des1]" value="'.$value['des1'].'" type="text" ></br>';
                    $html .=    '<label>'.esc_html__("Description 2",'fruitshop').' </label><input style="width:65%;margin-right:10px;margin-bottom:15px" class="param-field" name="'.$i.'[des2]" value="'.$value['des2'].'" type="text" ></br>';
                    $html .=    '<label>'.esc_html__("Link",'fruitshop').' </label><input style="width:65%;margin-right:10px;margin-bottom:15px" class="param-field" name="'.$i.'[link]" value="'.$value['link'].'" type="text" >';
                    $html .=    '<a style="color:red" href="#" class="st-del-item">'.esc_html__("Delete",'fruitshop').'</a>';
                $html .=    '</div>';
                $i++;
            }
        }
        $html .=    '</div>';
        $html .=    '<div class="st-add">
                        <button class="vc_btn vc_btn-primary vc_btn-sm add-param" type="button">'.esc_html__('Add Item', 'fruitshop').' </button>';
        $html .=        '<div class="param-content-copy hidden">';
        $html .=            '<div class="param-item" data-item="#key">';
        $html .=                '<div class="wpb_el_type_attach_image edit_form_line"><input type="hidden" class="param-field wpb_vc_param_value gallery_widget_attached_images_ids images attach_images" name="#key[image]" value=""><div class="gallery_widget_attached_images"><ul class="gallery_widget_attached_images_list ui-sortable"></ul></div><div class="gallery_widget_site_images"></div><a class="gallery_widget_add_images" href="#" use-single="true" title="'.esc_html__("Add images",'fruitshop').'">'.esc_html__("Add images",'fruitshop').'</a><span class="vc_description vc_clearfix">'.esc_html__("Select images from media library.",'fruitshop').'</span></div>';            
        $html .=                '<label>'.esc_html__("Title",'fruitshop').' </label><input style="width:65%;margin-right:10px;margin-bottom:15px" class="param-field" name="#key[title]" value="" type="text"></br>';            
        $html .=                '<label>'.esc_html__("Description 1",'fruitshop').' </label><input style="width:65%;margin-right:10px;margin-bottom:15px" class="param-field" name="#key[des1]" value="" type="text"></br>';
        $html .=                '<label>'.esc_html__("Description 2",'fruitshop').' </label><input style="width:65%;margin-right:10px;margin-bottom:15px" class="param-field" name="#key[des2]" value="" type="text"></br>';
        $html .=                '<label>'.esc_html__("Link",'fruitshop').' </label><input style="width:65%;margin-right:10px;margin-bottom:15px" class="param-field" name="#key[link]" value="" type="text"></br>';
        $html .=                '<a style="color:red" href="#" class="st-del-item">'.esc_html__("Delete",'fruitshop').'</a>';
        $html .=            '</div>';
        $html .=        '</div>';
        $html .=    '</div>';
        $html .=    '<input name="'.$settings['param_name'].'" class="param-value wpb_vc_param_value wpb-textinput '.$settings['param_name'].' '.$settings['type'].'_field" type="hidden" value="'.$val.'">';
        $html .='</div>';        
        return $html;
    }
    
    s7upf_add_custom_shortcode_param('add_social', 's7upf_add_social', get_template_directory_uri(). '/assets/js/vc_js.js');
    
    // function social
    function s7upf_add_social($settings, $value)
    {
        // $dependency = vc_generate_dependencies_attributes($settings);
        $val = $value;
        $html = '<div class="st_add_social">';
        
        parse_str(urldecode($value), $social);
        if(is_array($social)) 
        {
            $i = 1;
            foreach ($social as $key => $value) {
                if(!isset($value['url'])) $value['url'] = '';
                $html .= '<div class="social-item" data-item="'.$i.'">';
                    $html .= '<label>'.esc_html__("Social",'fruitshop').' '.$i.':</label></br><label>'.esc_html__("Icon",'fruitshop').' </label><input style="width:65%;margin-right:10px;margin-bottom:15px" class="st-social sv_iconpicker" name="'.$i.'[social]" value="'.$value['social'].'" type="text" ></br>';
                    $html .= '<label>'.esc_html__("Link",'fruitshop').' </label><input style="width:65%;margin-right:10px;margin-bottom:15px" class="st-social" name="'.$i.'[url]" value="'.$value['url'].'" type="text" >';
                    $html .= '<a style="color:red" href="#" class="st-del-item">'.esc_html__("Delete",'fruitshop').'</a>';
                $html .= '</div>';
                $i++;
            }
        }
        $html .= '</div>';
        $html .= '<div class="st-add"><button class="vc_btn vc_btn-primary vc_btn-sm st-button-add" type="button">'.esc_html__('Add social', 'fruitshop').' </button></div>';
        $html .= '<input name="'.$settings['param_name'].'" class="st-social-value wpb_vc_param_value wpb-textinput '.$settings['param_name'].' '.$settings['type'].'_field" type="hidden" value="'.$val.'">';
        return $html;
    }

    // Mutil location param

    s7upf_add_custom_shortcode_param('add_location_map', 's7upf_add_location_map', get_template_directory_uri(). '/assets/js/vc_js.js');

    function s7upf_add_location_map($settings, $value)
    {
        // $dependency = vc_generate_dependencies_attributes($settings);
        $val = $value;
        $html = '<div class="st_add_location">';
        
        parse_str(urldecode($value), $locations);
        if(is_array($locations)) 
        {
            $i = 1;
            foreach ($locations as $key => $value) {
                $html .= '<div class="location-item" data-item="'.$i.'">';
                    $html .= '<div class="wpb_element_label">'.esc_html__("Location",'fruitshop').' '.$i.'</div>';
                    $html .= '<label>'.esc_html__("Latitude",'fruitshop').'</label><input class="st-input st-location-save st-title" name="'.$i.'[lat]" value="'.$value['lat'].'" type="text" >';
                    $html .= '<label>'.esc_html__("Longitude",'fruitshop').'</label><input class="st-input st-location-save st-des" name="'.$i.'[lon]" value="'.$value['lon'].'" type="text" >';
                    $html .= '<label>'.esc_html__("Marker Title",'fruitshop').'</label><input class="st-input st-location-save st-label" name="'.$i.'[title]" value="'.$value['title'].'" type="text" >';
                    $html .= '<label>'.esc_html__("Info Box",'fruitshop').'</label>';
                    $html .= '<label>'.esc_html__("Info Box",'fruitshop').'</label><textarea id="content'.$i.'" class="st-input st-location-save info-content" name="'.$i.'[boxinfo]">'.$value['boxinfo'].'</textarea>';
                    $html .= '<a href="#" class="st-del-item">delete</a>';
                $html .= '</div>';
                $i++;
            }
        }
        $html .= '</div>';
        $html .= '<div class="add-location"><button style="margin-top: 10px;padding: 5px 12px" class="vc_btn vc_btn-primary vc_btn-sm st-location-add-map" type="button">'.esc_html__('Add more', 'fruitshop').' </button></div>';
        $html .= '<input name="'.$settings['param_name'].'" class="st-location-value wpb_vc_param_value wpb-textinput '.$settings['param_name'].' '.$settings['type'].'_field" type="hidden" value="'.$val.'">';
        return $html;
    }

    // Mutil location param


    if(!class_exists('S7upf_VisualComposerController'))
    {
        class  S7upf_VisualComposerController
        {

            static function _init()
            {
                add_filter('vc_shortcodes_css_class', array(__CLASS__, '_change_class'), 10, 2);
                self::s7upf_add_custum_shortcode_param('s7up_number', array(__CLASS__,'_s7upf_number_field_shortcode_param'));
                add_filter( 'vc_autocomplete_s7upf_blog_post_id_callback', array(__CLASS__,'s7upf_blog_id_post_autocomplete_suggester'),10, 1);
                self::s7upf_add_custum_shortcode_param('s7up_image_check', array(__CLASS__,'_s7upf_image_show_shortcode_param'), get_template_directory_uri(). '/assets/js/vc_js.js');
                $list = array(
                    'post',
                    'page',
                    'headerpage',
                    'footerpage',
                    'megamenupage',
                );
                vc_set_default_editor_post_types( $list );
                self::_custom_vc_param();
            }
            static function s7upf_blog_id_post_autocomplete_suggester( $query ) {
                global $wpdb;
                $post_id = (int) $query;
                $post_meta_infos = $wpdb->get_results( $wpdb->prepare( "SELECT a.ID AS id, a.post_title AS title, b.meta_value AS sku
					FROM {$wpdb->posts} AS a
					LEFT JOIN ( SELECT meta_value, post_id  FROM {$wpdb->postmeta} WHERE `meta_key` = '_sku' ) AS b ON b.post_id = a.ID
					WHERE a.post_type = 'post' AND ( a.ID = '%d' OR b.meta_value LIKE '%%%s%%' OR a.post_title LIKE '%%%s%%' )", $post_id > 0 ? $post_id : - 1, stripslashes( $query ), stripslashes( $query ) ), ARRAY_A );

                $results = array();
                if ( is_array( $post_meta_infos ) && ! empty( $post_meta_infos ) ) {
                    foreach ( $post_meta_infos as $value ) {
                        $data = array();
                        $data['value'] = $value['id'];
                        $data['label'] = __( 'Id', 'fruitshop' ) . ': ' . $value['id'] . ( ( strlen( $value['title'] ) > 0 ) ? ' - ' . __( 'Title', 'fruitshop' ) . ': ' . $value['title'] : '' );
                        $results[] = $data;
                    }
                }

                return $results;
            }
            static function s7upf_add_custum_shortcode_param($name, $form_field_callback, $script_url = null)
            {
                return WpbakeryShortcodeParams::addField($name, $form_field_callback, $script_url);
            }
            static function _change_class($class_string, $tag)
            {
                if ($tag == 'vc_row' || $tag == 'vc_row_inner') {
                    $class_string = str_replace('vc_row-fluid', '', $class_string);
                }

                if (defined('WPB_VC_VERSION')) {
                    if (version_compare(WPB_VC_VERSION, '4.2.3', '>')) {
                        if ($tag == 'vc_column' || $tag == 'vc_column_inner') {
                            $class_string = str_replace('vc_col', 'col', $class_string);
                        }
                    } else {
                        if ($tag == 'vc_column' || $tag == 'vc_column_inner') {
                            $class_string = preg_replace('/vc_span(\d{1,2})/', 'col-lg-$1', $class_string);
                        }
                    }
                }

                return $class_string;
            }

            static function _s7upf_number_field_shortcode_param($settings, $value)
            {
                $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
                $type = isset($settings['type']) ? $settings['type'] : '';
                $min = isset($settings['min']) ? $settings['min'] : '';
                $max = isset($settings['max']) ? $settings['max'] : '';
                $step = isset($settings['step']) ? $settings['step'] : '';
                $suffix = isset($settings['suffix']) ? $settings['suffix'] : '';
                $class = isset($settings['class']) ? $settings['class'] : '';
                $output_html = '<input type="number" min="'.$min.'" max="'.$max.'" step="'.$step.'" class="wpb_vc_param_value st-vc-type-st-number form-control' . $param_name . ' ' . $type . ' ' . $class . '" name="' . $param_name . '" value="'.$value.'"/><span class="suffix">'.$suffix.'</span>';
                return $output_html;
            }
            //Show Image
            static function _s7upf_image_show_shortcode_param($settings, $value){
                if(!empty($settings['element'])){
                    $element = $settings['element'];
                    $param_name = isset($settings['param_name']) ? $settings['param_name'] : '';
                    $width = isset($settings['style_width']) ? $settings['style_width'] : '95';
                    $title_view = isset($settings['title_view']) ? $settings['title_view'] : esc_html__('Zoom in demo','fruitshop');
                    $std = isset($settings['std']) ? $settings['std'] : '';
                    $url_image_default = get_template_directory_uri().'/assets/admin/image/s7up-image-check/'.$param_name.'/'.$std.'.jpg';
                    $html = '<div class="s7up_image_check" data-element="'.$element.'" data-param_name="'.$param_name.'" data-img_url="'.get_template_directory_uri().'/assets/admin/image/s7up-image-check/'.'">';
                    $html .= '<img class = "image_icon_mb" src="'.esc_url($url_image_default).'" alt="Image" style="height:40px; width: '.$width.'%!important;">';
                    $html .= '<span class="title-view-demo">'.$title_view.'</span><i class="fa fa-share" aria-hidden="true"></i></div>';

                    return $html;
                }else{
                    return false;
                }
            }
            static function _custom_vc_param()
            {
                $add_animation = array(
                    array(
                        'type' => 'dropdown',
                        'heading' => esc_html__( 'Style', 'fruitshop' ),
                        'param_name' => 'style',
                        'value' => array(
                            esc_html__( 'Default', 'fruitshop' ) => '',
                            esc_html__( 'Style 2', 'fruitshop' ) => '7up-style2',
                        ),
                        'weight' => 0,
                        'edit_field_class'=>'vc_column hidden',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Tab active', 'fruitshop' ),
                        'param_name' => 'tab_active',
                        'weight' => 0,
                        'edit_field_class'=>'vc_column hidden',
                    ),
                    array(
                        'type' => 'textfield',
                        'heading' => esc_html__( 'Tab ajax', 'fruitshop' ),
                        'param_name' => 'tab_ajax',
                        'weight' => 0,
                        'edit_field_class'=>'vc_column hidden',
                    ),
                );
                vc_add_params('vc_tta_section',$add_animation);

            }
        }
        S7upf_VisualComposerController::_init();
    }

    
}
