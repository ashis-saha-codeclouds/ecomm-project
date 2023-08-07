$("#product").validate({
    rules:{
        product_name:"required",
        product_sku:"required",
        product_price:"required",
        product_desc:"required",
        featured_product:"required",
        product_status:"required",
        product_image:{
            required:true
          }
    },
    messages:{
        product_image:{
          required:"Please select the product image"
        }
      },
      submitHandler: function(form){
        let formData=new FormData(form);
        formData.append("productAdd",1);
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
                    $("#msgrow").prepend('<div class="alert alert-success">Product created Successfully!</div>');
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

$("#productEdit").validate({
  rules:{
      product_name:"required",
      product_sku:"required",
      product_price:"required",
      product_desc:"required",
      featured_product:"required",
      product_status:"required",
  },
    submitHandler: function(form){
      let formData=new FormData(form);
      formData.append("productEdit",1);
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
                  $("#msgrow").prepend('<div class="alert alert-success">Product Updated Successfully!</div>');
                  hideTheAlertMsg();
                  setTimeout(function(){
                    window.location.href = 'products.php';
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

$(".del_product").on("click",function(){
  var productrow=$(this);
  var productid=$(this).attr('data-id');
  console.log(productid);
  if(confirm('Are you sure want to delete this product?')){
    $.ajax({
      url:"./admin-ajax/adminAjaxFun.php",
      type:'POST',
      data:{'productid':productid,'product_del':1},
      dataType:'JSON',
      success:function(_resData){
            console.log(_resData);
            if(_resData.hasOwnProperty('success')){
                $("#msgrow").prepend('<div class="alert alert-success">Product Deleted Successfully</div>');
                hideTheAlertMsg();
                productrow.parent().parent('tr').remove();
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
