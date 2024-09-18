<?php 

    require 'includes/db.php';
    require 'session.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);

    require 'main_pages/top_nav.php';

?>

             <div class="container-fluid">
                    <h3 class="text-dark mb-4">Expenses</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">New Expense</p>
                        </div>
                        <div class="card-body" style="margin-top: -3px;">
                            <div class="row">
                                <?php

                                        $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                        if (strpos($full_url, "error=noexpensedata") !== false) {
                                            echo "
                                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                    Empty Fields Or No Data Provided!!
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";
                                        } 

                                    ?>
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable" style="text-align: left;"><a class="btn btn-success btn-icon-split" role="button" href="expenses.php"><span class="text-white-50 icon"><i class="fas fa-eye"></i></span><span class="text-white text">View Expenses</span></a></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"></div>
                                </div>
                            </div>
                              <form style="margin-top: 15px;" action="operations\new_expense_db.php" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                <strong>Expense Title</strong>
                                            </label>
                                            <input class="form-control" type="text" placeholder="Expense Title" name="expense_title">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                <strong>Expense Date</strong>
                                            </label>
                                            <input class="form-control" type="date" placeholder="Expense Date" name="expense_date" value="<?php echo date("Y-m-d"); ?>" disabled>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label" for="first_name">
                                                    <strong>Amount</strong>
                                                </label>
                                                <input class="form-control" type="number" placeholder="Expense Amount" name="amount" min="20">
                                             </div>   
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <strong>Category</strong>
                                                </label>
                                                <select class="form-select" name="category">
                                                    <optgroup label="Choose Vategory">
                                                        <option>Equipment</option>
                                                        <option>Transaction</option>
                                                        <option>Shop Build</option>
                                                    </optgroup>
                                                </select>
                                             </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                <strong>Expense&nbsp;Description</strong>
                                            </label>
                                            <textarea class="form-control" rows="5" name="expense_desc"></textarea>
                                        </div>
                                    </div>
                                     <div class="col">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <strong>Job Linked</strong>
                                                </label>
                                                <select class="form-select" name="job_linked">
                                                    <optgroup label="Choose Job">
                                                        <option>Select Job</option>
                                                        <option>Shop </option>
                                                        <?php
                                                            $query = "SELECT job_id, job_title FROM incomes ORDER BY job_date DESC;";
                                                            $query2 = mysqli_query($conn, $query);
                                                            
                                                            while ($rows = mysqli_fetch_assoc($query2)) {
                                                                $job_id = $rows['job_id'];
                                                                $job_title =  $rows['job_title'];

                                                       
                                                        ?>
                                                        <option value="<?php echo $job_id; ?>"><?php echo $job_title; ?></option>
                                                    <?php } ?>

                                                    </optgroup>
                                                </select>
                                             </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit" name="new_expenses" role="button">Save New Expense</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
    require 'main_pages/footer.php';

?>