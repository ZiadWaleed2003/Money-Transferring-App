$(document).ready(function() {
    // Control Valid Send Money Amount
    $('#amount').on("keypress", function(event){
        // Prevent to add the last input to value
        event.preventDefault();

        // get the last inputed character and current value
        const lastInput = String.fromCharCode(event.which);
        let inputValue = $(this).val();
        
        // check if the Last Input Character was a number
        if (lastInput >= "0" && lastInput <= "9")
        {
            // Control the case of Enter Zero number at the First
            // To add Zero character to value must be at least one character before it
            if(lastInput == 0){
                if(inputValue.length > 0){
                    inputValue += lastInput;
                }
            }
            else{
                inputValue += lastInput;
            }
        }
        
        // Here control the maximum number doesn't exist 7 Character
        if (inputValue.length > 7) 
        {
            inputValue = inputValue.slice(0,7);
        }
        
        // Return Edited value
        $(this).val(inputValue);
    });
});