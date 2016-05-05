var socket  = require('socket.io');
var express = require('express');

var app     = express();
var server  = require('http').createServer( app );

var io      = socket.listen( server );
var port    = process.env.PORT || 3000;

server.listen(port, function() {
  console.log('Server listening at port %d', port, 'Crtl+C to Close');
});

io.on('connection', function(socket) {

  socket.on('status_post', function (data) {
    socket.emit('status_post', {
      status: data.status
    });
  });

});
