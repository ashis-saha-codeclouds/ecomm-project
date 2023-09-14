$(document).ready(function () {
  $(".add-to-cart").on("click", function () {
    console.log($(this).data());
    productid = $(this).data("prdctid");
    $.ajax({
        url:"actions.php",
        method:"POST",
        data:{_addToCart:productid},
        success:function(data){
            location.reload();
        }
    })
  });
});
