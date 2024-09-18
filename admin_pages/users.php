<?php 

    require 'includes/db.php';
    require 'session.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);

    require 'main_pages/top_nav.php';

?>


                <div class="container-fluid">
                    <h3 class="text-dark mb-4">System Users</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">All Users</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                 <?php

                                        $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                        if (strpos($full_url, "error=deleteusersuccess") !== false) {
                                            echo "
                                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                                    User Deleted Successfully!!!
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";
                                        }else if (strpos($full_url, "error=newusersuccess") !== false) {
                                            echo "
                                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                    New User Successfully Registered!!
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";
                                        }else if (strpos($full_url, "error=nouserdata") !== false) {
                                            echo "
                                                <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                                    Check Your Fields!!
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";
                                        }else if (strpos($full_url, "error=updateusersuccess") !== false) {
                                            echo "
                                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                    System User Updated SuccessFully!!!!
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                                </div>
                                            ";}

                                    ?>
                                <div class="col-md-6 text-nowrap">
                                    <div id="dataTable_length" class="dataTables_length" aria-controls="dataTable" style="text-align: left;">
                                        <a class="btn btn-primary btn-icon-split" role="button" href="new_system_user.php"><span class="text-white-50 icon">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                        <span class="text-white text">New User</span>
                                    </a>
                                </div>
                                </div>
                            </div>
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table id="example" class="display compact table my-0" style="width:100%">
                                    <thead>
                                        <tr class="text-start">
                                            <th>#</th>
                                            <th>Names</th>
                                            <th>Username</th>
                                            <th>Contact</th>
                                            <th>Position</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                            $query = "SELECT * FROM users;";
                                            $query2 = mysqli_query($conn, $query);

                                            while ($rows = mysqli_fetch_assoc($query2)) {
                                                $user_id = mysqli_escape_string($conn, $rows['user_id']);
                                                $fname = mysqli_escape_string($conn, $rows['fname']);
                                                $lname = mysqli_escape_string($conn, $rows['lname']);
                                                $username = mysqli_escape_string($conn, $rows['username']);
                                                $contact = mysqli_escape_string($conn, $rows['email']);
                                                $position = mysqli_escape_string($conn, $rows['positions']);   
                                        ?>
                                                <tr class="text-start" style="text-align: center;">
                                                	<td><?php echo $user_id; ?></td>
                                                    <td><?php echo $fname." ".$lname; ?></td>
                                                    <td><?php echo $username; ?></td>
                                                    <td><?php echo $contact;  ?></td>
                                                    <td><?php echo $position; ?></td>
                                                    <td class="text-end" style="margin: 4px;">
                                                        <a class="btn btn-warning" role="button" style="margin-left: 3px;" href="edit_system_user.php?id=<?php echo $user_id; ?>">
                                                            <i class="far fa-edit"></i>
                                                        </a>
                                                        <a class="btn btn-danger" role="button" name="delete" style="margin-left: 3px;" href="operations/delete_user.php?id=<?php echo $user_id; ?>">
                                                            <i class="far fa-trash-alt"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                        <tfoot>
                                        <tr class="text-start">
                                            <th>#</th>
                                            <th>Names</th>
                                            <th>Username</th>
                                            <th>Contact</th>
                                            <td class="text-center"><strong>Actions</strong></td>
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