//////////////////////////////////////////////////////////////////////////////////
//  Google Anlytics Tracking for Summon
//  Erik Olson
//  5/18/2016
//  http://ncsu.preview.summon.serialssolutions.com/#!/
//  Tracked Sections:
//  Header
//  Search Terms
//  Main Content
//  Citation Saved Items
//  Sidebar
//  Preview Pane
//  Advanced Search
//////////////////////////////////////////////////////////////////////////////////

var summon = {
    init : function(){

        var h = document.getElementsByTagName('head').item(0);
        var s = document.createElement("script");
        s.type = "text/javascript";
        s.id = 'analytics-code';
        s.appendChild(document.createTextNode(summon.returnGACode()));
        h.appendChild(s);

        // start tracking script when page is loaded (has results)
        var int = setInterval(function(){
            num = $('#results ul.list-unstyled li').length;
            if(num > 0){
                clearInterval(int);
                summon.trackEvents();
            }
        }, 1000);

    },

    trackEvents : function(){

        //HEADER
        //click logo
        $('.Logo').on('click', function(e){
            ga('send', {
              hitType: 'event',
              eventCategory: 'Header',
              eventAction: 'logo'
            });
        })
        //chat link
        $('.chat').on('click', function(e){
            ga('send', {
              hitType: 'event',
              eventCategory: 'Header',
              eventAction: 'chat'
            });
        })
        // help link
        $('.help').on('click', function(e){
            ga('send', {
              hitType: 'event',
              eventCategory: 'Header',
              eventAction: 'help'
            });
        })
        //language
        $('.languageSwitcher ul li').on('click', function(e){
            var lang = $(this).text();
            ga('send', {
              hitType: 'event',
              eventCategory: 'Header',
              eventAction: 'chat',
              eventLabel: lang
            });
        })

        // get search term
        var hash = window.location.hash;
        searchQuery = summon.getValFromHash(hash,'q');
        if(searchQuery != 0){
          ga('send', {
            hitType: 'event',
            eventCategory: 'Search Terms',
            eventAction: searchQuery
          });
        }

        // results header
        // results sort
        $('.searchInfo').on('click', '.ng-scope', function(e){ //advanced search button
            elem = $(this);
            //sort
            val = $(elem).text().trim();
            ga('send', {
              hitType: 'event',
              eventCategory: 'Main Content',
              eventAction: 'Result Sort',
              eventLabel: val
            });
        });
        //Database Recommendations
        $('.databaseRecommendations').on('click', '.customPrimaryLink.ng-binding', function(e){ //advanced search button
            elem = $(this);
            //sort
            val = $(elem).text().trim();
            ga('send', {
              hitType: 'event',
              eventCategory: 'Main Content',
              eventAction: 'Database Recommendation',
              eventLabel: val
            });
        });

        // Main Content Results box
        $('#results').on('click', 'li.ng-scope', function(e){ //advanced search button
            target = e.target;

            if($(target).is('li')){ //main box with title
              title = $(target).find('h1 .ng-isolate-scope a').text();
              // console.log('Results box click '+title);
              if(title != ''){
                ga('send', {
                  hitType: 'event',
                  eventCategory: 'Main Content',
                  eventAction: 'Results box click',
                  eventLabel: title
                });
              }
            } else{

                if($(target).hasClass('availabilityLink')){ // full text/citation quicklinks
                    targetText = $(target).text();
                    // console.log(targetText+' availability');
                    ga('send', {
                      hitType: 'event',
                      eventCategory: 'Main Content',
                      eventAction: 'Availability Link',
                      eventLabel: targetText
                    });
                } else if($(target).is('a') || $(target).is('b')){ //article title
                  // console.log(e.target.nodeName)
                  if($(target).hasClass('customPrimaryLink')){
                    targetText = $(target).text();
                    // console.log(targetText+' author');
                    ga('send', {
                      hitType: 'event',
                      eventCategory: 'Main Content',
                      eventAction: 'Article author',
                      eventLabel: targetText
                    });
                  } else if($(target).hasClass('ng-scope')){ //article title
                    targetText = $(target).text().trim();
                    // console.log(targetText+' title');
                    ga('send', {
                      hitType: 'event',
                      eventCategory: 'Main Content',
                      eventAction: 'Article title',
                      eventLabel: targetText
                    });
                  } else if(e.target.nodeName == 'B'){ //stupid bolded part of title
                    targetText = $(target).parent().text().trim();
                    // console.log(targetText+' title');
                    ga('send', {
                      hitType: 'event',
                      eventCategory: 'Main Content',
                      eventAction: 'Article title',
                      eventLabel: targetText
                    });
                  }


                } else if($(target).hasClass('previewButton') || $(target).hasClass('previewButtonDesktop')){ //preview button
                  // console.log('preview button');
                  ga('send', {
                    hitType: 'event',
                    eventCategory: 'Main Content',
                    eventAction: 'Preview button'
                  });
                } else if($(target).hasClass('saveButton')){
                    title = $(this).find('h1 a').text();
                    // console.log(title+' save button');
                    ga('send', {
                      hitType: 'event',
                      eventCategory: 'Main Content',
                      eventAction: 'Save button',
                      eventLabel: title
                    });
                }
            }
        });

        // CITATION SAVED ITEMS
        $('#savedItemsButton').on('click', function(ev){

            $('.citation').on('click', function(e){
                target = e.target;
                if(e.target.nodeName == 'A' || e.target.nodeName == 'B'){ // full text/citation quicklinks
                    targetText = $(target).text();

                    if($(target).hasClass('ng-scope')){ //article title
                        targetText = $(target).text().trim();
                        ga('send', {
                          hitType: 'event',
                          eventCategory: 'Citation Saved Items',
                          eventAction: 'Article title',
                          eventLabel: targetText
                        });
                    } else if(e.target.nodeName == 'B'){ //stupid bolded part of title
                        targetText = $(target).parent().text().trim();
                        ga('send', {
                          hitType: 'event',
                          eventCategory: 'Citation Saved Items',
                          eventAction: 'Article title',
                          eventLabel: targetText
                        });
                    } else if($(target).hasClass('customPrimaryLink')){
                        targetText = $(target).text();
                        ga('send', {
                          hitType: 'event',
                          eventCategory: 'Citation Saved Items',
                          eventAction: 'Author',
                          eventLabel: targetText
                        });
                    } else if($(target).hasClass('availabilityLink')){
                        targetText = $(target).text();
                         ga('send', {
                          hitType: 'event',
                          eventCategory: 'Citation Saved Items',
                          eventAction: 'Availability link',
                          eventLabel: targetText
                        });

                    }
                  }
            })

            // citation format form
            $('#citeFormat').on('change', function(e){
                target = e.target;
                val = $(target).find('option:selected').text();
                ga('send', {
                  hitType: 'event',
                  eventCategory: 'Citation Saved Items',
                  eventAction: 'Choose Citation Format',
                  eventLabel: val
                });
            })

            //export to dropdown
            $('.citation-toolbar form ul.dropdown-menu li').on('click', function(e){
                target = e.target;
                val = $(target).text();
                ga('send', {
                  hitType: 'event',
                  eventCategory: 'Citation Saved Items',
                  eventAction: 'Export to',
                  eventLabel: val
                });
            })

            //print/email buttons
            $('.citation-toolbar form button').not('.dropdown-toggle').on('click', function(e){
                target = e.target;
                val = $(target).text();
                ga('send', {
                  hitType: 'event',
                  eventCategory: 'Citation Saved Items',
                  eventAction: val
                });
            })
        })


        // LEFT SIDEBAR
        $('aside.leftBar').on('click', '.ng-binding', function(e){
            elem = $(this);
            //determine section
            val = $(elem).text().trim();
            // console.log(val);
            // if we're clicking the MORE button
            if(val == 'More'){ //any more button
                section = $(elem).parent().parent().parent().parent().parent().find('.ng-binding:first').text();
                //determine include vs exclude vs turned off
                ga('send', {
                  hitType: 'event',
                  eventCategory: 'Sidebar',
                  eventAction: 'More',
                  eventLabel: section
                });
            } else if(val == 'Include' || val == 'Exclude'){ //include|exclude tabs
                section = $(elem).parent().parent().parent().next().find('.ng-binding:first').text();
                // console.log('Include/Exclude '+section);
                ga('send', {
                  hitType: 'event',
                  eventCategory: 'Sidebar',
                  eventAction: section+' Section',
                  eventLabel: val+' tab'
                });
            } else if(val == 'Clear Filters'){
                section = $(elem).parent().parent().parent().parent().find('.ng-binding:first').text();
                // console.log('Clear Filters '+section);
                ga('send', {
                  hitType: 'event',
                  eventCategory: 'Sidebar',
                  eventAction: 'Clear Filters'
                });
            } else if(val == 'Peer-Review' || val == 'Full Text Online'){ //refine your search
                section = $(elem).parent().parent().parent().parent().parent().find('.ng-binding:first').text();

                if($(elem).parent().hasClass('applied')){
                  // console.log(val+' Included '+section);
                  //determine include vs exclude vs turned off
                  ga('send', {
                    hitType: 'event',
                    eventCategory: 'Sidebar',
                    eventAction: section,
                    eventLabel: val+' included'
                  });
                } else if($(elem).parent().hasClass('negated')){
                  // console.log(val+' Excluded '+section);
                  ga('send', {
                    hitType: 'event',
                    eventCategory: 'Sidebar',
                    eventAction: section,
                    eventLabel: val+' excluded'
                  });
                } else{
                  // console.log(val+' Off '+section);
                  ga('send', {
                    hitType: 'event',
                    eventCategory: 'Sidebar',
                    eventAction: section,
                    eventLabel: val+' off'
                  });
                }
            } else { //all remaining buttons
                newElement = $(elem).parent().parent().parent().parent().find('.ng-binding:first');
                section = $(newElement).text();
                // console.log(section);

                if($(elem).parent().hasClass('applied')){
                    // console.log('Heading included '+section);
                    //determine include vs ex
                    ga('send', {
                      hitType: 'event',
                      eventCategory: 'Sidebar',
                      eventAction: section,
                      eventLabel: val+' included'
                    });
                } else if($(elem).parent().hasClass('negated')){
                    // console.log('Heading excluded '+section);
                    ga('send', {
                      hitType: 'event',
                      eventCategory: 'Sidebar',
                      eventAction: section,
                      eventLabel: val+' excluded'
                    });
                } else{
                  // console.log('Heading off '+section);
                  ga('send', {
                    hitType: 'event',
                    eventCategory: 'Sidebar',
                    eventAction: section,
                    eventLabel: val+' off'
                  });
                }
            }

        })

        //PREVIEW PANE
        $('#previewMenu').on('click', function(e){
            target = e.target;
            //preview options
            if($(target).hasClass('btn')){ //top button group
                targetText = $(target).text();
                title = $(target).parent().parent().next().find('h1 a').text();
                ga('send', {
                  hitType: 'event',
                  eventCategory: 'Preview Pane',
                  eventAction: targetText,
                  eventLabel: title
                });
            }
        });

        //ADVANCED SEARCH
        $('.queryBox .input-group-btn .btn.ng-scope').on('click', function(ev){
            summon.interval = setInterval(summon.listenForAdvancedSearch, '500');
        })

    },

    listenForAdvancedSearch : function(){
        if($('.advancedSearchDialog').length > 0){
            clearInterval(summon.interval);

            $('#advSearchSubmit').on('click', function(e){
                formData = $('form.form-horizontal').serializeArray();
                summon.handleAdvancedSearch(formData);
            })
        }
    },

    handleAdvancedSearch : function(data){
        for (i=0;i<data.length;i++){
            if(data[i].value != 0){
                ga('send', {
                  hitType: 'event',
                  eventCategory: 'Advanced Search',
                  eventAction: data[i].name,
                  eventLabel: data[i].value
                });
            }
        }
    },

    getValFromHash : function(hash,val){
        // everything after the '?'
        urlHash = hash.split('?');
        if(urlHash[0] ==''){
            return;
        }
        // now we have just the vars
        urlAry = urlHash[1].split('&');
        // loop through all vars and compare to passed val
        for(i=0;i<urlAry.length;i++){
            keyVal = urlAry[i].split('=');
            if(keyVal[0] == val){
                return decodeURI(keyVal[1]);
            }
        }
        return false;
    },

    returnGACode : function(){
        return "(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){"+
            "(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),"+
            "m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)"+
            "})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');"+
            "ga('create', 'UA-30783343-1', 'auto');"+
            "ga('send', 'pageview');"

    }
}

$(function() {
    summon.init();
});
