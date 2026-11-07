$(document).ready(function () {


  $("body").delegate(".btn-minus", "click", function(event) {
        var pid = $(this).closest("tr").find("input[type='text']").attr("id").split('-')[1];
        updateCartQuantity(pid, -1);
    });

    $("body").delegate(".btn-plus", "click", function(event) {
        var pid = $(this).closest("tr").find("input[type='text']").attr("id").split('-')[1];
        updateCartQuantity(pid, 1);
    });

    function updateCartQuantity(product_id, change) {
        var quantityInput = $("#cartQuantity-" + product_id);
        var newQuantity = parseInt(quantityInput.val()) + change;

        if (newQuantity > 0) {
            $.ajax({
                url: "action.php",
                method: "POST",
                data: {
                    update_quantity: 1,
                    proId: product_id,
                    newQuantity: newQuantity
                },
                dataType: "json",
                success: function(data) {
                    if (data.status === 'success') {
                        quantityInput.val(newQuantity);
                       
                        $("#totalprice-" + product_id).text(data.newTotalPrice + " Tk");
                     
						$("#cartSubTotal").text(data.totalPrice + "Tk");
						$("#cartDelivery").text(data.delivery + "Tk");
						$("#cartTotal").text(data.net + "Tk");

                    } else {
                        alert('Failed to update quantity.');
                    }
                },
                error: function() {
                    alert('Error in AJAX request.');
                }
            });
        }
    }

	$("body").delegate("#cartRemove", "click", function(event) {
        var pid = $(this).attr("pid");
        event.preventDefault();
        $.ajax({
            url: "action.php",
            method: "POST",
            data: {
                remove_cart: 1,
                proId: pid
            },
            dataType: "json",
            success: function(data) {
                if (data.status === 'success') {
          
                    $('#product-' + pid).remove();
					
					$("#cartSubTotal").text(data.totalPrice + "Tk");
					$("#cartDelivery").text(data.delivery + "Tk");
					$("#cartTotal").text(data.net + "Tk");

                } else {
                    alert('Failed to remove the product.');
                }
            },
            error: function() {
                alert('Error in AJAX request.');
                $('.overlay').hide();
            }
        });
    });



  $("body").delegate("#product", "click", function (event) {
    var pid = $(this).attr("pid");
    event.preventDefault();
    $(".overlay").show();
    $.ajax({
      url: "action.php",
      method: "POST",
      data: { addToCart: 1, proId: pid },
      success: function (data) {
        count_item();
        getCartItem();
        $("#product_msg").html(data);
        $(".overlay").hide();
      },
    });
  });

  count_item();
  function count_item() {
    $.ajax({
      url: "action.php",
      method: "POST",
      data: { count_item: 1 },
      success: function (data) {
        $("#badge").html(data);
      },
    });
  }

  getCartItem();
  function getCartItem() {
    $.ajax({
      url: "action.php",
      method: "POST",
      data: { Common: 1, getCartItem: 1 },
      success: function (data) {
        $("#cart_product").html(data);
      },
    });
  }
});
