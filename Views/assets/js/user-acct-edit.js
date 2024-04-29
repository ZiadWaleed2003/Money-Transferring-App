function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#img-preview").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

$(document).ready(function () {
    $("#input-img").change(function () {
        readURL(this);
    });
    $("#edit-form").validate({
        rules: {
            profile_pass: {
                required: true,
                minlength: 8,
            },
            profile_repeat: {
                required: true,
                minlength: 8,
                equalTo: "#passwordfirst",
            },
        },
    });
});
