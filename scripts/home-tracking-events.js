/**
 * GA for Homepage Tabs
 *
 * Path: /
 * Detects what a user is searching for (anonymously) as well as whatever
 * other toggles have been selected and sends that information to Google
 * Analytics via Event Tracking.
 */


var homeGA = {
    init : function($){

        // search tabs
        jQuery('#articles-search-more').click(function(e){
            ga('send', 'event', 'Article Search', 'Internal Link', 'Articles');
            homeGA.pause();
        })
        jQuery('#books-media-search-more').click(function(){
            ga('send', 'event', 'Book Search', 'Internal Link', 'Catalog');
            homeGA.pause();
        })
        //All
        jQuery('input#all-submit').click(function() {
            ga('send', 'event', 'Search', 'All', jQuery('input#searchall').attr('value'));
            homeGA.pause();
        });

        //Articles
        var pro;        // Peer Reviewed Only checkbox
        var dropdown;   // Selected dropdown: title, author or anywhere
        jQuery('input#article-submit').click(function() {
            jQuery('input#peer-reviewed').is(':checked') ? pro = " PRO" : pro = "";
            dropdown =  jQuery('#search-articles .display .text').text();
            ga('send', 'event', 'Search', 'Articles ' + dropdown + pro, jQuery('input#searcharticle').attr('value'));
            homeGA.pause();
        });

        //Books & Media
        var field;
        var scope;
        jQuery('input#searchbookssubmit').click(function() {
            field = jQuery('select#Ntk option:selected').text();
            scope = (jQuery('input[name=scope]:checked').attr('value')).toUpperCase();
            ga('send', 'event', 'Search', 'Books and Media: ' + field + ' - ' + scope, jQuery('#Ntt').val());
            homeGA.pause();
        });

        //Our Website
        jQuery('input#web-submit').click(function() {
            ga('send', 'event', 'Search', 'Website', jQuery('input#searchweb').attr('value'));
            homeGA.pause();
        });

        // Artbox
        jQuery('ul#artbox li a').click(function(e){
            var title = jQuery(this).data('title');
            var destination = jQuery(this).data('destination');
            var index = jQuery(this).parent().index()+1;

            ga('send', 'event', 'Artbox', 'Slide '+index, title);
            homeGA.pause();
        })
        jQuery('.orbit-prev').click(function(){
            ga('send', 'event', 'Artbox', 'Interact', 'Previous');
            homeGA.pause();
        })
        jQuery('.orbit-next').click(function(){
            ga('send', 'event', 'Artbox', 'Interact', 'Next');
            homeGA.pause();
        })
        jQuery('.orbit-timer span').click(function(){
            ga('send', 'event', 'Artbox', 'Interact', 'Pause');
            homeGA.pause();
        })

        // research tools
        jQuery('#rt_databases').click(function(){
            ga('send', 'event', 'Search', 'More Research Tools', 'Databases');
            homeGA.pause();
        })
        jQuery('#rt_journals').click(function(){
            ga('send', 'event', 'Search', 'More Research Tools', 'Journals');
            homeGA.pause();
        })
        jQuery('#rt_citation_builder').click(function(){
            ga('send', 'event', 'Search', 'More Research Tools', 'Citation Builder');
            homeGA.pause();
        })

        // quicklinks
        jQuery('#ql_cdm').click(function(){
            ga('send', 'event', 'Quicklinks', 'Technology', 'Create Digital Media');
            homeGA.pause();
        })
        jQuery('#ql_makersace').click(function(){
            ga('send', 'event', 'Quicklinks', 'Technology', 'Makerspace');
            homeGA.pause();
        })
        jQuery('#ql_reservearoom').click(function(){
            ga('send', 'event', 'Quicklinks', 'Studying', 'Reserve a Room');
            homeGA.pause();
        })
        jQuery('#ql_group_finder').click(function(){
            ga('send', 'event', 'Quicklinks', 'Studying', 'GroupFinder');
            homeGA.pause();
        })
        jQuery('#ql_searchtools').click(function(){
            ga('send', 'event', 'Quicklinks', 'Courses', 'Course Tools');
            homeGA.pause();
        })
        jQuery('#ql_course_reserves').click(function(){
            ga('send', 'event', 'Quicklinks', 'Courses', 'Course Reserves');
            homeGA.pause();
        })

        // available now links
        jQuery('#al_reservearoom').click(function(){
            ga('send', 'event', 'Availability', 'Reserve a Room');
            homeGA.pause();
        })
        jQuery('#al_techlending').click(function(){
            ga('send', 'event', 'Availability', 'Borrow Technology');
            homeGA.pause();
        })

        // Available now tabs
        jQuery('#al_hill_study_rooms').click(function(){
            ga('send', 'event', 'Availability', 'Hill', 'Study rooms');
            homeGA.pause();
        })
        jQuery('#al_hill_laptops').click(function(){
            ga('send', 'event', 'Availability', 'Hill', 'Laptops');
            homeGA.pause();
        })
        jQuery('#al_hill_tablets').click(function(){
            ga('send', 'event', 'Availability', 'Hill', 'Tablets');
            homeGA.pause();
        })
        jQuery('#al_hunt_study_rooms').click(function(){
            ga('send', 'event', 'Availability', 'Hunt', 'Study Rooms');
            homeGA.pause();
        })
        jQuery('#al_hunt_laptops').click(function(){
            ga('send', 'event', 'Availability', 'Hunt', 'laptops');
            homeGA.pause();
        })
        jQuery('#al_hunt_tablets').click(function(){
            ga('send', 'event', 'Availability', 'Hunt', 'tablets');
            homeGA.pause();
        })

        // Hunt Library
        jQuery('#hunt-feature a').click(function(e){
            ga('send', 'event', 'Home Hunt Library color box');
            homeGA.pause();
        })

        // news
        jQuery('#home-news-content a').click(function(e){
            title = jQuery(this).find('h3').text();
            ga('send', 'event', 'Home News', title);
            homeGA.pause();
        })

        // events
        jQuery('#home-events ul li').click(function(e){
            title = jQuery(this).find('a').text();
            index = jQuery(this).index();
            ga('send', 'event', 'Home Events', index, title);
            homeGA.pause();
        })


        // library stories
        jQuery('.view-capture-and-promote .view-content .views-row a').click(function(e){
            var href = $(this).attr('href');
            ga('send', 'event', 'Library Story', 'click', href);
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

jQuery(function($){
    if(!$('body').hasClass('logged-in')){
        homeGA.init($);
    }
});

