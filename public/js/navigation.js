window.onload = function() {
    $("#username").hover(
        function() {;
            $("#usermenu").show();
        },
        function() {
            if ($('#usermenu').is(':hover') === false)
                $("#usermenu").hide();
        }
    );
    $("#usermenu").hover(
        function() {
            $("#usermenu").show();
        },
        function() {
            if ($('#username').is(':hover') === false)
                $("#usermenu").hide();
        }
    );
}