jQuery(document).ready(function($){

 	$(document).foundation({
    orbit: {
  		animation: 'fade',
  		slide_number: false,
    }
	});

	tech.init();

})


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
    var hillLapAvailable = hill['lap']['available']['all'];
    var hillTabAvailable = hill['tab']['available']['all'];

    // write
    jQuery('#hill-laptops').html(hillLapAvailable);
    jQuery('#hill-tablets').html(hillTabAvailable);
  },

  writeHuntTech : function(techData){
    var hunt = techData['hunt'];
    var huntLapAvailable = hunt['lap']['available']['all'];
    var huntTabAvailable = hunt['tab']['available']['all'];

    // write
    jQuery('#hunt-laptops').html(huntLapAvailable);
    jQuery('#hunt-tablets').html(huntTabAvailable);
  },

  writeHillSpaces : function(spaceData){
    var available = spaceData['hill']['available'];
    jQuery('#hill-study').html(available);
  },

  writeHuntSpaces : function(spaceData){
    var available = spaceData['hunt']['available'];
    jQuery('#hunt-study').html(available);
  }

};
