var lib = {
    init : function(){

        img = $('#featured-image img').attr('src');
        $('meta[property="og\\:image"]').attr('content','http://lib.ncsu.edu'+img);
        $('meta[property="og\\:image:url"]').attr('content','http://lib.ncsu.edu'+img);

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
    lib.init();
})
