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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <title>Payment history</title>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Finished Summary Report</h1>
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
                    <h4>Payment Hostory
                        <!--<a href="make_loan.php" class="btn btn-primary float-end"> Make Loan</a>-->
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-hover table-bordered table">
                            <thead>
                                <tr>
                                    <th>ID number</th>
                                    <th>Payment Amount</th>
                                    <th>Last Payment Date</th>
                                    <th>Sammery</th>
                                </tr>
                            </thead>
                            <tbody>
                             <?php
                             require('db_connect.php');

                             $query = "SELECT * FROM payment ORDER BY pay_date DESC";
                             $query_run = mysqli_query($conn, $query);

                             if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $payment) {
                                    ?>
                                    <tr>
                                        <td><?= $payment['borrower_id'] ?></td>
                                        <td><?= $payment['payment'] ?></td>
                                        <td><?= $payment['pay_date'] ?></td>
                                        <td>
                                            <!--<button type="button" value="<?= $payment['id']; ?>" class="view_sumeerybtn btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#SammeryModal">
                                                <i class="fa fa-eye"></i>
                                            </button>-->
                                            <button type="button" class="btn btn-danger btn-sm delete-payment-btn" data-payment-id="<?= $payment['id'] ?>"><i class="fa fa-trash"></i></button>

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

<script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<script>
    $(document).ready(function () {
    // Load payments on page load
        loadPayments();

    // Function to load payment records
        function loadPayments() {
            $.ajax({
                type: "GET",
                url: "get_payments.php",
                success: function (response) {
                    $("#myTable tbody").html(response);
                }
            });
        }

    // Event listener for delete buttons
        $(document).on('click', '.delete-payment-btn', function (e) {
            e.preventDefault();

            var paymentId = $(this).data('payment-id');

            if (confirm('Are you sure you want to delete this payment?')) {
                $.ajax({
                    type: "POST",
                    url: "delete_payment.php",
                    data: {'payment_id': paymentId},
                    success: function (response) {
                        var res = JSON.parse(response);
                        alertify.set('notifier', 'position', 'top-right');

                        if (res.status === 200) {
                            alertify.success(res.message);
                        // No need to load payments here, it will be done periodically
                        } else {
                            alertify.error(res.message);
                        }
                    }
                });
            }
        });

    // Periodically load payments every 5 seconds (adjust the interval as needed)
        setInterval(loadPayments, 5000);
    });

</script>

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
</body>
<footer>
        <p>&copy; 2023 codebank software solution. All rights reserved.</p>
    </footer>
</html>
