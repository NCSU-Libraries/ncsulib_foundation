jQuery(function($){
    // Everything below is logging that was initially built out by Jason Walsh
    $("#searcheverything").submit(function() {
        var selectedtab = $("dl.tabs dd.active").data('tab');
        var searchterm = $("#searchall").val();
        $.ajax({
            url: "/website/log/homepage_search_tabs_logger.php",
            data: {
                tab: selectedtab,
                term: searchterm
            },
            async: false,
            timeout: 3E3
        });
    });
    $("#search-articles-summon").submit(function() {
        var selectedtab = $("dl.tabs dd.active").data('tab');
        var searchterm = $("#searcharticle").val();
        $.ajax({
            url: "/website/log/homepage_search_tabs_logger.php",
            data: {
                tab: selectedtab,
                term: searchterm
            },
            async: false,
            timeout: 3E3
        });
    });
    $("#search").submit(function(e) {
        var selectedtab = $("dl.tabs dd.active").data('tab');
        var searchterm = $("#Ntt").val();
        $.ajax({
            url: "/website/log/homepage_search_tabs_logger.php",
            data: {
                tab: selectedtab,
                term: searchterm
            },
            async: false,
            timeout: 3E3
        });
    });
    $("#websitesearch").submit(function() {
        var selectedtab = $("dl.tabs dd.active").data('tab');
        var searchterm = $("#searchweb").val();
        $.ajax({
            url: "/website/log/homepage_search_tabs_logger.php",
            data: {
                tab: selectedtab,
                term: searchterm
            },
            async: false,
            timeout: 3E3
        });
    });
    // Everything above is logging that was initially built out by Jason Walsh
});
