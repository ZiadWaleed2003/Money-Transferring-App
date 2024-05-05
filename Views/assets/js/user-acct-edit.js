function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#img-preview").attr("src", e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}

jQuery.validator.setDefaults({
    highlight: function (element) {
        jQuery(element).closest(".form-control").addClass("is-invalid");
    },
    unhighlight: function (element) {
        jQuery(element).closest(".form-control").removeClass("is-invalid");
    },
    errorElement: "span",
    errorClass: "label label-danger",
    errorPlacement: function (error, element) {
        if (element.parent(".input-group").length) {
            error.insertAfter(element.parent());
        } else {
            error.insertAfter(element);
        }
    },
});

$(document).ready(function () {
    $("#input-img").change(function () {
        readURL(this);
    });
    $("#edit-form").validate({
        rules: {
            profile_pass: {
                minlength: 8,
            },
            profile_repeat: {
                minlength: 8,
                equalTo: "#passwordfirst",
            },
        },
    });
});
