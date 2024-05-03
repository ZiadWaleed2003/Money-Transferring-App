<?php require_once("../main-components/header.php") ?>
<?php require_once("../main-components/side-navbar.php") ?>
<?php require_once("../main-components/navbar.php") ?>
<div class="container-fluid pt-4 px-4">
    <div class="row bg-secondary rounded align-items-center justify-content-center mx-0 p-5">
        <div class="col-12 text-center header">
            <h3 class="display-3 p-5">FAQ</h3>
        </div>
        <div class="container">
            <div class="accordion" id="accordionExample">
                <div class="accordion-item bg-transparent">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseOne" aria-expanded="true"
                            aria-controls="collapseOne">
                            Do you offer any fraud protection or safeguards against unauthorized transactions?
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show"
                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Yes, we have robust fraud detection systems in place to protect against unauthorized transactions.
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-transparent">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                            aria-expanded="false" aria-controls="collapseTwo">
                            Do I need to provide any specific information about the recipient to send money?
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse"
                        aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        Yes, you'll need the recipient's account details.
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-transparent">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseThree"
                            aria-expanded="false" aria-controls="collapseThree">
                            How long does it take for the recipient to receive the transferred money?
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse"
                        aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                         Typically, transfers are instant, but it may vary depending on the recipient's bank or payment provider.
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-transparent">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseFour"
                            aria-expanded="false" aria-controls="collapseFour">
                            Is my personal and financial information secure when using this app?
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse"
                        aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        Yes, we use industry-standard encryption and security protocols to protect your information.
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-transparent">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseFive"
                            aria-expanded="false" aria-controls="collapseFive">
                            What happens if I accidentally send money to the wrong recipient? 
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse"
                        aria-labelledby="headingFive" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        Unfortunately, once a transfer is made, it cannot be reversed. Please ensure the recipient details are accurate before confirming.
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-transparent">
                    <h2 class="accordion-header" id="headingSix">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseSix"
                            aria-expanded="false" aria-controls="collapseSix">
                            Is there a mobile wallet feature available within the app? 
                        </button>
                    </h2>
                    <div id="collapseSix" class="accordion-collapse collapse"
                        aria-labelledby="headingSix" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        Yes, you can store funds in your mobile wallet within the app for easy access and transactions.
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-transparent">
                    <h2 class="accordion-header" id="headingSeven">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseSeven"
                            aria-expanded="false" aria-controls="collapseSeven">
                            Can I check my most recent transactions?
                        </button>
                    </h2>
                    <div id="collapseSeven" class="accordion-collapse collapse"
                        aria-labelledby="headingSeven" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                            Yes, you can check your most recent bills and transactions in the transaction history.
                        </div>
                    </div>
                </div>
                <div class="accordion-item bg-transparent">
                    <h2 class="accordion-header" id="headingEight">
                        <button class="accordion-button collapsed" type="button"
                            data-bs-toggle="collapse" data-bs-target="#collapseEight"
                            aria-expanded="false" aria-controls="collapseEight">
                            Can I cancel a transfer after initiating it?
                        </button>
                    </h2>
                    <div id="collapseEight" class="accordion-collapse collapse"
                        aria-labelledby="headingEight" data-bs-parent="#accordionExample">
                        <div class="accordion-body">
                        Once a transfer is initiated, it cannot be canceled. Please double-check the details before confirming.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<?php require_once("../main-components/footer.php") ?>
