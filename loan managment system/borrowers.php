
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <title>Borrowers</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

    <?php include('nav.php'); ?>

    <!-- Add borrower -->
    <div class="modal fade" id="borrowerAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Borrower</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveBorrower">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="col-md-12">
                            <label for="" class="form-lable">Name</label>
                            <input type="text" name="name" class="form-control" />
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-lable">Address</label>
                            <input type="text" name="address" class="form-control" />
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-lable">contact</label>
                            <input type="text" name="contact" class="form-control" />
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-lable">Id number</label>
                            <input type="text" name="b_id" class="form-control" />
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-lable">Fist Garanter</label>
                            <input type="text" name="garanter1" class="form-control" />
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-lable">Second Garanter</label>
                            <input type="text" name="garanter2" class="form-control" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Borrower Modal -->
    <div class="modal fade" id="borrowerEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Borrower</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateBorrower">
                    <div class="modal-body">

                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                        <input type="hidden" name="borrower_id" id="borrower_id" >

                        <div class="col-md-12">
                            <label for="" class="form-lable">Name</label>
                            <input type="text" name="name" id="name" class="form-control" />
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-lable">address</label>
                            <input type="text" name="address" id="address" class="form-control" />
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-lable">Contact</label>
                            <input type="text" name="contact" id="contact" class="form-control" />
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-lable">Id number</label>
                            <input type="text" name="id" id="b_id" class="form-control" /> <!-- Change 'id' to 'b_id' here -->
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-lable">Fist Garanter</label>
                            <input type="text" name="garanter1" id="garanter1" class="form-control" />
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-lable">Second Garanter</label>
                            <input type="text" name="garanter2" id="garanter2" class="form-control" />
                        </div>
                        <div class="col-md-4">
                          <label for="datepicker" class="form-label">Date</label>
                          <div class="input-group date" id="datepicker">
                            <input type="text" class="form-control" name="dates"  id="dates" required>
                            <span class="input-group-append">
                              <span class="input-group-text bg-white d-block">
                                <i class="fa fa-calendar"></i>
                            </span>
                        </span>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update Borrower</button>
            </div>
        </form>
    </div>
</div>
    </div>

    <!-- View Borrower Modal -->
    <div class="modal fade" id="BorrowerViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Borrower</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <label for="" class="form-lable">Name</label>
                    <p id="view_name" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">address</label>
                    <p id="view_address" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">contact</label>
                    <p id="view_contact" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">id number</label>
                    <p id="view_id" class="form-control"></p>
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
                    <label for="" class="form-lable">Created Date</label>
                    <p id="view_dates" class="form-control"></p>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Manage Borrowers
                            <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#borrowerAddModal">
                                Add Borrower
                            </button>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-hover table-bordered table">
                                <thead>
                                    <tr>
                                        <th>ID number</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Fist Garanter</th>
                                        <th>Second Garanter</th>
                                        <th>Created Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    require 'dbcon.php';

                                    $query = "SELECT * FROM borrowers";
                                    $query_run = mysqli_query($con, $query);

                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $borrower) {
                                            ?>
                                            <tr>
                                                <td><?= $borrower['b_id'] ?></td>
                                                <td><?= $borrower['name'] ?></td>
                                                <td><?= $borrower['address'] ?></td>
                                                <td><?= $borrower['contact'] ?></td>
                                                <td><?= $borrower['garanter1'] ?></td>
                                                <td><?= $borrower['garanter2'] ?></td>
                                                <td><?= $borrower['dates'] ?></td>
                                                <td>
                                                    <?php
                                                    $borrowerId = $borrower['b_id'];
                                                    $query_loan = "SELECT * FROM loan WHERE borrower_id = '$borrowerId'";
                                                    $result_loan = mysqli_query($con, $query_loan);

                                                    $allRowsDisconnected = true;

                                                    while ($loan = mysqli_fetch_assoc($result_loan)) {
                                                        $status = $loan['status'];

                                                        if ($status > 0) {
                                                            $allRowsDisconnected = false;
                                                            break;
                                                        }
                                                    }

                                                    if ($allRowsDisconnected) {
                                                        echo '<img src="offline.png" alt="Disconnect" width="60" height="20">';
                                                    } else {
                                                        echo '<img src="online.png" alt="Online" width="60" height="20">';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <button type="button" value="<?= $borrower['b_id']; ?>" class="viewBorrowerBtn btn btn-info btn-sm">
                                                        <i class="fa fa-eye"></i>
                                                    </button>
                                                    <button type="button" value="<?= $borrower['b_id']; ?>" class="editBorrowerBtn btn btn-success btn-sm">
                                                        <i class="fa fa-pen"></i>
                                                    </button>
                                                    <button type="button" value="<?= $borrower['b_id']; ?>" class="deleteBorrowerBtn btn btn-danger btn-sm">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- data table script -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
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

<!-- Calander script -->
<?php include('calander_scrip.php'); ?>
<!-- End of the calander script -->

<script>
    $(document).on('submit', '#saveBorrower', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_borrower", true);

        $.ajax({
            type: "POST",
            url: "code.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if(res.status == 422) {
                    $('#errorMessage').removeClass('d-none');
                    $('#errorMessage').text(res.message);

                }else if(res.status == 200){

                    $('#errorMessage').addClass('d-none');
                    $('#borrowerAddModal').modal('hide');
                    $('#saveBorrower')[0].reset();

                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);

                    $('#myTable').load(location.href + " #myTable");

                }else if(res.status == 500) {
                    alert(res.message);
                }
            }
        });

    });
    $(document).on('click', '.editBorrowerBtn', function () {

        var borrower_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "code.php?borrower_id=" + borrower_id,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if (res.status == 404) {

                    alert(res.message);
                } else if (res.status == 200) {

                    $('#borrower_id').val(res.data.b_id); // Change 'id' to 'b_id'
                    $('#b_id').val(res.data.b_id); // Change 'id' to 'b_id'
                    $('#name').val(res.data.name);
                    $('#address').val(res.data.address);
                    $('#contact').val(res.data.contact);
                    $('#garanter1').val(res.data.garanter1);
                    $('#garanter2').val(res.data.garanter2);
                    $('#dates').val(res.data.dates);

                    $('#borrowerEditModal').modal('show');
                }

            }
        });

    });

    $(document).on('submit', '#updateBorrower', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("update_borrower", true);

        $.ajax({
            type: "POST",
            url: "code.php",
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if(res.status == 422) {
                    $('#errorMessageUpdate').removeClass('d-none');
                    $('#errorMessageUpdate').text(res.message);

                }else if(res.status == 200){

                    $('#errorMessageUpdate').addClass('d-none');

                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);

                    $('#borrowerEditModal').modal('hide');
                    $('#updateBorrower')[0].reset();

                    $('#myTable').load(location.href + " #myTable");

                }else if(res.status == 500) {
                    alert(res.message);
                }
            }
        });

    });

    $(document).on('click', '.viewBorrowerBtn', function () {

        var borrower_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "code.php?borrower_id=" + borrower_id,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if(res.status == 404) {

                    alert(res.message);
                }else if(res.status == 200){

                    $('#view_id').text(res.data.b_id);
                    $('#view_name').text(res.data.name);
                    $('#view_address').text(res.data.address);
                    $('#view_contact').text(res.data.contact);
                    $('#view_garanter1').text(res.data.garanter1);
                    $('#view_garanter2').text(res.data.garanter2);
                    $('#view_dates').text(res.data.dates);

                    $('#BorrowerViewModal').modal('show');
                }
            }
        });
    });

    $(document).on('click', '.deleteBorrowerBtn', function (e) {
        e.preventDefault();

        if(confirm('Are you sure you want to delete this borrower?'))
        {
            var borrower_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    'delete_borrower': true,
                    'borrower_id': borrower_id
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


<footer>
        <p>&copy; 2023 codebank software solution. All rights reserved.</p>
    </footer>


</body>

</html>

