jQuery(document).ready(function($){

  tech.init();

});

// Load Availability Data
var tech = {

  init : function(){
    tech.loadTechJSON();
    tech.loadSpaceJson();
  },

  loadTechJSON : function(){
    // Fetching tech lending data
    jQuery.getJSON('/sites/all/modules/custom/sirsi_data/master.json', function(data) {
      // laptops
      macs = data['2081286']
      huntmacs = macs['HUNT']['LAPTOP-PAT']['TECHLEND'];
      hillmacs = macs['DHHILL']['LAPTOP-PAT']['TECHLEND'];
      pcs = data['2729663'];
      huntpcs = pcs['HUNT']['LAPTOP-PAT']['TECHLEND'];
      hillpcs = pcs['DHHILL']['LAPTOP-PAT']['TECHLEND'];
      chromebooks = data['3310348'];
      huntCbook = 0;hillCbook = 0;
      if(chromebooks['HUNT']['EQUIP-1WK']['TECHLEND']){huntCbook += chromebooks['HUNT']['EQUIP-1WK']['TECHLEND'];}
      if(chromebooks['HUNT']['EQUIP-4HR']['TECHLEND']){huntCbook += chromebooks['HUNT']['EQUIP-4HR']['TECHLEND'];}
      if(chromebooks['DHHILL']['EQUIP-1WK']['TECHLEND']){hillCbook += chromebooks['DHHILL']['EQUIP-1WK']['TECHLEND'];}
      if(chromebooks['DHHILL']['EQUIP-4HR']['TECHLEND']){hillCbook += chromebooks['DHHILL']['EQUIP-4HR']['TECHLEND'];}


      // tablets
      ipads = data['2260031'];
      huntIpad=0;hillIpad=0;
      if(ipads['HUNT']['EQUIP-1WK']['TECHLEND']){huntIpad += ipads['HUNT']['EQUIP-1WK']['TECHLEND'];}
      if(ipads['HUNT']['EQUIP-4HR']['TECHLEND']){huntIpad += ipads['HUNT']['EQUIP-4HR']['TECHLEND'];}
      if(ipads['DHHILL']['EQUIP-1WK']['TECHLEND']){hillIpad += ipads['DHHILL']['EQUIP-1WK']['TECHLEND'];}
      if(ipads['DHHILL']['EQUIP-4HR']['TECHLEND']){hillIpad += ipads['DHHILL']['EQUIP-4HR']['TECHLEND'];}
      nexus = data['3347659'];
      huntNexus=0;hillNexus=0;
      if(nexus['HUNT']['EQUIP-1WK']['TECHLEND']){huntNexus += nexus['HUNT']['EQUIP-1WK']['TECHLEND'];}
      if(nexus['DHHILL']['EQUIP-1WK']['TECHLEND']){hillNexus += nexus['DHHILL']['EQUIP-1WK']['TECHLEND'];}
      surface = data['2736849'];
      huntSurface=0;hillSurface=0;
      if(surface['HUNT']['EQUIP-1WK']['TECHLEND']){huntSurface += surface['HUNT']['EQUIP-1WK']['TECHLEND'];}
      if(surface['HUNT']['EQUIP-4HR']['TECHLEND']){huntSurface += surface['HUNT']['EQUIP-4HR']['TECHLEND'];}
      if(surface['DHHILL']['EQUIP-1WK']['TECHLEND']){hillSurface += surface['DHHILL']['EQUIP-1WK']['TECHLEND'];}
      // if(surface['DHHILL']['EQUIP-4HR']['TECHLEND']){hillSurface += surface['DHHILL']['EQUIP-4HR']['TECHLEND'];}

      jQuery('#hill-laptops').html(hillmacs+hillpcs+hillCbook);
      jQuery('#hunt-laptops').html(huntmacs+huntpcs+huntCbook);

      jQuery('#hill-tablets').html(hillIpad+hillNexus+hillSurface);
      jQuery('#hunt-tablets').html(huntIpad+huntNexus+huntSurface);

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

  writeHillSpaces : function(spaceData){
    var available = spaceData['hill']['available'];
    jQuery('#hill-study').html(available);
  },

  writeHuntSpaces : function(spaceData){
    var available = spaceData['hunt']['available'];
    jQuery('#hunt-study').html(available);
  }

};
