var events = {
    init : function(){

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
            var status = str.replace(/–|\|/g,',')
            window.open(status, '', 'width=600,height=450');

            e.preventDefault();
        })
    }
}


jQuery(function(){
    events.init();
})


