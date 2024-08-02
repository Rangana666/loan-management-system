<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <title>Loan Plans</title>

    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    <?php include('nav.php'); ?>

    <!-- Add plan -->
    <div class="modal fade" id="planaddmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveplan">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>

                        <div class="col-md-12">
                            <label for="" class="form-lable">Name</label>
                            <input type="text" name="plan_name" class="form-control" />
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-lable">interest</label>
                            <input type="text" name="interest" class="form-control" />
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-lable">rate</label>
                            <input type="text" name="rate" class="form-control" />
                        </div>

                        <div class="col-md-12">
                            <label for="" class="form-lable">Coment</label>
                            <input type="text" name="discription" class="form-control" />
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

    <!-- Edit plan Modal -->
    <div class="modal fade" id="planeditmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit plan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                  <form id="updateplan">
                    <div class="modal-body">

                        <div id="errorMessageUpdate" class="alert alert-warning d-none"></div>

                        <input type="hidden" name="plan_id" id="plan_id" >

                        <div class="col-md-12">
                            <label for="" class="form-lable">Name</label>
                            <input type="text" name="plan_name" id="plan_name" class="form-control" />
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-lable">interest</label>
                            <input type="text" name="interest" id="interest" class="form-control" />
                        </div>
                         <div class="col-md-12">
                            <label for="" class="form-lable">rate</label>
                            <input type="text" name="rate" id="rate" class="form-control" />
                        </div>
                        <div class="col-md-12">
                            <label for="" class="form-lable">Comment</label>
                            <input type="text" name="discription" id="discription" class="form-control" />
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

<!-- View plan Modal -->
<div class="modal fade" id="planviewmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                    <label for="" class="form-lable">Loan Interest</label>
                    <p id="view_interest" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">Over Due Rate</label>
                    <p id="view_rate" class="form-control"></p>
                </div>
                <div class="col-md-12">
                    <label for="" class="form-lable">Comment</label>
                    <p id="view_discription" class="form-control"></p>
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
                    <h4>Manage Plans

                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#planaddmodal">
                            Add Plans
                        </button>
                    </h4>
                </div>
                <div class="card-body">
                 <div class="table-responsive">

                    <table id="myTable" class="table table-hover table-bordered table">
                        <thead>

                            <tr>
                           
                                <th>Plan Name</th>
                                <th>Loan Interest</th>
                                <th>Over Due rate</th>
                                <th>Comment</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                require 'dbcon.php';

                                $query = "SELECT * FROM loan_plan";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $plan)
                                    {
                                    ?>
                                    <tr>
                                        
                                        <td><?= $plan['plan_name'] ?></td>
                                        <td><?= $plan['interest'] ?></td>
                                        <td><?= $plan['rate'] ?></td>
                                        <td><?= $plan['discription'] ?></td>
                                       
                                        <td>
                                            <button type="button" value="<?=$plan['id'];?>" class="viewplanbtn btn btn-info btn-sm">
                                                <i class="fa fa-eye"></i> 
                                            </button>
                                            <button type="button" value="<?=$plan['id'];?>" class="editplanbtn btn btn-success btn-sm">
                                                <i class="fa fa-pen"></i> 
                                            </button>
                                            <button type="button" value="<?=$plan['id'];?>" class="deleteplanbtn btn btn-danger btn-sm">
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
  $(document).ready( function () {
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


<!-- end of the uper dashboard profile script -->


<!--  end of the data table -->



<script>
    $(document).on('submit', '#saveplan', function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("save_plan", true); //ichange it update_plan

        $.ajax({
            type: "POST",
            url: "loan_plandb.php",
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
                    $('#planaddmodal').modal('hide');
                    $('#saveplan')[0].reset();

                    alertify.set('notifier','position', 'top-right');
                    alertify.success(res.message);

                    $('#myTable').load(location.href + " #myTable");

                }else if(res.status == 500) {
                    alert(res.message);
                }
            }
        });

    });

    $(document).on('click', '.editplanbtn', function () {

        var plan_id = $(this).val();

        $.ajax({
            type: "GET",
            url: "loan_plandb.php?plan_id=" + plan_id,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if(res.status == 404) {

                    alert(res.message);
                }else if(res.status == 200){

                    $('#plan_id').val(res.data.id);
                    $('#plan_name').val(res.data.plan_name);
                    $('#interest').val(res.data.interest);
                    $('#rate').val(res.data.rate);
                    $('#discription').val(res.data.discription);


                    $('#planeditmodal').modal('show');
                }

            }
        });

    });

    $(document).on('submit', '#updateplan', function (e) {     // i change it
        e.preventDefault();

        var formData = new FormData(this);
        formData.append("update_plan", true);

        $.ajax({
            type: "POST",
            url: "loan_plandb.php",
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

                    $('#planeditmodal').modal('hide');
                    $('#updateplan')[0].reset();

                    $('#myTable').load(location.href + " #myTable");

                }else if(res.status == 500) {
                    alert(res.message);
                }
            }
        });

    });

    $(document).on('click', '.viewplanbtn', function () {

        var plan_id = $(this).val();
        $.ajax({
            type: "GET",
            url: "loan_plandb.php?plan_id=" + plan_id,
            success: function (response) {

                var res = jQuery.parseJSON(response);
                if(res.status == 404) {

                    alert(res.message);
                }else if(res.status == 200){

                    
                    $('#view_name').text(res.data.plan_name);
                    $('#view_interest').text(res.data.interest);
                    $('#view_rate').text(res.data.rate);
                    $('#view_discription').text(res.data.discription);

                    $('#planviewmodal').modal('show');
                }
            }
        });
    });

    $(document).on('click', '.deleteplanbtn', function (e) {
        e.preventDefault();

        if(confirm('Are you sure you want to delete this data?'))
        {
            var plan_id = $(this).val();
            $.ajax({
                type: "POST",
                url: "loan_plandb.php",
                data: {
                    'delete_plan': true,
                    'plan_id': plan_id
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


</body>
<footer>
        <p>&copy; 2023 codebank software solution. All rights reserved.</p>
    </footer>
</html>