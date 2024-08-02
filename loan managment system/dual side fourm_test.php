<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- Bootstrap DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />

    <!-- Alertify CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Your custom CSS files and other includes -->



    <title>Manage Loan Plan</title>
</head>
<body>

    <!-- navigation area -->
    <?php include('nav.php'); ?>

 


<div class="container mt-4">
    <div class="row">

      <div class="col-md-12">
         <div class="card">
            <div class="body">
              <div class="card-title">
                <h4 class="text-center"> Manage Loan Plans </h4>
            </div>
            <div class="card-body">
             <table id="myTable" class="table table-hover table-bordered table">
                <thead>

                    <tr>
                        <th>ID number</th>
                        <th>Name</th>
                        <th>Loan interest (%)</th>
                        <th>Over Due rate (%)</th>
                        <th>discription</th>
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
                                <td><?= $plan['id'] ?></td>
                                <td><?= $plan['name'] ?></td>
                                <td><?= $plan['interest'] ?></td>
                                <td><?= $plan['rate'] ?></td>
                                <td><?= $plan['discription'] ?></td>

                                <td>
                                    <button type="button" value="<?=$plan['id'];?>" class="editPlanBtn btn btn-success btn-sm">
                                        <i class="fa fa-pen"></i> 
                                    </button>
                                    <button type="button" value="<?=$borrower['id'];?>" class="deleteBorrowerBtn btn btn-danger btn-sm">
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
<br>


<!-- Add new plan fourm -->
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <form id="savePlan">
                <div class="card-body">
                    <h5 class="card-title">Add New Loan Plan</h5>
                    <div class="mb-3">
                        <br>
                        <label for="" class="form-label">Plan Name</label>
                        <input type="text" class="form-control" id="" name="name" placeholder="Enter loan plan name">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Loan interest</label>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" id="" name="interset" placeholder="interest" aria-label="interest" aria-describedby="addon-wrapping">
                            <span class="input-group-text" id="addon-wrapping">%</span>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Over Due rate</label>
                        <div class="input-group flex-nowrap">
                            <input type="text" class="form-control" id="rate" placeholder="interest" aria-label="interest" aria-describedby="addon-wrapping">
                            <span class="input-group-text" id="addon-wrapping">%</span>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="discription" class="form-label">discription</label>
                        <textarea class="form-control" id="discription" rows="3"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<!-- Alertify JavaScript -->
<script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

<!-- DataTables JavaScript -->
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<!-- Your custom JavaScript files and scripts -->


<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
});
</script>
<!--end of the data table-->





</body>




</html>