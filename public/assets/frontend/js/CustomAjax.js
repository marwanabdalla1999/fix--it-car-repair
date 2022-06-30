$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    $('#send_contact_message').on("click", function (event) {
        event.preventDefault();

        let name = $('#name').val();
        let email = $('#email').val();
        let topic = $('#topic').val();
        let brand = $('#brand').val();
        let message = $('#message').val();
        let SendUrl = $('#contact_form_action').attr('action');
        let token = Token;
        let data = {
            '_token': token,
            name: name, email: email, topic: topic, brand: brand, message: message
        };


        $.ajax({
            method: "POST",
            url: SendUrl,
            data: data,
            success: function (response) {
                let result = response.success;
                $('#contact_form_action')[0].reset();
                swal({
                    title: "Thanks !",
                    text: result,
                    icon: "success",
                    button: false,
                    timer: 2000
                });
            }
        });


    });

    $('#send_email_message').on("click", function (event) {
        event.preventDefault();


        let email = $('#email').val();
        let SendUrl = $('#email_form_action').attr('action');
        let token = Token;
        let data = {
            '_token': token,
            email: email
        };

        $.ajax({
            method: "POST",
            url: SendUrl,
            data: data,
            success: function (response) {
                let result = response.success;
                $('#email_form_action')[0].reset();
                swal({
                    title: "Thanks !",
                    text: result,
                    icon: "success",
                    button: false,
                    timer: 2000
                });
            }
        });


    });



    $('#search-medicine').on('keyup', function () {
        let getCriteria = $(this).val();
        if (getCriteria.length == 0) {
            $('#getResult').html(" <ul class='list-group'><li class='list-group-item' style='color: red;'>Enter any keywords</li> </ul>");

            return false;
        }else {
            let Url = URL + '/search-medicine/' + getCriteria;
            $.ajax({
                    method: 'GET',
                    url: Url,
                    success: function (response) {
                        $('#getResult').html(response);
                        $('#getResult').css('display', 'block');
                    }


                }
            );
        }



    });



    $('#send_prescription_message').on("click", function (event) {
        event.preventDefault();

        let name = $('#name').val();
        let phone_number = $('#phone_number').val();
        let upload = $('#upload');

        let SendUrl = $('#prescription_form_action').attr('action');
        let token = Token;
        let data = {
            '_token': token,
            name: name, phone_number: phone_number, upload: upload,
        };


        $.ajax({
            method: "POST",
            url: SendUrl,
            data: data,
            success: function (response) {
                let result = response.success;
                $('#prescription_form_action')[0].reset();
                $('#upload')[0].reset();
                swal({
                    title: "Thanks !",
                    text: result,
                    icon: "success",
                    button: false,
                    timer: 2000
                });
            }
        });


    });




    //-----------------------add to cart----------------------------

    $('#add-to-cart').on("click", function (event) {
        event.preventDefault();

        let product_id = $('#productDetails_id').val();

        let SendUrl = $('#addtocartform').attr('action');
        let token = Token;
        let data = {
            '_token': token,
            product_id:product_id
        };



        $.ajax({
            method: "POST",
            url: SendUrl,
            data: data,
            success: function (response) {
                let result = response.success;
                $('#addtocartform')[0].reset();
                swal({
                    title: "Thanks !",
                    text: result,
                    icon: "success",
                    button: false,
                    timer: 2000
                });
            }
        });


    });



   setTimeout(function () {
       $('.alert').hide('slow')
   },2000);

});







