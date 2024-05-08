$(document).ready(function () {
    $("#delete").click(function () {
        $(location).attr("href", "../../controllers/AcctDeleteController.php");
    });
    $("#cancel").click(function () {
        $(location).attr("href", "user-acct-view.php");
    });
});
