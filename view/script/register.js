$(() => {
    $('#register-form').on('submit', function (e) {
        e.preventDefault();

        let values = $(this).serializeArray();
        let valid = validAndPrintErrors(values[0].value,
                                        values[1].value,
                                        values[2].value,
                                        values[3].value,
                                        values[4].value,);
        if (!valid)
            return;
        
        let inputs = $(this).find("fullname, username, email, password, pass-repeat");
        inputs.prop("disabled", true);

        let request = $.ajax({
            type: 'post',
            url: 'service/register.php',
            data: $('form').serialize(),
        });

        request.done((data) => {
            let ret = JSON.parse(data);
            $("#username-error").html('');
            $("#username").css("border", "2px grey solid");
            $("#email-error").html('');
            $("#email").css("border", "2px grey solid");

            if (ret[0] == true || ret[1] == true) {
                if (ret[0] == true) {
                    $("#username-error").html("Username already exists");
                    $("#username").css("border", "2px #CD6155 solid");
                }
                if (ret[1] == true) {
                    $("#email-error").html("Email already exists");
                    $("#email").css("border", "2px #CD6155 solid");
                }
            }
            else
                window.location = "../../index.php";
        })

        request.fail(() => {
            //TODO
        })

        request.always(() => {
            inputs.prop("disabled", false);
        }) 
    });
});

function validAndPrintErrors(fullname, username, email, password, pass_repeat) {
    let valid = true;
    let lettersSpace = /^[a-zA-Z\s]+$/;
    let lettersNumbers = /^[0-9a-zA-Z]+$/;
    var emailReg = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    
    $("#fullname-error").html('');
    $("#fullname").css("border", "2px grey solid");
    $("#username-error").html('');
    $("#username").css("border", "2px grey solid");
    $("#email-error").html('');
    $("#email").css("border", "2px grey solid");
    $("#password-error").html('');
    $("#password").css("border", "2px grey solid");
    $("#pass-repeat-error").html('');
    $("#pass-repeat").css("border", "2px grey solid");

    if (fullname.length < 5 || fullname.lenght > 100 || !fullname.match(lettersSpace)) {
        valid = false;
        $("#fullname-error").html("Only characters and spaces. Range: (5, 100)");
        $("#fullname").css("border", "2px #CD6155 solid");
    }
    if (username.length < 5 || username.lenght > 50 || !username.match(lettersNumbers)) {
        valid = false;
        $("#username-error").html("Only characters and numbers. Range: (5, 50)");
        $("#username").css("border", "2px #CD6155 solid");
    }
    if (!email.match(emailReg)) {
        valid = false;
        $("#email-error").html("Invalid email");
        $("#email").css("border", "2px #CD6155 solid");
    }
    if (password.length < 5 || password.lenght > 50) {
        valid = false;
        $("#password-error").html("Range: (5, 50)");
        $("#password").css("border", "2px #CD6155 solid");
    }
    if (password !== pass_repeat) {
        valid = false;
        $("#pass-repeat-error").html("Passwords do not match");
        $("#pass-repeat").css("border", "2px #CD6155 solid");
    }

    return valid;
}

$('#register-logo').click(() => {
    location.href = 'index.php';
});

