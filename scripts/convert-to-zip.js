var zip = {
    init : function(){
        $('.dir-to-zip').click(function(e){
            zip.dir = $(this).attr('href');
            e.preventDefault();

            zip.convertToZip();
        })
    },

    convertToZip : function(){
        $.get('/sites/default/files/files/videowalls/convert.php?dir='+zip.dir, function(data) {
            // save file to zip
            eval(data);

            // download file
            window.location.href = '/sites/default/files/files/videowalls/'+zip.dir+'.zip';
        });
    }
}

jQuery(document).ready(function($){
    zip.init();
});