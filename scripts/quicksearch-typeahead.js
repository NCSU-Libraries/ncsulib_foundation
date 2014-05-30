/*
 * Typeahead front-end configuration & setup
 */
jQuery(document).ready(function () {

// define the datasets for the typeahead
var bestbets = new Dataset({
  valuekey: 'value',
  remote: {
    ajax: { dataType: 'jsonp', },
    url: 'http://sandbox.lib.ncsu.edu/quicksearch-typeahead/all/%QUERY',
    filter: function(response){
      return response.bestbets;
    },
    rateLimitWait: 100,
  }
}).initialize();

var titles = new Dataset({
  valuekey: 'value',
  remote: {
    ajax: { dataType: 'jsonp', },
    url: 'http://sandbox.lib.ncsu.edu/quicksearch-typeahead/all/%QUERY',
    filter: function(response){
        return response.trln;
    },
    rateLimitWait: 100,
    limit: 3,
  }
}).initialize();

var spaces = new Dataset({
  valuekey: 'value',
  remote: {
    ajax: { dataType: 'jsonp', },
    url: 'http://sandbox.lib.ncsu.edu/quicksearch-typeahead/all/%QUERY',
    filter: function(response){
        return response.spaces;
    },
    rateLimitWait: 100,
  }
}).initialize();

var faqs = new Dataset({
  valuekey: 'value',
  remote: {
    ajax: { dataType: 'jsonp', },
    url: 'http://sandbox.lib.ncsu.edu/quicksearch-typeahead/all/%QUERY',
    filter: function(response){
        return response.faqs;
    },
    rateLimitWait: 100,
  }
}).initialize();

// pre-compile the suggestion templates

var bestbets_template = Handlebars.compile([
        '<div class="row">',
          '<div class="small-12 columns bestbet-container">',
            '<span class="suggestion-title">{{value}}</span>',
            '{{#description}}<p class="bestbet-description">{{description}}</p>{{/description}}',
          '</div>',
        '</div>',
].join(''));

var spaces_template = Handlebars.compile([
        '<div class="row space-container">',
          '<div class="large-3 medium-3 small-3 columns">',
            '{{#if image}}<img class="space-image" src="{{image}}" width="100%" />',
            '{{else}}<img src="//www.lib.ncsu.edu/sites/all/themes/ncsulib_foundation/images/greybox.png" class="space-image" alt="" >',
            '{{/if}}',
          '</div>',
          '<div class="large-9 medium-9 small-9">',
            '<span class="suggestion-title">{{value}}</span>',
            '<p>{{building}}</p>',
          '</div>',
        '</div>'
].join(''));

var faqs_template = Handlebars.compile('<span class="suggestion-title">{{value}}</span>');

// Initialize typeahead

jQuery('.quicksearch-typeahead').typeahead({

  // Don't show a hint in the search bar
  hint: false,
  // Wait for at least 3 characters input before making suggestions
  minLength: 3,

  // Best Bets config
  sections: [
    {
      name: 'bestbets',
      source: bestbets,
      templates: {
        header: '<div class="cat-header"><span>Best Bets</span></div>',
        suggestion: bestbets_template,
        footer: '<hr>'
      }
    },

  // FAQs
    {
      name: 'faqs',
      source: faqs,
      templates: {
          header: '<div class="cat-header"><span>FAQs</span></div>',
          suggestion: faqs_template,
          footer: '<hr>'
      }
    },

  // Search Suggestions / Titles
    {
      name: 'titles',
      source: titles,
      templates: {
          header: '<div class="cat-header"><span>Search Suggestions</span></div>',
          footer: '<hr>'
      },
    },

  // Spaces
    {
      name: 'spaces',
      source: spaces,
      templates: {
        header: '<div class="cat-header"><span>Spaces</span></div>',
        suggestion: spaces_template,
        footer: '<div class="space-footer"><a href="http://www.lib.ncsu.edu/reservearoom">See more spaces...</a></div>',
      },
    },
  ]
});


typeaheadUtility.listenForTypeaheadClicks();
});

/*
 * Typeahead utility functions, currently handles: known vs. unknown item clicks, FAQ URL construction, logging.
 */

var typeaheadUtility = (function () {

  var environment = 'production'; //development or production

  function listenForTypeaheadClicks() {
      jQuery('.quicksearch-typeahead').on('typeahead:selected', function (e, datum, dataset) {

          var link = { href: handleTypeaheadClick(datum, dataset) };

          var eventValuesDefined = {
              category: 'typeahead-' + dataset,
              action: datum.value,
              label: window.location.href
          }

          sendEventData(eventValuesDefined, link);

          setTimeout(function() {
            document.location.href = link.href;
          }, 200);

      });
  }

  function sendEventData (eventValues, link) {
      if (environment == 'development') {
          // console.log('click_tracking', [eventValues.category, eventValues.action, eventValues.label]);
          jQuery.when(logEventToDatabase(eventValues)).then(function () {
              if (link !== '') {
                  document.location.href = link.href;
              }
          });
      }
      else {
          jQuery.when(logEventToDatabase(eventValues)).then(function () {
              sendDataToGoogleAnalytics(eventValues, link)
          });
      }
  }

  function sendDataToGoogleAnalytics (eventValues, link) {
      _gaq.push(['_set','hitCallback',function() {
          if (link !== '') {
              document.location = link;
          }
      }]);
      _gaq.push(['_trackEvent', eventValues.category, eventValues.action, eventValues.label]);
  }


  function logEventToDatabase(eventValues) {
        var pathname = window.location.pathname;
        if (environment == 'production') {
          pathname = 'http://search.lib.ncsu.edu/';
        }
        var url = pathname;
        if (url.substr(-1) != '/'){
            url += '/';
        }
        url += 'log_event';

        return jQuery.ajax({
            url: url,
            data: {
                category: eventValues.category,
                event_action: eventValues.action,
                label: eventValues.label
            },
            jsonp: 'callback',
            dataType: 'jsonp'
        });
  }

  function handleTypeaheadClick(datum, dataset) {
    if (datum.url) {
      if (datum.url.charAt(0) == "/") {
        return "http://www.lib.ncsu.edu" + datum.url;
      }
      else {
        return datum.url;
      }
    }
    else if (dataset == "faqs") {
      return "http://www.lib.ncsu.edu/faq/faq.php?id=" + datum.id;
    }
    else {
       // Fire off a search when an unknown element is selected

      var pathname = window.location.pathname;
      if (environment == 'production')
          var pathname = 'http://search.lib.ncsu.edu/';
          return  pathname + '?q=' + datum.value;
    }
  }

  return {
    listenForTypeaheadClicks: listenForTypeaheadClicks
  };
})();
