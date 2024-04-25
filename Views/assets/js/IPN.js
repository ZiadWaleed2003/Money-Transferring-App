$(document).ready(function() {
    const ipn_inputs = $('#ipn-inputs .ipn');

    ipn_inputs.on("keypress", function(event){
        const key = event.which;
        
        if (key < 48 || key > 57) { // Allow numbers (48-57)
        event.preventDefault();
        }
    });

    ipn_inputs.on('keyup', function(event) {
        const currentInput = $(this);
        const nextInput = $('#IPN-' + (currentInput.attr('id').slice(-1)-'0'+1));
    
        if (currentInput.val().length === 1) {
            if (nextInput.length) {
                nextInput.focus();
                currentInput.val(currentInput.val().slice(0, 1)); // Ensure only 1 character remains
            }
        }
    });
});