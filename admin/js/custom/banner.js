$("#siteBanner").validate({
    rules:{
        banner_title:"required",
        banner_status:"required",
        banner_image:{
          required:true
        }
    },
    messages:{
      banner_image:{
        required:"Please select the banner image"
      }
    },
    submitHandler: function(form){
      let formData=new FormData(form);
      formData.append("bannerAdd",1);
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
                  $("#msgrow").prepend('<div class="alert alert-success">Banner created Successfully</div>');
                  hideTheAlertMsg();
                  setTimeout(function(){
                    window.location.reload();
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

$("#editTheBanner").validate({
  rules:{
    banner_title:"required",
    banner_status:"required"
  },
  submitHandler: function(form){
    let formData=new FormData(form);
    formData.append("bannerEdit",1);
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
                $("#msgrow").prepend('<div class="alert alert-success">Banner Updated Successfully</div>');
                hideTheAlertMsg();
                setTimeout(function(){
                  window.location.href = 'banner.php';
                },2000);
              }else if(_resData.hasOwnProperty('error')){
                $('#msgrow').prepend('<div class="alert alert-danger">'+_resData.errorMsg+'</div>');
                hideTheAlertMsg();
              }
        }
    })
}
})

$(".del_banner").on("click",function(){
  var bannerrow=$(this);
  var bannerid=$(this).attr('data-id');
  console.log(bannerid);
  if(confirm('Are you sure want to delete this banner?')){
    $.ajax({
      url:"./admin-ajax/adminAjaxFun.php",
      type:'POST',
      data:{'bannerid':bannerid,'banner_del':1},
      dataType:'JSON',
      success:function(_resData){
            console.log(_resData);
            if(_resData.hasOwnProperty('success')){
                $("#msgrow").prepend('<div class="alert alert-success">Banner Deleted Successfully</div>');
                hideTheAlertMsg();
                bannerrow.parent().parent('tr').remove();
              }else if(_resData.hasOwnProperty('error')){
                $('#msgrow').prepend('<div class="alert alert-danger">'+_resData.errorMsg+'</div>');
                hideTheAlertMsg();
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