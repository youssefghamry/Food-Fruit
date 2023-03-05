<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 12/04/2017
 * Time: 08:41
 */
$class_title = S7upf_Assets::build_css('color:'.$color_title.';');
if('style3' === $style){
    ?>
    <ul class="list-inline-block mb-social-style3">
        <?php
        if(!empty($data_social3) and is_array($data_social3)){?>

        <?php foreach ($data_social3 as $value){
            $data_link=$class='';
            if(!empty($value['link']))
                $data_link=vc_build_link($value['link']);
            ?>
            <li>
                <a  href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" >
                    <?php if(!empty($value['icon'])){ ?><i class="fa <?php echo esc_attr($value['icon'])?>"></i><?php } ?>
                </a>
            </li>
        <?php } ?>

        <?php } ?>
    </ul>
    <?php
}else if('style1' === $style){
    ?>
    <ul class="list-inline-block text-left mb-social">
        <?php if(!empty($title)) {?>
        <li><h2 class="title18 <?php echo esc_attr($class_title); ?>"><?php echo esc_attr($title); ?></h2></li>
        <?php }
        if(!empty($data_social) and is_array($data_social)){?>
        <li>
            <div class="social-network mb-element-social">
                <?php foreach ($data_social as $value){
                    $data_link=$class='';
                    if(!empty($value['bg_color']))
                    $class = S7upf_Assets::build_css('background:'.$value['bg_color'].'!important;');

                    if(!empty($value['link']))
                        $data_link=vc_build_link($value['link']);
                    ?>
                    <a  href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="float-shadow <?php echo esc_attr($class); ?>">
                        <?php if(!empty($value['icon'])){ ?><i class="fa <?php echo esc_attr($value['icon'])?>"></i><?php } ?>
                    </a>
                <?php } ?>
            </div>
        </li>
        <?php } ?>
    </ul>
    <?php
}else{
    if(!empty($data_social) and is_array($data_social)) {
        ?>
        <div class="social-network mb-element-social-small">
            <?php foreach ($data_social as $value){
                $data_link=$class='';
                if(!empty($value['bg_color']))
                    $class = S7upf_Assets::build_css('background:'.$value['bg_color'].'!important;');

                if(!empty($value['link']))
                    $data_link=vc_build_link($value['link']);
                ?>
                <a  href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" class="float-shadow <?php echo esc_attr($class); ?>">
                    <?php if(!empty($value['icon'])){ ?><i class="fa <?php echo esc_attr($value['icon'])?>"></i><?php } ?>
                </a>
            <?php } ?>
        </div>
        <?php
    }
}