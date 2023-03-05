<div class="widget widget-search">
    <form class="search-form" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
        <input type="text" value="<?php echo get_search_query() ?>"  name="s" placeholder="<?php echo esc_html__('search here','fruitshop')?>">
        <input type="submit" value="">
    </form>
</div>