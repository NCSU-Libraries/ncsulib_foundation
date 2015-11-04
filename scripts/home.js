var home = {
    init : function(){

        $('#searcharticle').blur(function(e){
            home.str = $(this).val();
            home.regex = /^(?:(?:doi:?\s*|(?:http:\/\/)?(?:dx\.)?(?:doi\.org)?\/))?(10(?:\.\d+){1,2}\/\S+)$/.test(home.str);
        })

        $('#search-articles-summon').submit(function(e){
            home.str = $('#searcharticle').val();
            home.regex = /^(?:(?:doi:?\s*|(?:http:\/\/)?(?:dx\.)?(?:doi\.org)?\/))?(10(?:\.\d+){1,2}\/\S+)$/.test(home.str);

            home.submitForm();

            e.preventDefault();
        })

        // ^(?:(?:doi:?\s*|(?:http:\/\/)?(?:dx\.)?(?:doi\.org)?\/))?(10(?:\.\d+){1,2}\/\S+)$

    },

    submitForm : function(){
        if(home.regex){
            console.log(home.str.indexOf(':'));
            if(home.str.indexOf(':') != -1){
                doi = home.str.split(':');
                doi = doi[1];
            } else{
                doi = home.str;
            }

            window.location.href = 'http://js8lb8ft5y.search.serialssolutions.com/criteriarefiner/?SS_doi='+doi;
        } else{
            $('#search-articles-summon').submit();
        }
    }
}

jQuery(function(){
    home.init();
})