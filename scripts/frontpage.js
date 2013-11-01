jQuery(document).ready(function($) {
  tech.init();

  $('#tech-tabs li a').click(function(e){
    var elem = $(this).attr('href');
    // make tabs active
    $('#tech-tabs li').removeClass('active');
    $(this).parent().addClass('active');

    // make tab content active
    $('.tech-tab').removeClass('active');
    $(elem).addClass('active');
    e.preventDefault();
  })


  $('.tech-avail').tabs();
  $("#searchtabs").tabs();
  $("#artbox > div").css("display", "block");
  $("#artbox").cycle({
    random: 1,
    fx: "fade",
    next: "#artboxNext",
    prev: "#artboxPrev",
    delay: 2500,
    timeout: 5E3,
    speedIn: 500,
    speedOut: 500,
    pagerClick: function(zeroBasedSlideIndex, slideElement) {
      var slideIndex =
        zeroBasedSlideIndex + 1;
      $.get("/artbox-scripts/artboxnavlog.php?n=" + slideIndex);
    }
  });
  $("#artboxPause").click(function() {
    $("#artbox").cycle("toggle");
    if ($(this).attr("src") == "/artbox/includes/artbox-pause.png") {
      $(this).attr("src", "/artbox/includes/artbox-resume.png");
      $(this).attr("alt", "Resume");
      $(this).attr("title", "Resume");
    } else if ($(this).attr("src") == "/artbox/includes/artbox-resume.png") {
      $(this).attr("src", "/artbox/includes/artbox-pause.png");
      $(this).attr("alt",
        "Pause");
      $(this).attr("title", "Pause");
    }
  });
  $("#article-submit").click(function() {
    var q = $.trim($("#searcharticle").val());
    var doitest = /^(?:doi:?\s*)?(10(?:\.\d+){1,2}\/\S+)$/i;
    var doi = q.match(doitest);
    if (doi[1]) {
      $(".article-input").attr("disabled", "disabled");
      $(".doi-input").removeAttr("disabled");
      $("#search-articles-summon").attr("action", "http://js8lb8ft5y.search.serialssolutions.com/criteriarefiner/");
      $("#searcharticle").attr("name", "SS_doi");
      $("#searcharticle").attr("value",
        doi[1]);
    }
    $("#search-articles-summon").submit();
  });
  $("#Ntk").change(function() {
    if ($("#Ntk option:selected").hasClass("callnum")) {
      $("#worldcat").attr("disabled", "disabled");
      $("#trln").attr("disabled", "disabled");
    } else {
      $("#worldcat").attr("disabled", "");
      $("#trln").attr("disabled", "");
    }
  });
  $("#trln").click(function() {
    $("#Ntk option.callnum").remove();
    $("#Ntk").sb("refresh");
    $("#searchbooksform").attr("action", "http://search.trln.org/search");
  });
  $("#ncsu").click(function() {
    $("#searchbooksform").attr("action",
      "http://www2.lib.ncsu.edu/catalog/");
    $("#Ntk").append('<option class="callnum" value="LC">Call Number</option><option class="callnum" value="SUDOC">Gov Doc Number</option>');
    $("#Ntk").sb("refresh");
  });
  $("#worldcat").click(function() {
    $("#Ntk option.callnum").remove();
    $("#Ntk").sb("refresh");
    $("#searchbooksform").attr("action", "http://ncsu.worldcat.org/");
  });
  var checked = $("input[name=\'scope\']:checked").attr("id");
  if (checked == "trln") $("#searchbooksform").attr("action",
    "http://search.trln.org/search");
  if (checked == "worldcat") $("#searchbooksform").attr("action", "http://ncsu.worldcat.org/");
  $("#searchbooksform").submit(function() {
    if ($("#Ntk option:selected").hasClass("callnum")) {
      var callnumURL = "http://www2.lib.ncsu.edu/catalog/browse?";
      var callNumber = $("#Ntt").val();
      var classType = $("#Ntk option:selected").val();
      callnumURL += "callNumber=" + callNumber + "&classType=" + classType;
      window.location = callnumURL;
      return false;
    }
    checked = $("input[name=\'scope\']:checked").attr("id");
    if (checked == "worldcat") {
      var worldcatURL = $("#searchbooksform").attr("action");
      var searchType = $("#Ntk option:selected").val();
      var searchString = $("#Ntt").val();
      if (searchString !== "") {
        var searchParams = [];
        searchParams.qt = "wc_org_ncsu";
        searchParams.se = "nodgr";
        searchParams.sd = "desc";
        searchParams.scope = "0";
        var searchModifier = "";
        if (searchType == "Title") searchModifier = "ti:";
        if (searchType == "Journal_Title") {
          searchParams.fq = "dt:ser>";
          searchModifier = "ti:";
        }
        if (searchType == "Author") searchModifier = "au:";
        if (searchType == "Subject") searchModifier = "su:";
        if (searchType == "ISBN") searchString = searchString.replace(/-/g, "");
        searchParams.q = searchModifier + searchString;
        var i = 0;
        for (var current in searchParams) {
          if (i === 0) worldcatURL += "search?";
          else worldcatURL += "&";
          worldcatURL += current;
          worldcatURL += "=";
          worldcatURL += escape(searchParams[current].replace(/ /g, "+"));
          i++;
        }
      }
      window.location = worldcatURL;
      return false;
    } else return true;
  });
  $("#Ntt").autosuggest({
    source: "ncsu",
    indexInput: "#Ntk",
    queryForm: "#searchbooksform",
    querySubmit: "#searchbookssubmit",
    hiddenOnDefaultIndex: "",
    autocompleteOptions: {
      width: 300
    }
  });
  $("#Ntk").sb({
    maxHeight: 200
  });
  checkedbackbutton = $("input[name=\'scope\']:checked").attr("id");
  if (checkedbackbutton == "worldcat" || checkedbackbutton == "trln") {
    $("#Ntk option.callnum").remove();
    $("#Ntk").sb("refresh");
  }
  $("#searcheverything").submit(function() {
    var selectedtab = $(".ui-tabs-selected").text();
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
    var selectedtab = $(".ui-tabs-selected").text();
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
  $("#searchbooksform").submit(function() {
    var selectedtab = $(".ui-tabs-selected").text();
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
    var selectedtab = $(".ui-tabs-selected").text();
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
  $("#searcharticleadvanced").sb();
  var searcharticleadvanced = $("#searcharticleadvanced option:selected").val();
  if (searcharticleadvanced == "anywhere") $("#searcharticle").attr("name",
    "s.q");
  if (searcharticleadvanced == "title") $("#searcharticle").attr("name", "t.TitleCombined");
  if (searcharticleadvanced == "author") $("#searcharticle").attr("name", "t.AuthorCombined");
  $("#searcharticleadvanced").change(function() {
    var searcharticleadvanced = $("#searcharticleadvanced option:selected").val();
    if (searcharticleadvanced == "anywhere") $("#searcharticle").attr("name", "s.q");
    if (searcharticleadvanced == "title") $("#searcharticle").attr("name", "t.TitleCombined");
    if (searcharticleadvanced ==
      "author") $("#searcharticle").attr("name", "t.AuthorCombined");
  });
  // Fetching tech lending data
  // $.get('/sites/default/files/techlending/devices_data/aggregate.json', function(data) {
  //   writeNumbers(data, ['lap', 'tab']);
  // }, 'json');

  // For writing the contents of the tech lending tabs
  // function writeNumbers(techData, devicesToCheckFor) {
  //   for (var branch in techData){
  //     if (branch === 'hunt' || branch === 'dhhill'){

  //       for (var i = 0; i < devicesToCheckFor.length; i++) {
  //         var typeDiv       = document.createElement('div');
  //         var rowDiv        = document.createElement('div');
  //         var identitySpan  = document.createElement('span');
  //         var numbersSpan   = document.createElement('span');
  //         var deviceName    = '';

  //         switch(devicesToCheckFor[i]) {
  //           case 'lap':
  //             deviceName = 'Laptops';
  //             break;
  //           case 'tab':
  //             deviceName = 'Tablets';
  //             break;
  //         }

  //         $('#' + branch).append(typeDiv);
  //         $(typeDiv)
  //           .addClass(deviceName.toLowerCase())
  //           .append(rowDiv);
  //         $(rowDiv)
  //           .addClass('t-row')
  //           .append(identitySpan)
  //           .append(numbersSpan);
  //         $(identitySpan)
  //           .addClass('cell-one')
  //           .append(deviceName);
  //         $(numbersSpan)
  //           .addClass('t-nums')
  //           .append(techData[branch][devicesToCheckFor[i]].available.all + ' of ')
  //           .append(techData[branch][devicesToCheckFor[i]].total);

  //       }
  //     }
  //   }
  // }
});

// Load Availability Data
var tech = {

  init : function(){
    tech.loadTechJSON();
    tech.loadSpaceJson();
  },

  loadTechJSON : function(){
    // Fetching tech lending data
    jQuery.getJSON('/sites/default/files/techlending/devices_data/aggregate.json', function(data) {
      tech.writeHillTech(data);
      tech.writeHuntTech(data);
    }, 'json');
  },

  loadSpaceJson : function(){
    // Fetching hill spaces data
    jQuery.getJSON('/website/sra/hill.json', function(data) {
      tech.writeHillSpaces(data);
    }, 'json');

    // Fetching hunt spaces data
    jQuery.getJSON('/website/sra/hunt.json', function(data) {
      tech.writeHuntSpaces(data);
    }, 'json');
  },

  writeHillTech : function(techData){
    var hill = techData['dhhill'];
    // var hillLapTotal = hill['lap']['total'];
    var hillLapAvailable = hill['lap']['available']['all'];
    // var hillTabTotal = hill['tab']['total'];
    var hillTabAvailable = hill['tab']['available']['all'];

    // write
    jQuery('#dhhill .laptops span.available').html(hillLapAvailable);
    // jQuery('#dhhill .laptops span.total').html(hillLapTotal);
    jQuery('#dhhill .tablets span.available').html(hillTabAvailable);
    // jQuery('#dhhill .tablets span.total').html(hillTabTotal);
  },

  writeHuntTech : function(techData){
    var hunt = techData['hunt'];
    // var huntLapTotal = hunt['lap']['total'];
    var huntLapAvailable = hunt['lap']['available']['all'];
    // var huntTabTotal = hunt['tab']['total'];
    var huntTabAvailable = hunt['tab']['available']['all'];

    // write
    jQuery('#hunt .laptops span.available').html(huntLapAvailable);
    // jQuery('#hunt .laptops span.total').html(huntLapTotal);
    jQuery('#hunt .tablets span.available').html(huntTabAvailable);
    // jQuery('#hunt .tablets span.total').html(huntTabTotal);
  },

  writeHillSpaces : function(spaceData){
    var available = spaceData['hill']['available'];
    // var total = spaceData['hill']['total'];

    jQuery('#dhhill .study-rooms span.available').html(available);
    // jQuery('#dhhill .study-rooms span.total').html(total);
  },

  writeHuntSpaces : function(spaceData){
    var available = spaceData['hunt']['available'];
    // var total = spaceData['hunt']['total'];

    jQuery('#hunt .study-rooms span.available').html(available);
    // jQuery('#hunt .study-rooms span.total').html(total);
  }

}

