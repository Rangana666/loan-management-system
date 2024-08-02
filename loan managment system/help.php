
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

  <style>

    @import url('https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css');
    .bg-dark {
      background-color: #343a40!important;
    }
    body{
      background: #f7f7ff;
      margin-top:20px;
    }
    .card {
      position: relative;
      display: flex;
      flex-direction: column;
      min-width: 0;
      word-wrap: break-word;
      background-color: #fff;
      background-clip: border-box;
      border: 0 solid transparent;
      border-radius: .25rem;
      margin-bottom: 1.5rem;
      box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
    }
    .me-2 {
      margin-right: .5rem!important;
    }
    .whatsapp-btn-container {
      position: fixed;
      right: 30px;
      opacity: 0;
      bottom: -50px;
      padding: 24px;
      animation: fade-up 1000ms forwards;
      animation-delay: 1000ms;
    }

    @keyframes fade-up {
      100% {
        bottom: 24px;
        opacity: 1;
      }
    }

    .whatsapp-btn-container .whatsapp-btn {
      font-size: 48px;
      color: #25d366;
      display: inline-block;
      transition: all 400ms;
    }

    .whatsapp-btn-container .whatsapp-btn:hover {
      transform: scale(1.2);
    }

    .whatsapp-btn-container span {
      position: absolute;
      top: 0;
      left: 4px;
      font-family: "Roboto", sans-serif;
      font-weight: bold;
      color: #075e54;
      transform: rotateZ(20deg) translateX(10px);
      opacity: 0;
      transition: all 400ms;
    }

    .whatsapp-btn-container .whatsapp-btn:hover + span {
      transform: rotateZ(0deg) translateX(0px);
      opacity: 1;
    }
  </style>



  <title> Support</title>
</head>

<body>

  <!-- navigation area start -->

  <?php include_once('nav.php') ?>

  <!-- /#navigation area end -->


  <div class="container">
    <div class="main-body">
      <div class="row">
        <div class="col-lg-5">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="https://play-lh.googleusercontent.com/C9CAt9tZr8SSi4zKCxhQc9v4I6AOTqRmnLchsu1wVDQL0gsQ3fmbCVgQmOVM1zPru8UH=w240-h480-rw" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
                <div class="mt-4">
                  <h4>Ravindu Rangana</h4>
                  <p class="text-secondary mb-1">Full Stack Developer</p>
                  <p class="text-muted font-size-sm">Codebank Software Solutions</p>
                  <button class="btn btn-primary">Follow</button>
                  <button class="btn btn-outline-primary">Message</button>
                </div>
              </div>
              <hr class="my-5">
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                  <span class="text-secondary">https://codebank.online</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github me-2 icon-inline"><path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path></svg>Github</h6>
                  <span class="text-secondary">https://github.com/Rangana666</span>
                </li>
                <!--<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter me-2 icon-inline text-info"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"></path></svg>Twitter</h6>
                  <span class="text-secondary">@bootdey</span>
                </li>-->
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram me-2 icon-inline text-danger"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line></svg>Instagram</h6>
               <span class="text-secondary">https://instagram.com/ravinduranganagunasinghe?igshid=MzMyNGUyNmU2YQ%3D%3D&utm_source=qr</span>
                </li>
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                  <span class="text-secondary">https://www.facebook.com/profile.php?id=100088856287573&mibextid=LQQJ4d</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-7">
          <div class="card">
            <div class="card-body">
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Full Name</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value=" Ravindu Rangana" readonly>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Email</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value="ravindurangana666@gmail.com" readonly>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Phone</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value="+94 77 35 755 12" readonly>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Mobile</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value="+94 77 84 755 12" readonly>
                </div>
              </div>
              <div class="row mb-3">
                <div class="col-sm-3">
                  <h6 class="mb-0">Address</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                  <input type="text" class="form-control" value="Nugegoda , Colombo" readonly>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3"></div>
                <div class="col-sm-9 text-secondary">
                  <!--<input type="button" class="btn btn-primary px-4" value="Save Changes">-->
                </div>
              </div>
            </div>
          </div>
          <!---###########################################################-->


          <!--Form with header-->
          <div class="card border-primary rounded-0">

            <div class="card-header p-0">
              <div class="bg-primary text-white text-center py-2">
                <h3><i class="fa fa-envelope"></i> Contact me:</h3>
                <p class="m-0"></p>
              </div>
            </div>
            <div class="card-body p-3">

              <!--Body-->

              <div class="form-group">
                <label>email</label>
                <div class="input-group mb-2 mb-sm-0">
                  <div class="input-group-addon bg-light"><i class="fa fa-envelope text-primary"></i></div>
                  <input type="text" class="form-control" id="inlineFormInputGroupUsername" value="ravindurangana666@gmail.com" readonly>
                </div>
              </div>
              <div class="form-group">
                <label>title</label>
                <div class="input-group mb-2 mb-sm-0">
                  <div class="input-group-addon bg-light"><i class="fa fa-tag prefix text-primary"></i></div>
                  <input type="text" class="form-control" id="inlineFormInputGroupUsername" placeholder="service title" required>
                </div>
              </div>
              <div class="form-group">
                <label>Message</label>
                <div class="input-group mb-2 mb-sm-0" >
                  <div class="input-group-addon bg-light"><i class="fa fa-pencil text-primary"></i></div>
                  <textarea class="form-control" ></textarea>
                </div>
              </div>

              <div class="text-center py-4">
                <button class="btn btn-primary btn-block rounded-0 py-2 p-4" type="submit">Submit</button>
              </div>
                <div class="whatsapp-btn-container">
              <a class="whatsapp-btn" href="https://wa.me/94773575512"><i class="fab fa-whatsapp"></i></a>
              <span>ChatNow</span>
            </div>  

            </div>

          

          </div>

          <!--Form with header-->

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
      </div>
    </div>
  </div>
</body>


<footer>
        <p>&copy; 2023 codebank software solution. All rights reserved.</p>
      </footer>

    </body>
    
    </html>
