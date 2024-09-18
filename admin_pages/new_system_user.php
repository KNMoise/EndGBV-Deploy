<?php 

    require 'includes/db.php';
    require 'session.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);

    require 'main_pages/top_nav.php';

?>


                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Users/New User</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">New User&nbsp;</p>
                        </div>
                        <div class="card-body" style="margin-top: -3px;">
                            <div class="row">
                                 <?php

                                        $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                        if (strpos($full_url, "error=nouserdata") !== false) {
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
                                        <a class="btn btn-success btn-icon-split" role="button" href="users.php">
                                            <span class="text-white-50 icon">
                                                <i class="fas fa-eye"></i>
                                            </span>
                                            <span class="text-white text">View Users</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="text-md-end dataTables_filter" id="dataTable_filter"></div>
                                </div>
                            </div>
                            <form style="margin-top: 15px;" action="operations/new_user.php" method="POST">
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3"> 
                                            <label class="form-label" for="username">
                                                <strong>First Name</strong>
                                            </label>
                                            <input class="form-control" type="text" placeholder="First Name" name="fname">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3"> 
                                            <label class="form-label" for="username">
                                                <strong>Last Name</strong>
                                            </label>
                                            <input class="form-control" type="text" placeholder="Last Name" name="lname">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                             <div class="mb-3">
                                            <label class="form-label" for="first_name">
                                                <strong>Contact</strong>
                                            </label>
                                            <input class="form-control" type="tel" placeholder="Contact" name="contact">
                                        </div>
                                           
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                             <div class="mb-3">
                                            <label class="form-label" for="first_name">
                                                <strong>Position</strong>
                                            </label>
                                            <input class="form-control" type="text" placeholder="lawyer,doctor,psychologist" name="positions">
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                             <label class="form-label" for="email">
                                                <strong>Username</strong>
                                            </label>
                                            <input class="form-control" type="text" placeholder="Username" name="username" min="100">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">
                                                <strong>Password</strong>
                                            </label>
                                            <input class="form-control" type="password" placeholder="Password" name="password" min="100">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit" name="new_user">Save&nbsp; User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
    require 'main_pages/footer.php';

?>