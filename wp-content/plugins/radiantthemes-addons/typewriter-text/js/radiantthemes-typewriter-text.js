jQuery(document).ready(function(){
    jQuery(".radiantthemes-typewriter-text.element-one").each(function(){
        jQuery(this).children(".typed-writer").typed({
            stringsElement: jQuery(this).children(".typed-strings") ,
            typeSpeed: jQuery(this).data("typewriter-typespeed") ,
            startDelay: jQuery(this).data("typewriter-startdelay") ,
            backSpeed: jQuery(this).data("typewriter-backspeed") ,
            backDelay: jQuery(this).data("typewriter-backdelay") ,
            shuffle: jQuery(this).data("typewriter-shuffle") ,
            loop: jQuery(this).data("typewriter-loop") ,
            loopCount: false, // false = infinite
            showCursor: false,
            cursorChar: "|",
        });
    });
});