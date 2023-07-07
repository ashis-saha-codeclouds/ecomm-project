$(document).ready(function(){
    $("#admin-login-form").submit(function(e){
        e.preventDefault();
        let username=$("input[name=username]").val();
        let password=$("input[name=password]").val();
        if(!username || !password){
            $(".alert-danger").show();
            setTimeout(function(){
                $(".alert-danger").hide();
            },5000);
        }else{
            $.ajax({
                url:"./admin-ajax/checkTheLogin.php",
                type:"POST",
                data:{_login:1,_username:username,_password:password},
                success:function(_responseData){
                    $(".alert-danger").hide();
                    $(".alert-success").hide();
                    let _resData=JSON.parse(_responseData);
                    console.log(_resData);
                    if(_resData.hasOwnProperty('success')){
                        $(".alert-success").show();
                        setTimeout(function(){
                            window.location='dashboard.php';
                        },1000);
                    }else if(_resData.hasOwnProperty('error')){
                        console.log("Error!!");
                        $(".alert-danger").text("Incorrect Username or Password!");
                        $(".alert-danger").show();
                    }
                    
                }
            })
        }
    })
})