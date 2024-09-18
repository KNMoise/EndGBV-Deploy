<?php 

    require 'includes/db.php';
    require 'session.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);

    require 'main_pages/top_nav.php';

?>


                 <div class="container-fluid" style="margin-top: 0;">
                    <h3 class="text-dark mb-4">Reports</h3>
                    <div class="card shadow mb-3">
                        <div class="card-header py-3">
                            <p class="text m-0 fw-bold" style="color: #0e453a;">Customize Your Report.</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col"><a class="btn btn-primary" role="button" style="width: 100%;background: rgb(14,69,58);" href="reports/day.php">Today</a></div>
                                <div class="col"><a class="btn btn-primary" role="button" style="width: 100%;background: rgb(14,69,58);" href="reports/week.php">This Week</a></div>
                                <div class="col"><a class="btn btn-primary" role="button" style="width: 100%;background: rgb(14,69,58);" href="reports/month.php">This Month</a></div>
                            </div>
                            <form style="margin-top: 16px;" method="POST" action="reports/custom_date.php">
                                <div class="row">
                                    <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="username">
                                                    <strong>From</strong>
                                                </label>
                                                <input class="form-control" type="date"  min="2023-01-01" name="from_date">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="username">
                                                    <strong>To</strong>
                                                </label>
                                                <input class="form-control" type="date" name="to_date">
                                            </div>
                                            <div class="text-center">
                                               <button class="btn btn-success btn-icon-split" type="submit">
                                                <span class="text-white-50 icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                                        <path d="M7 18H17V16H7V18Z" fill="currentColor"></path>
                                                        <path d="M17 14H7V12H17V14Z" fill="currentColor"></path>
                                                        <path d="M7 10H11V8H7V10Z" fill="currentColor"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C4.34315 2 3 3.34315 3 5V19C3 20.6569 4.34315 22 6 22H18C19.6569 22 21 20.6569 21 19V9C21 5.13401 17.866 2 14 2H6ZM6 4H13V9H19V19C19 19.5523 18.5523 20 18 20H6C5.44772 20 5 19.5523 5 19V5C5 4.44772 5.44772 4 6 4ZM15 4.10002C16.6113 4.4271 17.9413 5.52906 18.584 7H15V4.10002Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <span class="text-white text">Generate Report</span>
                                            </button>
                                            </div>
                            </form>
                                    </div>
                                    <div class="col">
                                        <form method="POST" action="reports/single_job_report.php">
                                            <div class="mb-3">
                                                <label class="form-label" for="username">
                                                    <strong>Custom Job</strong>
                                                </label>
                                                <select class="form-select" name="job">
                                                         <option>Choose Job</option>
                                                        <?php
                                                            $sql = "SELECT * FROM incomes;";
                                                            $sql2 = mysqli_query($conn, $sql);

                                                            while ($row = mysqli_fetch_assoc($sql2)) {
                                                                $job_id = $row['job_id'];
                                                                $job_title = $row['job_title'];
                                                         ?>
                                                        <option value="<?php echo $job_id; ?>"><?php echo $job_title; ?></option>
                                                        <?php } ?>
                                                </select>
                                            </div>
                                            <div class="text-center">
                                                <button class="btn btn-success btn-icon-split" type="submit" style="margin-top: 85px;">
                                                <span class="text-white-50 icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                                        <path d="M7 18H17V16H7V18Z" fill="currentColor"></path>
                                                        <path d="M17 14H7V12H17V14Z" fill="currentColor"></path>
                                                        <path d="M7 10H11V8H7V10Z" fill="currentColor"></path>
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M6 2C4.34315 2 3 3.34315 3 5V19C3 20.6569 4.34315 22 6 22H18C19.6569 22 21 20.6569 21 19V9C21 5.13401 17.866 2 14 2H6ZM6 4H13V9H19V19C19 19.5523 18.5523 20 18 20H6C5.44772 20 5 19.5523 5 19V5C5 4.44772 5.44772 4 6 4ZM15 4.10002C16.6113 4.4271 17.9413 5.52906 18.584 7H15V4.10002Z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                                <span class="text-white text">Generate Report</span>
                                            </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
    require 'main_pages/footer.php';

?>