<div class="account-manager info-account <?php echo esc_attr($el_class)?>">
    <?php
    $head_html = $sub_html = $login_icon_html = $register_icon_html = $logout_icon_html = $logout_account_icon_html=$login_account_icon_html='';
    if(!empty($login_icon)) $login_icon_html = '<i class="color '.esc_attr($login_icon).'"></i>';
    if(!empty($register_icon)) $register_icon_html = '<i class="color  '.esc_attr($register_icon).'"></i>';
    if(!empty($logout_icon)) $logout_icon_html = '<i class="color  '.esc_attr($logout_icon).'"></i>';
    if(!empty($login_account_icon)) $login_account_icon_html = '<span class="color icon-lever1  login-account-icon"><i class="'.esc_attr($login_account_icon).'"></i></span>';
    if(!empty($logout_account_icon)) $logout_account_icon_html = '<span class="color icon-lever1 logout-account-icon"><i class="'.esc_attr($logout_account_icon).'"></i></span>';
    $account_id = get_option('woocommerce_myaccount_page_id');
    if(empty($login_url)){
        if($account_id) $login_url = get_permalink( $account_id );
        else $login_url = wp_login_url();
    }
    if(empty($register_url)){
        if($account_id) $register_url = get_permalink( $account_id );
        else $register_url = wp_registration_url();
    }
    if(is_user_logged_in()){
        $name = '';
        $roles = array();
        $current_user = wp_get_current_user();
        if(!empty($current_user)){
            $name = $current_user->data->display_name;
            $roles = $current_user->roles;
        }
        $head_html = $login_account_icon_html.'<label>'.esc_html__("Hello: ","fruitshop").'</label> <a href="'.esc_url($login_url).'">'.esc_html($name).'</a>';
        if(is_array($data)){
            foreach ($data as $key => $value){
                $value = array_merge($default_val,$value);
                if(!empty($value['icon'])) $icon_html = '<i class="color '.esc_attr($value['icon']).'"></i>';
                else $icon_html = '';
                $list_roles = explode(',', $value['roles']);
                if(empty($value['roles'])) $check_show = true;
                else $check_show = count(array_intersect($roles, $list_roles)) == count($roles);
                if(!empty($value['link']) && !empty($value['title']) && $check_show) $sub_html .= '<li><a href="'.esc_url($value['link']).'">'.$icon_html.$value['title'].'</a></li>';
            }
        }
        $sub_html .= '<li><a href="'.esc_url(wp_logout_url($redirect_url)).'">'.$logout_icon_html.esc_html__("Logout","fruitshop").'</a></li>';
    }
    else{
        $head_html = $logout_account_icon_html.'<a href="'.esc_url($login_url).'">'.esc_html__("My Account","fruitshop").'</a>';
        if($login_url != $register_url){
            $sub_html .= '<li><a href="'.esc_url($login_url).'">'.$login_icon_html.esc_html__("Login","fruitshop").'</a></li>';
            $sub_html .= '<li><a href="'.esc_url($register_url).'">'.$register_icon_html.esc_html__("Register","fruitshop").'</a></li>';
        }
        else $sub_html .= '<li><a href="'.esc_url($login_url).'">'.$login_icon_html.esc_html__("Login / Register","fruitshop").'</a></li>';
    }
    ?>

    <ul class="list-inline-block">
        <li class="dropdown-box">
            <?php echo apply_filters('s7upf_output_content',$head_html);?>
            <ul class="list-none dropdown-list">
                <?php echo apply_filters('s7upf_output_content',$sub_html);?>
            </ul>
        </li>
        <?php
        if(!empty($data_social_item) and is_array($data_social_item)) :
            foreach ($data_social_item as $value) :
                if(!empty($value['link'])) $data_link = vc_build_link($value['link']);
                if(!empty($value['title'])){ ?>
                <li>
                    <a href="<?php echo (!empty($data_link['url']))? esc_url($data_link['url']):'#'; ?>" <?php if(empty($data_link['url'])) echo 'onclick="return false;"'; ?> target="<?php echo (!empty($data_link['target']))?'_blank':'_parent'; ?>" <?php if(!empty($data_link['rel'])) echo'rel="' .esc_attr( $data_link['rel'] ) . '"'?> title="<?php if(!empty($data_link['title'])) echo esc_attr($data_link['title']); ?>">
                        <span class="color icon-lever1 "><i class="fa <?php if(!empty($value['icon'])) echo esc_attr($value['icon']); ?>"></i></span><?php if(!empty($value['title'])) echo esc_attr($value['title']); ?>
                    </a>
                </li>
            <?php } endforeach;
        endif ;
        ?>
    </ul>
</div>