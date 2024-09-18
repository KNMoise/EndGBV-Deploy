<?php 

    require 'includes/db.php';
    require 'session.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);

    require 'main_pages/top_nav.php';

?>


                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Users/Edit User</h3>
                    <div class="card shadow">
                        <?php
                                $id = $_GET['id'];
                            $query = "SELECT * FROM users WHERE user_id='$id';";
                            $query2 = mysqli_query($conn, $query);

                             while ($rows = mysqli_fetch_assoc($query2)) {
                                $user_id = mysqli_escape_string($conn, $rows['user_id']);
                                $fname = mysqli_escape_string($conn, $rows['fname']);
                                $lname = mysqli_escape_string($conn, $rows['lname']);
                                $username = mysqli_escape_string($conn, $rows['username']);
                                $positions = mysqli_escape_string($conn, $rows['positions']);
                                $contact = mysqli_escape_string($conn, $rows['email']);
                                               

                                                
                        ?>
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Edit <?php echo $user_id; ?> Details&nbsp;</p>
                        </div>
                        <div class="card-body" style="margin-top: -3px;">
                            <div class="row">
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
                            <form style="margin-top: 15px;" action="operations/update_system_user.php?id=<?php echo $user_id; ?>" method="POST">
                                
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="first_name">
                                                <strong>First Name</strong>
                                            </label>
                                            <input class="form-control" type="text" placeholder="First Name" name="fname" value="<?php echo $fname; ?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">
                                                <strong>Last Name</strong>
                                            </label>
                                            <input class="form-control" type="text" placeholder="Last Name" name="lname" value="<?php echo $lname; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="first_name">
                                                <strong>Email</strong>
                                            </label>
                                            <input class="form-control" type="email" placeholder="Contact" name="contact" value="<?php echo $contact; ?>">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                             <div class="mb-3"> 
                                            <label class="form-label" for="email">
                                                <strong>Username</strong>
                                            </label>
                                            <input class="form-control" type="text" placeholder="Username" name="username" value="<?php echo $username; ?>">
                                        </div>
                                           
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                             <div class="mb-3"> 
                                            <label class="form-label" for="positions">
                                                <strong>Position</strong>
                                            </label>
                                            <input class="form-control" type="text" placeholder="positions" name="positions" value="<?php echo $positions; ?>">
                                        </div>
                                           
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="mb-3">
                                            <label class="form-label" for="email">
                                                <strong>Password</strong>
                                            </label>
                                            <input class="form-control" type="password" placeholder="Enter New Password" name="password" min="100">
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                             <div class="mb-3"> 
                                        </div>  
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <button class="btn btn-primary btn-sm" type="submit" name="new_user">Update&nbsp; User</button>
                                </div>
                            <?php } ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<?php
    require 'main_pages/footer.php';

?>

