$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('.sideBar-body').click(function () {
        $('body').on('click', '.receiver_username', function () {
            let receiver_username = $(this).data("id");
            let Url = URL + '/live-chat/fetch-all-message';

            $.ajax({
                method: "POST",
                url: Url,
                data: {
                    '_token': Token,
                    receiver_username: receiver_username
                },
                success: function (response) {
                    $('#conversation').html(response);
                }

            });

            $('#receiver_username').val(receiver_username);

            $('.conversation').show();


        });


    });


    $('#message_box').keyup(function (e) {
        if (e.keyCode === 13) {
            getAllMessages();
            messageSend();
            $('#getAllMessages').css('display', 'none');
        } else {
        }
    });

});

function messageSend() {
    let message = $('#message_box').val();
    let receiver_username = $('#receiver_username').val();

    let Url = $('#send_message_cline_all').attr('action');
    $.ajax({
        method: "POST",
        url: Url,
        data: {
            '_token': Token,
            message: message,
            receiver_username: receiver_username
        },
        success: function (response) {
            $('#send_message_cline_all')[0].reset();
        }

    });

}


function getAllMessages() {
    chatRetrieve();
    setTimeout(getAllMessages, 1000);
}

function chatRetrieve() {
    let Url = URL + '/live-chat/chat-retrieve';
    let receiver_username = $('#receiver_username').val();

    $.ajax({
        method: "POST",
        url: Url,
        data: {
            '_token': Token,
            'receiver_username': receiver_username

        },
        success: function (response) {

            $('#conversation').html(response);

        }

    });

}

