<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['uname'])) {

 ?>

<!-- navigation css files -->
<meta charset="UTF-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
<link rel="stylesheet" href="style.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <style>
    footer {
        background-color: #f4f4f4;
        padding: 10px;
        text-align: center;
    }
 
</style>



<!-- side navigatioin -->
<div class="d-flex" id="wrapper">
    <!-- Sidebar -->
    <div class="bg-white" id="sidebar-wrapper">
        <div class="sidebar-heading text-center py-4 primary-text fs-4 fw-bold text-uppercase border-bottom"><i
            class="fas fa-user-secret me-2"></i>D&P</div>
            <div class="list-group list-group-flush my-3">
                <a href="index.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold "><i
                    class="fas fa-tachometer-alt me-2"></i>Dashboard</a>
                    <a href="borrowers.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                        class="fas fa-users me-2"></i>Borrowers</a>
                        <a href="payment.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                            class="fas fa-chart-line me-2"></i>Payment</a>
                            <a href="loan_plan.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i
                              class="fas fa-project-diagram me-2"></i>loan plan</a>
                                <a href="make_loan.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa-solid fa-handshake-angle"></i>Make Loan</a>
                                    <a href="view_loans.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa-solid fa-handshake-angle"></i>View Loans</a>
                                        <a href="loan_history.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa-solid fa-book"></i>Loans History</a>
                                         <a href="payment_history.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa-solid fa-book"></i>Payment History</a>
                                             <a href="help.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold"><i class="fa-solid fa-book"></i>Help</a>
                                            <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold"><i
                                                class="fas fa-power-off me-2"></i>Logout</a>

                                            </div>

                                        </div>

                                        <!-- /#sidebar-wrapper -->

                                        <!-- Page Content -->
                                        <div id="page-content-wrapper">
                                            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                                                <div class="d-flex align-items-center">
                                                    <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
                                                    <h2 class="fs-2 m-0">D&P INVESTMENT [PVT]LTD  </h2>

                                                </div>

                                                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                                aria-expanded="false" aria-label="Toggle navigation">
                                                <span class="navbar-toggler-icon"></span>
                                            </button>

                                            <div class="collapse navbar-collapse" id="navbarSupportedContent">

                                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0" >
                                                    <li class="nav-item dropdown">

                                                        <a class="nav-link dropdown-toggle second-text fw-bold" href="#" id="navbarDropdown"
                                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <!--date time showing-->
                                                        <div id="currentDateTime" class="ms-3"></div>
                                                        <i class="fas fa-user me-2" ></i>Administrator
                                                    </a>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <li><a class="dropdown-item" href="admin_profile.php">Profile</a></li>
                                                        <li><a class="dropdown-item" href="setting.php">Settings</a></li>
                                                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </nav>

                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script>
                                    <script>
                                        var el = document.getElementById("wrapper");
                                        var toggleButton = document.getElementById("menu-toggle");

                                        toggleButton.onclick = function () {
                                            el.classList.toggle("toggled");
                                        };
                                    </script>

                                    <!-- date and time display script-->
                                    <script>
    // Function to format the date and time in 12-hour format with AM/PM
                                        function formatDateTime(date) {
                                            const year = date.getFullYear();
                                            const month = String(date.getMonth() + 1).padStart(2, '0');
                                            const day = String(date.getDate()).padStart(2, '0');
                                            let hours = date.getHours();
                                            const minutes = String(date.getMinutes()).padStart(2, '0');
                                            const seconds = String(date.getSeconds()).padStart(2, '0');
                                            const period = hours >= 12 ? 'PM' : 'AM';

        // Convert to 12-hour format
                                            hours = hours % 12 || 12;

                                            return `${year}-${month}-${day} ${hours}:${minutes}:${seconds} ${period}`;
                                        }

    // Function to update the content of the element with the current date and time
                                        function updateCurrentDateTime() {
                                            const currentDateTimeElement = document.getElementById('currentDateTime');
                                            const currentDateTime = new Date();
                                            const formattedDateTime = formatDateTime(currentDateTime);
                                            currentDateTimeElement.textContent = `${formattedDateTime}`;
                                        }

    // Call the function when the page loads
                                        window.onload = function () {
                                            updateCurrentDateTime();

        // Update every second (1000 milliseconds)
                                            setInterval(updateCurrentDateTime, 1000);
                                        };
                                    </script>
                                    <!-- end of the script-->


<?php 
}else{
     header("Location: login.php");
     exit();
}?>