<?php require('dbcon.php'); ?>
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

    <title> Loan Clculation</title>
    
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
                  <form action="make_loandb.php" method="post">
                    <div class="card-header">
                        <h4>Make Loan
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
                   <div class="col-md-6">

                      <div>
                       <label for="" class="form-label">Select Plan </label>
                       <select id="plan" class="form-control" name="plan" required>
                        <option value="" selected="selected">Select plan Name</option>
                        <?php
                        include_once("db_connect.php");
                        $sql = "SELECT id, plan_name, interest, rate,discription FROM loan_plan";
                        $resultset = mysqli_query($conn, $sql) or die("database error:". mysqli_error($conn));
                        while ($rows = mysqli_fetch_assoc($resultset)) { 
                            ?>
                            <option value="<?php echo $rows["id"]; ?>" data-interest="<?php echo $rows["interest"]; ?>">
                                <?php echo $rows["plan_name"]; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <br>
                <div id="records1" style="display:none;">
                  <!--<lable class="" id="heading"> plan Details</lable>-->
                  <p><strong>interest :</strong> <span id="interest"></span></p>
                  <p><strong>rate:</strong> <span id="rate"></span></p>
                  <p><strong>Discription:</strong> <span id="discription"></span></p>
              </div>

              <div id="no_records" style="display:none;">
               <h4>No records found</h4>
           </div> 

       </div> 

       <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label for="loanAmount">Loan Amount:</label>
                <input type="number" class="form-control" id="loanAmount" name="loan_amount" value="" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="interestRate">Interest Rate (%):</label>
                <input type="number" class="form-control" id="interestRate" name="interest_rate" value="" required>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label for="numberOfMonths">Number of Months:</label>
                <input type="number" class="form-control" id="numberOfMonths"  name="month" value="" required>
            </div>
        </div>

        <div class="col-md-3">
            <label for="loanStartDate" class="form-label">Loan Start Date</label>
            <div class="input-group date" id="loanStartDatePicker">
                <input type="text" class="form-control" name="loanStartDate" id="loanStartDate" required>
                <span class="input-group-append">
                    <span class="input-group-text bg-white d-block">
                        <i class="fa fa-calendar"></i>
                    </span>
                </span>
            </div>
        </div>
        <input type="hidden" name="status" value="1">
    </div>
<br>
<hr>


<div class="row">
    <div class="col-md-1">
  <button class="btn btn-primary mb-3" onclick="calculateLoan(event)">Calculate</button>

    </div>
    <div class="col-md-6 text-right">
        <button class="btn btn-secondary mb-3" onclick="clearFields()">Clear</button>
    </div>
</div>
<hr>
<h2 class="mb-3">Loan Details</h2>

<p name="monthlyPayment"  id="monthlyPayment" class="mb-2"></p>
<p name="totalInterest"  id="totalInterest" class="mb-2"></p>
<p name="totalPayment"  id="totalPayment" class="mb-2"></p>
<p name="loanEndDate"  id="loanEndDateDetail" class="mb-2"></p>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<input class="btn btn-primary" type="submit" name="submit" value="submit">

</div>

</div>
</div>
</div>
</div>
</div>
</form>
<!--------------------------------------------------------------->


<script>
    function calculateLoan(event) {
        // Prevent the default form submission
        event.preventDefault();

        // Clearing the result fields
        document.getElementById('monthlyPayment').innerText = '';
        document.getElementById('totalInterest').innerText = '';
        document.getElementById('totalPayment').innerText = '';
        document.getElementById('loanEndDateDetail').innerText = ''; 

        // Getting values from input fields
        var loanAmount = parseFloat(document.getElementById('loanAmount').value);
        var interestRate = parseFloat(document.getElementById('interestRate').value);
        var numberOfMonths = parseInt(document.getElementById('numberOfMonths').value);

        // Checking if values are valid
        if (isNaN(loanAmount) || isNaN(interestRate) || isNaN(numberOfMonths) || loanAmount <= 0 || interestRate <= 0 || numberOfMonths <= 0) {
            alert('Please enter valid values for loan amount, interest rate, and number of months.');
            return;
        }

        // Rest of the calculation remains the same
        var monthlyInterestRate = (interestRate / 100);
        var monthlyPayment = loanAmount * monthlyInterestRate / (1 - Math.pow(1 + monthlyInterestRate, -numberOfMonths));
        var totalPayment = monthlyPayment * numberOfMonths;
        var remainingBalance = loanAmount;
        var totalInterest = 0;

        for (var i = 1; i <= numberOfMonths; i++) {
            var interest = remainingBalance * monthlyInterestRate;
            var totalPaymentForMonth = monthlyPayment + interest;

            remainingBalance -= monthlyPayment - interest;

            totalInterest += interest;
        }

        // Calculate loan end date
        var loanStartDate = new Date(document.getElementById('loanStartDate').value);
        var loanEndDate = new Date(loanStartDate);
        loanEndDate.setMonth(loanStartDate.getMonth() + numberOfMonths);
        var formattedEndDate = loanEndDate.toISOString().slice(0, 10);

        // Updating the result fields
        document.getElementById('monthlyPayment').innerText = "Monthly Payment: rs." + monthlyPayment.toFixed(4);
        document.getElementById('totalInterest').innerText = "Total Interest For Months: rs." + totalInterest.toFixed(2);
        document.getElementById('totalPayment').innerText = "Total Payment " + numberOfMonths + " Months: rs." + totalPayment.toFixed(2);
        document.getElementById('loanEndDateDetail').innerText = "Loan End Date: " + formattedEndDate; // Added line
    }

    function clearFields() {
        // Clearing the input fields
        document.getElementById('loanAmount').value = '';
        document.getElementById('interestRate').value = '';
        document.getElementById('numberOfMonths').value = '';
        document.getElementById('loanStartDate').value = ''; // Added line

        // Clearing the result fields
        document.getElementById('monthlyPayment').innerText = '';
        document.getElementById('totalInterest').innerText = '';
        document.getElementById('totalPayment').innerText = '';
        document.getElementById('loanEndDateDetail').innerText = ''; // Added line
    }
</script>

<!-- Bootstrap and other JS libraries -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="getdata.js"></script>
<script type="text/javascript" src="getData.js"></script>
<script>

<!-- Bootstrap and other JS libraries -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.9/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<script>
    $(document).ready(function () {
        $('#loanStartDatePicker').datepicker({
            format: 'yyyy-mm-dd',
            autoclose: true,
        });

        $('#loanStartDatePicker').on('changeDate', function (e) {
            calculateLoanEndDate(e.date);
        });
    });

    function calculateLoanEndDate(startDate) {
        var numberOfMonths = parseInt(document.getElementById('numberOfMonths').value);

        if (isNaN(numberOfMonths) || numberOfMonths <= 0) {
            alert('Please enter a valid number of months.');
            return;
        }

        var endDate = new Date(startDate);
        endDate.setMonth(startDate.getMonth() + numberOfMonths);

        var formattedEndDate = endDate.toISOString().slice(0, 10);

        document.getElementById('loanEndDate').innerText = formattedEndDate;
    }


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
</div>
</div>
</div>
</div>

</body>
    <footer>
        <p>&copy; 2023 codebank software solution. All rights reserved.</p>
    </footer>
</html>
