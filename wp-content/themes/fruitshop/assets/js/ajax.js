(function($){
    "use strict";
    //Shop Filter
    function get_shop_filter(seff){
        // Set default value
        var filter = {};
        filter['price'] = {};
        filter['cats'] = [];
        filter['attributes'] = {};
        filter['hover_animation'] = '';
        var terms = [];

        // 7up get filter price
        var min_price = $('#min_price').attr('data-min');
        var max_price = $('#max_price').attr('data-max');
        if($('.ui-slider-range').length > 0){
            min_price = $('.ui-slider-range').attr('data-min');
            max_price = $('.ui-slider-range').attr('data-max');
        }
        filter['min_price'] = min_price;
        filter['max_price'] = max_price;

        // set active class
        seff.parents('.view-bar').find('.load-shop-ajax').removeClass('active');
        seff.parents('.dropdown-box').find('.load-shop-ajax').removeClass('active');
        seff.toggleClass('active');

        //Get page pagination
        if(seff.parents('.pagibar').hasClass('pagibar')){
            var check_ps = true;
            if(seff.hasClass('next')){
                var crp = seff.parents('.pagibar').find('.page-numbers.current');
                crp.removeClass('current').removeClass('active');
                crp.next().addClass('current').addClass('active');
                check_ps = false;
            }
            if(seff.hasClass('prev')){
                var crp = seff.parents('.pagibar').find('.page-numbers.current');
                crp.removeClass('current').removeClass('active');
                crp.prev().addClass('current').addClass('active');
                check_ps = false;
            }
            if(check_ps){
                seff.parents('.pagibar').find('.page-numbers').not(seff).removeClass('current');
                seff.parents('.pagibar').find('.page-numbers').not(seff).removeClass('active');
                seff.addClass('current');
                seff.addClass('active');
            }
        }
        else{
            $('.page-numbers').removeClass('current');
            $('.page-numbers').removeClass('active');
            $('.pagibar').find('.page-numbers').first().addClass('current active');
        }
        //Get style grid/list
        if(seff.attr('data-type')) seff.parents('.view-bar').find('a.load-shop-ajax').not(seff).removeClass('active');

        //Woocommerce price filter
        if($('.price_label .from')) filter['price']['min'] = $('#min_price').val();
        if($('.price_label .to')) filter['price']['max'] = $('#max_price').val();
        if($('.range-filter').length > 0){
            filter['price']['min'] = $('.range-filter .price-min-filter').val();
            filter['price']['max'] = $('.range-filter .price-max-filter').val();
        }

        //Woocommerce ordering filter
        if($('.woocommerce-ordering')) filter['orderby'] = $('select[name="orderby"]').val();

        //Get page pagination click
        if(seff.hasClass('page-numbers')){
            if(seff.parent().find('.page-numbers.current')) filter['page'] = seff.parent().find('.page-numbers.current').html();
        }
        else{
            if($('.page-numbers.current')) filter['page'] = $('.page-numbers.current').html();
        }

        //Get more data
        var data_element = $('.products-wrap.js-content-wrap').attr('data-load');
        data_element = $.parseJSON( data_element );
        filter = $.extend( filter, data_element['attr'] );
        if(!filter['cats']) filter['cats'] = [];

        //Get current filter active
        var i = 1;
        $('.load-shop-ajax.active').each(function(){
            var seff2 = $(this);
            if(seff2.attr('data-type')){
                if(i == 1) filter['type_view'] = seff2.attr('data-type');
                i++;
            }
            if(seff2.attr('data-number')){
                seff2.parents('.dropdown-box').find('.number').html(seff2.attr('data-number'));
                filter['number'] = seff2.attr('data-number');
            }
            if(seff2.attr('data-orderby')){
                seff2.parents('.dropdown-box').find('.set-orderby').html(seff2.html());
                filter['orderby'] = seff2.attr('data-orderby');
            }
            if(seff2.attr('data-attribute') && seff2.attr('data-term')){
                if(!filter['attributes'][seff2.attr('data-attribute')]) filter['attributes'][seff2.attr('data-attribute')] = [];
                if($.inArray(seff2.attr('data-term'),filter['attributes'][seff2.attr('data-attribute')])) filter['attributes'][seff2.attr('data-attribute')].push(seff2.attr('data-term'));
            }
            if(seff2.attr('data-cat') && $.inArray(seff2.attr('data-cat'),filter['cats'])) filter['cats'].push(seff2.attr('data-cat'));
        })

        //Get variable current url
        var $_GET = {};
        if(document.location.toString().indexOf('?') !== -1) {
            var query = document.location
                .toString()
                // get the query string
                .replace(/^.*?\?/, '')
                // and remove any existing hash string (thanks, @vrijdenker)
                .replace(/#.*$/, '')
                .split('&');

            for(var i=0, l=query.length; i<l; i++) {
                var aux = decodeURIComponent(query[i]).split('=');
                $_GET[aux[0]] = aux[1];
            }
        }
        if($_GET['s']) filter['s'] = $_GET['s'];
        if($_GET['product_cat']) filter['cats'] = $_GET['product_cat'].split(',');
        return filter;
    }
    function load_ajax_shop(e){
        e.preventDefault();
        var filter = get_shop_filter($(this));
        console.log(filter);
        var content = $('.js-content-wrap.content-wrap-shop');
        content.addClass('loadding');
        content.append('<div class="shop-loading"><i class="fa fa-spinner fa-spin"></i></div>');
        $.ajax({
            type : "post",
            url : ajax_process.ajaxurl,
            crossDomain: true,
            data: {
                action: "load_shop",
                filter_data: filter,
            },
            success: function(data){
                if(data[data.length-1] == '0' ){
                    data = data.split('');
                    data[data.length-1] = '';
                    data = data.join('');
                }
                content.find(".shop-loading").remove();
                content.removeClass('loadding');
                content.html(data);
            },
            error: function(MLHttpRequest, textStatus, errorThrown){
                console.log(errorThrown);
            }
        });
        setTimeout(function() {
            if($('.product-grid-view.list-masonry .list-product-wrap').length>0){
                $('.product-grid-view.list-masonry .list-product-wrap').masonry();
            }
        }, 3000);
        return false;
    }
    $(document).ready(function() {
        $('.tab-ajax-on .ajax-title-tab a').on('click', function(e){
            e.preventDefault();
            $(this).parents('ul').find('li').removeClass('active');
            $(this).parent().addClass('active');
            var current     = $(this).parents('.tabs-block');
            var seff        = $(this);
            var content     = current.find('.tab-content');
            var tab_content   = seff.find('.get-content-tab').html();
            content.append('<div class="js-ajax-loading"><div class="content-loading"><div class="loader-spin"></div></div></div>');
            $.ajax({
                type: 'POST',
                url: ajax_process.ajaxurl,
                crossDomain: true,
                data: {
                    action: 'load_tab_content',
                    tab_content: tab_content,
                },
                success: function(data){
                    content.html(data);
                },
                error: function(MLHttpRequest, textStatus, errorThrown){
                    console.log(errorThrown);
                }
            });
            return false;
        });

        //end
        // Shop ajax
        $('.shop-ajax-enable').on('click','.load-shop-ajax,.page-numbers,.price_slider_amount .button,.btn-filter',load_ajax_shop);
        $('.shop-ajax-enable').on('change','select[name="orderby"]',load_ajax_shop);
        $( '.shop-ajax-enable .woocommerce-ordering' ).on( 'submit', function(e) {
            e.preventDefault();
        });
        $('.shop-ajax-enable .range-filter form').on( 'submit', function(e) {
            e.preventDefault();
        });

        $('body').on('click', '.masonry-ajax', function(e){
            e.preventDefault();
            $(this).find('i').addClass('fa-spin');
            var current = $(this).parents('.mb-element-blog-masonry');
            var data_load = $(this);
            var content = current.find('.masonry-list-post');
            var number = data_load.attr('data-number');
            var orderby = data_load.attr('data-orderby');
            var order = data_load.attr('data-order');
            var cats = data_load.attr('data-cat');
            var paged = data_load.attr('data-paged');
            var maxpage = data_load.attr('data-maxpage');
            var postid = data_load.attr('data-postid');
            var userid = data_load.attr('data-userid');
            var wordexcerpt = data_load.attr('data-wordexcerpt');
            var postformat = data_load.attr('data-postformat');
            $.ajax({
                type: 'POST',
                url: ajax_process.ajaxurl,
                crossDomain: true,
                data: {
                    action: 'load_more_post_masonry',
                    number: number,
                    orderby: orderby,
                    order: order,
                    cats: cats,
                    paged: paged,
                    postid: postid,
                    userid: userid,
                    postformat: postformat,
                    wordexcerpt: wordexcerpt,
                },
                success: function(data){
                    if(data[data.length-1] == '0' ){
                        data = data.split('');
                        data[data.length-1] = '';
                        data = data.join('');
                    }
                    var $newItem = $(data);
                    content.append($newItem).masonry( 'appended', $newItem, true );
                    setTimeout(function() {
                    content.imagesLoaded( function() {

                            content.masonry('layout');

                    });
                    },2000);
                    paged = Number(paged) + 1;
                    data_load.attr('data-paged',paged);
                    data_load.find('i').removeClass('fa-spin');
                    if(Number(paged)>=Number(maxpage)){
                        data_load.parent().fadeOut();
                    }
                },
                error: function(MLHttpRequest, textStatus, errorThrown){
                    console.log(errorThrown);
                }
            });
            return false;
        });

        $('body').on('click', '.ajax-loadmore-tab', function(e){
            e.preventDefault();
            $(this).find('i').addClass('fa-spin');
            var current = $(this).parents('.product-loadmore');
            var data_load = $(this);
            var content = current.find('.list-product-loadmore');
            var number = data_load.attr('data-number');
            var orderby = data_load.attr('data-orderby');
            var order = data_load.attr('data-order');
            var cats = data_load.attr('data-cat');
            var paged = data_load.attr('data-paged');
            var maxpage = data_load.attr('data-maxpage');
            var pro_featured  = data_load.attr('data-profeatured');
            var pro_sale  = data_load.attr('data-prosale');
            var col_layout  = data_load.attr('data-collayout');
            var img_size  = data_load.attr('data-imgsize');
            var animation_img  = data_load.attr('data-animationimg');
            $.ajax({
                type: 'POST',
                url: ajax_process.ajaxurl,
                crossDomain: true,
                data: {
                    action: 'load_more_product_tab_layout',
                    number: number,
                    orderby: orderby,
                    order: order,
                    cats: cats,
                    paged: paged,
                    pro_featured: pro_featured,
                    pro_sale: pro_sale,
                    col_layout: col_layout,
                    img_size: img_size,
                    animation_img: animation_img,
                },
                success: function(data){


                    if(data[data.length-1] == '0' ){
                        data = data.split('');
                        data[data.length-1] = '';
                        data = data.join('');
                    }
                    var $newItem = $(data);
                    content.append(data);
                    paged = Number(paged) + 1;
                    data_load.attr('data-paged',paged);
                    data_load.find('i').removeClass('fa-spin');
                    if(Number(paged)>=Number(maxpage)){
                        data_load.parent().fadeOut();
                    }
                },
                error: function(MLHttpRequest, textStatus, errorThrown){
                    console.log(errorThrown);
                }
            });
            return false;
        });
        $('body').on('click', '.ajax-loadmore9', function(e){
            e.preventDefault();
            $(this).find('i').addClass('fa-spin');
            var current = $(this).parents('.mb-element-product-style8');
            var data_load = $(this);
            var content = current.find('.product-loadmore');
            var number = data_load.attr('data-number');
            var orderby = data_load.attr('data-orderby');
            var order = data_load.attr('data-order');
            var cats = data_load.attr('data-cat');
            var paged = data_load.attr('data-paged');
            var maxpage = data_load.attr('data-maxpage');
            var pro_featured  = data_load.attr('data-profeatured');
            var pro_sale  = data_load.attr('data-prosale');
            var col_layout  = data_load.attr('data-collayout');
            var img_size  = data_load.attr('data-imgsize');
            var animation_img  = data_load.attr('data-animationimg');
            $.ajax({
                type: 'POST',
                url: ajax_process.ajaxurl,
                crossDomain: true,
                data: {
                    action: 'load_more_product_style9',
                    number: number,
                    orderby: orderby,
                    order: order,
                    cats: cats,
                    paged: paged,
                    pro_featured: pro_featured,
                    pro_sale: pro_sale,
                    col_layout: col_layout,
                    img_size: img_size,
                    animation_img: animation_img,
                },
                success: function(data){


                    if(data[data.length-1] == '0' ){
                        data = data.split('');
                        data[data.length-1] = '';
                        data = data.join('');
                    }
                    var $newItem = $(data);
                    content.append(data);
                    paged = Number(paged) + 1;
                    data_load.attr('data-paged',paged);
                    data_load.find('i').removeClass('fa-spin');
                    if(Number(paged)>=Number(maxpage)){
                        data_load.parent().fadeOut();
                    }
                },
                error: function(MLHttpRequest, textStatus, errorThrown){
                    console.log(errorThrown);
                }
            });
            return false;
        });

        $('.wishlist-close').on('click',function(){
            $('.wishlist-mask').fadeOut();
        })

        $('.add_to_wishlist').on('click',function(){
            $('.wishlist-countdown').html('3');
            $(this).addClass('added');
            var product_id = $(this).attr("data-product-id");
            var product_title = $(this).attr("data-product-title");
            $('.wishlist-title').html(product_title);
            $('.wishlist-mask').fadeIn();
            var counter = 3;
            var popup;
            popup = setInterval(function() {
                counter--;
                if(counter < 0) {
                    clearInterval(popup);
                    $('.wishlist-mask').hide();
                } else {
                    $(".wishlist-countdown").text(counter.toString());
                }
            }, 1000);
        })

        $('body').on('click','.product-ajax-popup', function(e){
            $.fancybox.showLoading();
            var product_id = $(this).attr('data-product-id');

            $.ajax({
                type: 'POST',
                url: ajax_process.ajaxurl,
                crossDomain: true,
                data: {
                    action: 'product_popup_content',
                    product_id: product_id
                },
                success: function(res){
                    if(res[res.length-1] == '0' ){
                        res = res.split('');
                        res[res.length-1] = '';
                        res = res.join('');
                    }
                    $.fancybox.hideLoading();
                    $.fancybox(res, {
                        width: 1000,
                        height: 642,
                        autoSize: false,
                        onStart: function(opener) {
                            if ($(opener).attr('id') == 'login') {
                                $.get('/hicommon/authenticated', function(res) {
                                    if ('yes' == res) {
                                        console.log('this user must have already authenticated in another browser tab, SO I want to avoid opening the fancybox.');
                                        return false;
                                    } else {
                                        console.log('the user is not authenticated');
                                        return true;
                                    }
                                });
                            }
                        },
                    });
                    if($('.detail-gallery').length>0){
                        $('.detail-gallery').each(function(){
                            $(this).find(".carousel .list-none").owlCarousel({
                                addClassActive:true,
                                stopOnHover:true,
                                lazyLoad:true,
                                itemsCustom:[[0, 4]],
                                navigation:true,
                                pagination:false,
                                navigationText:['<i class="icon ion-ios-arrow-thin-left"></i>','<i class="icon ion-ios-arrow-thin-right"></i>'],

                            });
                            //Elevate Zoom
                            $('.detail-gallery').find('.mid img').elevateZoom({
                                zoomType: "inner",
                                cursor: "crosshair",
                                zoomWindowFadeIn: 500,
                                zoomWindowFadeOut: 750
                            });

                            $(this).find(".carousel a").on('click',function(event) {
                                event.preventDefault();
                                $(this).parents('.detail-gallery').find(".carousel a").removeClass('active');
                                $(this).addClass('active');
                                var z_url =  $(this).find('img').attr("src");
                                var srcset =  $(this).find('img').attr("srcset");
                                $(this).parents('.detail-gallery').find(".mid img").attr("src", z_url);
                                $(this).parents('.detail-gallery').find(".mid img").attr("srcset", srcset);
                                $('.zoomWindow').css('background-image','url("'+z_url+'")');
                                $('.zoomWindow').css('background-image','url("'+z_url+'")');
                                $.removeData($('.detail-gallery').find('.mid img'), 'elevateZoom');//remove zoom instance from image
                                $('.zoomContainer').remove();
                                $('.detail-gallery').find('.mid img').elevateZoom({
                                    zoomType: "inner",
                                    cursor: "crosshair",
                                    zoomWindowFadeIn: 500,
                                    zoomWindowFadeOut: 750
                                });
                            });

                        });
                    }
                    $('.fancybox-overlay, .fancybox-close').on('click',function () {
                        $('.zoomContainer').remove();
                    })
                    /*!
                     * Variations Plugin
                     */
                    !function(a,b,c,d){a.fn.wc_variation_form=function(){var c=this,f=c.closest(".product"),g=parseInt(c.data("product_id"),10),h=c.data("product_variations"),i=h===!1,j=!1,k=c.find(".reset_variations");return c.unbind("check_variations update_variation_values found_variation"),c.find(".reset_variations").unbind("click"),c.find(".variations select").unbind("change focusin"),c.on("click",".reset_variations",function(){return c.find(".variations select").val("").change(),c.trigger("reset_data"),!1}).on("reload_product_variations",function(){h=c.data("product_variations"),i=h===!1}).on("reset_data",function(){var b={".sku":"o_sku",".product_weight":"o_weight",".product_dimensions":"o_dimensions"};a.each(b,function(a,b){var c=f.find(a);c.attr("data-"+b)&&c.text(c.attr("data-"+b))}),c.wc_variations_description_update(""),c.trigger("reset_image"),c.find(".single_variation_wrap").slideUp(200).trigger("hide_variation")}).on("reset_image",function(){var a=f.find("div.images img:eq(0)"),b=f.find("div.images a.zoom:eq(0)"),c=a.attr("data-o_src"),e=a.attr("data-o_title"),g=a.attr("data-o_title"),h=b.attr("data-o_href");c!==d&&a.attr("src",c),h!==d&&b.attr("href",h),e!==d&&(a.attr("title",e),b.attr("title",e)),g!==d&&a.attr("alt",g)}).on("change",".variations select",function(){if(c.find('input[name="variation_id"], input.variation_id').val("").change(),c.find(".wc-no-matching-variations").remove(),i){j&&j.abort();var b=!0,d=!1,e={};c.find(".variations select").each(function(){var c=a(this).data("attribute_name")||a(this).attr("name");0===a(this).val().length?b=!1:d=!0,e[c]=a(this).val()}),b?(e.product_id=g,j=a.ajax({url:wc_cart_fragments_params.wc_ajax_url.toString().replace("%%endpoint%%","get_variation"),type:"POST",data:e,success:function(a){a?(c.find('input[name="variation_id"], input.variation_id').val(a.variation_id).change(),c.trigger("found_variation",[a])):(c.trigger("reset_data"),c.find(".single_variation_wrap").after('<p class="wc-no-matching-variations woocommerce-info">'+wc_add_to_cart_variation_params.i18n_no_matching_variations_text+"</p>"),c.find(".wc-no-matching-variations").slideDown(200))}})):c.trigger("reset_data"),d?"hidden"===k.css("visibility")&&k.css("visibility","visible").hide().fadeIn():k.css("visibility","hidden")}else c.trigger("woocommerce_variation_select_change"),c.trigger("check_variations",["",!1]),a(this).blur();c.trigger("woocommerce_variation_has_changed")}).on("focusin touchstart",".variations select",function(){i||(c.trigger("woocommerce_variation_select_focusin"),c.trigger("check_variations",[a(this).data("attribute_name")||a(this).attr("name"),!0]))}).on("found_variation",function(a,b){var e=f.find("div.images img:eq(0)"),g=f.find("div.images a.zoom:eq(0)"),h=e.attr("data-o_src"),i=e.attr("data-o_title"),j=e.attr("data-o_alt"),k=g.attr("data-o_href"),l=b.image_src,m=b.image_link,n=b.image_caption,o=b.image_title;c.find(".single_variation").html(b.price_html+b.availability_html),h===d&&(h=e.attr("src")?e.attr("src"):"",e.attr("data-o_src",h)),k===d&&(k=g.attr("href")?g.attr("href"):"",g.attr("data-o_href",k)),i===d&&(i=e.attr("title")?e.attr("title"):"",e.attr("data-o_title",i)),j===d&&(j=e.attr("alt")?e.attr("alt"):"",e.attr("data-o_alt",j)),l&&l.length>1?(e.attr("src",l).attr("alt",o).attr("title",o),g.attr("href",m).attr("title",n)):(e.attr("src",h).attr("alt",j).attr("title",i),g.attr("href",k).attr("title",i));var p=c.find(".single_variation_wrap"),q=f.find(".product_meta").find(".sku"),r=f.find(".product_weight"),s=f.find(".product_dimensions");q.attr("data-o_sku")||q.attr("data-o_sku",q.text()),r.attr("data-o_weight")||r.attr("data-o_weight",r.text()),s.attr("data-o_dimensions")||s.attr("data-o_dimensions",s.text()),b.sku?q.text(b.sku):q.text(q.attr("data-o_sku")),b.weight?r.text(b.weight):r.text(r.attr("data-o_weight")),b.dimensions?s.text(b.dimensions):s.text(s.attr("data-o_dimensions"));var t=!1,u=!1;b.is_purchasable&&b.is_in_stock&&b.variation_is_visible||(u=!0),b.variation_is_visible||c.find(".single_variation").html("<p>"+wc_add_to_cart_variation_params.i18n_unavailable_text+"</p>"),""!==b.min_qty?p.find(".quantity input.qty").attr("min",b.min_qty).val(b.min_qty):p.find(".quantity input.qty").removeAttr("min"),""!==b.max_qty?p.find(".quantity input.qty").attr("max",b.max_qty):p.find(".quantity input.qty").removeAttr("max"),"yes"===b.is_sold_individually&&(p.find(".quantity input.qty").val("1"),t=!0),t?p.find(".quantity").hide():u||p.find(".quantity").show(),u?p.is(":visible")?c.find(".variations_button").slideUp(200):c.find(".variations_button").hide():p.is(":visible")?c.find(".variations_button").slideDown(200):c.find(".variations_button").show(),c.wc_variations_description_update(b.variation_description),p.slideDown(200).trigger("show_variation",[b])}).on("check_variations",function(c,d,f){if(!i){var g=!0,j=!1,k={},l=a(this),m=l.find(".reset_variations");l.find(".variations select").each(function(){var b=a(this).data("attribute_name")||a(this).attr("name");0===a(this).val().length?g=!1:j=!0,d&&b===d?(g=!1,k[b]=""):k[b]=a(this).val()});var n=e.find_matching_variations(h,k);if(g){var o=n.shift();o?(l.find('input[name="variation_id"], input.variation_id').val(o.variation_id).change(),l.trigger("found_variation",[o])):(l.find(".variations select").val(""),f||l.trigger("reset_data"),b.alert(wc_add_to_cart_variation_params.i18n_no_matching_variations_text))}else l.trigger("update_variation_values",[n]),f||l.trigger("reset_data"),d||l.find(".single_variation_wrap").slideUp(200).trigger("hide_variation");j?"hidden"===m.css("visibility")&&m.css("visibility","visible").hide().fadeIn():m.css("visibility","hidden")}}).on("update_variation_values",function(b,d){i||(c.find(".variations select").each(function(b,c){var e,f=a(c);f.data("attribute_options")||f.data("attribute_options",f.find("option:gt(0)").get()),f.find("option:gt(0)").remove(),f.append(f.data("attribute_options")),f.find("option:gt(0)").removeClass("attached"),f.find("option:gt(0)").removeClass("enabled"),f.find("option:gt(0)").removeAttr("disabled"),e="undefined"!=typeof f.data("attribute_name")?f.data("attribute_name"):f.attr("name");for(var g in d)if("undefined"!=typeof d[g]){var h=d[g].attributes;for(var i in h)if(h.hasOwnProperty(i)){var j=h[i];if(i===e){var k="";d[g].variation_is_active&&(k="enabled"),j?(j=a("<div/>").html(j).text(),j=j.replace(/'/g,"\\'"),j=j.replace(/"/g,'\\"'),f.find('option[value="'+j+'"]').addClass("attached "+k)):f.find("option:gt(0)").addClass("attached "+k)}}}f.find("option:gt(0):not(.attached)").remove(),f.find("option:gt(0):not(.enabled)").attr("disabled","disabled")}),c.trigger("woocommerce_update_variation_values"))}),c.trigger("wc_variation_form"),c};var e={find_matching_variations:function(a,b){for(var c=[],d=0;d<a.length;d++){var f=a[d];e.variations_match(f.attributes,b)&&c.push(f)}return c},variations_match:function(a,b){var c=!0;for(var e in a)if(a.hasOwnProperty(e)){var f=a[e],g=b[e];f!==d&&g!==d&&0!==f.length&&0!==g.length&&f!==g&&(c=!1)}return c}};a.fn.wc_variations_description_update=function(b){var c=this,d=c.find(".woocommerce-variation-description");if(0===d.length)b&&(c.find(".single_variation_wrap").prepend(a('<div class="woocommerce-variation-description" style="border:1px solid transparent;">'+b+"</div>").hide()),c.find(".woocommerce-variation-description").slideDown(200));else{var e=d.outerHeight(!0),f=0,g=!1;d.css("height",e),d.html(b),d.css("height","auto"),f=d.outerHeight(!0),Math.abs(f-e)>1&&(g=!0,d.css("height",e)),g&&d.animate({height:f},{duration:200,queue:!1,always:function(){d.css({height:"auto"})}})}},a(function(){"undefined"!=typeof wc_add_to_cart_variation_params&&a(".variations_form").each(function(){a(this).wc_variation_form().find(".variations select:eq(0)").change()})})}(jQuery,window,document);



                    //Fix product variable thumb
                    $('body .variations_form select').on('change',function(){
                        var text = $(this).val();
                        $(this).parents('.attr-product').find('.current-color').html(text);
                        var id = $('input[name="variation_id"]').val();
                        if(id){
                            $('.product-gallery .bx-pager').find('a[data-variation_id="'+id+'"]').trigger( 'click' );
                            if($('.product-supper11').length > 0){
                                var slider_owl = $(this).parents('.product-supper11').find('.product-detail11 .wrap-item');
                                var index = slider_owl.find('.item[data-variation_id="'+id+'"]').attr('data-index');
                                slider_owl.trigger('owl.goTo', index);
                            }
                            if($('.trend-box18').length > 0){
                                $(this).parents('.item-detail18').find('.trend-thumb18').find('img').removeClass('active');
                                $(this).parents('.item-detail18').find('.trend-thumb18').find('div[data-variation_id="'+id+'"]').find('img').addClass('active');
                            }
                        }
                    })
                    // variable product
                    if($('.wrap-attr-product.special').length > 0){
                        $('.attr-filter ul li a').on('click',function(){
                            event.preventDefault();
                            var text = $(this).html();
                            $(this).parents('.attr-product').find('.current-color').html(text);
                            $(this).parents('ul').find('li').removeClass('active');
                            $(this).parents('ul').find('li a').removeClass('active');
                            $(this).parent().addClass('active');
                            $(this).addClass('active');
                            var attribute = $(this).parent().attr('data-attribute');
                            var id = $(this).parents('ul').attr('data-attribute-id');
                            $('#'+id).val(attribute);
                            $('#'+id).trigger( 'change' );
                            $('#'+id).trigger( 'focusin' );
                            return false;
                        })
                        $('.attr-hover-box').hover(function(){
                            var seff = $(this);
                            var old_html = $(this).find('ul').html();
                            var current_val = $(this).find('ul li.active').attr('data-attribute');
                            $(this).next().find('select').trigger( 'focusin' );
                            var content = '';
                            $(this).next().find('select').find('option').each(function(){
                                var val = $(this).attr('value');
                                var title = $(this).html();
                                var el_class = '';
                                var in_class = '';
                                if(current_val == val){
                                    el_class = ' class="active"';
                                    in_class = 'active';
                                }
                                if(val != ''){
                                    content += '<li'+el_class+' data-attribute="'+val+'"><a href="#" class="bgcolor-'+val+' '+in_class+'"><span></span>'+title+'</a></li>';
                                }
                            })
                            // console.log(content);
                            if(old_html != content) $(this).find('ul').html(content);
                        })
                        $('body .reset_variations').on('click',function(){
                            $('.attr-hover-box').each(function(){
                                var seff = $(this);
                                var old_html = $(this).find('ul').html();
                                var current_val = $(this).find('ul li.active').attr('data-attribute');
                                $(this).next().find('select').trigger( 'focusin' );
                                var content = '';
                                $(this).next().find('select').find('option').each(function(){
                                    var val = $(this).attr('value');
                                    var title = $(this).html();
                                    var el_class = '';
                                    var in_class = '';
                                    if(current_val == val){
                                        el_class = ' class="active"';
                                        in_class = 'active';
                                    }
                                    if(val != ''){
                                        content += '<li'+el_class+' data-attribute="'+val+'"><a href="#" class="bgcolor-'+val+' '+in_class+'"><span></span>'+title+'</a></li>';
                                    }
                                })
                                if(old_html != content) $(this).find('ul').html(content);
                                $(this).find('ul li').removeClass('active');
                            })
                        })
                    }
                    //end

                    //QUANTITY CLICK
                    $(".quantity").find(".qty-up").on("click",function(){
                        var min = $(this).prev().attr("data-min");
                        var max = $(this).prev().attr("data-max");
                        var step = $(this).prev().attr("data-step");
                        if(step === undefined) step = 1;
                        if(max !==undefined && Number($(this).prev().val())< Number(max) || max === undefined){
                            if(step!='') $(this).prev().val(Number($(this).prev().val())+Number(step));
                        }
                        $( 'div.woocommerce > form .button[name="update_cart"]' ).prop( 'disabled', false );
                        return false;
                    })
                    $(".quantity").find(".qty-down").on("click",function(){
                        var min = $(this).next().attr("data-min");
                        var max = $(this).next().attr("data-max");
                        var step = $(this).next().attr("data-step");
                        if(step === undefined) step = 1;
                        if(Number($(this).next().val()) > 1){
                            if(min !==undefined && $(this).next().val()>min || min === undefined){
                                if(step!='') $(this).next().val(Number($(this).next().val())-Number(step));
                            }
                        }
                        $( 'div.woocommerce > form .button[name="update_cart"]' ).prop( 'disabled', false );
                        return false;
                    })
                    $("input.qty-val").on("keyup change",function(){
                        var max = $(this).attr('data-max');
                        if( Number($(this).val()) > Number(max) ) $(this).val(max);
                        $( 'div.woocommerce > form .button[name="update_cart"]' ).prop( 'disabled', false );
                    })
                    //END
                },
                error: function(MLHttpRequest, textStatus, errorThrown){
                    console.log(errorThrown);
                }
            });
            return false;
        })

        $("body").on("click",".add_to_cart_button.mb-ajax_add_to_cart:not(.product_type_variable)",function(e){

            e.preventDefault();
            var product_id = $(this).attr("data-product_id");
            var seff = $(this);
            seff.removeClass('added');
            seff.addClass('loading');
            $.ajax({
                type : "post",
                url : ajax_process.ajaxurl,
                crossDomain: true,
                data: {
                    action: "add_to_cart",
                    product_id: product_id
                },

                success: function(data){
                    seff.removeClass('loading');
                    var cart_content = data.fragments['div.widget_shopping_cart_content'];

                    $('.mini-cart-content').html(cart_content);

                    var count_item = cart_content.split("item-info-cart").length;

                    var cart_item_count = $('.cart-item-count').html();
                    $('.mini-cart-link span.cart-number').html(count_item-1);
                    $('.cart-item-count').html(cart_item_count);
                    var price = $('.mini-cart-content').find('.mini-cart-total').find('.woocommerce-Price-amount').html();
                    $('.mb-cart-total').html(price);
                    seff.addClass('added');
                },
                error: function(MLHttpRequest, textStatus, errorThrown){
                    console.log(errorThrown);
                }
            });
        });


        $('body').on('click', '.product-price .remove', function(e){
            e.preventDefault();
            $(this).parents('.item-info-cart').addClass('hidden');
            var cart_item_key = $(this).parents('.item-info-cart').attr("data-key");
            $.ajax({
                type: 'POST',
                url: ajax_process.ajaxurl,
                crossDomain: true,
                data: {
                    action: 'product_remove',
                    cart_item_key: cart_item_key
                },
                success: function(data){
                    var cart_content = data.fragments['div.widget_shopping_cart_content'];
                    $('.mini-cart-content').html(cart_content);
                    // set count
                    var count_item = cart_content.split("item-info-cart").length;
                    var cart_item_count = $('.cart-item-count').html();
                    $('.mini-cart-link span.cart-number').html(count_item-1);
                    $('.cart-item-count').html(cart_item_count);
                    // set price
                    var price = $('.mini-cart-content').find('.mini-cart-total').find('.woocommerce-Price-amount').html();
                    if(price) $('.mb-cart-total').html(price);
                    else $('.mb-cart-total').html($('.total-default').html());
                },
                error: function(MLHttpRequest, textStatus, errorThrown){
                    console.log(errorThrown);
                }
            });
            return false;
        });
        //Update cart
        $('.button[name="update_cart"],.product-remove a.remove').on('click', function(e){
            $( document ).ajaxComplete(function( event, xhr, settings ) {
                if(settings.url.indexOf('?wc-ajax=get_refreshed_fragments') != -1){
                    $.ajax({
                        type: 'POST',
                        url: ajax_process.ajaxurl,
                        crossDomain: true,
                        data: {
                            action: 'update_mini_cart',
                        },
                        success: function(data){
                            // Load html
                            var cart_content = data.fragments['div.widget_shopping_cart_content'];
                            $('.mini-cart-content').html(cart_content);
                            $('.widget_shopping_cart_content').html(cart_content);
                            // set count
                            var count_item = cart_content.split("item-info-cart").length;
                            var cart_item_count = $('.cart-item-count').html();
                            $('.mini-cart-link span.cart-number').html(count_item-1);
                            $('.cart-item-count').html(cart_item_count);
                            // set price
                            var price = $('.mini-cart-content').find('.mini-cart-total').find('.woocommerce-Price-amount').html();
                            if(price) $('.mb-cart-total').html(price);
                            else $('.mb-cart-total').html($('.total-default').html());
                        },
                        error: function(MLHttpRequest, textStatus, errorThrown){
                            console.log(errorThrown);
                        }
                    });
                }
            });

        });
        $('.live-search-on input[name="s"]').on('keyup',function(){
            var key = $(this).val();
            var trim_key = key.trim();
            var post_type = $(this).parents('.live-search-on').find('input[name="post_type"]').val();
            var seff = $(this);
            var content = seff.parent().find('.list-product-search');
            content.html('<i class="fa fa-spinner fa-spin"></i>');
            content.addClass('ajax-loading');
            $.ajax({
                type : "post",
                url : ajax_process.ajaxurl,
                crossDomain: true,
                data: {
                    action: "live_search",
                    key: key,
                    post_type: post_type,
                },
                success: function(data){
                    //content.removeClass('ajax-loading');
                    if(data[data.length-1] == '0' ){
                        data = data.split('');
                        data[data.length-1] = '';
                        data = data.join('');
                    }
                    content.html(data);
                },
                error: function(MLHttpRequest, textStatus, errorThrown){
                    console.log(errorThrown);
                }
            });
        })
    });
})(jQuery);