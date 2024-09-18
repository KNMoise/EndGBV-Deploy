<?php 

    require 'includes/db.php';
    require 'session.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);

    require 'main_pages/top_nav.php';

?>



                <div class="container-fluid">
                    <h3 class="text-dark mb-4">INCOMES</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <?php 
                                $income_id = $_GET['id'];

                                $query = "SELECT * FROM incomes WHERE job_id = '$income_id';";
                                $query2 = mysqli_query($conn, $query);

                                while ($rows = mysqli_fetch_assoc($query2)) {

                                    $job_title = mysqli_escape_string($conn, $rows['job_title']);
                                    $client_name = mysqli_escape_string($conn, $rows['client_name']);
                                    $client_contact = mysqli_escape_string($conn, $rows['client_contact']);
                                    $job_date = mysqli_escape_string($conn, $rows['job_date']);
                                    $income = mysqli_escape_string($conn, $rows['income']);
                                    $payment_status = mysqli_escape_string($conn, $rows['payment_status']);
                                    $job_descr = mysqli_escape_string($conn, $rows['description']);
                                  
                                

                            ?>
                            <p class="m-0 fw-bold" style="color: rgb(14, 69, 58);">Income Details For <?php echo $job_title; ?></p>
                        </div>
                        <div class="card-body" style="margin-top: -3px;">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable" style="text-align: left;"><a class="btn btn-success btn-icon-split" role="button" href="incomes.php"><span class="text-white-50 icon"><i class="fas fa-eye text-dark"></i></span><span class="text-dark text">View Jobs</span></a></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"></div>
                                </div>
                            </div>
                            
                            <form style="margin-top: 15px;" action="" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="username">
                                                <strong>Job Title</strong>
                                            </label>
                                            <input class="form-control" type="text"  placeholder="Job Title" value="<?php echo $job_title; ?>" readonly="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">
                                                <strong>Client Name</strong>
                                            </label>
                                            <input class="form-control" type="text" placeholder="Client Name" value="<?php echo $client_name; ?>" name="client_name"  min="100" readonly="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="first_name">
                                                <strong>Client Contact Info</strong>
                                            </label>
                                            <input class="form-control" type="tel"  placeholder="Client Contact" value="<?php echo $client_contact; ?>"  name="client_contact" readonly="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="last_name">
                                                <strong>Job Date</strong>
                                                <input class="form-control" type="date" name="job_date" value="<?php echo $job_date; ?>" min="2005" readonly="">
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
                                            <input class="form-control" type="number" placeholder="Total Cost" value="<?php echo $income; ?>" name="income" min="100" readonly="">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="first_name">
                                                <strong>Payment Status</strong>
                                                <select class="form-select" name="payment_status" readonly="">
                                                        <option selected=""><?php echo $payment_status; ?></option>
                                                </select>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                             <label class="form-label" for="last_name">
                                                <strong>Job Description</strong>
                                            </label>
                                           <textarea placeholder="Job Description" rows="5" class="form-control" readonly=""><?php echo $job_descr; ?></textarea>
                                        </div>
                                    </div>
                                    
                                </div>
                                 <div class="row" style="margin-top: 8px;">
                                    <div class="col">
                                        <div class="card shadow mb-4">
                                            <?php 




                                            ?>
                                            <div class="card-header py-3">
                                                <h6 class="m-0 fw-bold" style="color: rgb(14, 69, 58);">Expenses related To <?php echo $job_title; ?></h6>
                                            </div>
                                            <div class="card-body">
                                                <div class="table-responsive">
                                                    <table class="table table-striped table-hover table-sm table-bordered table-responsive">
                                                        <thead>
                                                            <tr>
                                                                <th>#</th>
                                                                <th>Name</th>
                                                                <th>Money</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody style="color: rgb(14,69,58);">
                                                            <?php 
                                                               
                                                                $query = "SELECT * FROM expenses WHERE job_linked = '$income_id';";
                                                                $query2 = mysqli_query($conn, $query);

                                                                while ($rows = mysqli_fetch_assoc($query2)) {

                                                                    $id = mysqli_escape_string($conn, $rows['expense_id']);
                                                                    $amount = mysqli_escape_string($conn, $rows['amount']);
                                                                    $job_linked = mysqli_escape_string($conn, $rows['job_linked']);
                                                                    $expense_title = mysqli_escape_string($conn, $rows['expense_title']);
                                                            
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $id; ?></td>
                                                                <td><?php echo $expense_title; ?></td>
                                                                <td><?php echo number_format($amount); ?> RWF</td>
                                                            </tr>
                                                        <?php } ?>
                                                            
                                                        </tbody>
                                                        <tfoot>
                                                            <tr>
                                                                <td colspan="2">Total Expenses</td>
                                                                <td>
                                                                    <?php 
                                                               
                                                                $query = "SELECT sum(amount) as total FROM expenses WHERE job_linked = '$income_id' group by job_linked";
                                                                $query2 = mysqli_query($conn, $query);

                                                                while ($rows = mysqli_fetch_assoc($query2)) {

                                                                    //$id = mysqli_escape_string($conn, $rows['expense_id']);
                                                                    //$amount = mysqli_escape_string($conn, $rows['amount']);
                                                                    //$job_linked = mysqli_escape_string($conn, $rows['job_linked']);
                                                                    //$expense_title = mysqli_escape_string($conn, $rows['expense_title']);
                                                                     $total = mysqli_escape_string($conn, $rows['total']);
                                                                     echo number_format($total);
                                                                 }
                                                            
                                                            ?> RWF






                                                                </td>
                                                            </tr>
                                                        </tfoot>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"><a class="btn btn-primary btn-sm" role="button" href="incomes.php">Back</a></div>
                            </form>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
<?php
    require 'main_pages/footer.php';

?>