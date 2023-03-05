<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 31/03/2017
 * Time: 11:26
 */
if(!empty($data_add_social) and is_array($data_add_social) and count($data_add_social)>0){
?>
<div class="top-social pull-right menu-social">
    <?php foreach ($data_add_social as $value){
            if(!empty($value['link'])){
                $link = vc_build_link($value['link']);
            }
        ?>
        <a href="<?php echo(!empty($link['url'])) ? esc_url($link['url']):'#';?>" <?php if(empty($link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($link['title'])) echo 'title = "'.$link['title'].'"';?>><i class="fa <?php if(!empty($value['icon'])) echo esc_attr($value['icon']); ?>" aria-hidden="true"></i></a>
    <?php } ?>
</div>
<?php }