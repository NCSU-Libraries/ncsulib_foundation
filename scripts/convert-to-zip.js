var zip = {
    init : function(){
        $('.dir-to-zip').click(function(e){
            var dir = $(this).attr('href');
            e.preventDefault();

            $.get('/sites/default/files/files/videowalls/convert.php?dir='+dir, function(data) {
                // save file to zip
                eval(data);

                // download file
                window.location.href = '/sites/default/files/files/videowalls/'+dir+'.zip';
            });


        })
    }
}

jQuery(document).ready(function($){
    zip.init();
});