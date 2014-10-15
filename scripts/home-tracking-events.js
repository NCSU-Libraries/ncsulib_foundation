/**
 * GA for Homepage Tabs
 *
 * Path: /
 * Detects what a user is searching for (anonymously) as well as whatever
 * other toggles have been selected and sends that information to Google
 * Analytics via Event Tracking.
 */

// Create a slight pause for GA to catch the event data
function pause() {
    var date = new Date();
        var curDate = null;
        do {
            curDate = new Date();
        } while(curDate-date < 200);
}

(function($) {
    // search tabs
    jQuery('#articles-search-more').on('click',function(){
        _gaq.push(['_trackEvent', 'Article Search', 'Internal Link', 'Articles']);
        pause();
    })
    jQuery('#books-media-search-more').on('click',function(){
        _gaq.push(['_trackEvent', 'Book Search', 'Internal Link', 'Catalog']);
        pause();
    })
    //All
    jQuery('input#all-submit').click(function() {
        _gaq.push(['_trackEvent', 'Search', 'All', jQuery('input#searchall').attr('value')]);
        pause();
    });

    //Articles
    var pro;        // Peer Reviewed Only checkbox
    var dropdown;   // Selected dropdown: title, author or anywhere
    jQuery('input#article-submit').click(function() {
        jQuery('input#peer-reviewed').is(':checked') ? pro = " PRO" : pro = "";
        dropdown =  jQuery('#search-articles .display .text').text();
        _gaq.push(['_trackEvent', 'Search', 'Articles ' + dropdown + pro, jQuery('input#searcharticle').attr('value')]);
        pause();
    });

    //Books & Media
    var field;
    var scope;
    jQuery('input#searchbookssubmit').click(function() {
        field = jQuery('select#Ntk option:selected').text();
        scope = (jQuery('input[name=scope]:checked').attr('value')).toUpperCase();
        _gaq.push(['_trackEvent', 'Search', 'Books and Media: ' + field + ' - ' + scope, jQuery('#Ntt').val()]);
        pause();
    });

    //Our Website
    jQuery('input#web-submit').click(function() {
        _gaq.push(['_trackEvent', 'Search', 'Website', jQuery('input#searchweb').attr('value')]);
        pause();
    });


    // Artbox
    jQuery('ul#artbox li a').on('click',function(e){
        var title = jQuery(this).data('title');
        var destination = jQuery(this).data('destination');
        _gaq.push(['_trackEvent', 'Artbox', title, destination]);
        pause();
    })
    jQuery('.orbit-prev').on('click',function(){
        _gaq.push(['_trackEvent', 'Artbox', 'Interact', 'Previous']);
        pause();
    })
    jQuery('.orbit-next').on('click',function(){
        _gaq.push(['_trackEvent', 'Artbox', 'Interact', 'Next']);
        pause();
    })
    jQuery('.orbit-timer span').on('click',function(){
        _gaq.push(['_trackEvent', 'Artbox', 'Interact', 'Pause']);
        pause();
    })

        // research tools
    jQuery('#rt_databases').on('click', function(){
        _gaq.push(['_trackEvent', 'Search', 'More Research Tools', 'Databases']);
        pause();
    })
    jQuery('#rt_journals').on('click', function(){
        _gaq.push(['_trackEvent', 'Search', 'More Research Tools', 'Journals']);
        pause();
    })
    jQuery('#rt_citation_builder').on('click', function(){
        _gaq.push(['_trackEvent', 'Search', 'More Research Tools', 'Citation Builder']);
        pause();
    })


    // quicklinks
    jQuery('#ql_cdm').on('click', function(){
        _gaq.push(['_trackEvent', 'Quicklinks', 'Technology', 'Create Digital Media']);
        pause();
    })
    jQuery('#ql_makersace').on('click', function(){
        _gaq.push(['_trackEvent', 'Quicklinks', 'Technology', 'Makerspace']);
        pause();
    })
    jQuery('#ql_reservearoom').on('click', function(){
        _gaq.push(['_trackEvent', 'Quicklinks', 'Studying', 'Reserve a Room']);
        pause();
    })
    jQuery('#ql_group_finder').on('click', function(){
        _gaq.push(['_trackEvent', 'Quicklinks', 'Studying', 'GroupFinder']);
        pause();
    })
    jQuery('#ql_searchtools').on('click', function(){
        _gaq.push(['_trackEvent', 'Quicklinks', 'Courses', 'Course Tools']);
        pause();
    })
    jQuery('#ql_course_reserves').on('click', function(){
        _gaq.push(['_trackEvent', 'Quicklinks', 'Courses', 'Course Reserves']);
        pause();
    })


    // available now links
    jQuery('#al_reservearoom').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Reserve a Room']);
        pause();
    })
    jQuery('#al_techlending').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Borrow Technology']);
        pause();
    })


    // Available now tabs
    jQuery('#al_hill_study_rooms').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Hill', 'Study rooms']);
        pause();
    })
    jQuery('#al_hill_laptops').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Hill', 'Laptops']);
        pause();
    })
    jQuery('#al_hill_tablets').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Hill', 'Tablets']);
        pause();
    })
    jQuery('#al_hunt_study_rooms').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Hunt', 'Study Rooms']);
        pause();
    })
    jQuery('#al_hunt_laptops').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Hunt', 'laptops']);
        pause();
    })
    jQuery('#al_hunt_tablets').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Hunt', 'tablets']);
        pause();
    })


    // story 1
    jQuery('#story-1-photo').on('click', function(){
        _gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'photo']);
        pause();
    })
    jQuery('#story-1-heading').on('click', function(){
        _gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'h2']);
        pause();
    })
    jQuery('.story-1-link').on('click', function(){
        _gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'link']);
        pause();
    })


    // story 2
    jQuery('#story-2-photo').on('click', function(){
        _gaq.push(['_trackEvent', 'Feature Area 2', 'Proposed Hours', 'photo']);
        pause();
    })
    jQuery('#story-2-heading').on('click', function(){
        _gaq.push(['_trackEvent', 'Feature Area 2', 'Proposed Hours', 'h2']);
        pause();
    })
    jQuery('.story-2-link').on('click', function(){
        _gaq.push(['_trackEvent', 'Feature Area 1', 'Proposed Hours', 'link']);
        pause();
    })


    // happenings
    jQuery('.news-link').on('click', function(){
        _gaq.push(['_trackEvent', 'Happenings', 'click', 'news']);
        pause();
    })
    jQuery('.events-link').on('click', function(){
        _gaq.push(['_trackEvent', 'Happenings', 'click', 'events']);
        pause();
    })
    jQuery('.exhibits-link').on('click', function(){
        _gaq.push(['_trackEvent', 'Happenings', 'click', 'exhibits']);
        pause();
    })


})(jQuery);
