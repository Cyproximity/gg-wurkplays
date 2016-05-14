// js codes for comment via http post method
'use strict';

$(function(){
  var cids = $('.cids'),
      cbtn = $('.send_comment'),
      data = {};

     cids.each(function(key, val){
        var filter = $(this).filter('[data-cid]').data('cid');
        data[key] = filter;
     });

  ////////// app start here

    $.each(data, function(key, val){
      $('#btncomment_'+val).on('click', function(){
        console.log('send comment thru comment box no. : commentbox_'+ val +' | used button: btncomment_'+ val);
        var str = $('#commentbox_'+val);
        console.log('comment content: '+str+' | string lenght: '+ str.length);

        $.ajax({
          type    : 'POST',
          url     : '/post/comment_send',
          data    : {post_id: val,comment: str.val(),},
          dataType: 'json',
          success : function(data){
            console.dir(data);
            var logs = $('#commentlog_'+val);
            if(data.access === true){
              str.val('');
              logs.append(data.message);
            }
            else if(data.access === false){
              logs.append(data.message);
            }
          },
          error   : function(xhr, status, error){
            console.log(error);
          }
        });

      });

    });

});
