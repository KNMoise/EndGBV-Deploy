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
                            <p class="text-primary m-0 fw-bold">Edit xxx Job&nbsp;</p>
                        </div>
                        <div class="card-body" style="margin-top: -3px;">
                            <div class="row">
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable" style="text-align: left;"><a class="btn btn-success" role="button" href="incomes.php" style="margin-left: 4px;"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 -32 576 576" width="1em" height="1em" fill="currentColor">
                                                <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                <path d="M279.6 160.4C282.4 160.1 285.2 160 288 160C341 160 384 202.1 384 256C384 309 341 352 288 352C234.1 352 192 309 192 256C192 253.2 192.1 250.4 192.4 247.6C201.7 252.1 212.5 256 224 256C259.3 256 288 227.3 288 192C288 180.5 284.1 169.7 279.6 160.4zM480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6V112.6zM288 112C208.5 112 144 176.5 144 256C144 335.5 208.5 400 288 400C367.5 400 432 335.5 432 256C432 176.5 367.5 112 288 112z"></path>
                                            </svg>&nbsp; View Jobs</a></div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"></div>
                                </div>
                            </div>
                          <?php
                                        $id = mysqli_escape_string($conn, $_GET['id']);
                                        $query = "SELECT * FROM incomes WHERE job_id = '$id';";
                                        $query2 = mysqli_query($conn, $query);

                                        while ($rows = mysqli_fetch_assoc($query2)) {

                                            $job_id = mysqli_escape_string($conn, $rows['job_id']);
                                            $client_name = mysqli_escape_string($conn, $rows['client_name']);
                                            $job_title = mysqli_escape_string($conn, $rows['job_title']);
                                            $client_contact = mysqli_escape_string($conn, $rows['client_contact']);
                                            $job_date = mysqli_escape_string($conn, $rows['job_date']);
                                            $income = mysqli_escape_string($conn, $rows['income']);
                                            $payment_status = mysqli_escape_string($conn, $rows['payment_status']);
                                            $description = mysqli_escape_string($conn, $rows['description']);

                                            


                            ?>
                            <form style="margin-top: 15px;" method="POST" action="operations/update_income.php?id=<?php echo $id; ?>">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"><label class="form-label" for="username">
                                            <strong>Job Title</strong>
                                        </label>
                                        <input class="form-control" type="text" id="username" placeholder="Job Title"value="<?php echo $job_title;?>" name="client_name">
                                    </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">
                                                <strong>Client Name</strong>
                                            </label>
                                            <input class="form-control" type="text" id="email" placeholder="Client Name"value="<?php echo $client_name;?>" name="job_title" min="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="first_name">
                                                <strong>Client Contact Info</strong>
                                            </label>
                                            <input class="form-control" type="tel" id="first_name" placeholder="Client Contact" value="<?php echo $client_contact;?>" name="client_contact">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="last_name">
                                                <strong>Job Date</strong>
                                                <input class="form-control" type="date" name="job_date" value="<?php echo $job_date;?>" min="2005" disabled>
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
                                            <input class="form-control" type="number" id="first_name-3"value="<?php echo $income;?>" placeholder="Total Cost" name="income" min="100">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                             <label class="form-label" for="first_name">
                                                <strong>Payment Status</strong>
                                                <select class="form-select" name="payment_status">
                                                    <optgroup label="Choose Payment Status">

                                                        <option <?php if($payment_status === "Paid") { echo 'selected="selected"'; } ?>>Paid</option>
                                                        <option <?php if($payment_status === "Partial-Paid") { echo 'selected="selected"'; } ?>>Partial-Paid</option>
                                                        <option <?php if($payment_status === "Not Paid") { echo 'selected="selected"'; } ?>>Not Paid</option>

                                                    </optgroup>
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
                                            <textarea rows="5" class="form-control" name="description"><?php echo $description;?></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit" name="update">Update Job</button></div>
                            </form>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
<?php
    require 'main_pages/footer.php';

?>