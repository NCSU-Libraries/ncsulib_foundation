/**
 * GA for News page
 *
 * Path: /news
 * Detects what a user is searching for (anonymously) as well as whatever
 * other toggles have been selected and sends that information to Google
 * Analytics via Event Tracking.
 */

var nga = {
    init : function($){
        // Featured Stories
        jQuery('section.News-block_1 .news-item').click(function(e){
            title = jQuery(this).find('h2').text();
            index = jQuery(this).parent().index()+1;
            ga('send', 'event', 'News', 'Featured Stories', 'Story '+index, title);
            newsGA.pause();
        })

        // Latest Stories
        jQuery('section.News-block_2 .news-item').click(function(e){
            title = jQuery(this).find('h2').text();
            index = jQuery(this).parent().index()+1;
            ga('send', 'event', 'News', 'Latest Stories', 'Story '+index, title);
            newsGA.pause();
        })

        // Library Stories
        jQuery('section.capture_and_promote-block_8 .lib-story').click(function(e){
            title = jQuery(this).find('.story-title').text();
            index = jQuery(this).index()+1;
            ga('send', 'event', 'News', 'Library Stories', 'Story '+index, title);
            newsGA.pause();
        })

        // Events
        jQuery('section.upcoming_events-block_8 .workshop-item').click(function(e){
            title = jQuery(this).find('.workshop-title a').text();
            index = jQuery(this).index()+1;
            ga('send', 'event', 'News', 'Events', 'Event '+index, title);
            newsGA.pause();
        })

        // latest focus
        jQuery('#latest-focus').click(function(e){
            title = jQuery(this).find('h2 a').text();
            ga('send', 'event', 'News', 'Latest Focus',  title);
            newsGA.pause();
        })

        // Archive button
        jQuery('#archive').click(function(e){
            ga('send', 'event', 'News', 'Archive Button');
            newsGA.pause();
        })

        // other blogs
        jQuery('#other-news-links li').click(function(e){
            title = jQuery(this).find('a').text();
            ga('send', 'event', 'News', 'Other News', title);
            newsGA.pause();
        })

    },

    pause : function(){
        var date = new Date();
        var curDate = null;
        do {
            curDate = new Date();
        } while(curDate-date < 200);
    }
}

jQuery(function(){
    if(!$('body').hasClass('logged-in')){
        nga.init();
    }
})

