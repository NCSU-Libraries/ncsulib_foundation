// Load SIRSI data created in the Sirsi Data module to /devices pages
// EO 11.30.15

var device = {

    init : function(){
        $.getJSON( '//'+device.getDomain()+'.lib.ncsu.edu/sites/all/modules/custom/sirsi_data/master.json', function( data ) {

            oldkey = '';

            str = '<table>';
            str += '<thead>';
            str += '<tr>';
            str += '<th>Library</th>';
            str += '<th>Lending Period</th>';
            str += '<th>Available for Checkout</th>';
            str += '</tr>';
            str += '</thead>';
            str += '<tbody>';
            $.each( data[device.catkey], function( key, val ) {
                // loop by building
                if(key != 'TITLE'){
                    //loop through by lending period
                    $.each( val, function(lendKey, lendVal) {
                        if(key != '2729663' && lendKey != 'EQUIP-1WK' && device.getTitle(key) != undefined && device.getLendingPeriod(lendKey) != undefined){
                            str += '<tr class="building">';
                            // dont repeat building name twice
                            str += (key == oldkey) ? '<td></td>' : '<td>'+device.getTitle(key)+'</td>';

                            if(!lendVal.TECHLEND){lendVal.TECHLEND = 0;}
                            str += '<td>'+device.getLendingPeriod(lendKey)+'</td>';
                            str += '<td>'+lendVal.TECHLEND+' of '+lendVal.TOTAL+'</td>';
                            str += '</tr>';
                            oldkey = key;
                        }
                    });
                }
            });
            str += '</tbody></table>';

            $('article .content .left-part').prepend(str);

        });

    },

    getLendingPeriod : function(str){
        switch(str) {
            case 'EQU-4H-LOW':
                return '4 hours';
                break;
            case 'LAPTOP-PAT':
                return '4 hours';
                break;
            case 'EQU-1W-LOW':
                return '1 week';
                break;
            case 'EQUIP-2WK':
                return '2 weeks';
                break;
            case 'EQUIP-1WK':
                return '1 week';
                break;
            case 'EQUIP-4HR':
                return '4 hours';
                break;
            case 'KIT':
                return 'For use in space';
                break;
            // case 'BOOK':
            //     return '??';
            //     break;
            default:
                break;
        }
    },

    getTitle : function(str){
        switch(str) {
            case 'DHHILL':
                return 'D. H. Hill Library';
                break;
            case 'HUNT':
                return 'James B. Hunt Jr. Library';
                break;
            case 'NRL':
                return 'Natural Resources Library';
                break;
            case 'VETMED':
                return 'Veterniary Medicine Library';
                break;
            case 'DESIGN':
                return 'Harrye B. Lyons Design Library';
                break;
            default:
                break;
        }
    },

    getDomain : function(){
        var full = window.location.host;
        //window.location.host is subdomain.domain.com
        var parts = full.split('.');
        var sub = parts[0];
        var domain = parts[1];

        return sub;
    }
}

$(function($) {
    device.catkey = $('.content').data('catkey');
    if(device.catkey){
        device.init();
    }
});
