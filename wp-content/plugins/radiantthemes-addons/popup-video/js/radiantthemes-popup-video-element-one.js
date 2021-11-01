jQuery(document).ready(function(){
    jQuery(".rt-popup-video.element-one").each(function(){
        jQuery(this).find(".video-link").fancybox({
            defaults:{
                speed: 1000,
            },
        });
    });
});