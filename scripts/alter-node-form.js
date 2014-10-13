var form = {
    init : function(){
        jQuery('ul.tips').hide().before('<p><a href="#" id="tips-toggle">View formatting tips</a></p>');
        jQuery('#tips-toggle').click(function(e){
            jQuery('ul.tips').toggle();

            e.preventDefault();
        })
    }
}


jQuery(document).ready(function($){
  form.init();
});
