$(document).ready(function() {
    function getMessages() {
        $.ajax({
            url: 'classes/Messages.php',
            method: 'POST',
            data: { GET_MESSAGES: 1 },
            success: function(response) {
                var resp = $.parseJSON(response);
                if (resp.status == 202) {
                    var messageHTML = '';
                    var messageList = resp.message.messages;

                    if (messageList) {
                        $.each(messageList, function(index, value) {
                            messageHTML += '<tr>'+
                                           '<td>'+ value.name +'</td>'+
                                           '<td>'+ value.email +'</td>'+
                                           '<td>'+ value.message +'</td>'+
                                           '<td>'+ value.date +'</td>'+
                                           '<td><a mid="'+value.mid+'" class="btn btn-sm btn-danger delete-message" style="color:#fff;"><i class="fas fa-trash-alt"></i></a></td>'+
                                           '</tr>';
                        });

                        $("#message_list").html(messageHTML);
                    }
                }
            }
        });
    }

    getMessages();

    $(document.body).on('click', '.delete-message', function() {
        var mid = $(this).attr('mid');
        if (confirm("Are you sure to delete this message?")) {
            $.ajax({
                url: 'classes/Messages.php',
                method: 'POST',
                data: { DELETE_MESSAGE: 1, mid: mid },
                success: function(response) {
                    var resp = $.parseJSON(response);
                    if (resp.status == 202) {
                        getMessages();
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
