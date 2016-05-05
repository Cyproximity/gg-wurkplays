var socket = io.connect('http://'+window.location.hostname+':3000');

$(document).ready(function(){

  $('#btn_post_status').click(function(){

    var data = {
      post_content: $('#posted_status').val()
    };

    $.ajax({
      type    : 'POST',
      url     : 'user/post_status',
      data    : data,
      dataType: 'json',
      success: function(data){
        if(data.success === true) {

          $('#posted_status').val('');

          $('#notification').html(data.notification);

          socket.emit('status_post', {
            status: data.posted_status
          });

        }else if(data.success === false) {
          $('#posted_status').val(data.posted_status);
          $('#notification').html(data.notification);
        }
      },
      error   : function(xhr, status, error){
        console.log(error);
      }
    });
  });
});

socket.on('status_post', function (data) {
  alert('status'+ data.status);
});
