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
    $('#articles-search-more').on('click',function(){
        _gaq.push(['_trackEvent', 'Article Search', 'Internal Link', 'Articles']);
        pause();
    })
    $('#books-media-search-more').on('click',function(){
        _gaq.push(['_trackEvent', 'Book Search', 'Internal Link', 'Catalog']);
        pause();
    })
    //All
    $('input#all-submit').click(function() {
        _gaq.push(['_trackEvent', 'Search', 'All', $('input#searchall').attr('value')]);
        pause();
    });

    //Articles
    var pro;        // Peer Reviewed Only checkbox
    var dropdown;   // Selected dropdown: title, author or anywhere
    $('input#article-submit').click(function() {
        $('input#peer-reviewed').is(':checked') ? pro = " PRO" : pro = "";
        dropdown =  $('#search-articles .display .text').text();
        _gaq.push(['_trackEvent', 'Search', 'Articles ' + dropdown + pro, $('input#searcharticle').attr('value')]);
        pause();
    });

    //Books & Media
    var field;
    var scope;
    $('input#searchbookssubmit').click(function() {
        field = $('select#Ntk option:selected').text();
        scope = ($('input[name=scope]:checked').attr('value')).toUpperCase();
        _gaq.push(['_trackEvent', 'Search', 'Books and Media: ' + field + ' - ' + scope, $('#Ntt').val()]);
        pause();
    });

    //Our Website
    $('input#web-submit').click(function() {
        _gaq.push(['_trackEvent', 'Search', 'Website', $('input#searchweb').attr('value')]);
        pause();
    });


    // Artbox
    $('ul#artbox li a').on('click',function(e){
        var title = $(this).data('title');
        var destination = $(this).data('destination');
        _gaq.push(['_trackEvent', 'Artbox', title, destination]);
        pause();
    })
    $('.orbit-prev').on('click',function(){
        _gaq.push(['_trackEvent', 'Artbox', 'Interact', 'Previous']);
        pause();
    })
    $('.orbit-next').on('click',function(){
        _gaq.push(['_trackEvent', 'Artbox', 'Interact', 'Next']);
        pause();
    })
    $('.orbit-timer span').on('click',function(){
        _gaq.push(['_trackEvent', 'Artbox', 'Interact', 'Pause']);
        pause();
    })

        // research tools
    $('#rt_databases').on('click', function(){
        _gaq.push(['_trackEvent', 'Search', 'More Research Tools', 'Databases']);
        pause();
    })
    $('#rt_journals').on('click', function(){
        _gaq.push(['_trackEvent', 'Search', 'More Research Tools', 'Journals']);
        pause();
    })
    $('#rt_citation_builder').on('click', function(){
        _gaq.push(['_trackEvent', 'Search', 'More Research Tools', 'Citation Builder']);
        pause();
    })


    // quicklinks
    $('#ql_cdm').on('click', function(){
        _gaq.push(['_trackEvent', 'Quicklinks', 'Technology', 'Create Digital Media']);
        pause();
    })
    $('#ql_makersace').on('click', function(){
        _gaq.push(['_trackEvent', 'Quicklinks', 'Technology', 'Makerspace']);
        pause();
    })
    $('#ql_reservearoom').on('click', function(){
        _gaq.push(['_trackEvent', 'Quicklinks', 'Studying', 'Reserve a Room']);
        pause();
    })
    $('#ql_group_finder').on('click', function(){
        _gaq.push(['_trackEvent', 'Quicklinks', 'Studying', 'GroupFinder']);
        pause();
    })
    $('#ql_searchtools').on('click', function(){
        _gaq.push(['_trackEvent', 'Quicklinks', 'Courses', 'Course Tools']);
        pause();
    })
    $('#ql_course_reserves').on('click', function(){
        _gaq.push(['_trackEvent', 'Quicklinks', 'Courses', 'Course Reserves']);
        pause();
    })


    // available now links
    $('#al_reservearoom').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Reserve a Room']);
        pause();
    })
    $('#al_techlending').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Borrow Technology']);
        pause();
    })


    // Available now tabs
    $('#al_hill_study_rooms').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Hill', 'Study rooms']);
        pause();
    })
    $('#al_hill_laptops').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Hill', 'Laptops']);
        pause();
    })
    $('#al_hill_tablets').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Hill', 'Tablets']);
        pause();
    })
    $('#al_hunt_study_rooms').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Hunt', 'Study Rooms']);
        pause();
    })
    $('#al_hunt_laptops').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Hunt', 'laptops']);
        pause();
    })
    $('#al_hunt_tablets').on('click', function(){
        _gaq.push(['_trackEvent', 'Availability', 'Hunt', 'tablets']);
        pause();
    })


    // story 1
    $('#story-1-photo').on('click', function(){
        _gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'photo']);
        pause();
    })
    $('#story-1-heading').on('click', function(){
        _gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'h2']);
        pause();
    })
    $('.story-1-link').on('click', function(){
        _gaq.push(['_trackEvent', 'Feature Area 1', 'James B. Hunt Library', 'link']);
        pause();
    })


    // story 2
    $('#story-2-photo').on('click', function(){
        _gaq.push(['_trackEvent', 'Feature Area 2', 'Proposed Hours', 'photo']);
        pause();
    })
    $('#story-2-heading').on('click', function(){
        _gaq.push(['_trackEvent', 'Feature Area 2', 'Proposed Hours', 'h2']);
        pause();
    })
    $('.story-2-link').on('click', function(){
        _gaq.push(['_trackEvent', 'Feature Area 1', 'Proposed Hours', 'link']);
        pause();
    })


    // happenings
    $('.news-link').on('click', function(){
        _gaq.push(['_trackEvent', 'Happenings', 'click', 'news']);
        pause();
    })
    $('.events-link').on('click', function(){
        _gaq.push(['_trackEvent', 'Happenings', 'click', 'events']);
        pause();
    })
    $('.exhibits-link').on('click', function(){
        _gaq.push(['_trackEvent', 'Happenings', 'click', 'exhibits']);
        pause();
    })


})(jQuery);
