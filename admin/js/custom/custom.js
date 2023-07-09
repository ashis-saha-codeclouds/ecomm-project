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
          url: "./admin-ajax/checkTheLogin.php",
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
    } else if (oldPass.length > 8 || newPass.length > 8) {
      $("#msgrow").prepend(
        '<div class="alert alert-danger">Password length should be 8 character long.</div>'
      );
      hideTheAlertMsg();
      return false;
    }
    try {
      $.ajax({
        url: "./admin-ajax/checkTheLogin.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function (_responseData) {
          $(".alert").hide();
          let _resData = JSON.parse(_responseData);
          console.log(_resData);
        },
      });
    } catch (error) {
      console.log(error);
    }
  });

  function hideTheAlertMsg(){
    setTimeout(function () {
        $(".alert").hide();
      }, 2000);
  }
});
