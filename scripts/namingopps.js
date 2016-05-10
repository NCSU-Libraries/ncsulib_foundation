var nonNameableAreas = [];    // initialize array to be used for naming opps that are reserved
var floorForTable = "";       // the value to display in the table for the column "floor"
var botCount = 0;             // iterator to keep track of bots
var allLinks = [];            // to apply jQuery view switch to two links
  allLinks[0] = '.no-util-all';
  allLinks[1] = '.text-link-all';

jQuery(function($) {
  //jQuery UI tabbed interface
  $('#tabs').tabs();

  //bind a tab switch to an area click on the map of the building
  $('[data-tab]').click(function() {
    tabNum = $(this).attr('data-tab');
      $('#tabs').tabs('load', tabNum);
  });

  //hover over a floor and highlight the corresponding tab
  $('[data-tab]').hover(function() {
    tabNum = $(this).attr('data-tab');
    $('ul.ui-tabs-nav li:nth-child('+tabNum+')').addClass('ui-state-hover');
  },
  function(){
    tabNum = $(this).attr('data-tab');
    $('ul.ui-tabs-nav li:nth-child('+tabNum+')').removeClass('ui-state-hover');
  });

  //Below is mapster related code

  //hover or click an area, highlight or activate a corresponding list item/link
  $('area[data-room]').each(function() {
    var room      = $(this).attr('data-room');
    var className = '';
    var $roomLink = $('a[data-target-room="' + room + '"]');

    className = $(this).attr('data-nameable') === 'yes' ? 'highlighter' : 'highlighter-reserved';

    //this will apply only to the floorplans
    $(this).click(function() {
      // voodoo
      window.location.href = $('a[data-target-room="'+room+'"]').attr('href');
      $('a[data-target-room="'+room+'"]').click(); //activate the link for the
      thisMapsterImgID = $('area[data-room]').parents('div.ui-tabs-panel').children('.floorplan').children('.floor').attr('id');
      $(thisMapsterImgID).mapster('onClick', false); //clear the color fill on click
    });

    // highlighting effect on list items when hovering over corresponding area in image
    // add the class to the a link on enter and remove on leave
    $(this).hover(
      function() {$roomLink.addClass(className);},
      function() {$roomLink.removeClass(className);}
      );
  });

  // hover over a list item/link, highlight the corresponding map area
  $('a[data-target-room]').each(function() {
    var $targetRoom = $(this).attr('data-target-room');

    $(this).hover(function(e) {
      if (e.type == 'mouseenter') {
        thisMapsterImgID = "#"+$(this).parents('ul').attr('data-image');
        $(thisMapsterImgID).mapster('highlight', $targetRoom);
      }
      else if (e.type == 'mouseleave') {
        $(thisMapsterImgID).mapster('highlight',  false);
      }
    });
  });

  for (i=0; i<7; i++) {
    /**
     * creating an area array for all of the areas that have been named already.  Assigning a
     * different fill color for these spaces
     */

    nonNameableAreas[i] = [];
    thisMap = "map#m-floor"+i+" area[data-nameable]";
    $(thisMap).each(function(index) {
        var nameability = $(this).attr('data-nameable');
        var roomGroup = $(this).attr('data-room');
        if ((nameability && (nameability == 'no')) && roomGroup && ($.inArray(roomGroup, nonNameableAreas) < 0)) {
          nonNameableAreas[i].push({key: roomGroup, fillColor: '1729B0'});
        }
    });
    /**
     * apply the mapster plugin to each map in the loop defined by i
     */
    $('#floor'+i+'').mapster({
      mapKey: 'data-room',
      wrapClass: 'floorplan'+i+'',
      fillColor: 'FF0000',
      stroke: 'true',
      strokeColor: '#000',
      areas: nonNameableAreas[i],
        onConfigured: function() {
          $('.floorplan1, .floorplan2, .floorplan3, .floorplan4, .floorplan5, .floorplan6').css({'float': 'left','margin': '0 17px 10px 0px'});
          $('.floorplan2, .floorplan3, .floorplan4, .floorplan5, .floorplan6').css({'background' : 'white'} );
          $('.floorplan1, .floorplan2, .floorplan3, .floorplan4, .floorplan5, .floorplan6').css('width', '302px' );
          $('.floorplan0').css('margin', '0 0 10px 0' );
          $('.floorplan0').css('width', 'auto' );
          $('.floorplan1').css({'background' : 'white' });
      }
    });
  }

  /**
   * Tablesorter
   */
  // creating table from existing lists in tabbed view of interface
  $('ul.data-targets a').each(function() {
    floorForTable = $(this).parents('ul').attr('data-image') === "floor6" ? "Grounds" : $(this).parents('ul').attr('data-image').replace(/floor/g, "Floor ");
    list = $(this).html();
    space = $('span:first-child', this).text();
    price = list.slice(list.lastIndexOf('>')+1);

    botCount++;  // iterator used to filter out certain naming opportunities

    if  (space.match(/bot/gi) !== null ) {
      floorForTable = "Floors 1 and 2";
    }
    if (space.match(/art/gi) !== null) {
      floorForTable = "Floors 2 and 3";
    }
    // don't count certain items as they appear on multiple floors
    if ((botCount > 30 && botCount < 36) || botCount == 39 || botCount == 40 || botCount == 43){
    } else {
      $('.all-spaces tbody').append('<tr><td><a data-reveal-id="opp-modal" data-reveal-ajax="true" class="reveal-space" href="'+ $(this).attr('href') +'">' + space +'</a></td><td>'+ floorForTable +'</td><td>'+ price +'</td></tr>');
    }
  });


  // add parser through the tablesorter addParser method
    $.tablesorter.addParser({
        // set a unique id
        id: 'cost',
        is: function (s) {
            return (/^[£$€?.]/).test(s);
        }, format: function (s) {
            return $.tablesorter.formatFloat(s.replace(new RegExp(/[$]/g), "").replace(/RESERVED/g, "").replace(/,/g, ""));
        }, type: "numeric"
    });

  /**
   * Parser for floor sorting
   */
    $.tablesorter.addParser({
        // set a unique id
        id: 'floors',
        is: function(s) {
          // return false so this parser is not auto detected
          return false;
        },
        format: function(s) {
          // format data for normalization
          return s.replace(/Grounds/,0).replace(/Floor 1/,1).replace(/Floors 1 and 2/,2).replace(/Floor 2/,3).replace(/Floor 3/,4).replace(/Floor 4/,5).replace(/Floor 5/,6);
        },
        // set type
        type: 'numeric'
    });

  $('.all-spaces').tablesorter({
      widgets: ['zebra'],
      headers: {  1: {sorter:"floors"},
                  2: {sorter:"cost"}},
      sortList: [[2,0]] });

  // Show the new table if a user clicks on the corresponding toggle
  for (var i = 0; i < allLinks.length; i++) {
    $(allLinks[i]).click( function() {
      if ($('.tablesorter').is(':hidden')) {
        $('.floor').hide(0, function() {
          $('.tablesorter').slideDown(0);
          $('.main-content').addClass('extra-height');
          $('.no-util-all').hide();
          $('.no-util-fp').show();
        });
      }
    });
  }






  // Bring back the tabs if a user clicks on the corresponding toggle
  $('.no-util-fp').click( function() {
    if ($('.floor').is(':hidden')) {
      $('.tablesorter').hide(0, function() {
        $('.floor').slideDown(0);
        $('.main-content').removeClass('extra-height');
        $('.no-util-fp').hide(0);
        $('.no-util-all').slideDown(0);
      });
    }
  });
    $('.data-targets li a').attr('data-reveal-id', 'opp-modal').attr('data-reveal-ajax', 'true');

});
