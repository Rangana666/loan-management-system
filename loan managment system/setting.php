<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>

        .main-body {
            padding: 15px;
        }

        .nav-link {
            color: #4a5568;
        }
        .card {
            box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
        }

        .card {
            position: relative;
            display: flex;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0 solid rgba(0,0,0,.125);
            border-radius: .25rem;
        }

        .card-body {
            flex: 1 1 auto;
            min-height: 1px;
            padding: 1rem;
        }

        .gutters-sm {
            margin-right: -8px;
            margin-left: -8px;
        }

        .gutters-sm>.col, .gutters-sm>[class*=col-] {
            padding-right: 8px;
            padding-left: 8px;
        }
        .mb-3, .my-3 {
            margin-bottom: 1rem!important;
        }

        .bg-gray-300 {
            background-color: #e2e8f0;
        }
        .h-100 {
            height: 100%!important;
        }
        .shadow-none {
            box-shadow: none!important;
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


    <title> setting</title>
</head>

<body>

    <!-- navigation area start -->
    <?php include_once('nav.php') ?>
    <!-- /#navigation area end -->


    <!--##################################################################################################################################################-->
    <div class="container-fluid ">

        <div class="tab-pane" id="security">
             <?php   
                            require('db_connect.php');
                            $query = "SELECT * FROM admin";
                            $result = mysqli_query($conn , $query);

                            if (mysqli_num_rows($result) > 0) {
                                foreach($result as $admin){
                                    ?>
            <h6>SECURITY SETTINGS</h6>
            <div class="position-fixed top-0 end-0 p-3" style="z-index: 5">
        <div id="importSuccessToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Success</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                Database update successful!
            </div>
        </div>
    </div>

            <hr>
            <form class="row g-3 needs-validation" novalidate method="post" action="user_pass.php">
              <div class="form-group">
                <label class="d-block">Change User & Password</label>
                <input type="hidden" name="admin_id" value="<?php echo $admin['id']; ?>">
                <input type="text" class="form-control" value="<?php echo $admin['uname']; ?>" name="uname">
                <input type="password" class="form-control mt-1" placeholder="enter new password" name="pass">
                <button class="btn btn-info float-end mt-1" type="submit" name="update">update</button>
                <p class="small text-muted mt-2">use storng password for more securuty.</p>

            </div>
        </form>
                      <?php 
                }
            }
            ?>
        <hr>
        
        <form>
          <div class="form-group">
            <label class="d-block">Make Backup</label>
            <button id="exportButton" class="btn btn-info" type="button">Backup</button>
            <p class="small text-muted mt-2">make a backup and if you face any tarable then you can easily restore your system without data losing.</p>
        </div>
    </form>
    <hr>
    <form method="post" action="import.php" enctype="multipart/form-data">
      <div class="form-group mb-0">
        <label class="d-block" for="import_file" >Import Backup</label>
        <input type="file" name="import_file" id="import_file" accept=".sql" required>
         <br>
        <button class="btn btn-primary mt-2" type="submit">Import</button>
        <p class="font-size-sm text-secondary">make shure before import sql file backup your database</p>




<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Check if the session variable is set
        <?php if (isset($_SESSION['import_success']) && $_SESSION['import_success']) { ?>
            // Show the Bootstrap Toast
            var toast = new bootstrap.Toast(document.getElementById('importSuccessToast'));
            toast.show();

            // Clear the session variable
            <?php unset($_SESSION['import_success']); ?>
        <?php } ?>
    });
</script>

     


<?php require('db_connect.php'); ?>

  <script>
        (() => {
          'use strict'
          const forms = document.querySelectorAll('.needs-validation')
          Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
        })
      })()
  </script>

</div>
</form>
</div>
</div>


<!--##################################################################################################################################################-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="export.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!--<footer>
        <p>&copy; 2023 codebank software solution. All rights reserved.</p>
    </footer>-->

</body>
<footer>
        <p>&copy; 2023 codebank software solution. All rights reserved.</p>
    </footer>

</html>
