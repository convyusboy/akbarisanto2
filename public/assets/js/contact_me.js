$(document).ready(function(){
    var name = $("input#name").val();
    var email = $("input#email").val();
    var phone = $("input#phone").val();
    var message = $("textarea#message").val();
    $.post('sendmail', {name:name,email:email,phone:phone,message:message}, function(data){
        console.log(data);
    });
});
