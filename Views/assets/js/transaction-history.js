$(document).ready(function () {
    $("#export").click(function () {
        console.log("lol");
        $(location).attr(
            "href",
            "../../../controllers/TranscationHistoryController.php"
        );
    });
});
