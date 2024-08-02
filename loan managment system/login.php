<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

   <style>
    /* Add custom styles for the background image */
    section.vh-100 {
      background: url('https://www.teahub.io/photos/full/35-356146_purple-blue-mix-background.jpg') center center/cover no-repeat;
      backdrop-filter: blur(8px); 
    }
  </style>

</head>
<body>


 <section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem; backdrop-filter: blur(8px);">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="https://www.usatoday.com/web-stories/proper-handshake-etiquette-how-to/assets/13.jpeg"
              alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form action="logindb.php" method="post" >
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                    <span class="h1 fw-bold mb-0 ">Welcome to ...</span>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">D&P Investment [PVT] Ltd</h5>
                  <?php if (isset($_GET['error'])) { ?>
                    <p class="error alert alert-danger" role="alert"><?php echo $_GET['error']; ?></p>
                  <?php } ?>

                  <div class="form-outline mb-4">
                    <input type="text" id="" class="form-control form-control-lg" name="uname" >
                    <label class="form-label" for="" >User</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" id="form2Example27" class="form-control form-control-lg" name="pass" >
                    <label class="form-label" for="form2Example27">Password</label>
                  </div>

                  <div class="pt-1 mb-2">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>
                  <a class="small text-muted" href="#!">Forgot password?</a>
                </form>
              </div>
            </div>
            <footer style="text-align: center;">
              <p>&copy; 2023 codebank software solution. All rights reserved.</p>
            </footer>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>






<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>