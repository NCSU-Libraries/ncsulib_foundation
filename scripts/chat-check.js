var cc = {
    num : 0,

    queue : ['ref-desk', 'nc-knows'],

    show_presence : function() {
        var url = 'https://libraryh3lp.com/chat/'+cc.item+'@chat.libraryh3lp.com';

        $('.chat-link').text('CHAT NOW').attr('href',url).addClass('globalchat');

        // chat window
        $(".chat-link").click(function(e){
            window.open(url,"chat","resizable=1,width=400,height=350,directories=no,titlebar=no,toolbar=no,location=no,status=no,menubar=no,scrollbars=no");
            e.preventDefault();
        });
    },

    show_default : function(){
        $('.chat-link').text('CONTACT US').attr('href','/contact');
    },

    chatCheck : function(){
        $.getScript("http://libraryh3lp.com/presence/jid/"+cc.queue[cc.num]+"/chat.libraryh3lp.com/js", function(){
            for (var i = 0; i < jabber_resources.length; ++i) {
                var resource = jabber_resources[i];
                if(resource.show == 'available'){
                    cc.item = cc.queue[cc.num];
                    cc.show_presence();
                } else if(cc.num < cc.queue.length){
                    cc.chatCheck();
                } else{
                    cc.show_default('none');
                }
            }
            cc.num++;
        });

    }
}

$(function($) {
    cc.chatCheck();
});