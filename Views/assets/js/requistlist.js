$(document).ready(function() {
    let flag = true;
    $('.action-button').click(function(event) {
        if(flag){
            flag = false;
            const action = $(this).data('action');  // Get the action value from the button
            const id = $(this).data('id');

            const form = $('form#go');
            form.method = 'POST';
            form.action = '../../controllers/TransactionsController.php';

            const request_status = document.createElement('input');
            request_status.type = 'hidden';
            request_status.name = 'request_status';
            request_status.value = action;
            
            const request_id = document.createElement('input');
            request_id.type = 'hidden';
            request_id.name = 'request_id';
            request_id.value = id;

            form.append(request_status);
            form.append(request_id);
            form.submit();
        }
    });
});