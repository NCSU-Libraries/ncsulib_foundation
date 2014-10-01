
function buildSearchURL(searchType) {
    <!-- add all other search terms and limits to this base url -->
    var baseURL = "http://www2.lib.ncsu.edu/catalog/?Nty=1";
    // handle special case parameters for Boolean searches
    if (searchType == 'boolean') {
        var terms = encodeURIComponent(document.booleanSearch.Ntt.value);
        baseURL += "&Ntx=mode+matchboolean&Ntk=Keyword&Ntt=" + terms;
        buildSearchFilters(baseURL);
        return false;
    }
    var searchURLTerms = "Ntt=";
    var searchURLKeys = "Ntk=";
    var prevQuery = false;
    <!-- use prevQuery to determine if need to add '|'? -->
    if (document.advancedSearch.keywordAnywhere.value != "") {
        searchURLTerms += encodeURIComponent(document.advancedSearch.keywordAnywhere.value);
        searchURLKeys += "Keyword";
        prevQuery = true;
    }
    if (document.advancedSearch.keywordTitle.value != "") {
        if (prevQuery) {
            searchURLTerms += "|";
            searchURLKeys += "|";
        }
        else {
            prevQuery = true;
        }
        searchURLTerms += encodeURIComponent(document.advancedSearch.keywordTitle.value);
        searchURLKeys += "Title";
    }
    if (document.advancedSearch.keywordAuthor.value != "") {
        if (prevQuery) {
            searchURLTerms += "|";
            searchURLKeys += "|";
        }
        else {
            prevQuery = true;
        }
        searchURLTerms += encodeURIComponent(document.advancedSearch.keywordAuthor.value);
        searchURLKeys += "Author";
    }
    if (document.advancedSearch.keywordSubject.value != "") {
        if (prevQuery) {
            searchURLTerms += "|";
            searchURLKeys += "|";
        }
        else {
            prevQuery = true;
        }
        searchURLTerms += encodeURIComponent(document.advancedSearch.keywordSubject.value);
        searchURLKeys += "Subject";
    }
    if (document.advancedSearch.keywordISBN.value != "") {
        if (prevQuery) {
            searchURLTerms += "|";
            searchURLKeys += "|";
        }
        else {
            prevQuery = true;
        }
        searchURLTerms += document.advancedSearch.keywordISBN.value;
        searchURLKeys += "ISBN";
    }
    if (document.advancedSearch.keywordPublisher.value != "") {
        if (prevQuery) {
            searchURLTerms += "|";
            searchURLKeys += "|";
        }
        else {
            prevQuery = true;
        }
        searchURLTerms += encodeURIComponent(document.advancedSearch.keywordPublisher.value);
        searchURLKeys += "Publisher";
    }
    <!-- allow users to enter a blank search -->
    if (prevQuery) {
        //searchURLTerms = escapeCharacters(searchURLTerms);
        //use encodeURIComponent() on each search term as it's read to ensure we're utf-8 compatible
        baseURL += "&" + searchURLKeys + "&" + searchURLTerms;
    }
    buildSearchFilters(baseURL);
    return false;

}

function buildSearchFilters(baseURL) {
    var baseN = "N=";
    var error = "";
    var prevFilter = false;
    <!-- pub date range filter -->
    if (document.advancedSearch.publishedFrom.value != "" && document.advancedSearch.publishedTo.value != "") {
        var datePattern = /^[0-9]{4}$/
        var dateFrom = document.advancedSearch.publishedFrom.value;
        var dateTo = document.advancedSearch.publishedTo.value;
        if (!dateFrom.match(datePattern) || !dateTo.match(datePattern)) {
            error += "Dates must be entered in YYYY format.";
            //alert("error! " + error);
        }
        else {
            baseURL += "&Nf=PubDateSort|BTWN+" + dateFrom + "+" + dateTo;
        }
    }
    var filterURL = "Nr=";
    <!-- library filter -->
    if (document.advancedSearch.library.selectedIndex != 0) {
        var index = document.advancedSearch.library.selectedIndex;
        if (index == 2 || index == 10) {
            error += "An invalid value was selected for 'Library'.";
        }
        else {
            baseN += document.advancedSearch.library[index].value;
            prevFilter = true;
        }
    }
    <!-- language filter -->
    if (document.advancedSearch.language.selectedIndex != 0) {
        var index = document.advancedSearch.language.selectedIndex;
        if (!prevFilter) {
            prevFilter = true;
        }
        else {
            baseN += "+";
        }
        baseN += document.advancedSearch.language[index].value;
    }
    <!-- create OR item type filter to mimic web2 item category 1 filter -->
    if (document.advancedSearch.item_category1.selectedIndex != 0) {
        var index = document.advancedSearch.item_category1.selectedIndex;
        if (prevFilter) {
            baseN += "+";
        }
        baseN += document.advancedSearch.item_category1[index].value;
        prevFilter = true;
    }
    <!-- Create OR filter to allow to select 1 or more doc types: gov docs, ref materials, and all others -->
    var prevDocTypeFilter = false;
    if (document.advancedSearch.govdoc.checked || document.advancedSearch.ref.checked ||
        document.advancedSearch.other.checked) {
        // <!-- If all 3 boxes are checked, dont need a filter at all -->
        if (!document.advancedSearch.govdoc.checked || !document.advancedSearch.ref.checked ||
            !document.advancedSearch.other.checked) {
            filterURL += "OR(";
            prevDocTypeFilter = false;
            if (document.advancedSearch.govdoc.checked) {
                filterURL += "DocType:" + document.advancedSearch.govdoc.value;
                prevDocTypeFilter = true;
            }
            if (document.advancedSearch.ref.checked) {
                if (prevDocTypeFilter) {
                    filterURL += ",";
                }
                filterURL += "DocType:" + document.advancedSearch.ref.value;
                prevDocTypeFilter = true;
            }
            if (document.advancedSearch.other.checked) {
                if (prevDocTypeFilter) {
                    filterURL += ",";
                }
                filterURL += "DocType:" + document.advancedSearch.other.value;
                prevDocTypeFilter = true;
            }
            if (prevDocTypeFilter) {
                filterURL += ")";
                baseURL += "&" + filterURL;
            }
        }
    }
    if (prevFilter) {
        baseURL += "&" + baseN;
    }
    else {
        baseURL += "&" + baseN + "0";
    }
    window.location=baseURL;
}


    var catalogUrl = "http://catalog.lib.ncsu.edu/";

    jQuery(document).ready(function($){
        // $("#tabs").tabs();

        // If user selects a call number browse, hide the TRLN and Worldcat options.
        $("#Ntk").change( function () {
            if ($("#Ntk option:selected").hasClass("callnum")) {
                $("#worldcat").attr("disabled","disabled");
                $("#trln").attr("disabled","disabled");
                $("#worldcatButton").css("color", "#777777");
                $("#trlnButton").css("color", "#777777");
            }
            else {
                $("#worldcat").prop("disabled",false);
                $("#trln").prop("disabled",false);
                $("#worldcatButton").css("color", "");
                $("#trlnButton").css("color", "");
            }
        });

        // handle clicking on the NCSU vs TRLN vs Worldcat radio button with jquery
        $("#trln").click(function() {
            $("#search").attr("action", "http://search.trln.org/search");
            $("#dummy").append($("#Ntk .callnum"));
        });
        $("#ncsu").click(function() {
            $("#search").attr("action", catalogUrl);
            $("#Ntk").append($("#dummy .callnum"));
        });
        $("#worldcat").click(function() {
            $("#search").attr("action", "http://ncsu.worldcat.org/");
            $("#dummy").append($("#Ntk .callnum"));
        });
        // use keypress function b/c enter doesn't seem to generate submit event for forms w/o submit buttons
        $("#scopeForm").keydown(function(e) {
            //alert("key pressed in scope form");
            if (e.keyCode == 13) {
                $("#search").submit();
                return false;
            }
        });

        // Maintain selected search interface on back button.
        var checked = $("input[name='scope']:checked").attr("id");
        //alert ("checked: " + checked);
        if (checked == "trln") {
            $("#search").attr("action", "http://search.trln.org/search");
            $("option.callnum").hide();
        }

        if (checked == "worldcat") {
            $("#search").attr("action", "http://ncsu.worldcat.org/");
            $("option.callnum").hide();
        }

        if ($("#Ntk option:selected").hasClass("callnum")) {
            $("#worldcat").attr("disabled","disabled");
            $("#trln").attr("disabled","disabled");
            $("#worldcatButton").css("color", "#777777");
            $("#trlnButton").css("color", "#777777");
        }

        // If worldcat is the selected search type, build and do a worldcat search when form is submitted. Otherwise just submit form using normal HTML submit.
        $("#search").submit( function() {
            // If it's a call number search, build and send to search for callnum service
            if ($("#Ntk option:selected").hasClass("callnum")) {
                var callnumURL = catalogUrl + "browse";
                var callNumber = $("#Ntt").val();
                var classType = $("#Ntk option:selected").val();
                callnumURL += "?callNumber=" + callNumber + "&classType=" + classType;
                window.location = callnumURL;
                return false;
            }
            checked = $("input[name='scope']:checked").attr("id");
            if (checked == "worldcat") {
                var worldcatURL = $("#search").attr("action");      // Worldcat URL from above
                var searchType = $("#Ntk option:selected").val();
                var searchString =  $("#Ntt").val();
                // only go through search string machinations if search terms are entered.
                // If no terms entered, just sends to basic Worldcat Local search page.
                if (undefined != searchString && searchString != "") {
                    var searchParams = [];
                    searchParams["qt"] = "wc_org_ncsu";
                    searchParams["se"] = "nodgr";
                    searchParams["sd"] = "desc";
                    searchParams["scope"] = "0";
                    var searchModifier = "";            // worldcat search string prefix to indicate search type.

                    if (searchType == "Title") {
                        searchModifier = "ti:";
                    }
                    if (searchType == "Journal_Title") {
                        searchParams["fq"] = "dt:ser >";    // Set format to journal/magazine/newspaper
                        searchModifier = "ti:";
                    }
                    if (searchType == "Author") {
                        searchModifier = "au:";
                    }
                    if (searchType == "Subject") {
                        searchModifier = "su:";
                    }
                    if (searchType == "ISBN") {
                        searchString = searchString.replace(/-/g,"");   // Get rid of hyphens for decent standard number finding.
                    }

                    searchParams["q"] = searchModifier + searchString;

                    var i = 0;
                    for (var current in searchParams) {
                        if (i == 0) {
                            worldcatURL += "search?";
                        }
                        else {
                            worldcatURL += "&";
                        }
                        // build query parameters.
                        worldcatURL += current;
                        worldcatURL += "=";
                        worldcatURL += escape(searchParams[current].replace(/ /g,"+")); // Javascript escaping does not handle spaces well.
                        i++;
                    }
                }

                window.location = worldcatURL;
                return false;
            }
            else {
                return true;
            }
        });


    });



    function showLocation() {
        y = document.getElementById("library");
        if (document.authoritySearch.button_clicked.selectedIndex == 5) {
            y.style.visibility = "visible";
            y[3].selected = "true";
        }
        else {
            y.style.visibility = "hidden";
            y[0].selected = "true";
        }
    }
