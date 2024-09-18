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
                        <?php
                                        $id = mysqli_escape_string($conn, $_GET['id']);
                                        $query = "SELECT * FROM expenses WHERE expense_id='$id';";
                                        $query2 = mysqli_query($conn, $query);

                                        while ($rows = mysqli_fetch_assoc($query2)) {

                                            $expense_id = mysqli_escape_string($conn, $rows['expense_id']);
                                            $expense_title = mysqli_escape_string($conn, $rows['expense_title']);
                                            $expense_desc = mysqli_escape_string($conn, $rows['expense_desc']);
                                            $amount = mysqli_escape_string($conn, $rows['amount']);;
                                            $job_linked = mysqli_escape_string($conn, $rows['job_linked']);
                                            $expense_date = mysqli_escape_string($conn, $rows['expense_date']);
                                            $category = mysqli_escape_string($conn, $rows['category']);
                                            $add_notes = mysqli_escape_string($conn, $rows['add_notes']);
                                        ?>
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Edit <?php echo $expense_title; ?> Expense</p>
                        </div>
                        <div class="card-body" style="margin-top: -3px;">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable" style="text-align: left;"><a class="btn btn-success btn-icon-split" role="button" href="expenses.php"><span class="text-white-50 icon"><i class="fas fa-eye"></i></span><span class="text-white text">View Expenses</span></a></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"></div>
                                </div>
                            </div>
                            
                             <form style="margin-top: 15px;"  method="POST" action="operations/update_expense.php?id=<?php echo $expense_id; ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                <strong>Expense Title</strong>
                                            </label>
                                            <input class="form-control" type="text" value="<?php echo $expense_title; ?>" placeholder="Expense Title" name="expense_title"  >
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label">
                                                <strong>Expense Date</strong>
                                            </label>
                                            <input class="form-control" type="date" value="<?php echo $expense_date; ?>" placeholder="Expense Date" name="expense_date" disabled>
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
                                                <input class="form-control" type="number" value="<?php echo $amount; ?>" placeholder="Expense Amount" name="amount" min="20"  >
                                             </div>   
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <strong>Category</strong>
                                                </label>
                                                <select class="form-select" name="category"  >
                                                    <optgroup label="Choose Vategory">
                                                        <option <?php if($category === "Equipment") { echo 'selected=""'; } ?>>Equipment</option>
                                                        <option <?php if($category === "Transaction") { echo 'selected="selected"'; } ?>>Transaction</option>
                                                        <option <?php if($category === "Shop Build") { echo 'selected=""'; } ?>>Shop Build</option>
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
                                            <textarea class="form-control" rows="5" name="expense_desc"  ><?php echo $expense_desc; ?></textarea>
                                        </div>
                                    </div>
                                     <div class="col">
                                        <div class="mb-3">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    <strong>Job Linked</strong>
                                                </label>
                                                <select class="form-select" name="job_linked"  >
                                                    <optgroup label="Choose Job">
                                                        <?php
                                                            $query = "SELECT job_id, job_title FROM incomes ORDER BY job_date DESC;";
                                                            $query2 = mysqli_query($conn, $query);
                                                            
                                                            while ($rows = mysqli_fetch_assoc($query2)) {
                                                                $job_id = $rows['job_id'];
                                                                $job_title =  $rows['job_title'];

                                                       
                                                        ?>
                                                        <option value="<?php echo $job_id; ?>" <?php if($job_id === $job_linked){ echo "selected";} ?>><?php echo $job_title; ?></option>
                                                    <?php } ?> 

                                                    </optgroup>
                                                </select>
                                             </div>   
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                     <div class="col-md-6 text-nowrap">
                                    <button class="btn btn-primary btn-sm" type="submit" name="update" role="button">Update Expense</button>
                                </div>
                                </div>
                            </form>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
<?php
    require 'main_pages/footer.php';

?>