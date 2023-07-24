$("#siteBanner").validate({
    rules:{
        cat_name:"required",
        cat_status:"required"
    },
    submitHandler: function(form){
        let formData=new FormData();
        formData.append("categoryAdd");
    }
})