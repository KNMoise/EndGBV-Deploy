<?php

require 'includes/db.php';
require 'session.php';

$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") or DIE('Error In Session');
$row = mysqli_fetch_array($result);

require 'main_pages/top_nav.php';

?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-primary py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>Donations
                                    (<?php echo date("F"); ?>)</span></div>
                            <div class="text-dark fw-bold h5 mb-0">
                                <span>Rwf
                                    <?php
                                    $month = date("n");
                                    $sql = "SELECT SUM(income) AS total_income FROM incomes WHERE MONTH(job_date) = $month";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $total_income = $row['total_income'];
                                        echo number_format($total_income);
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-success py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Expenses
                                    (<?php echo date("F"); ?>)</span></div>
                            <div class="text-dark fw-bold h5 mb-0">
                                <span>Rwf
                                    <?php
                                    $month = date("n");
                                    $sql = "SELECT SUM(amount) AS total_expenses FROM expenses WHERE MONTH(expense_date) = $month";
                                    $result = mysqli_query($conn, $sql);
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        $totalExpenses = $row['total_expenses'];
                                        echo number_format($totalExpenses);
                                    }
                                    ?>
                                </span>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-dollar-sign fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-info py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>Cases So Far</span></div>
                            <div class="row g-0 align-items-center">
                                <div class="col-auto">
                                    <div class="text-dark fw-bold h5 mb-0 me-3">
                                        <span>
                                            <?php
                                            $query = "SELECT job_id FROM incomes;";
                                            $query2 = mysqli_query($conn, $query);
                                            $query3 = mysqli_num_rows($query2);
                                            echo $query3;
                                            ?>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow border-start-warning py-2">
                <div class="card-body">
                    <div class="row align-items-center no-gutters">
                        <div class="col me-2">
                            <div class="text-uppercase text-warning fw-bold text-xs mb-1"><span>Date Today</span></div>
                            <div class="text-dark fw-bold h5 mb-0"><span><?php echo date("d-m-Y"); ?></span></div>
                        </div>
                        <div class="col-auto"><i class="far fa-calendar-alt fa-2x text-gray-300"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7 col-xl-8">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text fw-bold m-0" style="color: #0e453a;">Donation Overview</h6>
                    <div class="dropdown no-arrow">
                        <button class="btn btn-link btn-sm dropdown-toggle"
                            aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                class="fas fa-ellipsis-v text-gray-400"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="chart-area" id="barchart_material" style="width:auto;">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5 col-xl-4">
            <div class="card shadow mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h6 class="text fw-bold m-0" style="color: #0e453a;">Cases Received Stats</h6>
                    <div class="dropdown no-arrow">
                        <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="true"
                            data-bs-toggle="dropdown" type="button">
                            <i class="fas fa-ellipsis-v text-gray-400"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body text-start" style="height: 351.391px;">
                    <div class="card shadow border-start-primary py-2">
                        <div class="card-body">
                            <div class="row align-items-center no-gutters">
                                <div class="col text-center" style="border-width: 13px;border-color: rgb(14,69,58);">
                                    <h6><strong>Today</strong></h6><span class="badge bg-success"
                                        style="font-size: 12px;width: 50px;">
                                        <?php
                                        $query = "SELECT job_id FROM incomes WHERE DATE(job_date) = CURDATE();";
                                        $query2 = mysqli_query($conn, $query);
                                        $num = mysqli_num_rows($query2);
                                        echo $num;
                                        ?>
                                    </span>
                                </div>
                                <div class="col text-center">
                                    <h6><strong>This Week</strong></h6><span class="badge bg-success"
                                        style="font-size: 12px;width: 50px;">
                                        <?php
                                        $query = "SELECT job_id FROM incomes WHERE WEEK(job_date) = WEEK(CURDATE());";
                                        $query2 = mysqli_query($conn, $query);
                                        $num = mysqli_num_rows($query2);
                                        echo $num;
                                        ?>
                                    </span>
                                </div>
                            </div>
                            <div class="row align-items-center no-gutters"
                                style="margin: 31px -12px 0px;margin-top: 54px;">
                                <div class="col text-center">
                                    <h6><strong>This Month</strong></h6><span class="badge bg-success"
                                        style="font-size: 12px;width: 50px;">
                                        <?php
                                        $query = "SELECT job_id FROM incomes WHERE MONTH(job_date) = MONTH(CURDATE());";
                                        $query2 = mysqli_query($conn, $query);
                                        $num = mysqli_num_rows($query2);
                                        echo $num;
                                        ?>
                                    </span>
                                </div>
                                <div class="col text-center">
                                    <h6><strong>This Year</strong></h6><span class="badge bg-success"
                                        style="font-size: 12px;width: 50px;">
                                        <?php
                                        $query = "SELECT job_id FROM incomes WHERE YEAR(job_date) = YEAR(CURDATE());";
                                        $query2 = mysqli_query($conn, $query);
                                        $num = mysqli_num_rows($query2);
                                        echo $num;
                                        ?>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require 'main_pages/footer.php';

?>