<?php 

    require 'includes/db.php';
    require 'session.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);

    require 'main_pages/top_nav.php';

?>


                <div class="container-fluid">
                    <h3 class="text-dark mb-4">CASES</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">New Case&nbsp;</p>
                        </div>
                        <div class="card-body" style="margin-top: -3px;">
                            <div class="row">
                                 <?php

                                        $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                        if (strpos($full_url, "error=nojobdata") !== false) {
                                            echo "
                                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                    Empty Fields Or No Data Provided!!
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";
                                        } 

                                    ?>
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable" style="text-align: left;">
                                        <a class="btn btn-success btn-icon-split" role="button" href="incomes.php">
                                            <span class="text-white-50 icon">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                            <span class="text-white text">View Case</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"></div>
                                </div>
                            </div>
                            <form style="margin-top: 15px;" action="operations/new_job.php" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"> 
                                            <label class="form-label" for="username">
                                                <strong>Case Title</strong>
                                            </label>
                                            <input class="form-control" type="text" placeholder="Case Title" name="job_title">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">
                                                <strong>Client Name</strong>
                                            </label>
                                            <input class="form-control" type="text" placeholder="Client Name" name="client_name" min="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="first_name">
                                                <strong>Client Contact Info</strong>
                                            </label>
                                            <input class="form-control" type="tel" placeholder="Client Contact" name="client_contact">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="last_name">
                                                <strong>Case Date</strong>
                                                <input class="form-control" type="date" name="job_date" value="<?php echo date("Y-m-d"); ?>" disabled>
                                            </label>

                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="first_name">
                                                <strong>Total Cost</strong>
                                            </label>
                                            <input class="form-control" type="number" placeholder="Total Cost" name="income" min="100">
                                        </div>
                                    </div>
                                    <div class="col">
                                         <div class="mb-3">
                                            <label class="form-label" for="payment_status">
                                                <strong>Payment Status</strong>
                                                <select class="form-select" name="payment_status">
                                                    <optgroup label="Choose Payment Status">
                                                        <option>Paid</option>
                                                        <option>Partial-Paid</option>
                                                        <option>Not Paid</option>
                                                    </optgroup>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                             <div class="mb-3">
                                            <label class="form-label" for="last_name">
                                                <strong>Job Description</strong>
                                            </label>
                                           <textarea rows="5" class="form-control" name="job_descr" placeholder="Job Description"></textarea>
                                        </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit" name="new_job">Save&nbsp; Job</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
    require 'main_pages/footer.php';

?>