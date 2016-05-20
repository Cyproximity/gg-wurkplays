'use strict';

$(function(){
  console.log('test');
  var search = $('#search_box'),
      search_button = $('#btn_search');

  search_button.on('click', function(){
    if(search.val()){
      location.href = '/search?_q='+search.val();
    }else{
      console.log('empty');
    }
  });

});
