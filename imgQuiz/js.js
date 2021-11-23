$(function(){
  'use strict';
  $(document).ready(function(){
    $('span').mouseover(function(){
      $(this).addClass('fall');
    });
  });
  $(document).ready(function(){
    $('.mountain').on('click',function(){
      $('.mountain').removeClass("check");
      $(this).addClass('check');
      var value = document.querySelector('.check');
      $('#answer').val(value.id);
    });
  });

  $(document).ready(function(){
    $('#submit').on('click',function(){
      if($('#answer').val() === ""){
        alert("test");
      }
    });
  });
});
