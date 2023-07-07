$(document).ready(function(){
    $("#admin-login-form").submit(function(e){
        e.preventDefault();
        let username=$("input[name=username]").val();
        let password=$("input[name=password]").val();
        if(!username || !password){
            $(".alert-log").show();
            setTimeout(function(){
                $(".alert-log").hide();
            },5000);
        }else{
            $.ajax({
                url:"./admin-ajax/checkTheLogin.php",
                type:"POST",
                data:{_login:1,_username:username,_password:password},
                success:function(_resData){
                    $(".alert-log").hide();
                    console.log(_resData);
                }
            })
        }
    })
})