$("#product").validate({
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
        formData.append("productAdd",1);
    }
})
