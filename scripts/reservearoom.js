var app = {
    building_ary : [],
    patron_ary : [],
    master_ary : [[],[]],
    b_val:'',
    p_val:'',
    previousURL:'',

    init : function(){

        // building
        $('.views-widget-filter-field_building_name_value .bef-checkboxes .form-item').each(function(){

            // if elem is selected
            var elem = $(this).find('input');
            if($(elem).attr('checked')){
                app.building_ary.push($(elem).val());
                app.b_name = $(elem).attr('name');
                app.building_ary = jQuery.unique(app.building_ary);
                app.master_ary[0] = app.building_ary;
            }

        })

        // patron
        $('.views-widget-filter-field_special_access_value .bef-checkboxes .form-item').each(function(){

            // if elem is selected
            var elem = $(this).find('input');
            if($(elem).attr('checked')){
                app.patron_ary.push($(elem).val());
                app.p_name = $(elem).attr('name');
                app.patron_ary = jQuery.unique(app.patron_ary);
                app.master_ary[1] = app.patron_ary;
            }

        })

        // set URL
        if(app.master_ary[0].length == 1){
            app.b_val = '?'+app.b_name+'='+app.master_ary[0][0];
        } else {
            app.b_val = '';
        }

        if(app.master_ary[1].length == 1){
            var del = (app.master_ary[0].length == 1) ? '&' : '?';
            app.p_val = del+app.p_name+'='+app.master_ary[1][0];
        } else{
            app.p_val = '';
        }
        // console.log(app.master_ary);

        // window.location.replace(app.previousURL);
        window.history.pushState('', '', '/reservearoom'+app.b_val+app.p_val);
        // app.previousURL = '/reservearoom'+app.b_val+app.p_val;

        app.b_val = '';
        app.p_val = '';
        app.building_ary = [];
        app.patron_ary = [];
        app.master_ary = [[],[]];

    },

    clearURL : function(){
        // window.history.pushState('', '', '/reservearoom');
    }
}

$(function(){
    // app.init();
    // setInterval('app.init()', 1000);
})