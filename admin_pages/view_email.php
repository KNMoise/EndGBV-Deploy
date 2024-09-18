<?php 

    require 'includes/db.php';
    require 'session.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);

    require 'main_pages/top_nav.php';

?>


            <div class="container-fluid" style="margin-top: 0;">
                <h3 class="text-dark mb-4">E-mails</h3>
                <?php
                            $email_id = $_GET['id'];

                            $change = "UPDATE emails SET state = '1' WHERE email_id = '$email_id';";
                            $change2= mysqli_query($conn, $change);

                            $query = "SELECT * FROM emails WHERE email_id='$email_id';";
                            $query2 = mysqli_query($conn, $query);

                            while ($row = mysqli_fetch_assoc($query2)) {
                                
                            $sender_names = $row['sender_names'];
                            $email = $row['sender_email'];
                            $subject = $row['subject'];
                            $message = $row['message'];

                        ?>
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">E-mail From <?php echo $sender_names; ?></p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><input class="form-control" type="text" id="username-1" placeholder="Names" name="client_names" style="height: 55px;" value="<?php echo $sender_names; ?>" disabled></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><input class="form-control" type="email" id="email-1" placeholder="user@example.com" name="email" style="height: 55px;" value="<?php echo $email; ?>" disabled></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="mb-3"><input class="form-control" type="text" id="first_name-1" placeholder="Subject" name="subject" style="height: 55px;" value="<?php echo $subject; ?>" disabled></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label"><br><textarea class="form-control" rows="7" cols="143" placeholder="Message" disabled><?php echo $message; ?></textarea></label></div>
                                </div>
                            </div>
                            <div class="mb-3">
                                <a class="btn btn-primary btn-icon-split" role="button" href="emails.php">
                                    <span class="text-black-50 icon">
                                        <i class="fas fa-arrow-left" style="font-size: 14px;"></i>
                                    </span>
                                    <span class="text">Back</span>
                                </a>
                                <a class="btn btn-danger btn-icon-split" role="button" style="margin-left: 6px;" href="operations/delete_email.php?id=<?php echo $email_id; ?>">
                                    <span class="text-white-50 icon"><i class="fas fa-trash"></i></span> 
                                    <span class="text-white text">Delete</span>
                                </a></div>
                        </form>
                    <?php } ?>
                    </div>
                </div>
            </div>
<?php
    require 'main_pages/footer.php';

?>