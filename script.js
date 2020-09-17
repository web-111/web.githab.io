$(".close, #backdrop").click(function(){
    $("#form, #backdrop, .form_res").hide();
  });

  $("#show").click(function(){
    $("#form, #backdrop").show();
  });

  $('#form').submit(function(){
    $("#form").hide();
    $('#form_res').show();
    $.post(
        'telegram.php', // адрес обработчика
         $("#form").serialize(), // отправляемые данные  		
        
        function(msg) { // получен ответ сервера  
            // $('#my_form_email').hide('slow');
                $('#form_res').append(msg);
        }
    );
    return false;
});
