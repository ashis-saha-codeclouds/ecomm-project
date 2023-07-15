$(document).ready(function () {
  $("#admin-login-form").submit(function (e) {
    e.preventDefault();
    let username = $("input[name=username]").val();
    let password = $("input[name=password]").val();
    if (!username || !password) {
      $(".alert-danger").show();
      setTimeout(function () {
        $(".alert-danger").hide();
      }, 5000);
    } else {
      try {
        $.ajax({
          url: "./admin-ajax/adminAjaxFun.php",
          type: "POST",
          data: { _login: 1, _username: username, _password: password },
          success: function (_responseData) {
            $(".alert").hide();
            let _resData = JSON.parse(_responseData);
            console.log(_resData);
            if (_resData.hasOwnProperty("success")) {
              $(".alert-success").show();
              setTimeout(function () {
                window.location = "dashboard.php";
              }, 1000);
            } else if (_resData.hasOwnProperty("error")) {
              console.log("Error!!");
              $(".alert-danger").text("Incorrect Username or Password!");
              $(".alert-danger").show();
            }
          },
          error: function (jqXHR, textStatus, errorThrown) {
            console.log(textStatus);
          },
        });
      } catch (error) {
        console.log(error);
      }
    }
  });

  $("#resetThePassword").submit(function (e) {
    e.preventDefault();
    $(".alert").hide();
    let formData = new FormData(this);
    formData.append("updateThepassword", 1);
    //console.log(formData);
    //console.log(formData.get('oldPassword'));
    let oldPass = formData.get("oldPassword");
    let newPass = formData.get("newPassword");
    if (oldPass == "" || newPass == "") {
      $("#msgrow").prepend(
        '<div class="alert alert-danger">All the fields are required.</div>'
      );
      hideTheAlertMsg();
      return false;
    } else if (oldPass.length < 8 || newPass.length < 8) {
      $("#msgrow").prepend(
        '<div class="alert alert-danger">Password length should be 8 character long.</div>'
      );
      hideTheAlertMsg();
      return false;
    }else{ 
    try {
      $.ajax({
        url: "./admin-ajax/adminAjaxFun.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (_responseData) {
          $(".alert").hide();
          let _resData = JSON.parse(_responseData);
          console.log(_resData);
          if(_resData.hasOwnProperty('success')){
            $("#msgrow").prepend(
              '<div class="alert alert-success">Password updated successfully. You will be logged out in few moments...</div>'
              );
              hideTheAlertMsg();
              setTimeout(function(){
                window.location="logout.php"
            },50000);
          }else if(_resData.hasOwnProperty('error')){
            $('#msgrow').prepend('<div class="alert alert-danger">'+_resData.errorMsg+'</div>');
            hideTheAlertMsg();
          }
        }
      });
    } catch (error) {
      console.log(error);
    }
  }
  });

  $("#adminProfile").submit(function (e) {
    e.preventDefault();
    $(".alert").hide();
    let validEmailRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    let formData = new FormData(this);
    formData.append("updateTheProfile", 1);
    let name=formData.get('name');
    let email=formData.get('email');
    if (name == "" || email == "") {
      $("#msgrow").prepend(
        '<div class="alert alert-danger">All the fields are required.</div>'
      );
      hideTheAlertMsg();
      return false;
      }else{
      try{
        $.ajax({
          url:"./admin-ajax/adminAjaxFun.php",
          type: "POST",
          data: formData,
          contentType: false,
          processData: false,
          success: function (_responseData) {
          $(".alert").hide();
          let _resData = JSON.parse(_responseData);
          console.log(_resData);
          if(_resData.hasOwnProperty('success')){
            $("#msgrow").prepend(
              '<div class="alert alert-success">Profile Updated Successfulll</div>'
              );
              hideTheAlertMsg();
          }else if(_resData.hasOwnProperty('error')){
            $('#msgrow').prepend('<div class="alert alert-danger">'+_resData.errorMsg+'</div>');
            hideTheAlertMsg();
          }
        }
        })
      }catch(error){
        console.log(error);
      }
    }
  })

  $("#siteSettings").validate(
    {
      rules:{
        site_name:"required",
        site_title:"required",
        site_desc:{
          required: true,
          minlength: 4,
        },
        site_address:{
          required: true,
          minlength: 4,
        },
        site_email:{
          required:true,
          email:true
        },
        site_contact:{
          required:true,
          number:true,
          minlength:10,
          maxlength:10
        }
      },
      messages:{
        site_email:{
          email:"Please enter a valid email address"
        },
      },
      submitHandler: function (form) {
        //var formData = $(form).serialize() + '&siteSettings=1';
        //var form = $('#siteSettings')[0];
        let formData = new FormData(form);
        formData.append("siteSettings",1);
        let name=formData.get('site_name');
        let site_logo=formData.get('site_logo');
        console.log(formData);
        console.log(name,site_logo);
        //return false;
        $.ajax({
            type: "POST",
            url: "./admin-ajax/adminAjaxFun.php",
            data: formData,
            contentType: false,
            processData: false,
            success: function (_responseData) {
              console.log(_responseData);
              let _resData = JSON.parse(_responseData);
              console.log(_resData);
              if(_resData.hasOwnProperty('success')){
                $("#msgrow").prepend('<div class="alert alert-success">Site Data Updated Successfulll</div>');
                // setTimeout(function(){
                //   window.location();
                // },1000);
              }else if(_resData.hasOwnProperty('error')){
                $('#msgrow').prepend('<div class="alert alert-danger">'+_resData.errorMsg+'</div>');
                hideTheAlertMsg();
              }
            }
        });
        return false; // required to block normal submit for ajax submission
    }
    });

  function hideTheAlertMsg(){
    setTimeout(function () {
        $(".alert").hide();
      }, 4000);
  }
});
