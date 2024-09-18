<?php 

    require 'includes/db.php';
    require 'session.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);

    require 'main_pages/top_nav.php';

?>


                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Customers E-mails</h3>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Recent E-mails</p>
                        </div>

                        <div class="card-body">
                           <?php
                                $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                if (strpos($full_url, "error=deletesuccess") !== false) {
                                    echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            E-mail SuccessFully Deleted!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    ";
                                } else if(strpos($full_url, "error=deletefail") !== false){
                                    echo "
                                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                            E-mail Failed To Be Deleted!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    ";
                                }
                            ?>


                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                <table id="emailtable" class="display compact table my-0" style="width:100%">
                                    <thead>
                                        <tr class="text-start">
                                            <th>#</th>
                                            <th>From</th>
                                            <th>Subject</th>
                                            <th>Date/Time</th>
                                            <th>State</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $query = "SELECT * FROM emails ORDER BY state DESC;";
                                            $query2 = mysqli_query($conn, $query);

                                            while ($row = mysqli_fetch_assoc($query2)) {
                                                
                                                $email_id = $row['email_id'];
                                                $sender_names = $row['sender_names'];
                                                $subject = $row['subject'];
                                                $date = $row['date_sent'];
                                                $state = $row['state'];




                                        ?>
                                        <tr class="text-start" style="text-align: center;">
                                            <td><?php echo $email_id; ?></td>
                                            <td><?php echo $sender_names; ?></td>
                                            <td><?php echo $subject; ?></td>
                                            <td><?php echo $date; ?></td>
                                            <td> 
                                                <?php 
                                                    if ($state == '0') {
                                                        echo "<li class='fa fa-eye-slash'></li>";
                                                    } else {
                                                         echo "<li class='fa fa-eye'></li>";
                                                    }

                                                ?>
                                                
                                            </td>

                                            <td class="text-end" style="margin: 4px;">
                                                <a class="btn btn-success" role="button" href="view_email.php?id=<?php echo $email_id; ?>">
                                                    <i class="fas fa-eye" style="font-size: 18px;"></i>
                                                </a>
                                                <a class="btn btn-danger" role="button" href="operations/delete_email.php?id=<?php echo $email_id; ?>">
                                                    <i class="fas fa-trash" style="font-size: 18px;"></i>
                                                </a>
                                                </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-start">
                                            <td><strong>#</strong></td>
                                            <td><strong>From</strong></td>
                                            <td><strong>Subject</strong></td>
                                            <td><strong>Date/Time</strong></td>
                                            <td><strong>State</strong></td>
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