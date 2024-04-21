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
        
        // Here control the maximum number doesn't exist 5 Character
        if (inputValue.length > 5) 
        {
            inputValue = inputValue.slice(0,5);
        }
        
        // Return Edited value
        $(this).val(inputValue);
    });

    // Control Validation and visibility of Reviver Card Number
    $('#reciver-card').on("keypress", function(event){
        // Prevent to add the last input to value
        event.preventDefault();

        // Get the last input character and current value
        const lastInput = String.fromCharCode(event.which);
        let inputValue = $(this).val();

        // Check if the Last Input Character was a number
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
            
            // Here the visibility constrol to make a space after each 4 Number characters
            if (inputValue.length &&(inputValue.length - Math.floor(inputValue.length / 5)) % 4 == 0) 
            {
                inputValue = inputValue + " ";
            }
        }
        
        // Control the limit Card number of 16 Number characters and 3 spaces at maximum
        if (inputValue.length > 19) 
        {
            inputValue = inputValue.slice(0,19);
        }
        
        // Return Edited Value
        $(this).val(inputValue);
    })
});