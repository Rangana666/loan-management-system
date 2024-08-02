<?php require('db_connect.php'); ?>
<?php require('view_loansdb.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />

    <style>
        .custom-margin {
            margin-right: 20px; /* Adjust the value as needed */
        }
    </style>

    <style>
     /* Add your custom styles here */
     body {
        font-family: 'Arial', sans-serif;
        background-color: #f8f9fa;
    }

    .pdf-content {
        max-width: 600px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h1 {
        color: #007bff;
    }

    label {
        font-weight: bold;
    }

               footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        background-color: #f5f5f5; /* Change the background color as needed */
        text-align: center;
        padding: 10px;
    }
</style>
</style>
<title> View Loans</title>
</head>

<body>

    <!-- navigation area start -->

    <?php include_once('nav.php') ?>

    <!-- /#navigation area end -->


    <!-- sumarry modal -->
    <div class="modal fade" id="SammeryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title" id="exampleModalLabel">Summery Report</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                   <div class="col-md-12">
                    <label for="" class="form-lable">Name</label>
                    <p id="view_name" class="form-control"></p>
                </div>           
                <div class="col-md-12">
                    <label for="" class="form-lable">Id Number</label>
                    <p id="view_borrower_id" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">contact</label>
                    <p id="view_contact" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">Address</label>
                    <p id="view_address" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">Fist garanter</label>
                    <p id="view_garanter1" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">Second Garanter</label>
                    <p id="view_garanter2" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">Loan Amount (rupees)</label>
                    <p id="view_loanamount" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">Loan interest (%)</label>
                    <p id="view_loaninterest" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">Total Interest (%)</label>
                    <p id="view_totalinterest" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">Total Payment</label>
                    <p id="view_totalpayment" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">Monthly rental</label>
                    <p id="view_rental" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">Loan Start Date</label>
                    <p id="view_sdate" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">Loan End Date</label>
                    <p id="view_edate" class="form-control"></p>
                </div>
                

            </div>
            <div class="modal-footer">
               <button type="button" class="btn btn-primary" id="downloadPdfBtn">Download PDF</button>

               <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
           </div>
       </div>
   </div>
</div>


<!-- start conten area-->
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4>Manage Loans
                    <a href="payment.php" class="btn btn-primary float-end ">Payment</a>
                   <a href="make_loan.php" class="btn btn-primary float-end custom-margin ">Make Loan</a>  
               </h4>
           </div>

           <div class="card-body">
            <div class="table-responsive">
                <table id="myTable" class="table table-hover table-bordered table">
                    <thead>
                        <tr>
                            <th>ID number</th>
                            <th>Loan Amount</th>
                            <th>Loan Iterest (%)</th>
                            <th>Loan Periad (months)</th>
                            <th>Monthly Rental</th>
                            <th>Loan Start Date</th>
                            <th>Loan End Date</th>
                            <th>Sammery</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'dbcon.php';

                        $query = "SELECT * FROM loan WHERE status=1";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            foreach ($query_run as $loan) {
                                ?>
                                <tr>
                                    <td><?= $loan['borrower_id'] ?></td>
                                    <td><?= $loan['loan_amount'] ?></td>
                                    <td><?= $loan['interest_rate'] ?></td>
                                    <td><?= $loan['months'] ?></td>
                                    <td><?= $loan['monthlyPayment'] ?></td>
                                    <td><?= $loan['loan_startdate'] ?></td>
                                    <td><?= $loan['loanEndDate'] ?></td>
                                    <td>
                                        <button type="button" value="<?= $loan['id']; ?>" class="view_sumeerybtn btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#SammeryModal">
                                            <i class="fa fa-eye"></i>
                                        </button>
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-warning dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                Get Action
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <li><button class="dropdown-item close-loan-btn" type="button" data-loan-id="<?= $loan['id']; ?>">                                                         
                                                Close Loan</button></li>
                                                <li><button class="dropdown-item" type="button" onclick="getloan()"> Get Another Loan</button></li>
                                            </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
</div>


<!-- data table script -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        // Initialize DataTable with options
        $('#myTable').DataTable({
            "dom": '<"d-flex justify-content-between"lf>t<"d-flex justify-content-end"ip>',
        });
    });
</script>
<!--end of the data table-->

<!-- action area handling js code -->

<script>
    function getloan() {
        window.location.href = 'make_loan.php';
    }
</script>


<script>
    $(document).ready(function () {
        $('.close-loan-btn').click(function () {
            var loanId = $(this).data('loan-id');
            closeLoan(loanId);
        });
    });

    function closeLoan(loanId) {
        $.ajax({
            url: 'view_loansdb.php', // Change this to your actual PHP file
            method: 'POST',
            data: { 'loan_id': loanId, 'new_status': 0 },
            success: function (response) {
                alert(response); // Display the response from the server
                // Optionally, you can update the UI or do other things based on the response
            },
            error: function () {
                alert('Error updating loan status.');
            }
        });
    }
</script>


<script>

    $(document).on('click', '.view_sumeerybtn', function () {
        var loan_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "view_summeryre.php",
            data: { loan_id: loan_id },
            dataType: "json",
            success: function (response) {
                console.log(response);

                if (response.status == 404) {
                    alert(response.message);
                } else if (response.status == 200) {
                    $('#view_name').text(response.data.name);
                    $('#view_borrower_id').text(response.data.borrower_id);
                    $('#view_contact').text(response.data.contact);
                    $('#view_address').text(response.data.address);
                    $('#view_garanter1').text(response.data.garanter1);
                    $('#view_garanter2').text(response.data.garanter2);
                    $('#view_loanamount').text(response.data.loan_amount);
                    $('#view_loaninterest').text(response.data.interest_rate);
                    $('#view_totalinterest').text(response.data.totalInterest);
                    $('#view_totalpayment').text(response.data.totalPayment);
                    $('#view_rental').text(response.data.monthlyPayment);
                    $('#view_sdate').text(response.data.loan_startdate);
                    $('#view_edate').text(response.data.loanEndDate);
                    $('#SammeryModal').modal('show');
                }
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
                alert('Error: ' + error);
            }
        });
    });


</script>

<!-- uper dashboard profile script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.0/html2pdf.bundle.min.js"></script>


<script>
    $(document).ready(function () {
    // Add click event for the "Download PDF" button
        $('#downloadPdfBtn').click(function () {
            generatePdf();
        });
    });

    function generatePdf() {
    // Open the modal to ensure its content is updated
        $('#SammeryModal').modal('show');

    // Delay PDF generation to ensure the modal is fully rendered
        setTimeout(function () {
        // Create a new HTML structure for the PDF content
            var pdfContent = `

            <!-- PDF Content -->

            <div class="pdf-content">
            <h1>D&P Investment</h1>
            <hr />
            <div class="row">

            <div class="col-md-12">
            <label>Name:</label>
            <p id="view_name"><span>${$('#view_name').text()}</span></p>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <label>ID Number:</label>
            <p id="view_borrower_id"><span>${$('#view_borrower_id').text()}</span></p>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <label>Contact Number:</label>
            <p id="view_contact"><span>${$('#view_contact').text()}</span></p>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <label>Address:</label>
            <p id="view_address"><span>${$('#view_address').text()}</span></p>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <label>Fist Garanter:</label>
            <p id="view_garanter1"><span>${$('#view_garanter1').text()}</span></p>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <label>Second Garanter:</label>
            <p id="view_garanter2"><span>${$('#view_garanter2').text()}</span></p>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <label>Loan Amount (rupees):</label>
            <p id="view_loanamount"><span>${$('#view_loanamount').text()}</span></p>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <label>Loan Interest (%):</label>
            <p id="view_loaninterest"><span>${$('#view_loaninterest').text()}</span></p>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <label>Total Interest (%):</label>
            <p id="view_totalinterest"><span>${$('#view_totalinterest').text()}</span></p>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <label>Total Payment:</label>
            <p id="view_totalpayment"><span>${$('#view_totalpayment').text()}</span></p>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <label>Monthly Rental:</label>
            <p id="view_rental"><span>${$('#view_rental').text()}</span></p>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <label>Loan Start Date:</label>
            <p id="view_sdate"><span>${$('#view_sdate').text()}</span></p>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12">
            <label>Loan End Date:</label>
            <p id="view_edate"><span>${$('#view_edate').text()}</span></p>
            </div>
            </div>
            </div>
            `;

        // Generate PDF with a custom file name
            html2pdf(pdfContent, {
            filename: 'D&P_Investment_User_Summary_Report.pdf', // Set your desired file name here
        });
    }, 500); // You might need to adjust the delay based on your application
    }

</script>


</body>
<footer>
        <p>&copy; 2023 codebank software solution. All rights reserved.</p>
    </footer>

</html>
