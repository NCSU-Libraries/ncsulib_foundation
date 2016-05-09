// Load SIRSI data created in the Sirsi Data module to /devices pages
// EO 11.30.15

var device = {
    dObj : {mac: 2081286, pc: 2729663},

    init : function(){
        device.getDomain();

        $.getJSON( '//'+device.sub+'.lib.ncsu.edu/sites/all/modules/custom/sirsi_data/master.json', function( data ) {

            dAry = {Mac: data[2081286], Windows: data[2729663]};

            str = '<section class="block">';
            str += '<h2>Computers Available</h2>';
            if(device.uris[1] == 'vetmed'){
                str += '<div class="row">';
                str += '<div class="columns medium-9"><p>Desktops</p></div>';
                str += '<div class="columns medium-3"><span id="desktops" class="label"> '+device.getDesktops()+' </span></div>';
                str += '</div>';
            }
            str += '<div class="row">';
            $.each( dAry, function( key, val ) {
                lib = val[device.uris[1].toUpperCase()];
                available = lib['LAPTOP-PAT']['AVAILABLE'];
                total = lib['LAPTOP-PAT']['TOTAL'];
                str += '<div class="columns medium-9"><p>'+key+' laptops</p></div>';
                str += '<div class="columns medium-3"><span class="label"> '+available+' of '+total+' </span></div>';
            });
            str += '</div>';
            str += '</section>';

            $('aside.l-sidebar-second').prepend(str);

        });

    },

    getDesktops : function(){
        $.get( "/compavailability/homepage.php?region=vml", function( data ) {
            $('#desktops').html(data);
        });
        return '&nbsp;';
    },

    getDomain : function(){
        var full = window.location.host;
        //window.location.host is subdomain.domain.com
        var parts = full.split('.');
        device.sub = parts[0];
        device.domain = parts[1];

        // window.location.pathname is everything after .com/
        uris = window.location.pathname;
        device.uris = uris.split('/');
    }
}

$(function($) {
    // device.init();
});
