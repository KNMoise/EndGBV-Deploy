<?php 

    require "../includes/db.php";
    require '../session2.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);
    
    require '../main_pages/top_nav_for_other_pages.php';


 ?>
                <div class="container-fluid" style="margin-top: 0;">
                    <h3 class="text-dark mb-4">Team Editing</h3>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary m-0 fw-bold">
                                <?php
                                        $member_id = mysqli_escape_string($conn, $_GET['id']);

                                        $query = "SELECT * FROM team WHERE member_id = '$member_id';";
                                        $query2 = mysqli_query($conn, $query);

                                        while ($rows = mysqli_fetch_assoc($query2)) {
                                            $names = mysqli_escape_string($conn, $rows['names']);
                                       

                                ?>
                                <?php echo $names; ?>
                             Info Member Editing <?php } ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <p class="m-0">Update Information You wish to Change..</p>
                                <?php 

                                        $member_id = mysqli_escape_string($conn, $_GET['id']);

                                        $query = "SELECT * FROM team WHERE member_id = '$member_id';";
                                        $query2 = mysqli_query($conn, $query);

                                        while ($rows = mysqli_fetch_assoc($query2)) {
                                            $member_id = mysqli_escape_string($conn, $rows['member_id']);
                                            $names = mysqli_escape_string($conn, $rows['names']);
                                            $position = mysqli_escape_string($conn, $rows['position']);
                                            $image_url = mysqli_escape_string($conn, $rows['image_url']);
                                            $instagram_url = mysqli_escape_string($conn, $rows['instagram_url']);
                                            $twitter_url = mysqli_escape_string($conn, $rows['twitter_url']);
                                            $email = mysqli_escape_string($conn, $rows['email']);
                                        
                                ?>
                                <form method="POST" action="../operations/update_team.php?id=<?php echo $member_id; ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="names">
                                                    <strong>Names</strong>
                                                </label>
                                                <input class="form-control" type="text" id="username-4" value="<?php echo $names; ?>" placeholder="Names" name="names" required="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="position">
                                                    <strong>Position</strong>
                                                    <select class="form-select" name="position">
                                                        <optgroup label="Select Position">
                                                            <option><?php echo $position; ?></option>
                                                            <option><?php echo $position; ?>Founder</option>
                                                            <option>Co-Founder</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="first_name">
                                                    <strong>New Image</strong>
                                                </label>
                                                <input class="form-control" type="file" id="first_name-2" placeholder="testimony" name="fileToUpload">
                                            </div>
                                        </div>
                                        <div class="col order-last" style="text-align: center;">
                                            <img class="img-fluid" src="../assets/img/frontend_images/<?php echo $image_url; ?>" style="height: 124.328px;">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="first_name">
                                                    <strong>Social Medias</strong>
                                                </label>
                                                <input class="form-control" type="url" id="first_name-4" value="<?php echo $instagram_url; ?>" placeholder="Instagram URL" name="instagram">
                                                <input class="form-control" type="url" id="first_name-6" value="<?php echo $twitter_url; ?>" placeholder="Twitter URL" name="twitter">
                                                <input class="form-control" type="email" id="first_name-5" value="<?php echo $email; ?>" placeholder="E-mail" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">

                                         <button type="submit" class="btn btn-success btn-icon-split" name="update">
                                          <span class="text-white-50 icon">
                                            <i class="fas fa-check"></i>
                                          </span>
                                          <span class="text-center text-white text">Update Member</span>
                                        </button>

                                        <a class="btn btn-danger btn-icon-split" role="button" href="../client_side_pages.php">
                                            <span class="text-white-50 icon">
                                                <i class="fas fa-arrow-left"></i>
                                            </span>
                                            <span class="text-center text-white text">Cancel</span>
                                        </a>
                                        </div>
                                </form>
                            <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
    require '../main_pages/footer_for_other_pages.php';

?>