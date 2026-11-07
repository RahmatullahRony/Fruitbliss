$(document).ready(function() {
    function getOrders() {
        $.ajax({
            url: 'classes/Orders.php',
            method: 'POST',
            data: { GET_ORDERS: 1 },
            success: function(response) {
                var resp = $.parseJSON(response);
                if (resp.status == 202) {
                    var orderHTML = '';
                    var orderList = resp.message.orders;
                    var previousTrxId = '';

                    if (orderList) {
                        $.each(orderList, function(index, value) {
                            if (value.trx_id !== previousTrxId && previousTrxId !== '') {
                                orderHTML += '<tr><td colspan="6" style="height: 100px;"></td></tr>'; // Add gap between different transaction IDs
                            }
                            orderHTML += '<tr>'+
                                           '<td><img width="60" height="60" src="../'+ value.product_image +'"></td>'+
                                           '<td>'+ value.product_name +'</td>'+
                                           '<td>'+ value.quantity +'</td>'+
                                           '<td>'+ value.price +'</td>'+
                                           '<td>'+ value.trx_id +'</td>'+
                                           '<td><a trx_id="'+value.trx_id+'" class="btn btn-sm btn-danger delete-order" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></td>'+
                                           '</tr>';
                            previousTrxId = value.trx_id;
                        });

                        $("#order_list").html(orderHTML);
                    }
                }
            }
        });
    }

    getOrders();

    $(document.body).on('click', '.delete-order', function() {
        var trx_id = $(this).attr('trx_id');
        if (confirm("Are you sure to delete this order?")) {
            $.ajax({
                url: 'classes/Orders.php',
                method: 'POST',
                data: { DELETE_ORDER: 1, trx_id: trx_id },
                success: function(response) {
                    var resp = $.parseJSON(response);
                    if (resp.status == 202) {
                        getOrders();
                    } else if (resp.status == 303) {
                        alert(resp.message);
                    }
                }
            });
        } else {
            alert('Cancelled');
        }
    });
});
