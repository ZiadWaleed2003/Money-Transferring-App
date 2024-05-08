$(document).ready(function () {
    $("#logout").click(function () {
        $(location).attr("href", "/controllers/LogoutController.php");
    });
});
