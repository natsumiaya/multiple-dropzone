$(document).ready(function(){
  initializeParsley();

  function initializeParsley(){
    var $required = $('.required');
    if($required.length > 0){
      $required.parsley({
        required: true,
        trigger: 'focusout',
        errorMessage: 'Please enter the required field'
      });
    }
  }
  
  $('form').each(function(){
    $(this).parsley();
  });
});