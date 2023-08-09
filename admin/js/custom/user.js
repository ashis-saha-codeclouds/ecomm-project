$(".del_user").on("click",function(){
    var userrow=$(this);
    var userid=$(this).attr('data-id');
    console.log(userid);
    if(confirm('Are you sure want to delete this User?')){
      $.ajax({
        url:"./admin-ajax/adminAjaxFun.php",
        type:'POST',
        data:{'userid':userid,'user_del':1},
        dataType:'JSON',
        success:function(_resData){
              console.log(_resData);
              if(_resData.hasOwnProperty('success')){
                  $("#msgrow").prepend('<div class="alert alert-success">User Deleted Successfully</div>');
                  hideTheAlertMsg();
                  userrow.parent().parent('tr').remove();
                }else if(_resData.hasOwnProperty('error')){
                  $('#msgrow').prepend('<div class="alert alert-danger">'+_resData.errorMsg+'</div>');
                  hideTheAlertMsg();
                }
        }
      })
    }
  })

  $("#userEdit").validate({
    rules:{
        user_fname:"required",
        user_lname:"required",
        email:{
            required:true,
            email:true
        },
        mobile:{
          required:true,
          minlength:10,
          maxlength:10,
          number: true,

        },
        city:"required",
        address:"required",
        user_status:"required"
    },
    messages:{
        email: {
          required: "Need user email address",
          email: "User email address must be in the format of name@domain.com"
        },
        mobile:{
          required:"Please enter user mobile number",
          mobile:"Please enter a valid phone number"
        }
      },
      submitHandler: function(form){
        let formData=new FormData(form);
        formData.append("userEdit",1);
        $.ajax({
            type:"POST",
            url:"./admin-ajax/adminAjaxFun.php",
            data: formData,
            contentType: false,
            processData: false,
            success:function(_responseData){
                console.log(_responseData);
                let _resData = JSON.parse(_responseData);
                console.log(_resData);
                if(_resData.hasOwnProperty('success')){
                    $("#msgrow").prepend('<div class="alert alert-success">User Date Updated Successfully!</div>');
                    hideTheAlertMsg();
                    setTimeout(function(){
                      window.location.href = 'users.php';
                    },1000);
                  }else if(_resData.hasOwnProperty('error')){
                    $('#msgrow').prepend('<div class="alert alert-danger">'+_resData.errorMsg+'</div>');
                    hideTheAlertMsg();
                    setTimeout(function(){
                      window.location.reload();
                    },10000);
                  }
            }
        })
    }
  })
  
  function hideTheAlertMsg(){
    setTimeout(function () {
        $(".alert").hide();
      }, 4000);
  }