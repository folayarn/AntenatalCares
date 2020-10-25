$(document).ready(function(e){

$('#form').on('submit',(function(e){


e.preventDefault();
$.$.ajax({
    type: "post",
    url: "image.php",
    data: new FormData(),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend: function(){
        $('#err').fadeOut();




    },
    success: function(data){
if(data=='invalid'){
    $('#err').html("invalid file. ").fadeOut();


    }else{
$('#preview').html(data).fadeIn();
$('#form')[0].reset();
    }
},
    error:function(e)
   {
       $('#err'.html).fadeIn();
   } 
});


}));


}); if(window.history.replaceState){
    window.history.replaceState(null,null,window.location.href);
  }