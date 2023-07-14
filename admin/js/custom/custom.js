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

  $("#siteSettings").submit(function (e) {
    e.preventDefault();
    $(".alert").hide();
    let formData = new FormData(this);
    formData.append("siteSettings", 1);
    let siteName=formData.get("site_name");
    let siteTitle=formData.get("site_title");
    let siteDesc=formData.get("site_desc");
    let siteAddress=formData.get("site_address");
    let siteEmail=formData.get("site_email");
    let siteContact=formData.get("site_contact");
    if(siteName ==""){
      $("#msgrow").prepend('<div class="alert alert-danger">Site name is required.</div>');
    }else if(siteTitle==""){
      $("#msgrow").prepend('<div class="alert alert-danger">Site Title is required.</div>');
    }else if(siteDesc==""){
      $("#msgrow").prepend('<div class="alert alert-danger">Site Description is required.</div>');
    }else if(siteAddress==""){
      $("#msgrow").prepend('<div class="alert alert-danger">Site Address is required.</div>');
    }else if(siteEmail==""){
      $("#msgrow").prepend('<div class="alert alert-danger">Site Email Address is required.</div>');
    }else if(siteContact==""){
      $("#msgrow").prepend('<div class="alert alert-danger">Site Contact No. is required.</div>');
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
          // if(_resData.hasOwnProperty('success')){
          //   $("#msgrow").prepend(
          //     '<div class="alert alert-success">Profile Updated Successfulll</div>'
          //     );
          //     hideTheAlertMsg();
          // }else if(_resData.hasOwnProperty('error')){
          //   $('#msgrow').prepend('<div class="alert alert-danger">'+_resData.errorMsg+'</div>');
          //   hideTheAlertMsg();
          // }
        }
        })
      }catch(error){
        console.log(error);
      }
    }


  })

  function hideTheAlertMsg(){
    setTimeout(function () {
        $(".alert").hide();
      }, 4000);
  }

  function validateTheEmail(emailid){
    let validRegex = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
    if(emailid.match(validRegex)){
      return true;
    }else{
      return false;
    }

  }
});
