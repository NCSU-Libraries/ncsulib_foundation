jQuery(document).ready(function($){

  tech.init();

});

// Load Availability Data
var tech = {

    laptopAry : ['2081286', '2729663'],
    tabletAry : ['2260031','3347659','2736849'],

    init : function(){
        tech.loadTechJSON();
        // tech.loadSpaceJson();
    },

    loadTechJSON : function(){
        // Fetching tech lending data
        jQuery.getJSON('//'+tech.getDomain()+'.lib.ncsu.edu/sites/all/modules/custom/sirsi_data/master.json', function(data) {
            tech.data = data;
            tech.loadLaptops();
            tech.loadTablets();
        }, 'json');
    },

    loadLaptops : function(){
        hill = 0; hunt = 0;
        for(i=0;i<tech.laptopAry.length;i++){
            hill += tech.data[tech.laptopAry[i]]['DHHILL']['LAPTOP-PAT']['AVAILABLE'];
            hunt += tech.data[tech.laptopAry[i]]['HUNT']['LAPTOP-PAT']['AVAILABLE'];
        }
        jQuery('#hill-laptops').text(hill);
        jQuery('#hunt-laptops').text(hunt);
    },

    loadTablets : function(){
        hill = 0; hunt = 0;
        for(i=0;i<tech.tabletAry.length;i++){
            // console.log(tech.data[tech.tabletAry[i]]);
            hill += tech.data[tech.tabletAry[i]]['DHHILL']['EQUIP-1WK']['AVAILABLE'];

            if(typeof tech.data[tech.tabletAry[i]]['DHHILL']['EQUIP-4HR'] !== 'undefined'){
                hill += tech.data[tech.tabletAry[i]]['DHHILL']['EQUIP-4HR']['AVAILABLE'];
            }

            hunt += tech.data[tech.tabletAry[i]]['HUNT']['EQUIP-1WK']['AVAILABLE'];

            if(typeof tech.data[tech.tabletAry[i]]['HUNT']['EQUIP-4HR'] !== 'undefined'){
                hunt += tech.data[tech.tabletAry[i]]['HUNT']['EQUIP-4HR']['AVAILABLE'];
            }
        }
        jQuery('#hill-tablets').text(hill);
        jQuery('#hunt-tablets').text(hunt);
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
    },

    getDomain : function(){
        var full = window.location.host;

        var parts = full.split('.');
        var sub = parts[0];
        var domain = parts[1];

        return sub;
    }

};
