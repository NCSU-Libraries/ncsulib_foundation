/**
 * GA for Homepage Tabs
 *
 * Path: /
 * Detects what a user is searching for (anonymously) as well as whatever
 * other toggles have been selected and sends that information to Google
 * Analytics via Event Tracking.
 */

// Create a slight pause for GA to catch the event data
// function pause() {
//     var date = new Date();
//         var curDate = null;
//         do {
//             curDate = new Date();
//         } while(curDate-date < 200);
// }

var homeGA = {
    init : function($){

        // search tabs
        jQuery('#articles-search-more').click(function(e){
            // _gaq.push(['_trackEvent', 'Article Search', 'Internal Link', 'Articles']);
            ga('send', 'event', 'Article Search', 'Internal Link', 'Articles');
            homeGA.pause();
        })
        jQuery('#books-media-search-more').click(function(){
            // _gaq.push(['_trackEvent', 'Book Search', 'Internal Link', 'Catalog']);
            ga('send', 'event', 'Book Search', 'Internal Link', 'Catalog');
            homeGA.pause();
        })
        //All
        jQuery('input#all-submit').click(function() {
            // _gaq.push(['_trackEvent', 'Search', 'All', jQuery('input#searchall').attr('value')]);
            ga('send', 'event', 'Search', 'All', jQuery('input#searchall').attr('value'));
            homeGA.pause();
        });

        //Articles
        var pro;        // Peer Reviewed Only checkbox
        var dropdown;   // Selected dropdown: title, author or anywhere
        jQuery('input#article-submit').click(function() {
            jQuery('input#peer-reviewed').is(':checked') ? pro = " PRO" : pro = "";
            dropdown =  jQuery('#search-articles .display .text').text();
            // _gaq.push(['_trackEvent', 'Search', 'Articles ' + dropdown + pro, jQuery('input#searcharticle').attr('value')]);
            ga('send', 'event', 'Search', 'All', 'Articles ' + dropdown + pro, jQuery('input#searcharticle').attr('value'));
            homeGA.pause();
        });

        //Books & Media
        var field;
        var scope;
        jQuery('input#searchbookssubmit').click(function() {
            field = jQuery('select#Ntk option:selected').text();
            scope = (jQuery('input[name=scope]:checked').attr('value')).toUpperCase();
            // _gaq.push(['_trackEvent', 'Search', 'Books and Media: ' + field + ' - ' + scope, jQuery('#Ntt').val()]);
            ga('send', 'event', 'Search', 'Books and Media: ' + field + ' - ' + scope, jQuery('#Ntt').val());
            homeGA.pause();
        });

        //Our Website
        jQuery('input#web-submit').click(function() {
            // _gaq.push(['_trackEvent', 'Search', 'Website', jQuery('input#searchweb').attr('value')]);
            ga('send', 'event', 'Search', 'Website', jQuery('input#searchweb').attr('value'));
            homeGA.pause();
        });

        // Artbox
        jQuery('ul#artbox li a').click(function(e){
            var title = jQuery(this).data('title');
            var destination = jQuery(this).data('destination');
            // _gaq.push(['_trackEvent', 'Artbox', title, destination]);
            ga('send', 'event', 'Artbox', title, destination);
            homeGA.pause();
        })
        jQuery('.orbit-prev').click(function(){
            // _gaq.push(['_trackEvent', 'Artbox', 'Interact', 'Previous']);
            ga('send', 'event', 'Artbox', 'Interact', 'Previous');
            homeGA.pause();
        })
        jQuery('.orbit-next').click(function(){
            // _gaq.push(['_trackEvent', 'Artbox', 'Interact', 'Next']);
            ga('send', 'event', 'Artbox', 'Interact', 'Next');
            homeGA.pause();
        })
        jQuery('.orbit-timer span').click(function(){
            // _gaq.push(['_trackEvent', 'Artbox', 'Interact', 'Pause']);
            ga('send', 'event', 'Artbox', 'Interact', 'Pause');
            homeGA.pause();
        })

        // research tools
        jQuery('#rt_databases').click(function(){
            // _gaq.push(['_trackEvent', 'Search', 'More Research Tools', 'Databases']);
            ga('send', 'event', 'Search', 'More Research Tools', 'Databases');
            homeGA.pause();
        })
        jQuery('#rt_journals').click(function(){
            // _gaq.push(['_trackEvent', 'Search', 'More Research Tools', 'Journals']);
            ga('send', 'event', 'Search', 'More Research Tools', 'Journals');
            homeGA.pause();
        })
        jQuery('#rt_citation_builder').click(function(){
            // _gaq.push(['_trackEvent', 'Search', 'More Research Tools', 'Citation Builder']);
            ga('send', 'event', 'Search', 'More Research Tools', 'Citation Builder');
            homeGA.pause();
        })

        // quicklinks
        jQuery('#ql_cdm').click(function(){
            // _gaq.push(['_trackEvent', 'Quicklinks', 'Technology', 'Create Digital Media']);
            ga('send', 'event', 'Quicklinks', 'Technology', 'Create Digital Media');
            homeGA.pause();
        })
        jQuery('#ql_makersace').click(function(){
            // _gaq.push(['_trackEvent', 'Quicklinks', 'Technology', 'Makerspace']);
            ga('send', 'event', 'Quicklinks', 'Technology', 'Makerspace');
            homeGA.pause();
        })
        jQuery('#ql_reservearoom').click(function(){
            // _gaq.push(['_trackEvent', 'Quicklinks', 'Studying', 'Reserve a Room']);
            ga('send', 'event', 'Quicklinks', 'Studying', 'Reserve a Room');
            homeGA.pause();
        })
        jQuery('#ql_group_finder').click(function(){
            // _gaq.push(['_trackEvent', 'Quicklinks', 'Studying', 'GroupFinder']);
            ga('send', 'event', 'Quicklinks', 'Studying', 'GroupFinder');
            homeGA.pause();
        })
        jQuery('#ql_searchtools').click(function(){
            // _gaq.push(['_trackEvent', 'Quicklinks', 'Courses', 'Course Tools']);
            ga('send', 'event', 'Quicklinks', 'Courses', 'Course Tools');
            homeGA.pause();
        })
        jQuery('#ql_course_reserves').click(function(){
            // _gaq.push(['_trackEvent', 'Quicklinks', 'Courses', 'Course Reserves']);
            ga('send', 'event', 'Quicklinks', 'Courses', 'Course Reserves');
            homeGA.pause();
        })

        // available now links
        jQuery('#al_reservearoom').click(function(){
            // _gaq.push(['_trackEvent', 'Availability', 'Reserve a Room']);
            ga('send', 'event', 'Availability', 'Reserve a Room');
            homeGA.pause();
        })
        jQuery('#al_techlending').click(function(){
            // _gaq.push(['_trackEvent', 'Availability', 'Borrow Technology']);
            ga('send', 'event', 'Availability', 'Borrow Technology');
            homeGA.pause();
        })

        // Available now tabs
        jQuery('#al_hill_study_rooms').click(function(){
            // _gaq.push(['_trackEvent', 'Availability', 'Hill', 'Study rooms']);
            ga('send', 'event', 'Availability', 'Hill', 'Study rooms');
            homeGA.pause();
        })
        jQuery('#al_hill_laptops').click(function(){
            // _gaq.push(['_trackEvent', 'Availability', 'Hill', 'Laptops']);
            ga('send', 'event', 'Availability', 'Hill', 'Laptops');
            homeGA.pause();
        })
        jQuery('#al_hill_tablets').click(function(){
            // _gaq.push(['_trackEvent', 'Availability', 'Hill', 'Tablets']);
            ga('send', 'event', 'Availability', 'Hill', 'Tablets');
            homeGA.pause();
        })
        jQuery('#al_hunt_study_rooms').click(function(){
            // _gaq.push(['_trackEvent', 'Availability', 'Hunt', 'Study Rooms']);
            ga('send', 'event', 'Availability', 'Hunt', 'Study Rooms');
            homeGA.pause();
        })
        jQuery('#al_hunt_laptops').click(function(){
            // _gaq.push(['_trackEvent', 'Availability', 'Hunt', 'laptops']);
            ga('send', 'event', 'Availability', 'Hunt', 'laptops');
            homeGA.pause();
        })
        jQuery('#al_hunt_tablets').click(function(){
            // _gaq.push(['_trackEvent', 'Availability', 'Hunt', 'tablets']);
            ga('send', 'event', 'Availability', 'Hunt', 'tablets');
            homeGA.pause();
        })

        // story 1
        jQuery('#story-1-photo').click(function(e){
            // _gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'photo']);
            ga('send', 'event', 'Feature Area 1', 'James B. Hunt Library', 'photo');
            homeGA.pause();
        })
        jQuery('#story-1-heading').click(function(){
            // _gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'h2']);
            ga('send', 'event', 'Feature Area 1', 'James B. Hunt Library', 'h2');
            homeGA.pause();
        })
        jQuery('.story-1-link').click(function(){
            // _gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'link']);
            ga('send', 'event', 'Feature Area 1', 'James B. Hunt Library', 'link');
            homeGA.pause();
        })

        // story 2
        jQuery('#story-2-photo').click(function(){
            // _gaq.push(['_trackEvent', 'Feature Area 2', 'Proposed Hours', 'photo']);
            ga('send', 'event', 'Feature Area 2', 'Proposed Hours', 'photo');
            homeGA.pause();
        })
        jQuery('#story-2-heading').click(function(){
            // _gaq.push(['_trackEvent', 'Feature Area 2', 'Proposed Hours', 'h2']);
            ga('send', 'event', 'Feature Area 2', 'Proposed Hours', 'h2');
            homeGA.pause();
        })
        jQuery('.story-2-link').click(function(){
            // _gaq.push(['_trackEvent', 'Feature Area 1', 'Proposed Hours', 'link']);
            ga('send', 'event', 'Feature Area 1', 'Proposed Hours', 'link');
            homeGA.pause();
        })

        // happenings
        jQuery('.news-link').click(function(){
            // _gaq.push(['_trackEvent', 'Happenings', 'click', 'news']);
            ga('send', 'event', 'Happenings', 'click', 'news');
            homeGA.pause();
        })
        jQuery('.events-link').click(function(){
            // _gaq.push(['_trackEvent', 'Happenings', 'click', 'events']);
            ga('send', 'event', 'Happenings', 'click', 'events');
            homeGA.pause();
        })
        jQuery('.exhibits-link').click(function(){
            // _gaq.push(['_trackEvent', 'Happenings', 'click', 'exhibits']);
            ga('send', 'event', 'Happenings', 'click', 'exhibits');
            homeGA.pause();
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
    homeGA.init($);
});

