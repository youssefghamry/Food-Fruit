<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 26/06/2017
 * Time: 8:49 SA
 */
$class ='';
if(isset($show_categories)) $show_categories = '';
if(!empty($main_color)){
    $class .= ' '.S7upf_Assets::build_css('color: '.$main_color.';',':after');
    $class .= ' '.S7upf_Assets::build_css('color: '.$main_color.';',' a:hover');
    $class .= ' '.S7upf_Assets::build_css('background: '.$main_color.';',' ul.dropdown-list a:hover');
}
if(!empty($width_search)){
    $class .= ' '.S7upf_Assets::build_css('width: '.$width_search.'px;');
}
if('style1' === $style){ ?>
    <div class="live-search-<?php echo esc_attr($live_search);?> <?php echo esc_attr($extra_class);?>">
        <form class="search-form pull-left <?php echo esc_attr($class);?>" action = "<?php echo esc_url(home_url('/')); ?>">
            <input  name="s" type="text" autocomplete="off" value="<?php echo get_search_query()?>" placeholder = "<?php echo esc_html__('Search this site','fruitshop')?>">
            <input name="post_type" type="hidden" value="product">
            <input type="submit" value="">
            <div class="list-product-search">
                <p class="text-center"><?php echo esc_html__('Please enter key search to display results','fruitshop')?></p>
            </div>
        </form>
    </div>
<?php
}else { ?>
    <div class="live-search-<?php echo esc_attr($live_search);?> mb-search-3 <?php echo esc_attr($extra_class);?>">
        <form class="search-form search-form<?php echo ('show' === $show_categories) ? '2' :'5' ;?> pull-right <?php echo esc_attr($class);?>" action = "<?php echo esc_url(home_url('/')); ?>">
            <input  name="s" type="text" autocomplete="off" value="<?php echo get_search_query()?>" placeholder = "<?php echo esc_html__('Search this site','fruitshop')?>">
            <input name="post_type" type="hidden" value="product">
            <input type="submit" value="">
            <?php if('show' === $show_categories){ ?>
                <input class="cat-value" type="hidden" name="product_cat" value="" />
                <div class="dropdown-box select-category">

                    <a href="#" class="dropdown-link category-toggle-link">
                        <span><?php esc_html_e("All Categories","fruitshop")?></span>
                    </a>
                    <span class="mb-angle-down"><i class="fa fa-angle-down"></i></span>
                    <ul class="dropdown-list list-none">
                        <?php
                        if(!empty($cats)){
                            $custom_list = explode(",",$cats);
                            foreach ($custom_list as $key => $cat) {
                                $term = get_term_by( 'slug',$cat, 'product_cat' );
                                if(!empty($term->slug) && is_object($term)){
                                        echo '<li><a href="#" data-filter=".'.$term->slug.'">'.$term->name.'</a></li>';
                                }
                            }
                        }
                        else{
                            $product_cat_list = get_terms('product_cat');
                            if(is_array($product_cat_list) && !empty($product_cat_list)){
                                foreach ($product_cat_list as $cat) {
                                    echo '<li><a href="#" data-filter=".'.$cat->slug.'">'.$cat->name.'</a></li>';
                                }
                            }
                        }
                        ?>
                    </ul>
                </div>
            <?php } ?>
            <div class="list-product-search">
                <p class="text-center"><?php echo esc_html__('Please enter key search to display results','fruitshop')?></p>
            </div>
        </form>
    </div>
<?php }