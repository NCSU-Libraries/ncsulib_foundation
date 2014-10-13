var form = {
    init : function(){
        jQuery('.filter-guidelines-processed').hide().before('<div style="clear:left; padding-top:10px;"><a href="#" id="tips-toggle">&#8680; View formatting tips</a></div>');
        jQuery('#tips-toggle').click(function(e){
            e.preventDefault();
            jQuery('.filter-guidelines-processed').toggle();
        });
    }
};


jQuery(document).ready(function($){
  form.init();
});
