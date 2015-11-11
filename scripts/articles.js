var articles = {
    init : function(){

        // homepage
        $('#searcharticle, #summon-field').blur(function(e){
            articles.testRegex($(this))
        })

        $('#search-articles-summon').submit(function(e){
            articles.str = $('#searcharticle').val();
            articles.regex = /^(?:(?:doi:?\s*|(?:http:\/\/)?(?:dx\.)?(?:doi\.org)?\/))?(10(?:\.\d+){1,2}\/\S+)$/.test(articles.str);

            articles.submitForm();

            e.preventDefault();
        })

        // articles page
        $('form[name="summonSearch"]').submit(function(e){
            articles.str = $('#summon-field').val();
            articles.regex = /^(?:(?:doi:?\s*|(?:http:\/\/)?(?:dx\.)?(?:doi\.org)?\/))?(10(?:\.\d+){1,2}\/\S+)$/.test(articles.str);

            articles.submitForm();

            e.preventDefault();
        })

    },

    testRegex : function(elem){
        elem = $(elem);
        articles.str = $(elem).val();
        articles.regex = /^(?:(?:doi:?\s*|(?:http:\/\/)?(?:dx\.)?(?:doi\.org)?\/))?(10(?:\.\d+){1,2}\/\S+)$/.test(articles.str);
    },

    submitForm : function(){
        if(articles.regex){
            if(articles.str.indexOf(':') != -1){
                doi = articles.str.split(':');
                doi = doi[1];
            } else{
                doi = articles.str;
            }

            window.location.href = 'http://js8lb8ft5y.search.serialssolutions.com/criteriarefiner/?SS_doi='+doi;
        } else{
            if($('#search-articles-summon').length){
                $('#search-articles-summon').submit();
            }

            if($('form[name="summonSearch"]')){
                $('form[name="summonSearch"]').submit();
            }
        }
    }
}

jQuery(function(){
    articles.init();
})