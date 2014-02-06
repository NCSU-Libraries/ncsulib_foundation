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

})(jQuery);
