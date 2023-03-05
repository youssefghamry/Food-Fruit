/**
 * Created by Administrator on 6/8/2015.
 */
(function($) {
    "use strict";
    $(document).ready(function() {
        $('.sv_iconpicker').iconpicker();


        //This for VC Elements
        $(document).on('click','div.sv_iconpicker input[type=text]',function(){

            if(!$(this).hasClass('st_icp_inited'))
            {
                $(this).iconpicker({
                    'container':'body'
                });

                $(this).addClass('st_icp_inited').data('iconpicker').show();
            }
        });
        $(document).on('click','input.sv_iconpicker',function(){

            if(!$(this).hasClass('st_icp_inited'))
            {
                $(this).iconpicker({
                    'container':'body'
                });
                $(this).parent().parent().attr('style','overflow:inherit !important');
                $(this).addClass('st_icp_inited').data('iconpicker').show();
            }
        });
        $('body').on('click','.sv-button-add-slider',function(){
            var key = $(this).parent().find('.add').find('.sv-add-item').last().data('item');
            var idname= $(this).parent().find('.add').attr('data-idname');
            if(key == '' || key == undefined)
            {
                key = 1;
            }else
            {
                key = parseInt(key) + 1;
            }
            var item = '<div class="sv-add-item" data-item="'+key+'">';

            item += '<label style="margin-top:10px; margin-bottom: 10px; display: block; ">Link Adv</label>';
            item += '<input class="images-url widefat" name="'+idname+'['+key+'][link]" value="" type="text">';
            item += '<label style="margin-top:10px; margin-bottom: 10px; display: block; ">Image</label>';
            item += '<img style="max-width: 100%;" class ="image-preview" src="">';
            item += '<input class="custom_media_url images-img-link" name="'+idname+'['+key+'][image]" value="" type="hidden">';
            item += '<button class="sv-button-upload-item" style="background: #00A0D2;  color: #fff;  border: none;  padding: 7px 10px;">Upload</button>';
            item += '<button class="sv-button-remove-item" style="margin-right: 15px; margin-bottom: 10px;  margin-top: 10px;  background: #D2001D;  color: #fff;  border: none;  padding: 7px 10px;">Remove</button>';
            item += '<hr></div>';
            $(this).parent().find('.add').append(item);

            $('.sv-button-upload-item').on('click',function () {
                var send_attachment_bkp = wp.media.editor.send.attachment;
                var seff = $(this);
                wp.media.editor.send.attachment = function (props, attachment) {

                    seff.parent().find('.custom_media_image').attr('src', attachment.url);
                    seff.parent().find('.custom_media_image').attr('style','display:block');
                    seff.parent().find('input.custom_media_url').val(attachment.url);
                    seff.parent().find('.image-preview').attr('src',attachment.url);
                    wp.media.editor.send.attachment = send_attachment_bkp;
                }

                wp.media.editor.open();

                return false;
            });

            $('.sv-remove-item').on('click',function () {
                $(this).parent().remove();
                return false;
            });
            return false;
        })

        $('.sv-remove-item').on('click',function () {
            $(this).parent().remove();
            return false;
        });

        $('.sv-button-upload-item').on('click',function () {
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var seff = $(this);
            wp.media.editor.send.attachment = function (props, attachment) {

                seff.parent().find('.custom_media_image').attr('src', attachment.url);
                seff.parent().find('.custom_media_image').attr('style','display:block');
                seff.parent().find('input.custom_media_url').val(attachment.url);
                seff.parent().find('.image-preview').attr('src',attachment.url);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }

            wp.media.editor.open();

            return false;
        });


        $('.sv-button-upload').on('click',function () {
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var seff = $(this);
            wp.media.editor.send.attachment = function (props, attachment) {
                seff.parent().find('.live-previews').html('<img src="'+attachment.url+'" />');
                seff.parent().find('input.sv-image-value').val(attachment.url);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }
            wp.media.editor.open();
            return false;
        });

        $('.sv-button-upload-id').on('click',function () {
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var seff = $(this);
            wp.media.editor.send.attachment = function (props, attachment) {
                seff.parent().find('.live-previews').html('<img src="'+attachment.url+'" />');
                seff.parent().find('input.sv-image-value').val(attachment.id);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }
            wp.media.editor.open();
            return false;
        });

        $('.sv-button-remove').on('click',function () {
            $(this).parent().find('.live-previews').html('');
            $(this).parent().find('input.sv-image-value').val('');
            return false;
        });


        $('.sv-button-upload-img').on("click",function(options){
            var default_options = {
                callback:null
            };
            options = $.extend(default_options,options);
            var image_custom_uploader;
            var self = $(this);
            //If the uploader object has already been created, reopen the dialog
            if (image_custom_uploader) {
                image_custom_uploader.open();
                return false;
            }
            //Extend the wp.media object
            image_custom_uploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: true
            });
            //When a file is selected, grab the URL and set it as the text field's value
            image_custom_uploader.on('select', function() {
                var selection = image_custom_uploader.state().get('selection');
                var ids = [], urls=[];
                selection.map(function(attachment)
                {
                    attachment  = attachment.toJSON();
                    ids.push(attachment.id);
                    urls.push(attachment.url);

                });
                var img_prev = '';
                for(var i=0;i<urls.length;i++)
                {
                    img_prev += '<img src="'+urls[i]+'" style="width:100px; height:100px; padding:5px;">';
                }
                if(img_prev!='')
                    self.parent().find(".img-previews").html(img_prev);
                self.parent().find("input.multi-image-url").val( JSON.stringify(urls) );


                if (typeof options.callback == 'function'){
                    options.callback({'self':self,'urls':urls});

                };


            });
            image_custom_uploader.open();
            return false;
        });
        if($('#term-color').length>0){
            $( '#term-color' ).wpColorPicker();
        }
        $('.sv-remove-item').on('click',function () {
            $(this).parent().remove();
            return false;
        });
        $('.sv-button-remove-upload').on('click',function () {
            $(this).parent().find('img').attr('src','');
            $(this).parent().find('input').attr('value','');
            return false;
        });
        //end

        $('.sv-button-upload').on('click',function () {
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var seff = $(this);
            wp.media.editor.send.attachment = function (props, attachment) {
                seff.parent().find('.live-previews').html('<img src="'+attachment.url+'" />');
                seff.parent().find('input.sv-image-value').val(attachment.url);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }
            wp.media.editor.open();
            return false;
        });

        $('.sv-button-upload-id').on('click',function () {
            var send_attachment_bkp = wp.media.editor.send.attachment;
            var seff = $(this);
            wp.media.editor.send.attachment = function (props, attachment) {
                seff.parent().find('.live-previews').html('<img src="'+attachment.url+'" />');
                seff.parent().find('input.sv-image-value').val(attachment.id);
                wp.media.editor.send.attachment = send_attachment_bkp;
            }
            wp.media.editor.open();
            return false;
        });

        $('.sv-button-remove').on('click',function () {
            var image_df = $(this).parent().find('.live-previews').attr('data-image');
            if(image_df) $(this).parent().find('.live-previews img').attr('src',image_df);
            else $(this).parent().find('.live-previews').html('');
            $(this).parent().find('input.sv-image-value').val('');
            return false;
        });


        $('.sv-button-upload-img').on("click",function(options){
            var default_options = {
                callback:null
            };
            options = $.extend(default_options,options);
            var image_custom_uploader;
            var self = $(this);
            //If the uploader object has already been created, reopen the dialog
            if (image_custom_uploader) {
                image_custom_uploader.open();
                return false;
            }
            //Extend the wp.media object
            image_custom_uploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Image',
                button: {
                    text: 'Choose Image'
                },
                multiple: true
            });
            //When a file is selected, grab the URL and set it as the text field's value
            image_custom_uploader.on('select', function() {
                var selection = image_custom_uploader.state().get('selection');
                var ids = [], urls=[];
                selection.map(function(attachment)
                {
                    attachment  = attachment.toJSON();
                    ids.push(attachment.id);
                    urls.push(attachment.url);

                });
                var img_prev = '';
                for(var i=0;i<urls.length;i++)
                {
                    img_prev += '<img src="'+urls[i]+'" class="img-100">';
                }
                if(img_prev!='')
                    self.parent().find(".img-previews").html(img_prev);
                self.parent().find("input.multi-image-url").val( JSON.stringify(urls) );


                if (typeof options.callback == 'function'){
                    options.callback({'self':self,'urls':urls});

                };


            });
            image_custom_uploader.open();
            return false;
        });
    });


    $('body').on('click', '.sv-del', function(e)
    {
        e.preventDefault();
        $(this).parent().remove();
    })


})(jQuery);