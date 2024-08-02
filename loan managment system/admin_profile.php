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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <title>Profile</title>
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

    <!----++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++-->

    <div class="container mt-5 rounded mx-auto  p-2 shadow-lg">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-4 text-center">
                        <img src="profile.png" alt="profile" class="js-image img-fluid rounded" style="width: 180px;height: 180px; object-fit: cover;">

                        <div class="mb-3">
                            <label for="formFile" class="form-label">Select image</label>
                            <input onchange="display_image(this.files[0])" class="form-control" type="file" id="formFile">
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="h2 text-center">Admin Profile</div>

                        <table class="table table-striped">

                            <?php   
                            require('db_connect.php');
                            $query = "SELECT * FROM admin";
                            $result = mysqli_query($conn , $query);

                            if (mysqli_num_rows($result) > 0) {
                                foreach($result as $admin){
                                    ?>

                                    <tr>
                                        <th><i class="bi bi-person-circle"></i> Full Name</th>
                                        <td><?= $admin['full_name'] ?></td>
                                    </tr>

                                    <tr>
                                        <th><i class="bi bi-envelope"></i> Gmail name</th>
                                        <td><?= $admin['gmail'] ?> </td>
                                    </tr>

                                    <tr>
                                        <th><i class="bi bi-person-lines-fill"></i> Contact</th>
                                        <td><?= $admin['contact'] ?></td>
                                    </tr>

                                    <tr>
                                        <th><i class="bi bi-gender-ambiguous"></i> Gender</th>
                                        <td><?= $admin['gender'] ?> </td>
                                    </tr>

                                    <?php
                                }
                            }
                            ?>
                        </table>
                     
                    </div>
                </div>

                <form class="row g-3 needs-validation" novalidate method="post" action="update_admin.php">

                    <input type="hidden" name="admin_id" value="<?php echo $admin['id']; ?>">
                   <hr>
                    <div class="h3 text-center">Edit Profile Details</div>
                    <div class="col-md-6">
                        <label for="validationCustom01" class="form-label">Full name</label>
                        <input type="text" class="form-control" id="validationCustom01" value="<?php echo $admin['full_name']; ?>" name="full_name" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom02" class="form-label">Gmail</label>
                        <input type="text" class="form-control" id="validationCustom02" value="<?php echo $admin['gmail']; ?>" name="gmail" required>
                        <div class="valid-feedback">
                            Looks good!
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustomUsername" class="form-label">Contact</label>
                        <div class="input-group has-validation">
                            <span class="input-group-text" id="inputGroupPrepend">+94</span>
                            <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend" name="contact" value="<?php echo $admin['contact']; ?>" placeholder="enter without zero" required>
                            <div class="invalid-feedback">
                                Please enter a mobile number.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="validationCustom04" class="form-label">Gender</label>
                        <select class="form-select" id="validationCustom04" name="gender" required>
                            <option <?php echo ($admin['gender'] == 'male') ? 'selected' : ''; ?> value="male">Male</option>
                            <option <?php echo ($admin['gender'] == 'female') ? 'selected' : ''; ?> value="female">Female</option>
                        </select>
                        <div class="invalid-feedback">
                            Please select a valid state.
                        </div>
                    </div>
                    <div class="col-12">
                        <button class="btn btn-primary float-end" type="submit" name="update">Update</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

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

  <script>
    function display_image(file)
    {
        var img = document.querySelector(".js-image");
        img.src = URL.createObjectURL(file);
    }
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    var el = document.getElementById("wrapper");
    var toggleButton = document.getElementById("menu-toggle");

    toggleButton.onclick = function () {
        el.classList.toggle("toggled");
    };
</script>
</body>
<footer>
        <p>&copy; 2023 codebank software solution. All rights reserved.</p>
    </footer>


</html>
