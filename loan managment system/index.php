

<?php require('db_connect.php'); ?>
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



<div class="carousel-container">
   <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
       <!-- ... (carousel items and controls) ... -->
   </div>
</div>

    <title> Dashboard</title>
</head>

<body>

    <!-- navigation area start -->

    <?php include_once('nav.php') ?>

    <!-- /#navigation area end -->

                <br>
                <br>
      
    <div class="container-fluid px-4">
        <div class="row g-3 my-2">
            <div class="col-md-3">

                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2">
                        <?php
                        $query = "SELECT * FROM borrowers";
                        $result = mysqli_query($conn, $query);

                        if ($borrowers = mysqli_num_rows($result)) {
                            echo '<h4 class="mb-0">' . $borrowers . '</h4>';
                        } else {
                            echo '<h4 class="mb-0">No data</h4>';
                        }
                        ?></h3>
                        <p class="fs-5">Total Borrowers</p>
                    </div>
                    <i class="fas fa-users fs-1 primary-text border rounded-full secondary-bg p-4"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                            <h3 class="fs-2">
                        <?php
                        $query = "SELECT * FROM loan_plan";
                        $result = mysqli_query($conn, $query);

                        if ($plans = mysqli_num_rows($result)) {
                            echo '<h4 class="mb-0">' . $plans . '</h4>';
                        } else {
                            echo '<h4 class="mb-0">No data</h4>';
                        }
                        ?></h3>
                        <p class="fs-5">Total Loan Plans</p>
                    </div>
                    <i class="fas fa-pen fs-1 primary-text border rounded-full secondary-bg p-4"></i>
                </div>
            </div>

            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?php
                        $query = "SELECT * FROM loan WHERE status = 1";
                        $result = mysqli_query($conn, $query);

                        if ($status = mysqli_num_rows($result)) {
                            echo '<h4 class="mb-0">' . $status . '</h4>';
                        } else {
                            echo '<h4 class="mb-0">No data</h4>';
                        }
                        ?></h3>
                        <p class="fs-5">Total Release Loans</p>
                    </div>
                     <i class="fas fa-money-bill fs-1 primary-text border rounded-full secondary-bg p-4"></i>
                </div>
            </div>



            <div class="col-md-3">
                <div class="p-3 bg-white shadow-sm d-flex justify-content-around align-items-center rounded">
                    <div>
                        <h3 class="fs-2"><?php
                        $query = "SELECT * FROM loan WHERE status = 0";
                        $result = mysqli_query($conn, $query);

                        if ($status = mysqli_num_rows($result)) {
                            echo '<h4 class="mb-0">' . $status . '</h4>';
                        } else {
                            echo '<h4 class="mb-0">No data</h4>';
                        }
                        ?></h3>
                        <p class="fs-5">Total Colsed Loans</p>
                    </div>
                    <i class="fas fa-sack-dollar fs-1 primary-text border rounded-full secondary-bg p-4"></i>
                </div>
            </div>
        </div>
   
        <div class="row my-5">
          
              <?php  include_once('datbase backup option/server_info.php'); ?>
            <!--<h3 class="fs-4 mb-3">graphs</h3>-->
          
              <div class="carousel-container">
              <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active" data-bs-interval="2500">
      <img src="https://www.idfcfirstbank.com/content/dam/idfcfirstbank/images/blog/blog-images-717x404-4.jpg" class="d-block w-100" alt="..." style="height: 600px;" >
    </div>
    <div class="carousel-item" data-bs-interval="2500">
      <img src="https://d2kqv7ctx0fiz9.cloudfront.net/wp-content/uploads/2019/06/5-plans-where-you-need-personal-loans.jpg" class="d-block w-100" alt="..." style="height: 600px;">
    </div>
    <div class="carousel-item"data-bs-interval="2500">
      <img src="https://www.idfcfirstbank.com/content/dam/idfcfirstbank/images/blog/personal-loan/5-ways-you-can-use-a-personal-loan-for-career-development-717x404.jpg" class="d-block w-100" alt="..." style="height: 600px;">
    </div>
    <div class="carousel-item"data-bs-interval="2500">
      <img src="https://www.wionews.com/iifl/wp-content/uploads/2022/12/Business-Loan.jpg" class="d-block w-100" alt="..." style="height: 600px;">
    </div>
    <div class="carousel-item"data-bs-interval="2500">
      <img src="https://gray-wfsb-prod.cdn.arcpublishing.com/resizer/wJr6V248Dw6jPC7PWliERtnDYSM=/1200x675/smart/filters:quality(85)/cloudfront-us-east-1.images.arcpublishing.com/gray/3GWFIVWP2BEZTFQBD5PQ5KVZEY.jpg" class="d-block w-100" alt="..." style="height: 600px;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div> 
</div>


    </div>
    </div>

    <!-- /#page-content-wrapper -->

    </div>

<!-- uper dashboard profile script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>

<footer>
        <p>&copy; 2023 codebank software solution. All rights reserved.</p>
    </footer>

</body>
    
</html>



