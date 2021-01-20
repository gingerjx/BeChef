let openNav = true;

function toggleNav() {
    if (openNav) {
        $("#links").css('display', 'flex');
        openNav = false;
    } else {
        $("#links").hide();
        openNav = true;
    }
}

window.onresize = function(event) {
    if (window.innerWidth > 480) {
        $("#links").css('display', 'flex');
        openNav = false;
    }
    else {
        $("#links").hide();
        openNav = true;
    }
};

$("#sign-in").click(() => {
    location.href = "login.php";
});

$("#sign-up").click(() => {
    location.href = "register.php";
});

$('#home-image').click(() => {
    location.href = 'index.php';
});