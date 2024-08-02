
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">

    <title> Payment</title>
</head>

<body>

    <!-- navigation area start -->

    <?php include_once('nav.php') ?>

    <!-- /#navigation area end -->

    <br>
    <!--page content-->

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                  <form action="payment_save.php" method="post">
                    <div class="card-header">
                        <h4>Make Payment
                            <a href="view_loans.php" class="btn btn-primary float-end">Loan Details</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                          <div class="col-md-6">
                              <div>
                                 <label for="" class="form-label">Select Borrower </label>
                                 <select id="borrowers" name="borrower" class="form-control" required>
                                    <option value="" selected="selected">Select borrowers Name</option>
                                    <?php
                                    include_once("db_connect.php");
                                    $sql = "SELECT b_id, name, contact, address,garanter1,garanter2 FROM borrowers";
                                    $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                                    while ($rows = mysqli_fetch_assoc($resultset)) { 
                                        ?>
                                        <option value="<?php echo $rows["b_id"]; ?>"><?php echo $rows["b_id"]; ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div id="records" style="display:none;">
                             <!--<lable class="" id="heading"> Borrower Details</lable>-->
                             <p><strong>Name:</strong> <span id="name"></span></p>
                             <p><strong>contact:</strong> <span id="contact"></span></p>
                             <p><strong>address:</strong> <span id="address"></span></p>
                             <p><strong>fist garanter:</strong> <span id="garanter1"></span></p>
                             <p><strong>secon garanter:</strong> <span id="garanter2"></span></p>
                         </div>

                         <div id="no_records" style="display:none;">
                             <h4>No records found</h4>
                         </div>
                     </div>
                     <div class="col-md-3">
                        <div class="row">
                            <div class="form-group">
                                <label for="loanAmount">Loan Amount:</label>
                                <input type="number" class="form-control" id="loanAmount" name="loan_amount" value="" readonly >
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="interestRate">Interest Rate (%):</label>
                            <input type="number" class="form-control" id="interestRate" name="interest_rate" value="" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="numberOfMonths">Number of Months:</label>
                            <input type="number" class="form-control" id="numberOfMonths"  name="month" value="" readonly>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="monthlyPayment">Monthly rental:</label>
                            <input type="number" class="form-control" id="monthlyPayment"  name="monthlyPayment" value="" readonly>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <label for="loanStartDate" class="form-label">Last payment date</label>
                        <div class="input-group date" id="loanStartDatePicker">
                            <input type="text" class="form-control" name="loanStartDate" id="loanStartDate" readonly>
    
                        </div>
                    </div>
                    <input type="hidden" name="status" value="1">
                </div>
                <br>
                <hr>
                
                 <div class="col-md-3">
                        <div class="row">
                            <div class="form-group">
                                <label for="payment">Payment:</label>
                                <input type="number" class="form-control" id="payment" name="payment" value="" readonly>
                            </div>
                        </div>
                    </div>          
  
                 <br>
                 <div class="row">
                    <div class="col-md-1">
                     <input class="btn btn-primary" type="submit" name="pay" value="PAY">

                  </div>
           

           </div>
                
               
          
         
        </div>
    </div>
</div>
</div>
</div>
</form>
<!--------------------------------------------------------------->


<!-- Bootstrap and other JS libraries -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>   
<script type="text/javascript" src="payment_borrower.js"></script>
<script>

    <!-- Bootstrap and other JS libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


    <!-- uper dashboard profile script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        var el = document.getElementById("wrapper");
        var toggleButton = document.getElementById("menu-toggle");

        toggleButton.onclick = function () {
            el.classList.toggle("toggled");
        };
    </script>
</body>

</html>
