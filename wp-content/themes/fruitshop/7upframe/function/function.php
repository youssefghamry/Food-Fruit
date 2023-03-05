<?php
/**
 * Created by Sublime Text 2.
 * User: thanhhiep992
 * Date: 12/08/15
 * Time: 10:20 AM
 */
 
/******************************************Core Function******************************************/
//Get option
if(!function_exists('s7upf_get_option')){
	function s7upf_get_option($key,$default=NULL)
    {
        if(function_exists('ot_get_option'))
        {
            return ot_get_option($key,$default);
        }

        return $default;
    }
}

//get option both id
if(!function_exists('s7upf_get_option_both_id')){
    function s7upf_get_option_both_id($id_option, $id_metabox, $key_check, $value=NULL){
        $key_check_metabox = get_post_meta(get_the_ID(),$key_check,true);
        $key_check_option = s7upf_get_option($key_check);
        if('on' == $key_check_option){
            $value = s7upf_get_option($id_option,$value);
        }
        if('on'==$key_check_metabox){
            $value = get_post_meta(get_the_ID(),$id_metabox,true);
        }else if('off' == $key_check_metabox){
            return;
        }
        return $value;
    }
}
//Get list header page
if(!function_exists('s7upf_list_header_page'))
{
    function s7upf_list_header_page()
    {
        global $post;
        $post_temp = $post;
        $page_list = array();
        $page_list[] = array(
            'value' => '',
            'label' => esc_html__('-- Choose One --','fruitshop')
        );
        /*$args= array(
        'post_type' => 'headerpage',
        'posts_per_page' => -1, 
        );
        $query = new WP_Query($args);
        if($query->have_posts()): while ($query->have_posts()):$query->the_post();
                $page_list[] = array(
                    'value' => $post->ID,
                    'label' => $post->post_title
                );
            endwhile;
        endif;
        wp_reset_postdata();*/
        if(is_admin()){
            $pages = get_posts( array( 'post_type' => 'headerpage', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );
            if(is_array($pages)){
                foreach ($pages as $page) {
                    $page_list[] = array(
                        'value' => $page->ID,
                        'label' => $page->post_title,
                    );
                }
            }
        }
        $post = $post_temp;
        return $page_list;
    }
}

//Get list footer page
if(!function_exists('s7upf_list_footer_page'))
{
    function s7upf_list_footer_page()
    {
        global $post;
        $post_temp = $post;
        $page_list = array();
        $page_list[] = array(
            'value' => '',
            'label' => esc_html__('-- Choose One --','fruitshop')
        );
       /* $args= array(
        'post_type' => 'footerpage',
        'posts_per_page' => -1,
        );
        $query = new WP_Query($args);
        if($query->have_posts()): while ($query->have_posts()):$query->the_post();
                $page_list[] = array(
                    'value' => $post->ID,
                    'label' => $post->post_title
                );
            endwhile;
        endif;
        wp_reset_postdata();*/
        if(is_admin()){
            $pages = get_posts( array( 'post_type' => 'footerpage', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );
            if(is_array($pages)){
                foreach ($pages as $page) {
                    $page_list[] = array(
                        'value' => $page->ID,
                        'label' => $page->post_title,
                    );
                }
            }
        }
        $post = $post_temp;
        return $page_list;
    }
}

//Get list mega menu page
if(!function_exists('s7upf_list_meage_menu_page'))
{
    function s7upf_list_meage_menu_page()
    {
        global $post;
        $post_temp = $post;
        $page_list = array();
        $page_list[''] = esc_html__('None','fruitshop');
       /* $args= array(
        'post_type' => 'megamenupage',
        'posts_per_page' => -1,
        );
        $query = new WP_Query($args);
        if($query->have_posts()): while ($query->have_posts()):$query->the_post();
            $page_list[$post->ID] = $post->post_title;
        endwhile;
        endif;
        wp_reset_postdata();*/
        if(is_admin()){
            $pages = get_posts( array( 'post_type' => 'megamenupage', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );
            if(is_array($pages)){
                foreach ($pages as $page) {
                    $page_list[$page->ID] = $page->post_title;
                }
            }
        }
        $post = $post_temp;
        return $page_list;
    }
}

//Get list mega menu page
if(!function_exists('s7upf_list_vc_meage_menu_page'))
{
    function s7upf_list_vc_meage_menu_page()
    {
        global $post;
        $post_temp = $post;
        $page_list = array();
        $page_list[esc_html__('None','fruitshop')] = 'none';
        /*$args= array(
        'post_type' => 'megamenupage',
        'posts_per_page' => -1,
        );
        $query = new WP_Query($args);
        if($query->have_posts()): while ($query->have_posts()):$query->the_post();
            $page_list[$post->post_title] = $post->ID;
        endwhile;
        endif;
        wp_reset_postdata();*/
        if(is_admin()){
            $pages = get_posts( array( 'post_type' => 'megamenupage', 'posts_per_page' => -1, 'orderby' => 'title', 'order' => 'ASC' ) );
            if(is_array($pages)){
                foreach ($pages as $page) {
                    $page_list[$page->post_title] = $page->ID;
                }
            }
        }
        $post = $post_temp;
        return $page_list;
    }
}

//Get list sidebar
if(!function_exists('s7upf_get_sidebar_ids'))
{
    function s7upf_get_sidebar_ids($for_optiontree=false)
    {
        global $wp_registered_sidebars;
        $r=array();
        $r[]=esc_html__('--Select--','fruitshop');
        if(!empty($wp_registered_sidebars)){
            foreach($wp_registered_sidebars as $key=>$value)
            {

                if($for_optiontree){
                    $r[]=array(
                        'value'=>$value['id'],
                        'label'=>$value['name']
                    );
                }else{
                    $r[$value['id']]=$value['name'];
                }
            }
        }
        return $r;
    }
}

//Get order list
if(!function_exists('s7upf_get_order_list'))
{
    function s7upf_get_order_list($current=false,$extra=array(),$return='array')
    {
        $default = array(
            esc_html__('None','fruitshop')               => 'none',
            esc_html__('Post ID','fruitshop')            => 'ID',
            esc_html__('Author','fruitshop')             => 'author',
            esc_html__('Post Title','fruitshop')         => 'title',
            esc_html__('Post Name','fruitshop')          => 'name',
            esc_html__('Post Date','fruitshop')          => 'date',
            esc_html__('Last Modified Date','fruitshop') => 'modified',
            esc_html__('Post Parent','fruitshop')        => 'parent',
            esc_html__('Random','fruitshop')             => 'rand',
            esc_html__('Comment Count','fruitshop')      => 'comment_count',
            esc_html__('View Post','fruitshop')          => 'post_views',
            esc_html__('Like Post','fruitshop')          => '_post_like_count',
            esc_html__('Custom Modified Date','fruitshop')=> 'time_update',            
        );

        if(!empty($extra) and is_array($extra))
        {
            $default=array_merge($default,$extra);
        }

        if($return=="array")
        {
            return $default;
        }elseif($return=='option')
        {
            $html='';
            if(!empty($default)){
                foreach($default as $key=>$value){
                    $selected=selected($key,$current,false);
                    $html.="<option {$selected} value='{$key}'>{$value}</option>";
                }
            }
            return $html;
        }
    }
}

// Get sidebar
if(!function_exists('s7upf_get_sidebar'))
{
    function s7upf_get_sidebar()
    {
        $default=array(
            'position'=>'right',
            'id'      =>'blog-sidebar'
        );

        return apply_filters('s7upf_get_sidebar',$default);
    }
}

//Favicon
if(!function_exists('s7upf_load_favicon') )
{
    function s7upf_load_favicon()
    {
        $value = s7upf_get_option('favicon');
        $favicon = (isset($value) && !empty($value))?$value:false;
        if($favicon)
            echo '<link rel="Shortcut Icon" href="' . esc_url( $favicon ) . '" type="image/x-icon" />' . "\n";
    }
}
if(!function_exists( 'wp_site_icon' ) ){
    add_action( 'wp_head','s7upf_load_favicon');
    add_action('login_head', 's7upf_load_favicon');
    add_action('admin_head', 's7upf_load_favicon');
}

//Fill css background
if(!function_exists('s7upf_fill_css_background'))
{
    function s7upf_fill_css_background($data)
    {
        $string = '';
        if(!empty($data['background-color'])) $string .= 'background-color:'.$data['background-color'].';'."\n";
        if(!empty($data['background-repeat'])) $string .= 'background-repeat:'.$data['background-repeat'].';'."\n";
        if(!empty($data['background-attachment'])) $string .= 'background-attachment:'.$data['background-attachment'].';'."\n";
        if(!empty($data['background-position'])) $string .= 'background-position:'.$data['background-position'].';'."\n";
        if(!empty($data['background-size'])) $string .= 'background-size:'.$data['background-size'].';'."\n";
        if(!empty($data['background-image'])) $string .= 'background-image:url("'.$data['background-image'].'");'."\n";
        if(!empty($string)) return S7upf_Assets::build_css($string);
        else return false;
    }
}

// Get list menu
if(!function_exists('s7upf_list_menu_name'))
{
    function s7upf_list_menu_name()
    {
        $menu_nav = wp_get_nav_menus();
        $menu_list = array('Default' => 'primary');
        if(is_array($menu_nav) && !empty($menu_nav))
        {
            foreach($menu_nav as $item)
            { 
                if(is_object($item))
                {
                    $menu_list[$item->name] = $item->slug;
                }
            }
        }
        return $menu_list;
    }
}
//Get current ID
if(!function_exists('s7upf_get_current_id')){   
    function s7upf_get_current_id(){
        $id = get_the_ID();
        if(is_front_page() && is_home()) $id = (int)get_option( 'page_on_front' );
        if(!is_front_page() && is_home()) $id = (int)get_option( 'page_for_posts' );
        if(is_archive() || is_search()) $id = 0;
        if (class_exists('woocommerce')) {
            if(is_shop()) $id = (int)get_option('woocommerce_shop_page_id');
            if(is_cart()) $id = (int)get_option('woocommerce_cart_page_id');
            if(is_checkout()) $id = (int)get_option('woocommerce_checkout_page_id');
            if(is_account_page()) $id = (int)get_option('woocommerce_myaccount_page_id');
        }
        return $id;
    }
}
function s7upf_breadcrumb(){
    /* === OPTIONS === */
    $text['home']     = esc_html__('Home','fruitshop');
    $text['category'] = esc_html__('%s','fruitshop');
    $text['tax'] 	  = esc_html__('Archive for "%s"','fruitshop');
    $text['search']   = esc_html__('Search Results for "%s" Query','fruitshop');
    $text['tag']      = esc_html__('%s','fruitshop');
    $text['author']   = esc_html__('Articles Posted by %s','fruitshop');
    $text['404']      = esc_html__('Error 404','fruitshop');
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 1; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = '<span class="delimiter"> // </span>';
    $delimiter_cat   = ' , ';
    $before      = '<span class="current">';
    $after       = '</span>';
    /* === END OF OPTIONS === */
    global $post;
    $homeLink = home_url('url') . '/';
    $linkBefore = '<span class = "mb">';
    $linkAfter = '</span>';

    $link = $linkBefore . '<a class="white" href="%1$s">%2$s</a>' . $linkAfter;
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a>';
        if(!is_front_page()) echo ''.$delimiter.$before.esc_html__("Blog","fruitshop").$after;
        if ($showOnHome == 1) echo '</div>';
    } else {
        echo '<div id="crumbs" >' . sprintf($link, $homeLink, $text['home']) . $delimiter;

        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a', $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo balanceTags($cats);
            }
            echo balanceTags($before . sprintf($text['category'], single_cat_title('', false)) . $after);
        } elseif( is_tax() ){
            $thisCat = get_category(get_query_var('cat'), false);
            if (!is_wp_error($thisCat) and $thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' , $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo balanceTags($cats);
            }
            echo balanceTags($before . sprintf($text['tax'], single_cat_title('', false)) . $after);

        }elseif ( is_search() ) {
            echo balanceTags($before . sprintf($text['search'], get_search_query()) . $after);
        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo balanceTags($before . get_the_time('d') . $after);
        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo balanceTags($before . get_the_time('F') . $after);
        } elseif ( is_year() ) {
            echo balanceTags($before . get_the_time('Y') . $after);
        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($showCurrent == 1) echo balanceTags($delimiter . $before . get_the_title() . $after);
            } else {
                $cat = get_the_category();
                foreach ($cat as $key=>$value){
                    if($key+1 == count($cat)){
                        $cats = get_category_parents($value, TRUE, $delimiter);
                    }else{
                        $cats = get_category_parents($value, TRUE, $delimiter_cat);
                    }
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $linkBefore . '<a' , $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo balanceTags($cats);
                }
                if ($showCurrent == 1) echo balanceTags($before . get_the_title() . $after);
            }
        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo balanceTags($before . $post_type->labels->singular_name . $after);
        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a', $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo balanceTags($cats);
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo balanceTags($delimiter . $before . get_the_title() . $after);
        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo balanceTags($before . get_the_title() . $after);
        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_post($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo balanceTags($breadcrumbs[$i]);
                if ($i != count($breadcrumbs)-1) echo balanceTags($delimiter);
            }
            if ($showCurrent == 1) echo balanceTags($delimiter . $before . get_the_title() . $after);
        } elseif ( is_tag() ) {
            echo balanceTags($before . sprintf($text['tag'], single_tag_title('', false)) . $after);
        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo balanceTags($before . sprintf($text['author'], $userdata->display_name) . $after);
        } elseif ( is_404() ) {
            echo balanceTags($before . $text['404'] . $after);
        }
        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo esc_html__('Page','fruitshop') . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }
        echo '</div>';
    }
}
//Display BreadCrumb
if(!function_exists('s7upf_display_breadcrumb'))
{
    function s7upf_display_breadcrumb()
    {
        if(is_single()){
            $enable_banner = s7upf_get_value_by_id('enable_banner_single');
            $bg_image_banner = s7upf_get_option_both_id('bg_image_banner_blog_single','bg_image_banner_blog_single','enable_banner_single');
            $title_banner = s7upf_get_option_both_id('title_banner_blog_single','title_banner_blog_single','enable_banner_single');
            if(class_exists('WC_Product') and is_woocommerce()){
                $enable_banner = s7upf_get_value_by_id('s7upf_show_banner_product_detail');
                $bg_image_banner =  s7upf_get_option_both_id('s7upf_banner_bg_product_detail','s7upf_banner_bg_product_detail','s7upf_show_banner_product_detail');
                $title_banner =  s7upf_get_option_both_id('s7upf_banner_title_product_detail','s7upf_banner_title_product_detail','s7upf_show_banner_product_detail');
            }
        }else if(is_search()){
            $enable_banner = s7upf_get_option('enable_banner_blog_list');
            $bg_image_banner = s7upf_get_option('bg_image_banner_blog_list');
            if(have_posts()){
                $title_banner = esc_html__('Search result for "','fruitshop').get_search_query().'"';
            }else{
                $title_banner = esc_html__('Nothing Found!','fruitshop');
            }
        }else if(is_archive()){
            $enable_banner = s7upf_get_option('enable_banner_blog_list');
            $title_banner = get_the_archive_title();
            $bg_image_banner = s7upf_get_option('bg_image_banner_blog_list');
            if(class_exists('WC_Product') and is_woocommerce()){
                $enable_banner = s7upf_get_metabox_shop_cat('s7upf_show_banner_product_list','s7upf_show_banner_product_list');
                $bg_image_banner =  s7upf_get_metabox_check_on_off_shop_cat('cat-banner-image','s7upf_banner_bg_product_list','s7upf_show_banner_product_list');
                if(is_shop()){
                    $title_banner =  s7upf_get_option('s7upf_banner_title_product_list');
                }else if(is_product_category()){
                    $title_banner =  s7upf_get_metabox_check_on_off_shop_cat('cat-title-banner','s7upf_banner_title_product_list','s7upf_show_banner_product_list');
                }
            }
        }else if(is_home()){
            $enable_banner = s7upf_get_option('enable_banner_blog_list');
            $title_banner = s7upf_get_option('title_banner_blog_list');
            $bg_image_banner = s7upf_get_option('bg_image_banner_blog_list');
        }else if(is_page()){
            $enable_banner = get_post_meta(get_the_ID(),'enable_banner_page',true);
            $title_banner = get_post_meta(get_the_ID(),'title_banner_blog_page',true);
            $bg_image_banner = get_post_meta(get_the_ID(),'bg_image_banner_blog_page',true);

        }else if(is_404()){
            $enable_banner = s7upf_get_option('enable_banner_404_page');
            $title_banner =  s7upf_get_option('title_banner_404_page');
            $bg_image_banner =  s7upf_get_option('bg_image_banner_404_page');
        }else{
            $title_banner = '';
            $bg_image_banner = '';
            $enable_banner = 'off';
        }
        if($enable_banner == 'on'){
            ?>
            <div class="mb-banner-pro shop-banner banner-quangcao line-scale zoom-image <?php if(empty($bg_image_banner)) echo 'mb_no_image_banner'; ?>">
                <?php if(!empty($bg_image_banner)){?>
                <div class="adv-thumb-link">
                    <img src="<?php echo esc_url($bg_image_banner); ?>" alt="banner">
                </div>
                <?php } ?>
                <div class="banner-info">
                    <?php if(!empty($title_banner)){ ?>
                    <h2 class="title30 color"><?php echo esc_attr($title_banner);?></h2>
                    <?php } ?>
                    <div class="bread-crumb white">
                    <?php if(class_exists('WC_Product') and is_woocommerce()) woocommerce_breadcrumb(); else echo s7upf_breadcrumb();?>
                    </div>
                </div>
            </div>
        <?php }
    }
}

//Get page value by ID
if(!function_exists('s7upf_get_value_by_id'))
{   
    function s7upf_get_value_by_id($key)
    {
        if(!empty($key)){
            $id = get_the_ID();
            if(is_front_page() && is_home()) $id = (int)get_option( 'page_on_front' );
            if(!is_front_page() && is_home()) $id = (int)get_option( 'page_for_posts' );
            if(is_archive() || is_search()) $id = 0;
            if (class_exists('woocommerce')) {
                if(is_shop()) $id = (int)get_option('woocommerce_shop_page_id');
                if(is_cart()) $id = (int)get_option('woocommerce_cart_page_id');
                if(is_checkout()) $id = (int)get_option('woocommerce_checkout_page_id');
                if(is_account_page()) $id = (int)get_option('woocommerce_myaccount_page_id');
            }
            $value = get_post_meta($id,$key,true);
            if(empty($value)) $value = s7upf_get_option($key);
            return $value;
        }
        else return 'Missing a variable of this funtion';
    }
}

//Check woocommerce page
if (!function_exists('s7upf_is_woocommerce_page')) {
    function s7upf_is_woocommerce_page() {
        if(  function_exists ( "is_woocommerce" ) && is_woocommerce()){
                return true;
        }
        $woocommerce_keys   =   array ( "woocommerce_shop_page_id" ,
                                        "woocommerce_terms_page_id" ,
                                        "woocommerce_cart_page_id" ,
                                        "woocommerce_checkout_page_id" ,
                                        "woocommerce_pay_page_id" ,
                                        "woocommerce_thanks_page_id" ,
                                        "woocommerce_myaccount_page_id" ,
                                        "woocommerce_edit_address_page_id" ,
                                        "woocommerce_view_order_page_id" ,
                                        "woocommerce_change_password_page_id" ,
                                        "woocommerce_logout_page_id" ,
                                        "woocommerce_lost_password_page_id" ) ;
        foreach ( $woocommerce_keys as $wc_page_id ) {
                if ( get_the_ID () == get_option ( $wc_page_id , 0 ) ) {
                        return true ;
                }
        }
        return false;
    }
}

//navigation
if(!function_exists('s7upf_paging_nav'))
{
    function s7upf_paging_nav()
    {
        // Don't print empty markup if there's only one page.
        if ( $GLOBALS['wp_query']->max_num_pages < 2 ) {
            return;
        }

        $paged        = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;
        $pagenum_link = html_entity_decode( get_pagenum_link() );
        $query_args   = array();
        $url_parts    = explode( '?', $pagenum_link );

        if ( isset( $url_parts[1] ) ) {
            wp_parse_str( $url_parts[1], $query_args );
        }

        $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
        $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

        $format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
        $format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

        // Set up paginated links.
        $links = paginate_links( array(
            'base'     => $pagenum_link,
            'format'   => $format,
            'total'    => $GLOBALS['wp_query']->max_num_pages,
            'current'  => $paged,
            'mid_size' => 1,
            'add_args' => array_map( 'urlencode', $query_args ),
            'prev_text' => esc_html__( '&larr;', 'fruitshop' ),
            'next_text' => esc_html__( '&rarr;', 'fruitshop' ),
        ) );

        if ($links) : ?>
        <div class="row">
            <div class="col-md-12 tp-pagination">
                <nav class="navigation paging-navigation" role="navigation">
                    <div class="pagination loop-pagination">
                        <?php echo balanceTags($links); ?>
                    </div><!-- .pagination -->
                </nav><!-- .navigation -->
            </div>
        </div>
        <?php endif;
    }
}

//Set post view
if(!function_exists('s7upf_set_post_view'))
{
    function s7upf_set_post_view($post_id=false)
    {
        if(!$post_id) $post_id=get_the_ID();

        $view=(int)get_post_meta($post_id,'post_views',true);
        $view++;
        update_post_meta($post_id,'post_views',$view);
    }
}

if(!function_exists('s7upf_get_post_view'))
{
    function s7upf_get_post_view($post_id=false)
    {
        if(!$post_id) $post_id=get_the_ID();

        return (int)get_post_meta($post_id,'post_views',true);
    }
}

//remove attr embed
if(!function_exists('s7upf_remove_w3c')){
    function s7upf_remove_w3c($embed_code){
        $embed_code=str_replace('webkitallowfullscreen','',$embed_code);
        $embed_code=str_replace('mozallowfullscreen','',$embed_code);
        $embed_code=str_replace('frameborder="0"','',$embed_code);
        $embed_code=str_replace('frameborder="no"','',$embed_code);
        $embed_code=str_replace('scrolling="no"','',$embed_code);
        $embed_code=str_replace('&','&amp;',$embed_code);
        return $embed_code;
    }
}

// MetaBox
if(!function_exists('s7upf_display_metabox'))
{
    function s7upf_display_metabox($type ='') {
        switch ($type) {
            case 'blog':?>
                <ul class="list-inline-block blog-comment-date">
                    <li class="mb-category"><label><?php echo esc_html__('Category: ','fruitshop'); ?></label><?php echo get_the_category_list(', ');?></li>
                    <li><label><?php echo esc_html__('Date: ','fruitshop'); ?></label><span class="color"><?php echo get_the_date(get_option('date_format')); ?></span></li>
                    <li>
                        <label> <?php
                            if(get_comments_number()>1) esc_html_e('Comments: ', 'fruitshop') ;
                            else esc_html_e('Comment: ', 'fruitshop') ;
                            ?>
                        </label>
                        <a href="<?php echo esc_url( get_comments_link() ); ?>" class="color"><?php echo get_comments_number(); ?></a>
                    </li>
                </ul>
                <?php
                break;

            case 'blog_masonry':?>
                <ul class="list-inline-block blog-comment-date">
                    <li><label><?php echo esc_html__('Date: ','fruitshop'); ?></label><span class="color"><?php echo get_the_date(get_option('date_format')); ?></span></li>
                    <li>
                        <label> <?php
                            if(get_comments_number()>1) esc_html_e('Comments: ', 'fruitshop') ;
                            else esc_html_e('Comment: ', 'fruitshop') ;
                            ?>
                        </label>
                        <a href="<?php echo esc_url( get_comments_link() ); ?>" class="color"><?php echo get_comments_number(); ?></a>
                    </li>
                </ul>
                <?php
                break;

            case 'single':?>
                <div class="tp-meta">
                    <span class="tp-meta-date"><i class="fa fa-calendar"></i> <?php echo get_the_date('d M Y,'); ?></span> 
                    <span class="tp-meta-admin"><i class="fa fa-user"></i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a> , </span> 
                    <span class="tp-meta-comments"><i class="fa fa-comments"></i> [<?php echo get_comments_number(); ?>]
                        <a href="<?php echo esc_url( get_comments_link() ); ?>">
                            <?php 
                            if(get_comments_number()>1) esc_html_e('Comments', 'fruitshop') ;
                            else esc_html_e('Comment', 'fruitshop') ;
                            ?>
                        </a>
                    </span>
                </div>
                <?php
                break;
            case 'share_post':?>
                <div class="text-right blog-social">
                    <span><?php echo esc_html__('Share: ','fruitshop'); ?></span>
                    <a class="share-face silver" target="popup" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"><i class="fa fa-facebook"></i></a>
                    <a class="share-twitter silver" target="popup" href="http://twitter.com/share?url=<?php the_permalink() ?>"><i class="fa fa-twitter "></i></a>
                    <a class="no-open share-pin silver" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" target="popup"><i class="fa fa-pinterest"></i></a>
                    <a class="share-google silver" target="popup"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
                </div>
                <?php
                break;
            case 'tag_share':
                $enable_share_single =  s7upf_get_option('enable_share_single','on');
                $cats = get_the_tag_list(' ',', ',' ');
                if($enable_share_single === 'on' || !empty($cats)) { ?>
                    <div class="table tags-share">
                        <?php
                        if ($cats) { ?>
                            <div class="text-left">
                                <div class="single-tabs">
                                    <span><?php echo esc_html__('Tag: ', 'fruitshop');
                                        echo balanceTags($cats); ?></span>
                                </div>
                            </div>
                        <?php }
                        if($enable_share_single == 'on'){?>
                            <div class="text-right blog-social">
                                <span><?php echo esc_html__('Share: ','fruitshop')?></span>
                                <a class="share-face silver" target="popup" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink() ?>"><i class="fa fa-facebook"></i></a>
                                <a class="share-twitter silver" target="popup" href="http://twitter.com/share?url=<?php the_permalink() ?>"><i class="fa fa-twitter "></i></a>
                                <a class="no-open share-pin silver" href="javascript:void((function()%7Bvar%20e=document.createElement('script');e.setAttribute('type','text/javascript');e.setAttribute('charset','UTF-8');e.setAttribute('src','http://assets.pinterest.com/js/pinmarklet.js?r='+Math.random()*99999999);document.body.appendChild(e)%7D)());" target="popup"><i class="fa fa-pinterest"></i></a>
                                <a class="share-google silver" target="popup"  href="https://plus.google.com/share?url=<?php the_permalink(); ?>"><i class="fa fa-google-plus"></i></a>
                            </div>
                        <?php } ?>
                    </div>
                    <?php
                }
                break;
                case 'author':
                    $desc_author = get_the_author_meta('description');
                    if(!empty($desc_author)) {
                        ?>
                        <div class="single-author table">
                            <div class="single-author-avatar">
                                <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_avatar(get_the_author_meta('ID'), 130); ?></a>
                            </div>
                            <div class="single-author-info">
                                <h3 class="title18 font-bold"><a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" class="black"><?php echo get_the_author(); ?></a></h3>
                                <p class="desc"><?php echo get_the_author_meta('description'); ?></p>
                            </div>
                        </div>
                        <?php
                    }
                break;
                case 'next_prev':
                    $previous = get_previous_post();
                    $next = get_next_post();
                    if(get_previous_post() || get_next_post()) { ?>
                        <div class="single-post-control table">
                            <?php if(!empty($previous)){ ?>
                            <div class="text-left post-control-prev">
                                <?php previous_post_link('%link', esc_html__('Prev','fruitshop')); ?>

                                <h3 class="title14 font-bold"><a href="<?php echo esc_url(get_preview_post_link($previous->ID))?>" class="black"><?php echo get_the_title($previous->ID); ?></a></h3>
                            </div>
                            <?php } if(!empty($next)){?>
                            <div class="text-right post-control-next">
                                <?php next_post_link('%link',  esc_html__('Next','fruitshop')); ?>
                                <h3 class="title14 font-bold"><a href="<?php echo esc_url(get_preview_post_link($next->ID))?>" class="black"><?php echo get_the_title($next->ID); ?></a></h3>
                            </div>
                            <?php } ?>
                        </div>

                        <?php
                    }
                break;

            default:?>
                <ul class="post_meta_links">
                    <li class="date"><?php echo get_the_time('d F Y')?></li>
                    <li class="post_by"><i><?php esc_html_e('by', 'fruitshop');?>:</i> <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"><?php echo get_the_author(); ?></a></li>
                    <li class="post_categoty"><i><?php esc_html_e('in', 'fruitshop');?>:</i>
                        <?php $cats = get_the_category_list(', ');?>
                        <?php if($cats) echo balanceTags($cats); else esc_html_e("No Category",'fruitshop');?>
                    </li>
                    <li class="post_categoty st_post_tag"><i><?php esc_html_e('tag', 'fruitshop');?>:</i>
                        <?php $cats = get_the_tag_list(' ',', ',' ');?>
                        <?php if($cats) echo balanceTags($cats); else esc_html_e("No Tag",'fruitshop');?>
                    </li>
                    <li class="post_comments"><i><?php esc_html_e('note', 'fruitshop');?>:</i> <a href="<?php echo esc_url( get_comments_link() ); ?>"><?php echo get_comments_number(); ?> 
                        <?php 
                            if(get_comments_number()>1) esc_html_e('Comments', 'fruitshop') ;
                            else esc_html_e('Comment', 'fruitshop') ;
                        ?>
                    </a></li>
                </ul>                
                <?php
                break;
        }
    ?>        
    <?php
    }
}
if(!function_exists('s7upf_get_header_default')){
    function s7upf_get_header_default(){
        $s7upf_menu_fixed = s7upf_get_option('s7upf_menu_fixed','on');
        ?>
        <div class="nav-header bg-white <?php if($s7upf_menu_fixed == 'on') echo 'header-ontop'; ?> mb-header-default head-default-function">
			<div class="container">
                <div class="row">
                    <div class="col-md-3 logo">
                        <a href="<?php echo esc_url(home_url('/'));?>" title="<?php echo esc_attr__("logo",'fruitshop');?>">
                            <?php $s7upf_logo=s7upf_get_option('logo');?>
                            <?php if($s7upf_logo!=''){
                                echo '<h1 class="hidden">'.get_bloginfo('name', 'display').'</h1><img src="' . esc_url($s7upf_logo) . '" alt="logo">';
                            }   else { echo '<h1>'.get_bloginfo('name', 'display').'</h1>'; }
                            ?>
                        </a>
                    </div>
                    <div class="col-md-9">
                        <nav class="main-nav main-nav1">
                            <?php if ( has_nav_menu( 'primary' ) ) {
                                wp_nav_menu( array(
                                        'theme_location' => 'primary',
                                        'container'=>false,
                                        'walker'=>new S7upf_Walker_Nav_Menu(),
                                     )
                                );
                            } ?>
                            <a href="#" class="toggle-mobile-menu"><span></span></a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}
if(!function_exists('s7upf_get_footer_default')){
    function s7upf_get_footer_default(){
        ?>
        <div id="footer" class="default-footer">
            <div class="container">
                <div class="policy-payment3 border-top">
                    <p class="desc copyright3"><?php esc_html_e("Copyright &copy; 2017 Fruit Store - All Rights Reserved.",'fruitshop')?> <a href="#"><span><?php esc_html_e("7uptheme",'fruitshop')?></span>.<?php esc_html_e("com",'fruitshop')?></a>.</p>
                </div>
            </div>
        </div>
        <?php
    }
}
if(!function_exists('s7upf_get_footer_visual')){
    function s7upf_get_footer_visual($page_id){
        ?>
        <div id="footer" class="footer-page">
            <div class="container">
                <?php echo S7upf_Template::get_vc_pagecontent($page_id);?>
            </div>
        </div>
        <?php
    }
}
if(!function_exists('s7upf_get_header_visual')){
    function s7upf_get_header_visual($page_id){
        ?>
        <div class="container">
            <?php echo S7upf_Template::get_vc_pagecontent($page_id);?>
        </div>
        <?php
    }
}
if(!function_exists('s7upf_get_main_class')){
    function s7upf_get_main_class(){
        $sidebar=s7upf_get_sidebar();
        $sidebar_pos=$sidebar['position'];
        $main_class = 'col-md-12';
        if($sidebar_pos != 'no') $main_class = 'col-md-9 col-sm-8 col-xs-12';
        return $main_class;
    }
}
if(!function_exists('s7upf_output_sidebar')){
    function s7upf_output_sidebar($position){
        $sidebar = s7upf_get_sidebar();
        $sidebar_pos = $sidebar['position'];
        if($sidebar_pos == $position) get_sidebar();
    }
}

if(!function_exists('s7upf_get_import_category')){
    function s7upf_get_import_category($taxonomy){
        $cats = get_terms($taxonomy);
        $data_json = '{';
        foreach ($cats as $key => $term) {
            $thumb_cat_id = get_woocommerce_term_meta( $term->term_id, 'thumbnail_id', true );
            $term_pa = get_term_by( 'id',$term->parent, $taxonomy );
            if(isset($term_pa->slug)) $slug_pa = $term_pa->slug;
            else $slug_pa = '';
            if($key > 0) $data_json .= ',';
            $data_json .= '"'.$term->slug.'":{"thumbnail":"'.$thumb_cat_id.'","parent":"'.$slug_pa.'"}';
        }
        $data_json .= '}';
        echo balanceTags($data_json);
    }
}
if(!function_exists('s7upf_fix_import_category')){
    function s7upf_fix_import_category($taxonomy){
        global $s7upf_config;
        $data = $s7upf_config['import_category'];
        if(!empty($data)){
            $data = json_decode($data,true);
            foreach ($data as $cat => $value) {
                $parent_id = 0;
                $term = get_term_by( 'slug',$cat, $taxonomy );
                $term_parent = get_term_by( 'slug', $value['parent'], $taxonomy );
                if(isset($term_parent->term_id)) $parent_id = $term_parent->term_id;
                if($parent_id) wp_update_term( $term->term_id, $taxonomy, array('parent'=> $parent_id) );
                if($value['thumbnail']){
                    if($taxonomy == 'product_cat')  update_metadata( 'woocommerce_term', $term->term_id, 'thumbnail_id', $value['thumbnail']);
                    else{
                        update_term_meta( $term->term_id, 'thumbnail_id', $value['thumbnail']);
                    }
                }
            }
        }
    }
}
if ( ! function_exists( 's7upf_get_google_link' ) ) {
    function s7upf_get_google_link() {
        $protocol = is_ssl() ? 'https' : 'http';
        $fonts_url = '';
        $fonts  = array(
                    'Poppins:300,400,700,500',
                    'Lato:300,400,700',
                );
        if ( $fonts ) {
            $fonts_url = add_query_arg( array(
                'family' => urlencode( implode( '|', $fonts ) ),
            ), $protocol.'://fonts.googleapis.com/css' );
        }

        return $fonts_url;
    }
}
// get list taxonomy
if(!function_exists('s7upf_list_taxonomy'))
{
    function s7upf_list_taxonomy($taxonomy,$show_all = true)
    {
        if($show_all) $list = array('--Select--' => '');
        else $list = array();
        if(!isset($taxonomy) || empty($taxonomy)) $taxonomy = 'category';
        $tags = get_terms($taxonomy);
        if(is_array($tags) && !empty($tags)){
            foreach ($tags as $tag) {
                $list[$tag->name] = $tag->slug;
            }
        }
        return $list;
    }
}
// Mini cart
if(!function_exists('s7upf_mini_cart')) {
    function s7upf_mini_cart($echo = false)
    {
        $default_image = get_template_directory_uri().'/assets/images/placeholder.png';

        if (!WC()->cart->is_empty()) {
            ?>
            <h2 class="title18 color cart-item-count">(<span><?php echo count( WC()->cart->get_cart() );?></span>)<?php echo(count( WC()->cart->get_cart() )>1)? esc_html__(' ITEMS IN MY CART','fruitshop'): esc_html__(' ITEM IN MY CART','fruitshop'); ?> </h2>
            <div class="list-mini-cart-item woocommerce">
                <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                    $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
                    $thumb_html = '<img alt="" src="'.$default_image.'">';
                    if(has_post_thumbnail($product_id)) $thumb_html = $_product->get_image(array(88,88));

                    $post_object = get_post( $_product->get_id() );
                    setup_postdata( $GLOBALS['post'] =& $post_object );
                    ?>
                    <div class="product-mini-cart table item-info-cart mb-style-minicart" data-key="<?php echo esc_attr($cart_item_key); ?>">
                        <div class="product-thumb">
                            <a href="<?php echo esc_url( $_product->get_permalink( $cart_item )); ?>">
                                <?php echo ($thumb_html);?>
                            </a>
                            <a data-product-id="<?php echo esc_attr($cart_item['product_id']);?>" href="<?php the_permalink(); ?>" class="quickview-link product-ajax-popup"><i class="fa fa-search" aria-hidden="true"></i></a>
                        </div>
                        <div class="product-info">
                            <h3 class="product-title">
                            <a href="<?php echo esc_url( $_product->get_permalink( $cart_item )); ?>"><?php echo esc_html($_product->get_title()); ?></a>
                            </h3>
                            <div class="product-price">
                                <?php
                                echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                    '<a href="%s" class="remove remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="fa fa-trash-o" aria-hidden="true"></i></a>',
                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                    esc_html__( 'Remove this item', 'fruitshop' ),
                                    esc_attr( $product_id ),
                                    esc_attr( $cart_item_key ),
                                    esc_attr( $_product->get_sku() )
                                ), $cart_item_key );

                                echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                ?>
                                <div class="mini-cart-qty">x <span><?php echo esc_attr($cart_item['quantity']); ?></span></div>
                            </div>
                            <?php echo s7upf_get_rating_html(); ?>
                        </div>

                    </div>
                <?php } ?>
            </div>
            <div class="mini-cart-total  clearfix">
                <strong class="pull-left title18"><?php echo esc_html__('TOTAL','fruitshop')?></strong>
                <span class="pull-right color title18"><?php echo WC()->cart->get_cart_subtotal(); ?></span>
            </div>
            <div class="mini-cart-button">
                <a class="mini-cart-view shop-button" href="<?php echo esc_url(wc_get_cart_url())?>"><?php echo esc_html__('View cart','fruitshop')?></a>
                <a class="mini-cart-checkout shop-button" href="<?php echo esc_url(wc_get_checkout_url())?>"><?php echo esc_html__('Checkout','fruitshop')?></a>
            </div>
            <?php
        }else{
            ?>
            <h5 class="mini-cart-head"><?php echo esc_html__("No Product in your cart.","fruitshop")?></h5>
            <?php
        }
    }
}

if(!function_exists('s7upf_get_product_taxonomy')){
    function s7upf_get_product_taxonomy($taxonomy = 'product_cat') {
        $result = array();
        $tags = get_terms($taxonomy); 
        if(is_array($tags) && !empty($tags)){
            foreach ($tags as $tag) {
                $list[$tag->name] = $tag->slug;
                $result[] = array(
                    'value' => $tag->slug,
                    'label' => $tag->name,
                );
            }
        }
        return $result;
    }
}

if(!function_exists('s7upf_get_size_image')){
    function s7upf_get_size_image($default, $value = ''){
        $return = $default;
        if(strpos($value,'x')){
            $size_arr = explode('x',$value);
            if(is_array($size_arr) and count($size_arr) == 2){
                $return = $size_arr;
            }
        }else{
            if($value != '' and !empty($value)){
                $return = $value;
            }else if(strpos($default,'x')){
                $size_arr = explode('x',$default);
                if(is_array($size_arr) and count($size_arr) == 2){
                    $return = $size_arr;
                }
            }
        }
        return $return;
    }
}

if(!function_exists('s7upf_get_data_isset')){
    function s7upf_get_data_isset($parent,$key){
        if(is_array($parent) && count($parent) > 0){
            if(isset($parent[$key])){
                return $parent[$key];
            }else{
                return '';
            }
        }else{
            return '';
        }
    }
}

//get type url
if(!function_exists('s7upf_get_key_url')){
    function s7upf_get_key_url($key,$value){
        if(function_exists('s7upf_get_current_url')) $current_url = s7upf_get_current_url();
        else{
            if(function_exists('wc_get_page_id')) $current_url = get_permalink( wc_get_page_id( 'shop' ) );
            else $current_url = get_permalink();
        }
        $current_url = get_pagenum_link();
        if(isset($_GET[$key])){
            $current_url = str_replace('&'.$key.'='.$_GET[$key], '', $current_url);
            if(strpos($current_url,'&') > -1 )$current_url = str_replace('?'.$key.'='.$_GET[$key], '?', $current_url);
            else $current_url = str_replace('?'.$key.'='.$_GET[$key], '', $current_url);
        }
        if(strpos($current_url,'?') > -1 ){
            $current_url .= '&amp;'.$key.'='.$value;
        }
        else {
            $current_url .= '?'.$key.'='.$value;
        }
        return $current_url;
    }
}
if(!function_exists('s7upf_get_rating_html')){
    function s7upf_get_rating_html($count = false,$style = ''){
        global $product;
        $enable_review_rating = get_option('woocommerce_enable_review_rating');

        $html = '';
        $star = $product->get_average_rating();
        $review_count = $product->get_review_count();
        $width = $star / 5 * 100;
        if($enable_review_rating == 'yes'){
        $html .=    '<div class="product-rate '.esc_attr($style).'">
                        <div class="product-rating" style="width:'.$width.'%;"></div>';
        if($count) $html .= '<span>('.$review_count.'s)</span>';
        $html .=    '</div>';
        }
        return $html;
    }
}
//Compare URL
if(!function_exists('s7upf_compare_url')){
    function s7upf_compare_url($id = false){
        $html = '';
        if(class_exists('YITH_Woocompare')){
            if(!$id) $id = get_the_ID();
            $cp_link = str_replace('&', '&amp;',add_query_arg( array('action' => 'yith-woocompare-add-product','id' => $id )));
            $html = ' <a href="'.esc_url($cp_link).'" class="mb-compare product-compare compare compare-link" data-product_id="'.get_the_ID().'">
               <i class="fa fa-compress" aria-hidden="true"></i><span>'.esc_html__('Compare','fruitshop').'</span>
            </a>';
        }
        return $html;
    }
}
if(!function_exists('s7up_wishlist_url')){
    function s7up_wishlist_url(){
        $html = '';
        if(class_exists('YITH_WCWL'))
            $html = ' <a href="'.esc_url(str_replace('&', '&amp;',add_query_arg( 'add_to_wishlist', get_the_ID() ))).'" class="mb-wishlist add_to_wishlist wishlist-link" rel="nofollow" data-product-id="'.get_the_ID().'" data-product-title="'.esc_attr(get_the_title()).'">
               <i class="fa fa-heart-o" aria-hidden="true"></i><span>'.esc_html__('Wishlist','fruitshop').'</span>
            </a>';

        return $html;
    }
}

//get data by key of cat
if(!function_exists('s7upf_get_metabox_shop_cat')){
    function s7upf_get_metabox_shop_cat($cat_id, $option_id, $default = ''){
        $value = $default;
        if(class_exists('woocommerce')) {
            if (is_product_category()) {
                $t_id = get_queried_object()->term_id;
                $value = get_term_meta($t_id, $cat_id, true);

            }
        }
        if(empty($value)){
            $value = s7upf_get_option($option_id);
        }

        return $value;
    }
}
if(!function_exists('s7upf_get_metabox_check_on_off_shop_cat')){
    function s7upf_get_metabox_check_on_off_shop_cat($cat_id, $option_id, $key_check, $default = ''){
        $value = $default;
        if(class_exists('woocommerce')) {
            if (is_product_category()) {
                $t_id = get_queried_object()->term_id;

                $check = get_term_meta($t_id,$key_check,true);
                if($check == ''){
                    $value = s7upf_get_option($option_id);
                }else{

                    $value = get_term_meta($t_id, $cat_id, true);
                }
            }else{
                $value = s7upf_get_option($option_id);
            }
        }

        return $value;
    }
}
// Check ajax
if(!function_exists('s7upf_is_ajax'))
{
    function s7upf_is_ajax()
    {
        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            return true;
        }else  {
            return false;
        }
    }
}

if (!function_exists('s7upf_convert_array')) {

    function s7upf_convert_array($old_array)
    {
        $new_array = array();
        foreach ($old_array as $key => $value) {
            $new_array[$value] = $key;
        }
        return $new_array;
    }
}

if(!function_exists('s7upf_get_order_list_shop')) {
    function s7upf_get_order_list_shop($current = false, $extra = array(), $return = 'array')
    {
        $default = array(
            'none' => esc_html__('None', 'fruitshop'),
            'ID' => esc_html__('Product ID', 'fruitshop'),
            'author' => esc_html__('Author', 'fruitshop'),
            'title' => esc_html__('Product Title', 'fruitshop'),
            'date' => esc_html__('Product Date', 'fruitshop'),
            'modified' => esc_html__('Last Modified Date', 'fruitshop'),
            'parent' => esc_html__('Product Parent', 'fruitshop'),
            'rand' => esc_html__('Random', 'fruitshop'),
            'comment_count' => esc_html__('Comment Count', 'fruitshop'),
            'popularity' => esc_html__('Product popularity - Best Seller','fruitshop'),
            'rating' => esc_html__('Rating','fruitshop'),
            'mostview' => esc_html__('Most View','fruitshop'),
            'price' => esc_html__('Sort by price','fruitshop'),
        );

        if (!empty($extra) and is_array($extra)) {
            $default = array_merge($default, $extra);
        }

        if ($return == "array") {
            return $default;
        } elseif ($return == 'option') {
            $html = '';
            if (!empty($default)) {
                foreach ($default as $key => $value) {
                    $selected = selected($key, $current, false);
                    $html .= "<option {$selected} value='{$key}'>{$value}</option>";
                }
            }
            return $html;
        }
    }
}

if(!function_exists('s7upf_price_filter')) {
    function s7upf_price_filter($min = 0, $max = 999999999)
    {
        global $wpdb;
        $matched_products = array();
        if((int)$min < 0)
            $min = 0;
        if((int)$max < 0)
            $max = 99999999999;

        if($max > $min) {

            $matched_products_query = $wpdb->get_results($wpdb->prepare("
            SELECT DISTINCT ID, post_parent, post_type FROM {$wpdb->posts}
            INNER JOIN {$wpdb->postmeta} pm1 ON ID = pm1.post_id
            WHERE post_type IN ( 'product', 'product_variation' )
            AND post_status = 'publish'
            AND pm1.meta_key IN ('" . implode("','", array_map('esc_sql', array('_price'))) . "')
            AND pm1.meta_value BETWEEN %d AND %d
        ", $min, $max), OBJECT_K);

            if ($matched_products_query) {
                foreach ($matched_products_query as $product) {
                    if ($product->post_type == 'product') {
                        $matched_products[] = $product->ID;
                    }
                    if ($product->post_parent > 0) {
                        $matched_products[] = $product->post_parent;
                    }
                }
            }
            $matched_products = array_unique($matched_products);
        }
        return (array) $matched_products;
    }
}

if(!function_exists('s7upf_get_image_product_quickview_in_loop')) {
    function s7upf_get_image_product_quickview_in_loop($image_size = 'full', $default_image = '',$animation_img='')
    {
        global $post;
        $product = new WC_product(get_the_ID());
        $attachment_ids = $product->get_gallery_image_ids();
        ?>
        <a href="<?php the_permalink(); ?>" class="product-thumb-link <?php if(count($attachment_ids)>=1 || $animation_img == 'zoom-thumb') echo esc_attr($animation_img);?> ">
            <?php
            if ( has_post_thumbnail() ) {
                echo get_the_post_thumbnail(get_the_ID(),$image_size);
            }
            if(is_array($attachment_ids) and count($attachment_ids)>0 and $animation_img !== 'zoom-thumb'){
                foreach ($attachment_ids as $key => $value){
                    if($key == 0){
                        echo wp_get_attachment_image($value,$image_size,false);
                    }
                }
            }
            ?>
        </a>
        <a data-product-id="<?php echo get_the_id();?>" href="<?php the_permalink(); ?>" class="quickview-link product-ajax-popup"><i class="fa fa-search" aria-hidden="true"></i></a>

        <?php
    }
}

if(!function_exists('s7upf_product_loop_discount_sale')){
    function s7upf_product_loop_discount_sale(){
        if (!class_exists('WC_Product')) return;
        $sale = '';
        global $product;
        if (!$product->is_in_stock()) return;
        $sale_price = get_post_meta($product->get_id(), '_price', true);
        $regular_price = get_post_meta($product->get_id(), '_regular_price', true);
        if (empty($regular_price) && $product->get_type() == 'variable' ) { //then this is a variable product
            $available_variations = $product->get_available_variations();
            if(!empty($available_variations[0]['variation_id'])){
                $variation_id = $available_variations[0]['variation_id'];

                $variation = new WC_Product_Variation($variation_id);
                $regular_price = $variation->regular_price;
                $sale_price = $variation->sale_price;
            }

        }
        ?>
        <?php if (!empty($regular_price) && !empty($sale_price) && $regular_price > $sale_price) :
            $sale = '-'.ceil((($regular_price - $sale_price) / $regular_price) * 100).'%';
        endif;
        return $sale;
    }
}

if(!function_exists('s7upf_get_deals_time')){
    function s7upf_get_deals_time($time = '0:0'){
        $curren_time = getdate();
        $time2 = explode(':', $time);
        $hours = $min = 0;
        if(isset($time2[0])) $hours = (int)$time2[0];
        if(isset($time2[1])) $min = (int)$time2[1];
        $data_h = $hours - $curren_time['hours'];
        $data_m = $min - $curren_time['minutes'];
        $time = $data_h*3600+$data_m*60+60-$curren_time['seconds'];
        return $time;
    }
}

if(!function_exists('s7upf_get_custom_javascript')){
    function s7upf_get_custom_javascript(){
        $custom_js = s7upf_get_option('s7upf_custom_javascript');
        if(!empty($custom_js)){
          ?><script type="text/javascript"><?php
            print $custom_js;
            ?></script><?php
        }
    }
}
if(!function_exists('s7upf_check_catelog_mode')){
    function s7upf_check_catelog_mode(){
        if ( !class_exists('WC_Product') )  return;
        $catelog_mode = s7upf_get_option('woo_catelog');
        $hide_other_page = s7upf_get_option('hide_other_page');
        $hide_detail = s7upf_get_option('hide_detail');
        $hide_admin = s7upf_get_option('hide_admin');
        $hide_shop = s7upf_get_option('hide_shop');
        $hide_price = s7upf_get_option('hide_price');
        $show_mode = 'off';
        if($catelog_mode == 'on'){
            if($hide_other_page == 'on' && !is_super_admin() && !is_shop() && !is_single()) $show_mode = 'on';
            if($hide_other_page == 'on' && $hide_admin == 'on' && is_super_admin() && !is_shop() && !is_single() ) $show_mode = 'on';
            if($hide_price == 'on' && !is_super_admin()) $show_mode = 'on';
            if($hide_price == 'on' && $hide_admin == 'on' && is_super_admin() ) $show_mode = 'on';
            if(is_shop()) {
                if($hide_shop == 'on' && !is_super_admin()) $show_mode = 'on';
                if($hide_shop == 'on' && $hide_admin == 'on' && is_super_admin()) $show_mode = 'on';
            }
            if(is_single()) {
                if($hide_detail == 'on' && !is_super_admin()) $show_mode = 'on';
                if($hide_detail == 'on' && $hide_admin == 'on' && is_super_admin()) $show_mode = 'on';
            }
        }
        return $show_mode;
    }
}

if ( ! function_exists( 's7upf_catalog_ordering' ) ) {
    function s7upf_catalog_ordering($query,$set_orderby = '') {
        $orderby                 = isset( $_GET['orderby'] ) ? wc_clean( $_GET['orderby'] ) : apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        if(!empty($set_orderby)) $orderby = $set_orderby;
        $show_default_orderby    = 'menu_order' === apply_filters( 'woocommerce_default_catalog_orderby', get_option( 'woocommerce_default_catalog_orderby' ) );
        $catalog_orderby_options = apply_filters( 'woocommerce_catalog_orderby', array(
            'menu_order' => esc_html__( 'Default sorting', 'fruitshop' ),
            'popularity' => esc_html__( 'Sort by popularity', 'fruitshop' ),
            'rating'     => esc_html__( 'Sort by average rating', 'fruitshop' ),
            'date'       => esc_html__( 'Sort by newness', 'fruitshop' ),
            'price'      => esc_html__( 'Sort by price: low to high', 'fruitshop' ),
            'price-desc' => esc_html__( 'Sort by price: high to low', 'fruitshop' ),
            'title' => esc_html__( 'Sort by product title', 'fruitshop' ),
            'mostview' => esc_html__( 'Sort by product most view', 'fruitshop' ),
            'rand' => esc_html__( 'Sort by random', 'fruitshop' ),
            'comment_count' => esc_html__( 'Sort by comment count', 'fruitshop' ),
        ) );

        if ( ! $show_default_orderby ) {
            unset( $catalog_orderby_options['menu_order'] );
        }

        if ( 'no' === get_option( 'woocommerce_enable_review_rating' ) ) {
            unset( $catalog_orderby_options['rating'] );
        }

        wc_get_template( 'loop/orderby.php', array( 'catalog_orderby_options' => $catalog_orderby_options, 'orderby' => $orderby, 'show_default_orderby' => $show_default_orderby ) );
    }
}
if(!function_exists('s7upf_get_result_count_product')){
    function s7upf_get_result_count_product($wp_query){ ?>

        <p class="woocommerce-result-count">
            <?php
            $paged    = max( 1, $wp_query->get( 'paged' ) );
            $per_page = $wp_query->get( 'posts_per_page' );
            $total    = $wp_query->found_posts;
            $first    = ( $per_page * $paged ) - $per_page + 1;
            $last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

            if ( $total <= $per_page || -1 === $per_page ) {
                /* translators: %d: total results */
                printf( _n( 'Showing the single result', 'Showing all %d results', $total, 'fruitshop' ), $total );
            } else {
                /* translators: 1: first result 2: last result 3: total results */
                printf( _nx( 'Showing the single result', 'Showing %1$d&ndash;%2$d of %3$d results', $total, 'with first and last result', 'fruitshop' ), $first, $last, $total );
            }
            ?>
        </p>
        <?php
    }
}
if(!function_exists('s7upf_shop_loop_before')){
    function s7upf_shop_loop_before($query,$orderby = 'menu_order',$type='grid'){

        if(isset($_GET['type'])){
            $type = $_GET['type'];
        }
        ?>

        <div class="shop-pagibar clearfix">
            <div class="desc silver pull-left"><?php s7upf_get_result_count_product($query); ?></div>
            <ul class="wrap-sort-view list-inline-block pull-right">
                <li>
                    <div class="sort-bar">
                        <span class="inline-block"><?php echo esc_html__('Sort:','fruitshop'); ?></span>
                        <div class="select-box border radius6 inline-block">
                            <?php s7upf_catalog_ordering($query,$orderby)?>
                        </div>
                    </div>
                </li>
                <li class="mb-view-grid-list">
                    <div class="view-bar">
                        <a data-type="grid" class="load-shop-ajax grid-view  <?php if('grid' === $type) echo 'active'?>" href="<?php echo esc_url(s7upf_get_key_url('type','grid'))?>"></a>
                        <a data-type="list" class="load-shop-ajax list-view <?php if('list' === $type) echo 'active'?>" href="<?php echo esc_url(s7upf_get_key_url('type','list'))?>"></a>
                    </div>
                </li>
            </ul>
        </div>
        <?php
    }
}
/***************************************END Core Function***************************************/



//get roles wp
if(!function_exists('s7upf_get_list_role')){
    function s7upf_get_list_role(){
        global $wp_roles;
        $roles = array();
        if(isset($wp_roles->roles)){
            $roles_data = $wp_roles->roles;
            if(is_array($roles_data)){
                foreach ($roles_data as $key => $value) {
                    $roles[$value['name']] = $key;
                }
            }
        }
        return $roles;
    }
}

if(!function_exists('s7upf_get_attr_content')){
    function s7upf_get_attr_content($content,$default = array(),$list = array('vc_tta_section')) {

        $result = array();
        $tab_info = array();
        foreach ($list as $shortcode) {
            preg_match_all( '/'.$shortcode.'([^\]]+)/i', $content, $matches, PREG_OFFSET_CAPTURE );
            if(isset($matches[1])) $tab_info = array_merge($tab_info,$matches[1]);
        }
        $item_content = explode('[/vc_tta_section]', $content);

        if(!empty($tab_info)){
            foreach ($tab_info as $key => $value) {
                $string = $value[0];
                $string = str_replace('=" ', '="', $string);
                $data = explode('" ', $string);
                foreach ($data as $item) {
                    $item_data = explode('=', $item);
                    $item_key = trim(str_replace('"', '', $item_data[0]));
                    if(!empty($item_data[1]))
                        $item_val = trim(str_replace('"', '', $item_data[1]));
                    $result[$key][$item_key] = $item_val;
                    $result[$key]['tab_content'] = $item_content[$key];
                }
                $result[$key] = array_merge($default,$result[$key]);
            }
        }
        return $result;
    }
}

if(!function_exists('s7upf_add_attr_content')){
    function s7upf_add_attr_content($content,$attr = '',$list = array('vc_tta_section')) {
        foreach ($list as $shortcode) {

            $content = str_replace('['.$shortcode, '['.$shortcode.' '.$attr, $content);
        }
        return $content;
    }
}

//get type url
if(!function_exists('s7upf_get_filter_url')){
    function s7upf_get_filter_url($key,$value){
        if(function_exists('s7upf_get_current_url')) $current_url = s7upf_get_current_url();
        else{
            if(function_exists('wc_get_page_id')) $current_url = get_permalink( wc_get_page_id( 'shop' ) );
            else $current_url = get_permalink();
        }
        $current_url = get_pagenum_link();
        if(isset($_GET[$key])){
            $current_val_string = sanitize_text_field($_GET[$key]);
            if($current_val_string == $value){
                $current_url = str_replace('&'.$key.'='.$_GET[$key], '', $current_url);
                if(strpos($current_url,'&') > -1 )$current_url = str_replace('?'.$key.'='.$_GET[$key], '?', $current_url);
                else $current_url = str_replace('?'.$key.'='.$_GET[$key], '', $current_url);
            }
            if(strpos($current_val_string,',') > -1 ) $current_val_key = explode(',', $current_val_string);
            else $current_val_key = explode('%2C', $current_val_string);
            $val_encode = str_replace(',', '%2C', $current_val_string);
            if(!empty($current_val_string)){
                if(!in_array($value, $current_val_key)) $current_val_key[] = $value;
                else{
                    $pos = array_search($value, $current_val_key);
                    unset($current_val_key[$pos]);
                }
                $new_val_string = implode('%2C', $current_val_key);
                $current_url = str_replace($key.'='.$val_encode, $key.'='.$new_val_string, $current_url);
                if (strpos($current_url, '?') == false) $current_url = str_replace('&','?',$current_url);
            }
            else $current_url = str_replace($key.'=', $key.'='.$value, $current_url);
        }
        else{
            if(strpos($current_url,'?') > -1 ){
                $current_url .= '&amp;'.$key.'='.$value;
            }
            else {
                $current_url .= '?'.$key.'='.$value;
            }
        }
        return $current_url;
    }
}

if(!function_exists('s7upf_add_html_attr')){
    function s7upf_add_html_attr($value,$echo = false,$attr='style'){
        $output = '';
        if(!empty($attr)){
            $output = $attr.'="'.$value.'"';
        }
        if($echo) echo apply_filters('s7upf_output_content',$output);
        else return $output;
    }
}

if(!function_exists('s7upf_get_terms_filter')){
    function s7upf_get_terms_filter($taxonomy){
        $get_terms_args = array( 'hide_empty' => '1' );

        $orderby = wc_attribute_orderby( $taxonomy );
        switch ( $orderby ) {
            case 'name' :
                $get_terms_args['orderby']    = 'name';
                $get_terms_args['menu_order'] = false;
                break;
            case 'id' :
                $get_terms_args['orderby']    = 'id';
                $get_terms_args['order']      = 'ASC';
                $get_terms_args['menu_order'] = false;
                break;
            case 'menu_order' :
                $get_terms_args['menu_order'] = 'ASC';
                break;
        }

        $terms = get_terms( $taxonomy, $get_terms_args );

        if (is_array($terms) && 0 === count( $terms ) ) {
            return;
        }

        switch ( $orderby ) {
            case 'name_num' :
                usort( $terms, '_wc_get_product_terms_name_num_usort_callback' );
                break;
            case 'parent' :
                usort( $terms, '_wc_get_product_terms_parent_usort_callback' );
                break;
        }
        return $terms;
    }
}
if(!function_exists('s7upf_get_list_attribute')){
    function s7upf_get_list_attribute() {
        $result = array();
        $attributes = wc_get_attribute_taxonomies();
        if(!empty($attributes)){
            foreach ($attributes as $attribute) {
                $result[$attribute->attribute_label] = $attribute->attribute_name;
            }
        }
        return $result;
    }
}

if(!function_exists('s7upf_filter_price')){
    function s7upf_filter_price($min,$max,$filtered_posts = array()){
        global $wpdb;
        $matched_products = array( 0 );
        $matched_products_query = apply_filters( 'woocommerce_price_filter_results', $wpdb->get_results( $wpdb->prepare("
            SELECT DISTINCT ID, post_parent, post_type FROM $wpdb->posts
            INNER JOIN $wpdb->postmeta ON ID = post_id
            WHERE post_type IN ( 'product', 'product_variation' ) AND post_status = 'publish' AND meta_key = %s AND meta_value BETWEEN %d AND %d
        ", '_price', $min, $max ), OBJECT_K ), $min, $max );

        if ( $matched_products_query ) {
            foreach ( $matched_products_query as $product ) {
                if ( $product->post_type == 'product' )
                    $matched_products[] = $product->ID;
                if ( $product->post_parent > 0 && ! in_array( $product->post_parent, $matched_products ) )
                    $matched_products[] = $product->post_parent;
            }
        }

        // Filter the id's
        if ( sizeof( $filtered_posts ) == 0) {
            $filtered_posts = $matched_products;
        } else {
            $filtered_posts = array_intersect( $filtered_posts, $matched_products );
        }
        return $filtered_posts;
    }
}


if(!function_exists('s7upf_get_list_taxonomy')){
    function s7upf_get_list_taxonomy($taxonomy = 'product_cat') {
        $result = array();
        $tags = get_terms($taxonomy);
        if(is_array($tags) && !empty($tags)){
            foreach ($tags as $tag) {
                $list[$tag->name] = $tag->slug;
                $result[] = array(
                    'value' => $tag->slug,
                    'label' => $tag->name,
                );
            }
        }
        return $result;
    }
}
/***************************************Add Theme Function***************************************/



/***************************************END Theme Function***************************************/
