<?php
require('db_connect.php');

$query = "SELECT * FROM payment ORDER BY pay_date DESC";
$query_run = mysqli_query($conn, $query);

if (mysqli_num_rows($query_run) > 0) {
    foreach ($query_run as $payment) {
        ?>
        <tr>
            <td><?= $payment['borrower_id'] ?></td>
            <td><?= $payment['payment'] ?></td>
            <td><?= $payment['pay_date'] ?></td>
            <td>
                <!--<button type="button" value="<?= $loan['id']; ?>" class="view_sumeerybtn btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#SammeryModal">
                    <i class="fa fa-eye"></i>
                </button>-->
                <button type="button" class="btn btn-danger btn-sm delete-payment-btn" data-payment-id="<?= $payment['id'] ?>">
                    <i class="fa fa-trash"></i></button>
                    
                </td>
            </tr>
            <?php
        }
    }
    ?>
