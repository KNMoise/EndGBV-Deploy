<?php 

    require 'includes/db.php';
    require 'session.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);

    require 'main_pages/top_nav.php';

?>


                <div class="container-fluid">
                    <h3 class="text-dark mb-4">Profile</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4 col-xl-12">
                            <div class="card mb-3">
                                <?php
                                $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                if (strpos($full_url, "error=profileok") !== false) {
                                    echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            Your Profile Info SuccessFully Updated!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    ";
                                }else if(strpos($full_url, "error=profilenotok") !== false){
                                    echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            Your Profile Info SuccessFully Updated!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    ";
                                }


                                 ?>
                                <div class="card-body text-center shadow">
                                    <div class="row">
                                        <div class="col">
                                            <div class="card shadow mb-3">
                                                <div class="card-header py-3">
                                                    <p class="text-primary m-0 fw-bold">Your Info</p>
                                                </div>
                                                <div class="card-body">
                                                    <div class="row">
                                                        <div class="col">
                                                            <img class="rounded-circle mb-3 mt-4" src="assets/img/users/<?php echo $row['image_url']; ?>" width="160" height="160">
                                                            <div class="mb-3">

                                                                <form method="POST" action="operations/update_profile.php?id=<?php echo $row['user_id'] ?>" enctype="multipart/form-data">
                                                                    <div class="col">
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="mb-3">
                                                                                    <label class="form-label" for="username">
                                                                                        <strong>New Profile</strong>
                                                                                    </label>
                                                                                    <input class="form-control" type="file" name="fileToUpload">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="mb-3">
                                                                                    <label class="form-label" for="email">
                                                                                        <strong>Password</strong>
                                                                                    </label>
                                                                                    <input class="form-control" type="password" id="email" placeholder="Password" name="password" value="<?php echo $row['password']; ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="mb-3">
                                                                                    <label class="form-label" for="username">
                                                                                        <strong>Username</strong>
                                                                                    </label>
                                                                                    <input class="form-control" type="text" id="username" placeholder="Username" name="username" value="<?php echo $row['username']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="mb-3">
                                                                                    <label class="form-label" for="email">
                                                                                        <strong>Email Address</strong>
                                                                                    </label>
                                                                                    <input class="form-control" type="email" id="email" placeholder="user@example.com" name="email" value="<?php echo $row['email']; ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col">
                                                                                <div class="mb-3">
                                                                                    <label class="form-label" for="first_name">
                                                                                        <strong>First Name</strong>
                                                                                    </label>
                                                                                    <input class="form-control" type="text" id="first_name" placeholder="First Name" name="first_name" value="<?php echo $row['fname']; ?>">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col">
                                                                                <div class="mb-3">
                                                                                    <label class="form-label" for="last_name">
                                                                                        <strong>Last Name</strong>
                                                                                    </label>
                                                                                    <input class="form-control" type="text" id="last_name" placeholder="Last Name" name="last_name" value="<?php echo $row['lname']; ?>">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <button class="btn btn-primary btn-sm" type="submit">Update Your Profile</button>
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
    require 'main_pages/footer.php';

?>