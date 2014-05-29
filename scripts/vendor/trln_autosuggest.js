/**
 * TRLN Autosuggest
 *
 * jquery autosuggest plugin.  Instantiates a jquery autocomplete object for the selected elements, and
 * generates hooks to add suggestion level functionality to a search interface.
 *
 * requires: jquery.autocomplete-endeca.js
 * 		jquery 1.3 or higher
 * author Ben Pennell
 */
;(function($) {
$.fn.extend({
	autosuggest: function(options){
		return this.each(function() {
			new $.Autosuggest(this, options);
		});
	}
});

$.Autosuggest = function(input, options){

	var searchId = $(input).attr('id');
	var currentIndex = "";

	//Default options for the autosuggest plugin
	defaults = {
			searchId: '',
			searchInput: '',
			indexInput: '#Ntt',
			index: null,
			sourceInput: '#source',
			source: null,
			suggestionFlagParameter: 'sugg',
			suggestionFlagInput: '#sugg',
			suggestionFlagCookie: null,
			querySubmit: '#querySubmit',
			queryForm: '#queryBox',
			suggestUrl: "http://autosuggest.trln.org/suggestservice/",
			clearIndexOnFirstFocus: true,
			clearIndexOnFirstChange: false,
			defaultIndex: "Keyword",
			hiddenOnDefaultIndex: "title",
			submitOnSelect: true
	};

	//Set identifier for the
	options.searchInput = "#" + searchId;
	options.searchId = searchId;

	//Set the suggestion flag parameter name to the name of the field identified by suggestionFlagInput if no parameter name was set.
	if ('suggestionFlagInput' in options && !('suggestionFlagParameter' in options)){
		if ($(options.suggestionFlagInput).length){
			options.suggestionFlagParameter = $(options.suggestionFlagInput).attr("name");
		}
	}

	//Override default autosuggest options with user specified options.
	options = $.extend({}, defaults, options);

	//Default options for the autocomplete plugin.
	acdefaults = {
			dataType: 'jsonp',
			parse: parseResults,
			extraParams: { "index": getOptionValue("index"), "source": getOptionValue("source")},
			formatItem: formatSuggestion,
			cacheLength: 20,
			highlight: highlightTerms,
			matchSubset: false,
			max: 15,
			minChars: 3,
			selectFirst: false,
			delay: 50,
			scrollHeight: 185
	};

	//Override default autocomplete options with user specified options if any are present.
	var autocompleteOptions = null;
	if ("autocompleteOptions" in options)
		autocompleteOptions = options.autocompleteOptions;
	autocompleteOptions = $.extend({}, acdefaults, autocompleteOptions);

	var suggestionFlagCookieValue = null;
	if (options.suggestionFlagCookie != null){
		suggestionFlagCookieValue = readCookie(options.suggestionFlagCookie);
	}

	var suggValue = getSuggestionFlagValue();
	if (options.suggestionFlagCookie != null && suggValue != null){
		var date = new Date();
		date.setTime(date.getTime()+(30*60*1000));
		document.cookie = options.suggestionFlagCookie + "=" + suggValue + "; expires=" + date.toGMTString() +"; path=/";
		$(options.queryForm).bind("submit", function(){
			document.cookie = options.suggestionFlagCookie + "=" + suggValue + "; expires=Thu, 01-Jan-1970 00:00:01 GMT; path=/";
		});
	}

	//Instantiate the autocomplete object for this search box
	$input = $(input).autocomplete(options.suggestUrl, autocompleteOptions);

	//If clearIndexOnFirstFocus is on, then set first first to true.
	var clearOnFocus = options.clearIndexOnFirstFocus;
	var clearOnChange = options.clearIndexOnFirstChange;

	//When the suggestion box gains focus, clear the selected index if it was automatically selected by a previous suggestion search.
	$input.focus(function(event){
		if (clearOnFocus){
			clearOnFocus = false;
			clearPreselectedIndex();
		}
	}).bind('changesuper', function (event){
		if (clearOnChange){
			clearOnChange = false;
			clearPreselectedIndex();
		}
	}).bind('keyup', function() {
		//Hide suggestion list when user clears out input field
		if ($input.val() == ""){
			$input.hideSuggestions();
		}
	}).result(function (event, data, formatted) {
		{
			//Submit when user selects a suggestion.
			var index = formatted;
			index = index.substring(0,1).toUpperCase() + index.substring(1);
			if (currentIndex == options.defaultIndex && index.toLowerCase() != options.hiddenOnDefaultIndex.toLowerCase()){
				setFieldValue(options.indexInput, index);
			}
			//Set suggestion flag to indicate that a suggestion was submitted
			$(options.suggestionFlagInput).val($(options.suggestionFlagInput).val()+"s");
			if (options.submitOnSelect){
				try {
					$(options.querySubmit).attr('form').onsubmit();
				} catch (err){
					$(options.queryForm).submit();
				}
			}
		}
	});

	//Change the selected index being submitted to suggestion service when user alters dropdown.
	$(options.indexInput).each(function(){
		$(this).change(function(event){
			sugg = $(options.suggestionFlagInput).val();
			currentIndex = getOptionValue("index");
			if (currentIndex != options.defaultIndex){
				if (sugg != "i")
					$(options.suggestionFlagInput).val("i");
			} else if (sugg == "i"){
				$(options.suggestionFlagInput).val("");
			}
			resetAdditionalParams();
		});
	});

	//If the source field changes, reload the parameters submitted to the service.
	$(options.sourceInput).each(function(){
		$(this).change(resetAdditionalParams);
	});

	function getSuggestionFlagValue(){
		var regexS = "[\\?&]" + options.suggestionFlagParameter + "=([^&#]*)";
		var regex = new RegExp(regexS);
		var sugg = regex.exec(window.location.href);
		if (sugg != null && sugg.length >= 2){
			return sugg[1];
		}
		return null;
	}

	function clearPreselectedIndex(){
		var suggValue = getSuggestionFlagValue();
		if (suggValue == null && options.suggestionFlagCookie != null && suggestionFlagCookieValue != null)
			suggValue = suggestionFlagCookieValue;
		if (suggValue != null && suggValue.indexOf("s") >= 0 && suggValue.indexOf("i") < 0){
			$(options.indexInput).val(options.defaultIndex);
			resetAdditionalParams();
		}
		currentIndex = options.defaultIndex;
	}

	function getOptionValue(key){
		if (options[key] != null)
			return options[key];
		return getFieldValue(options[key+"Input"]);
	}

	//Retrieves current value of element at the given selector.  If it is a radio button, the currently checked value is returned.
	function getFieldValue(selector){
		if (selector.indexOf(":radio") != -1){
			selector += ":checked";
		}
		return $(selector).val();
	}

	function setFieldValue(selector, value){
		if (selector.indexOf(":radio") != -1){
			$(selector).each(function(){
				if ($(this).val() == value)
					$(this).attr('checked', true);
				else $(this).attr('checked', false);
			});
		} else {
			$(selector).val(value)
		}
	}

	//Process the resulting JSON suggestions to retrieve all fields
	function parseResults(data) {
		var rows = new Array();
		data = data.response.docs;
		for(var i=0; i<data.length; i++){
			rows[i] = { data:data[i], value:data[i].type, result:data[i].ac };
		}
		return rows;
	}

	//Reloads the additional parameters submitted to the service from their respective fields.
	function resetAdditionalParams(){
		$input.setOptions({
			extraParams: { "index": getOptionValue("index"), "source": getOptionValue("source")}
		}).flushCache();
	}

	//Generate individual rows of suggestion list.
	function formatSuggestion(row, i, n){
		if (row.type.toLowerCase() == options.hiddenOnDefaultIndex.toLowerCase() && (currentIndex == options.defaultIndex || currentIndex == ""))
			return "<span><span class=\"as_sleft\">" + row.ac + "</span><small></small></span>";
		return "<span><span class=\"as_sleft\">" + row.ac + "</span><small>" + row.type + "</small></span>";
	}

	//Highlight non-linear search terms.
	function highlightTerms(value, term) {
		// Escape any regexy type characters so they don't bugger up the other reg ex
		term = term.replace(/([\^\$\(\)\[\]\{\}\*\.\+\?\|\\])/gi, "\\$1");
		// Join the terms with a pipe as an 'OR'
		term = term.split(' ').join('|').replace(/\,/, "");
		return value.replace(new RegExp("(?![^&;]+;)(?!<[^<>]*)(" + term + ")(?![^<>]*>)(?![^&;]+;)", "gi"), "<strong>$1</strong>");
	}

	function readCookie(name) {
		var name = name + "=";
		var ca = document.cookie.split(';');
		for(var i=0;i < ca.length; i++) {
			var c = ca[i];
			while (c.charAt(0)==' ')
				c = c.substring(1,c.length);
			if (c.indexOf(name) == 0)
				return c.substring(name.length,c.length);
		}
		return null;
	}

}
})(jQuery);
