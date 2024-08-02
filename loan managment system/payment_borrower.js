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
            url: 'get_latest_pay_date.php',
            dataType: "json",
            data: dataString,
            cache: false,
            success: function (paymentData) {
                console.log("Payment Data:", paymentData);

                if (paymentData.pay_date !== null) {
                    // Display the latest pay_date in the specified area
                    $("#loanStartDate").val(paymentData.pay_date);
                } else {
                    // Handle case when no payment details are found
                    console.log("No payment details found for the selected borrower.");
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

                    // Fetch totalPayment from the loan table
                    $.ajax({
    url: 'calculate_total_payment.php',
    dataType: "json",
    data: dataString,
    cache: false,
    success: function (totalPaymentData) {
        if (totalPaymentData.total_payment !== null) {
            // Display the total payment in the specified area
            $("#total_payment").val(totalPaymentData.total_payment);
        } else {
            console.log("No total payment details found for the selected borrower.");
        }
    },
    error: function (xhr, status, error) {
        console.error("Error fetching total payment:", error);
    }
});
                    // Fetch remaining payment and remaining installments
                    $.ajax({
                        url: 'get_remaining_payment_and_installments.php',
                        dataType: "json",
                        data: dataString,
                        cache: false,
                        success: function (remainingData) {
                            if (remainingData.remaining_payment !== null) {
                                // Display the remaining payment in the specified area
                                $("#remaning_payment").val(remainingData.remaining_payment);
                            } else {
                                console.log("No remaining payment details found for the selected borrower.");
                            }

                            if (remainingData.remaining_installments !== null) {
                                // Display the remaining installments in the specified area
                                $("#remaning_intallment").val(remainingData.remaining_installments);
                            } else {
                                console.log("No remaining installments details found for the selected borrower.");
                            }
                        },
                        error: function (xhr, status, error) {
                            console.error("Error fetching remaining payment and installments:", error);
                        }
                    });
                } else {
                    // Handle case when no loan details are found
                    alert("No loan details found for the selected borrower.");
                }
            }
        });
    });

});
