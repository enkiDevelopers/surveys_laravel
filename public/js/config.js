$('#login-button').click(function(){
  $('#login-button').fadeOut("slow",function(){
    $("#container").fadeIn();
    TweenMax.from("#container", .4, { scale: 0, ease:Sine.easeInOut});
    TweenMax.to("#container", .4, { scale: 1, ease:Sine.easeInOut});
  });
});

$("#container").submit(function(e) {
  e.preventDefault();
  if ($('#pass').val()  == $('#rePass').val()){
    $('#container').fadeOut("slow",function(){
    $("#container-step2").fadeIn();
    TweenMax.from("#container-step2", .4, { scale: 0, ease:Sine.easeInOut});
    TweenMax.to("#container-step2", .4, { scale: 1, ease:Sine.easeInOut});
  });  
  }else{
    alert('Las contraseñas deben de coincidir');
  }
  
});

$("#container-step2").submit(function(e) {
  e.preventDefault();
  $('#container-step2').fadeOut("slow",function(){
    $("#container-step3").fadeIn();
    TweenMax.from("#container-step3", .4, { scale: 0, ease:Sine.easeInOut});
    TweenMax.to("#container-step3", .4, { scale: 1, ease:Sine.easeInOut});
  });
});

