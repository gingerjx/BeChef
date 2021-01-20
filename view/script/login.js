$(() => {
    $('#login-form').on('submit', function (e) {
        e.preventDefault();

        let values = $(this).serializeArray();
        if (values[0].value === "" || 
            values[1].value === "") {
            $('#login-error').html('Fields cannot be empty');
            return;
        }
        
        let inputs = $(this).find("username, password");
        inputs.prop("disabled", true);

        let request = $.ajax({
            type: 'post',
            url: 'service/login.php',
            data: $('form').serialize(),
        });

        request.done((data) => {
            if (data == "success")
                window.location = "../../index.php";
            else 
                $('#login-error').html('Invalid username or password');
        })

        request.fail(() => {
            //TODO
        })

        request.always(() => {
            inputs.prop("disabled", false);
        }) 
    });
});

$("#register-button").click(() => {
    location.href = "register.php";
});

$('#login-logo').click(() => {
    location.href = 'index.php';
});