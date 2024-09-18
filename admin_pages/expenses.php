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
                            <p class="text-primary m-0 fw-bold">Recent Expenses</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php

                                        $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                        if (strpos($full_url, "error=deleteexpensesuccess") !== false) {
                                            echo "
                                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                    Expense Successfully Deleted!!!
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";
                                        }else if (strpos($full_url, "error=deleteexpensefail") !== false) {
                                            echo "
                                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                    Expense Deletion Failed;
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";
                                        }else if (strpos($full_url, "error=newexpensesuccess") !== false) {
                                            echo "
                                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                   New Expense Saved SuccessFully!!!
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";
                                        }else if (strpos($full_url, "error=updateexpensesuccess") !== false) {
                                            echo "
                                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                Expense Updated SuccessFully!!!
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";
                                        } 

                                    ?>
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable" style="text-align: left;"><a class="btn btn-primary btn-icon-split" role="button" href="new_expenses.php"><span class="text-white-50 icon"><i class="fas fa-plus-circle"></i></span><span class="text-white text">New Expense</span></a></div>
                                </div>
                                
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table id="example" class="display compact table my-0" style="width:100%">
                                    <thead>
                                        <tr class="text-start">
                                            <th>#</th>
                                            <th>Expense</th>
                                            <th>Money (RWF)</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $query = "SELECT * FROM expenses";
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

                                            $new_expense = number_format($amount);
                                        ?>

                                        <tr class="text-start" style="text-align: center;">
                                            <td><?php echo $expense_id; ?></td>
                                            <td><?php echo $expense_title; ?></td>
                                            <td><?php echo $new_expense; ?></td>
                                            <td><?php echo $category; ?></td>
                                            <td><?php echo $expense_date ; ?></td>
                                            <td class="text-end" style="margin: 4px;">
                                                <a class="btn btn-success" role="button" href="view_single_expense.php?id=<?php echo $expense_id; ?>">
                                                    <i class="fas fa-eye" style="font-size: 18px;"></i>
                                                </a>

                                                <a class="btn btn-warning" role="button" style="margin-left: 3px;" href="edit_expense.php?id=<?php echo $expense_id; ?>">
                                                    <i class="far fa-edit"></i>
                                                </a>

                                                <a class="btn btn-danger" role="button" style="margin-left: 3px;" href="operations/delete_expense.php?id=<?php echo $expense_id; ?>">
                                                    <i class="far fa-trash-alt"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php } ?> 

                                    </tbody>
                                    <tfoot>
                                        <tr class="text-start">
                                            <td><strong>#</strong></td>
                                            <td><strong>Expense</strong></td>
                                            <td><strong>Money (RWF)</strong></td>
                                            <td><strong>Category</strong></td>
                                            <td><strong>Date</strong></td>
                                            <td class="text-center"><strong class="text-end">Actions</strong></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
    require 'main_pages/footer.php';

?>