$("#productCategory").validate({
    rules:{
      cat_name:"required"
    },
    submitHandler: function(form){
      let formData=new FormData(form);
      formData.append("categoryAdd",1);
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
                  $("#msgrow").prepend('<div class="alert alert-success">Category created Successfully</div>');
                  hideTheAlertMsg();
                  setTimeout(function(){
                    window.location.reload();
                  },1000);
                }else if(_resData.hasOwnProperty('error')){
                  $('#msgrow').prepend('<div class="alert alert-danger">'+_resData.errorMsg+'</div>');
                  hideTheAlertMsg();
                  setTimeout(function(){
                    window.location.reload();
                  },2000);
                }
          }
      })
  }
})

$("#editProductCategory").validate({
  rules:{
    cat_name:"required"
  },
  submitHandler: function(form){
    let formData=new FormData(form);
    formData.append("categoryEdit",1);
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
                $("#msgrow").prepend('<div class="alert alert-success">Category created Successfully</div>');
                hideTheAlertMsg();
                setTimeout(function(){
                  window.location.reload();
                },1000);
              }else if(_resData.hasOwnProperty('error')){
                $('#msgrow').prepend('<div class="alert alert-danger">'+_resData.errorMsg+'</div>');
                hideTheAlertMsg();
                setTimeout(function(){
                  window.location.reload();
                },2000);
              }
        }
    })
}
})

$(".del_cat").on("click",function(){
  var catrow=$(this);
  var catid=$(this).attr('data-id');
  console.log(catid);
  if(confirm('Are you sure want to delete this category?')){
    $.ajax({
      url:"./admin-ajax/adminAjaxFun.php",
      type:'POST',
      data:{'catid':catid,'cat_del':1},
      dataType:'JSON',
      success:function(_resData){
            console.log(_resData);
            if(_resData.hasOwnProperty('success')){
                $("#msgrow").prepend('<div class="alert alert-success">Category Deleted Successfully</div>');
                hideTheAlertMsg();
                catrow.parent().parent('tr').remove();
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