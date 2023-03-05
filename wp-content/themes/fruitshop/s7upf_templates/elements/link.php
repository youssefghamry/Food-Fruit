<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 11/04/2017
 * Time: 14:44
 */
$class = S7upf_Assets::build_css('color:'.$title_color.';' ,' li a');
$class .= ' '.S7upf_Assets::build_css('color:'.$title_color_hover.';' ,' li a:hover');
$class .= ' '.S7upf_Assets::build_css('text-transform:'.$text_transform.';' ,' li a');
switch ($style){
    case 'style1':
        if(!empty($data_link) and is_array($data_link)) {
            ?>
                <ul class="list-none menu-footer <?php echo esc_attr($class); ?>">
                    <?php foreach ($data_link as $value){
                        $data = '';
                        if(!empty($value['link']))
                            $data = vc_build_link($value['link']);
                        if(!empty($data['title'])){
                            ?>
                            <li><a  href="<?php echo (!empty($data['url']))? esc_url($data['url']): '#'; ?>" <?php if(empty($data['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data['target']))?'_blank':'_parent'; ?>" class="silver"><?php echo esc_attr($data['title']);?></a></li>
                            <?php
                        }
                    } ?>
                </ul>
            <?php
        }
        break;
    case 'style1-2': ?>
        <div class="list-cat-mega-menu">
            <?php if(!empty($title)){ ?><h2 class="title-cat-mega-menu"><?php echo esc_attr($title); ?></h2><?php }
            if(!empty($data_link) and is_array($data_link)) { ?>

            <ul class="<?php echo esc_attr($class); ?>">
                <?php foreach ($data_link as $value){
                    $data = '';
                    if(!empty($value['link']))
                        $data = vc_build_link($value['link']);
                    if(!empty($data['title'])){
                        ?>
                        <li><a  href="<?php echo (!empty($data['url']))? esc_url($data['url']): '#'; ?>" <?php if(empty($data['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data['target']))?'_blank':'_parent'; ?>" class="silver"><?php echo esc_attr($data['title']);?></a></li>
                        <?php
                    }
                } ?>
            </ul>
            <?php } ?>
        </div>
        <?php
        break;
    case 'style2':
        if(!empty($data_link) and is_array($data_link)) { ?>
            <ul class="menu-footer2 list-inline-block <?php echo esc_attr($delimiter); ?> <?php echo esc_attr($position); ?> <?php echo esc_attr($class); ?>">
                <?php foreach ($data_link as $value){
                    $data = '';
                    if(!empty($value['link']))
                        $data = vc_build_link($value['link']);
                    if(!empty($data['title'])){
                        ?>
                        <li><a  href="<?php echo (!empty($data['url']))? esc_url($data['url']): '#'; ?>" <?php if(empty($data['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data['target']))?'_blank':'_parent'; ?>" ><?php echo esc_attr($data['title']);?></a></li>
                        <?php
                    }
                } ?>
            </ul>
            <?php
        }
        break;
    default:
        $class_mega = S7upf_Assets::build_css('color:'.$title_color.';' ,' >li >a');
        $class_mega .= ' '.S7upf_Assets::build_css('color:'.$title_color_hover.';' ,' >li >a:hover');
        ?>
        <div class="wrap-cat-icon bg-white drop-shadow mb-link-element-mega">
            <?php if(!empty($title)){?>
                <h2 class="title18 text-uppercase font-bold"><?php echo esc_attr($title);?></h2>
            <?php }
            if(!empty($data_link_mega) and is_array($data_link_mega)){ ?>
            <ul class="list-none list-cat-icon <?php echo esc_attr($class_mega);?>">
                <?php foreach ($data_link_mega as $value){
                    $data_link = '';
                    if(!empty($value['link']))
                        $data_link = vc_build_link($value['link']); ?>
                    <li class="mm <?php if($value['id_page_mega'] != 'none') echo 'has-cat-mega'; ?> <?php if(!empty($value['delimiter'])) echo 'border-bottom-link'; ?>">
                        <a class ="<?php if(empty($value['img_icon'])) echo 'no-image'; ?> mb-link" href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']): '#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>"><?php if(!empty($value['img_icon'])) echo wp_get_attachment_image($value['img_icon'],array(40,34))?><span class="title <?php if(!empty($value['uppercase'])) echo 'text-uppercase';?>"><?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?></span> <?php if(!empty($value['sub_text'])){ ?><span class="sub-title"><?php echo esc_attr($value['sub_text']); ?></span><?php } ?></a>
                        <?php
                        if($value['id_page_mega'] != 'none' ){?>
                        <div class="cat-mega-menu">
                            <?php
                             s7upf_get_header_visual($value['id_page_mega']);
                            ?>
                        </div>
                        <?php } ?>
                    </li>
                <?php } ?>

            </ul>
            <?php } ?>
        </div>
        <?php
        break;
}