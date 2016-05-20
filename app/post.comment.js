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
    console.log(data);
    function escapeHtml(text) {
        return text
            .replace(/&/g, "&amp;")
            .replace(/</g, "&lt;")
            .replace(/>/g, "&gt;")
            .replace(/"/g, "&quot;")
            .replace(/'/g, "&#039;");
    }
    function get_comments(postname){
      $.ajax({
        type    : 'GET',
        url     : '/post/comment_get',
        data    : {key: true, user_id: 'test', post_id: postname},
        dataType: 'json',
        success : function(data){
          console.log('=====| comment |=====');

          $.each(data, function(key, value){
            console.log(key +'-'+ value.SID + ' | '+value.CID+' | '+ value.DATE +' | comment content: '+ value.CC);
            $('#commentlog_'+postname).append('<dl class="dl-horizontal"><dt>'+value.SID+'</dt><dd>'+escapeHtml(value.CC)+'</dd></dl>');
          });
        },
        error   : function(xhr, status, error){
          console.log(status);
          console.log(error);
        }
      });
    }

    $.each(data, function(key, val){
      get_comments(val);

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
