var software = {
    uaList : [],
    deviceList : [],
    itemId : '',
    init : function(){

        $('.view-id-software .tag').click(function(e){
            elem = $(this);
            var index = $(elem).index();

            if($(elem).hasClass('active')){
                software.clearAllButtons();
                software.showAllItems();
                software.uaList[index] = '';
                software.itemId = '';
            } else{
                software.clearAllButtons();
                $(elem).addClass('active');
                software.uaList[index] = $(elem).data('id');
                software.itemId = $(elem).data('id');
                software.handleSingleItem();
            }

            e.preventDefault();
        })

        // $('.view-display-id-block_5 .tag').click(function(e){
        //     elem = $(this);
        //     var index = $(elem).index();

        //     if($(elem).hasClass('active')){
        //         software.clearAllButtons();
        //         software.showAllItems();
        //         software.deviceList[index] = '';
        //         software.itemId = '';
        //     } else{
        //         software.clearAllButtons();
        //         $(elem).addClass('active');
        //         software.deviceList[index] = $(elem).data('id');
        //         software.itemId = $(elem).data('id');
        //         software.handleSingleItem();
        //     }

        //     e.preventDefault();
        // })
    },

    handleSingleItem: function(){
        ul = $('.software-items li');
        $(ul).hide();
        $('.software-items li a.'+software.itemId).parent().show();
        size = $('.software-items li:visible').size();

        if(size < 30 && size > 9){ //medium
            $(ul).parent().removeClass('long');
            $(ul).parent().removeClass('small');
            $(ul).parent().addClass('medium');
        } else if(size <= 9){ //small
            $(ul).parent().removeClass('long');
            $(ul).parent().removeClass('medium');
            $(ul).parent().addClass('small');
        } else{ //long
            $(ul).parent().removeClass('medium');
            $(ul).parent().removeClass('small');
            $(ul).parent().addClass('long');
        }
    },

    handleMultItems: function(){
        str = '';

        for(i=0;i<software.uaList.length;i++){
            if(software.uaList[i] != undefined && software.uaList[i] != ''){
                str += '.'+software.uaList[i];
            }
        }
        for(i=0;i<software.deviceList.length;i++){
            if(software.deviceList[i] != undefined && software.deviceList[i] != ''){
                str += '.'+software.deviceList[i];
            }
        }

        $('.software-items li').hide();
        $('.software-items li a'+str).parent().show();
    },

    clearAllButtons : function(){
        $('.view-display-id-block_4 .tag').removeClass('active');
        $('.view-display-id-block_5 .tag').removeClass('active');
    },

    showAllItems : function(){
        $('ul.software-items li').show();
        $('ul.software-items').removeClass('small');
        $('ul.software-items').removeClass('medium');
        $('ul.software-items').addClass('long');
    }

};


jQuery(document).ready(function($){
    software.init();
});
