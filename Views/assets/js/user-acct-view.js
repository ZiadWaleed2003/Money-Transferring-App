$(document).ready(function () {
    $("#edit").click(function () {
        $(location).attr("href", "user-acct-edit.php");
    });
    $("#delete").click(function () {
        $(location).attr("href", "user-acct-delete.php");
    });
});
