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
    $("#changeForm").validate({
        rules: {
            new_password: {
                minlength: 8,
                required: true,
            },
            password_repeat: {
                required: true,
                minlength: 8,
                equalTo: "#floatingpassword",
            },
        },
    });
});
