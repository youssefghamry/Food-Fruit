<?php
/**
 * Created by PhpStorm.
 * User: mai100it
 * Date: 22/08/2017
 * Time: 8:55 SA
 */
$url_image = get_post_meta(get_the_ID(),'label_icon',true);
if(empty($url_image)) return;
?>
<div class="label-icon-image"><img src="<?php echo esc_url($url_image); ?>"></div>
