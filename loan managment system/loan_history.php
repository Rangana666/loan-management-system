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

    <title>Loan history</title>
       <style>
    footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        background-color: #f5f5f5; /* Change the background color as needed */
        text-align: center;
        padding: 10px;
    }
</style>
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
                        <h4>Loans Hostory
                            <!--<a href="make_loan.php" class="btn btn-primary float-end"> Make Loan</a>-->
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
                                        <th>Loan End Date</th>
                                        <th>Sammery</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require 'dbcon.php';

                                    $query = "SELECT * FROM loan WHERE status=0";
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $loan) {
                                            ?>
                                            <tr>
                                                <td><?= $loan['borrower_id'] ?></td>
                                                <td><?= $loan['loan_amount'] ?></td>
                                                <td><?= $loan['interest_rate'] ?></td>
                                                <td><?= $loan['months'] ?></td>
                                                <td><?= $loan['loanEndDate'] ?></td>
                                                <td>
                                                       <button type="button" value="<?= $loan['id']; ?>" class="view_sumeerybtn btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#SammeryModal">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button type="button" value="<?= $loan['id']; ?>" class="deletesummarybtn btn btn-danger btn-sm">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
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


 <script>
    
$(document).on('click', '.view_sumeerybtn', function () {
    var loan_id = $(this).val();

    $.ajax({
    type: "GET",
    url: "loan_historydb.php",
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

<script>
        $(document).on('click', '.deletesummarybtn', function (e) {
        e.preventDefault();

        if(confirm('Are you sure you want to delete this loan summary?'))
        {
            var loan_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "loan_historydb.php",
                data: {
                    'delete_summary': true,
                    'loan_id': loan_id
                },
                success: function (response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 500) {

                        alert(res.message);
                    }else{
                        alertify.set('notifier','position', 'top-right');
                        alertify.success(res.message);

                        $('#myTable').load(location.href + " #myTable");
                    }
                }
            });
        }
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
</body>
<footer>
        <p>&copy; 2023 codebank software solution. All rights reserved.</p>
    </footer>

</html>
