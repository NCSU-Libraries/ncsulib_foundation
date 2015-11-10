var news = {
    num : 0,
    init : function(){

        // imported news captions
        news.cap = $('.caption').data('caption');
        $('.caption').append('<small>'+news.cap+'</small>');

        $('#main-content #post-content p.left-image,#main-content #post-content p.center-image,#main-content #post-content p.right-image').each(function(){

            // add classes
            var caption = $(this).find('img').attr('alt');
            if(caption != ''){
                // get float direction
                var classes = $(this).attr('class');
                var alignmentClass = $(this).attr('class');
                $(this).find('img').wrap('<div class="caption-wrap"></div>');
                $(this).find('.caption-wrap').append('<span class="caption-text"><small>'+caption+'</small></span>').addClass('div-'+alignmentClass);
            }
        })

        news.activateSocial();
        news.activateArchive();
        news.setArchiveSelect();
    },

    setArchiveSelect : function(){
        $('#archive-select').val(news.getURLsegment(3));
    },

    activateArchive : function(){
        $('#archive-select').change(function(e){
            val = $(this).val();
            window.location.href= '/1news/archive/'+val;
        })
    },

    activateSocial : function(){
       $('#fb-share-button').click(function(e){
            var url = $(this).data('url');
            var title = document.title;
            window.open('http://www.facebook.com/sharer/sharer.php?u='+url+'&title='+title, '', 'width=600,height=450');

            e.preventDefault();
        })

        $('#tw-share-button').click(function(e){
            var url = $(this).data('url');
            var title = document.title;
            var str = 'https://twitter.com/intent/tweet?status='+title+' '+url;
            var status = str.replace(/–|\|/g,',');
            window.open(status, '', 'width=600,height=450');

            e.preventDefault();
        })

        $('#gplus-share-button').click(function(e){
            var url = $(this).data('url');
            var title = document.title;
            var str = 'https://plus.google.com/share?url='+url;
            var status = str.replace(/–|\|/g,',')
            window.open(status, '', 'width=600,height=450');

            e.preventDefault();
        })

        $('#email-button').click(function(e){
            var url = $(this).data('url');
            var title = document.title;
            var str = 'mailto:?subject='+title+'&body='+url;
            var status = str.replace(/–|\|/g,',')
            window.location.href = status;

            e.preventDefault();
        })
    },

    getURLsegment : function(num){
        var pathArray = window.location.pathname.split( '/' );

        return pathArray[num];
    }
}

$(function($) {
    news.init();
});



var events = {
    init : function(){


    }
}


jQuery(function(){
    events.init();
})
