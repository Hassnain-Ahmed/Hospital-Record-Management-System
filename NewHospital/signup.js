let si_name = $("#si_name");
let si_email = $("#si_email");
let si_username = $("#si_username");
let si_pass = $("#si_pass");
let si_confirm_pass = $("#si_confirm_pass");
$("#signup").click(function(){
    
    if(si_name.val() == "") { $(si_name).css("border","1px solid red") } else{ $(si_name).css("border","1px solid transparent"); }
    if(si_email.val() == "") { $(si_email).css("border","1px solid red") } else{ $(si_email).css("border","1px solid transparent"); }
    if(si_username.val() == "") { $(si_username).css("border","1px solid red") } else{ $(si_username).css("border","1px solid transparent"); }
    if(si_pass.val() == "") { $(si_pass).css("border","1px solid red") } else{ $(si_pass).css("border","1px solid transparent"); }
    if(si_confirm_pass.val() == "") { $(si_confirm_pass).css("border","1px solid red") } else{ $(si_confirm_pass).css("border","1px solid transparent"); }
});