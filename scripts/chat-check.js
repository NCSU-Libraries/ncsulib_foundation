var cc = {
    num : 0,
    show_presence : function(item, available) {
        if(available == 'available'){
            $('.chat-link').text('CHAT NOW').addClass('globalchat').attr('href','https://libraryh3lp.com/chat/'+item+'@chat.libraryh3lp.com');
            console.log(item);
        } else if(available == 'none'){
            $('.chat-link').text('CONTACT US').removeClass('globalchat').attr('href','https://www.lib.ncsu.edu/contact');
            console.log('none');
        }
    },

    chatCheck : function(){
        var queue = ['ref-desk', 'ncknows'];

        $.getScript("http://libraryh3lp.com/presence/jid/"+queue[i]+"/chat.libraryh3lp.com/js", function(){
            cc.num++;
            for (var i = 0; i < jabber_resources.length; ++i) {
                var resource = jabber_resources[i];
                if(resource.show == 'available'){
                    // show_presence(queue[cc.num],resource.show);
                    console.log('available');
                } else if(num < queue.length){
                    // show_presence('','none');
                    console.log('unavailable');
                } else{
                    console.log('none');
                }
            }
        });

    }
}