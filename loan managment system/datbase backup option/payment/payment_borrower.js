$(document).ready(function () {
    // code to get active borrowers from the loan table via select box
    $.ajax({
        url: 'get_active_borrower.php',
        dataType: "json",
        cache: false,
        success: function (borrowers) {
            if (borrowers.length > 0) {
                // Populate the select box with active borrowers
                $("#borrowers").empty().append('<option value="" selected="selected">Select borrowers Name</option>');
                $.each(borrowers, function (index, borrower) {
                    $("#borrowers").append('<option value="' + borrower.borrower_id + '">' + borrower.b_id + '</option>');
                });
            } else {
                // Handle case when no active borrowers are found
                alert("No active borrowers found.");
            }
        }
    });

    // code to get all records from the loan table when a borrower is selected
    $("#borrowers").change(function () {
        var borrowerId = $(this).find(":selected").val();
        var dataString = 'b_id=' + borrowerId;

        // Get the latest pay_date for the selected borrower
        $.ajax({
            url: 'get_latest_pay_date.php', // Adjust the URL to your actual PHP file
            dataType: "json",
            data: dataString,
            cache: false,
            success: function (paymentData) {
                console.log("Payment Data:", paymentData);

                if (paymentData.pay_date !== null) {
                    // Update the "loanStartDate" input field with the latest pay_date
                    $("#loanStartDate").val(paymentData.pay_date);
                } else {
                    // Handle case when no payment details are found
                    alert("No payment details found for the selected borrower.");
                    // You may want to clear the date field or handle it as needed
                    $("#loanStartDate").val("");
                }
            },
            error: function (xhr, status, error) {
                console.error("Error fetching latest pay_date:", error);
            }
        });

        // Continue with the existing code to get loan details
        $.ajax({
            url: 'paymentdata.php',
            dataType: "json",
            data: dataString,
            cache: false,
            success: function (loanData) {
                if (loanData) {
                    $("#loanAmount").val(loanData.loan_amount);
                    $("#interestRate").val(loanData.interest_rate);
                    $("#numberOfMonths").val(loanData.months);
                    $("#monthlyPayment").val(loanData.monthlyPayment);
                    $("#payment").val(loanData.monthlyPayment);
                } else {
                    // Handle case when no loan details are found
                    alert("No loan details found for the selected borrower.");
                }
            }
        });
    });
});
