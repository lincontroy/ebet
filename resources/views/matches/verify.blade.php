@extends('layouts.main')

@section('content')

<style>
    /* Custom highlight color */
    .highlight-card {
        background-color: #007bff;
        /* Example highlight color (blue) */
        color: white;
        /* Text color */
        border: 2px solid #007bff;
        /* Border color */
    }

    /* Add hover effect */
    .card:hover {
        cursor: pointer;
        border: 2px solid #007bff;
        /* Example border color on hover */
    }

</style>

<section class="top_matches pb-8 pb-md-10">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 gx-0 gx-lg-4">
                <div class="top_matches__main">
                    <div class="row w-100 mb-8 mb-md-10">
                        <div class="col-12">

                            <div class="top_matches__content">


                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-6">

                                            @if($errors->any())
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if($errors->has('error'))
                                                <div class="alert alert-danger">
                                                    {{ $errors->first('message') }}
                                                </div>
                                            @endif

                                            <form action="{{ route('verifyPost') }}" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="code">Enter Verification Code provided during
                                                        registration</label>
                                                    <br>
                                                    <input type="text" class="form-control" name="code" id="code"
                                                        placeholder="Enter code">
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-primary">Verify Code</button>
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal">Get Code</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>


                    </div>



                </div>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" data-bs-theme="dark"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dark">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Join premium team</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <!-- First form-group row for selecting matches -->
                    <div class="form-group row">
                        <label for="exampleSelect" class="form-label">Select Match</label>
                        <div class="container">
                            <div class="row row-cols-1 row-cols-md-2 g-4">
                                <div class="col">
                                    <div class="card h-100 match-card" onclick="highlightCard(this)">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: black">Correct score</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 match-card" onclick="highlightCard(this)">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: black">Htft</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="form-group row">
                        <label for="exampleSelect" class="form-label">Select Duration</label>
                        <div class="container">
                            <div class="row row-cols-1 row-cols-md-3 g-4">
                                <div class="col">
                                    <div class="card h-100 duration-card" onclick="highlightDurationCard(this)">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: black">1 Week</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 duration-card" onclick="highlightDurationCard(this)">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: black">1 Month</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card h-100 duration-card" onclick="highlightDurationCard(this)">
                                        <div class="card-body">
                                            <h5 class="card-title" style="color: black">3 Months</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" id="proceed" class="btn btn-primary">Proceed</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="selectionModal" tabindex="-1" aria-labelledby="selectionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark text-light">
            <div class="modal-header">
                <h5 class="modal-title" id="selectionModalLabel">Complete payments</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Selected Match: <span id="selectedMatch" class="text-light"></span></p>
                <p>Selected Duration: <span id="selectedDuration" class="text-light"></span></p>
                <p>Payment Amount: <span id="paymentAmount" class="text-light"></span></p>

                <h5>MPESA Payment Procedure</h5>
                <div class="container mt-5">
                    <form id="mpesaForm">
                        @csrf
                        <div class="form-group">
                            <label for="mobileNumber">Mobile Number: <code>254798600470</code></label>
                            <input type="tel" class="form-control" pattern="[0-9]{12}" id="mobileNumber"
                                placeholder="254798600470" required>
                            <input type="hidden" value="" id="paymenta">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

                    <p>If you encounter any issues or have questions, please contact customer support for assistance.
                    </p>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var mpesaForm = document.getElementById('mpesaForm');

            mpesaForm.addEventListener('submit', function (event) {
                event.preventDefault(); // Prevent default form submission

                var mobileNumber = document.getElementById('mobileNumber').value;
                var selectedMatchValue = document.getElementById('selectedMatch').textContent;
                var selectedMatchAmount = document.getElementById('paymentAmount').textContent;
                var stringWithoutComma = selectedMatchAmount.replace(/,/g, ''); // Remove all commas
                var selectedMatchAmountInt = parseInt(stringWithoutComma);
                // var selectedMatchAmountInt = parseInt(selectedMatchAmount);
                var account = "";

                if (selectedMatchValue === "Correct score") {
                    account += "cs#";
                } else {
                    account += "ht#";
                }

                var durationSelected = document.getElementById('selectedDuration');

                if (durationSelected.textContent.trim() === "1 Week") {
                    account += "1w#";
                } else if (durationSelected.textContent.trim() === "1 Month") {
                    account += "1m#";
                } else if (durationSelected.textContent.trim() === "3 Months") {
                    account += "3m#";
                }

                account += mobileNumber;


                console.log(account);

                // AJAX POST request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', 'api/v1/stk');
                xhr.setRequestHeader('Content-Type', 'application/json');

                xhr.onload = function () {
                    if (xhr.status === 200) {
                        var responseData = JSON.parse(xhr.responseText);
                        console.log('Response:', xhr.responseText);
                        if (responseData.ResponseDescription ===
                            "Success. Request accepted for processing") {
                            // Show SweetAlert
                            Swal.fire({
                                title: "Success",
                                text: responseData.ResponseDescription,
                                icon: "success"
                            });
                        } else {
                            // Show SweetAlert for other cases
                            Swal.fire({
                                title: "Error",
                                text: responseData.ResponseDescription,
                                icon: "error"
                            });
                        }
                        console.log('POST request successful');
                        console.log('Response:', xhr.responseText);
                        // You can handle the response here
                    } else {
                        console.error('POST request failed');
                        console.error('Error:', xhr.statusText);
                    }
                };

                xhr.onerror = function () {
                    console.error('POST request failed');
                    console.error('Error:', xhr.statusText);
                };

                var data = JSON.stringify({
                    phone: mobileNumber,
                    account: account,
                    amount: selectedMatchAmountInt
                });

                xhr.send(data);
            });
        });

        function highlightCard(card) {
            // Remove highlight from all cards
            let allCards = document.querySelectorAll('.card');
            allCards.forEach(function (card) {
                card.classList.remove('highlight-card');
            });

            // Highlight the clicked card
            card.classList.add('highlight-card');
        }


        function highlightDurationCard(durationCard) {
            // Remove highlight from all Duration cards
            let durationCards = document.querySelectorAll('.duration-card');
            durationCards.forEach(function (card) {
                card.classList.remove('highlight-card');
            });

            // Highlight the clicked Duration card
            durationCard.classList.add('highlight-card');
        }

        function validateSelections() {
            // Check if both match and duration selections are filled
            let matchSelected = document.querySelector('.match-card.highlight-card');
            let durationSelected = document.querySelector('.duration-card.highlight-card');

            if (matchSelected && durationSelected) {

                document.getElementById('selectedMatch').innerText = matchSelected.textContent.trim();
                document.getElementById('selectedDuration').innerText = durationSelected.textContent.trim();

                if (durationSelected.textContent.trim() == "1 Week") {
                    document.getElementById('paymentAmount').innerText = "3,500";
                    document.getElementById('paymenta').innerText = "3,500";


                } else if (durationSelected.textContent.trim() == "1 Month") {
                    document.getElementById('paymentAmount').innerText = "7,500";
                    document.getElementById('paymenta').innerText = "7,500";
                } else if (durationSelected.textContent.trim() == "3 Months") {
                    document.getElementById('paymentAmount').innerText = "15,500";
                    document.getElementById('paymenta').innerText = "15,500";
                }

                // Show the modal
                var myModal = new bootstrap.Modal(document.getElementById('selectionModal'), {});
                myModal.show();
                // Both selections are filled, proceed with further action
                //   alert("Match: " + matchSelected.textContent.trim() + ", Duration: " + durationSelected.textContent.trim());

            } else {
                // If any of the selections is not filled, show an alert
                alert("Please select both a match and a duration.");
            }
        }

        document.getElementById('proceed').addEventListener('click', validateSelections);

    </script>



    @endsection
