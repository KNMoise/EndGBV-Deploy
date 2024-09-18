<?php

require 'includes/db.php';
require 'session.php';

$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") or DIE('Error In Session');
$row = mysqli_fetch_array($result);

require 'main_pages/top_nav.php';

?>


<div class="container-fluid">
    <h3 class="text-dark mb-4">Cases</h3>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Recent Cases</p>
        </div>
        <div class="card-body">
            <div class="row">
                <?php

                $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                if (strpos($full_url, "error=newjobsuccess") !== false) {
                    echo "
                                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                    New Job Successfully Saved!!!
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";
                } else if (strpos($full_url, "error=deleteincomesuccess") !== false) {
                    echo "
                                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                    Job Deletion Successfully;
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";
                } else if (strpos($full_url, "error=deleteincomefail") !== false) {
                    echo "
                                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                    Error Deleting Job!!!
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";
                } else if (strpos($full_url, "error=updateincomesuccess") !== false) {
                    echo "
                                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                    Job Info Updated SuccessFully!!
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";
                }

                ?>
                <div class="col-md-6 text-nowrap">
                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable"
                        style="text-align: left;">
                        <a class="btn btn-primary btn-icon-split" role="button" href="new_income.php"><span
                                class="text-white-50 icon">
                                <i class="fas fa-edit"></i>
                            </span>
                            <span class="text-white text">New Case</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table id="example" class="display compact table my-0" style="width:100%">
                    <thead>
                        <tr class="text-start">
                            <th>Case ID</th>
                            <th>Names</th>
                            <th>Case Type</th>
                            <th>Submission Date</th>
                            <th class="text-center">Actions</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php
                        // Query to fetch data from `case_submissions` table
                        $query = "SELECT * FROM case_submissions ORDER BY submission_date DESC";
                        $query2 = mysqli_query($conn, $query);

                        while ($row = mysqli_fetch_assoc($query2)) {
                            $case_id = $row['id']; // Assuming 'id' is the primary key in case_submissions
                            $names = mysqli_escape_string($conn, $row['names']);
                            $gender = mysqli_escape_string($conn, $row['gender']);
                            $case_type = mysqli_escape_string($conn, $row['case_type']);
                            $submission_date = mysqli_escape_string($conn, $row['submission_date']);
                            ?>
                            <tr class="text-start" style="text-align: center;">
                                <td><?php echo $case_id; ?></td>
                                <td><?php echo $names; ?></td>
                                <td><?php echo $case_type; ?></td>
                                <td><?php echo $submission_date; ?></td>
                                <td class="text-end" style="margin: 4px;">
                                    <a class="btn btn-success" role="button"
                                        href="view_case.php?id=<?php echo $case_id; ?>">
                                        <i class="fas fa-eye" style="font-size: 18px;"></i>
                                    </a>
                                    <a class="btn btn-warning" role="button" style="margin-left: 3px;"
                                        href="edit_case.php?id=<?php echo $case_id; ?>">
                                        <i class="far fa-edit"></i>
                                    </a>
                                    <a class="btn btn-danger" role="button" name="delete" style="margin-left: 3px;"
                                        href="operations/delete_case.php?id=<?php echo $case_id; ?>">
                                        <i class="far fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require 'main_pages/footer.php';

?>