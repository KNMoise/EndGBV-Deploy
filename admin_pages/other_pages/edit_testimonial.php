<?php 

    require "../includes/db.php";
    require '../session2.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);
    
    require '../main_pages/top_nav_for_other_pages.php';


 ?>
      
                <div class="container-fluid" style="margin-top: 0;">
                    <h3 class="text-dark mb-4">Testimonial Editing</h3>
                    <div class="card shadow mb-4">
                         <?php 

                                $test_id = mysqli_escape_string($conn, $_GET['id']);
                                $query = "SELECT * FROM testimonials WHERE test_id = '$test_id';";
                                $query2 = mysqli_query($conn, $query);


                                while ($rows = mysqli_fetch_assoc($query2)) {

                                    $test_id = mysqli_escape_string($conn, $rows['test_id']);
                                    $testimonial_name = mysqli_escape_string($conn, $rows['testimonial_name']);
                                    $company = mysqli_escape_string($conn, $rows['company']);
                                    $testimony = mysqli_escape_string($conn, $rows['testimony']);
                                    $image_url = mysqli_escape_string($conn, $rows['image_url']);

                        ?>
                        <div class="card-header py-3">
                            <h6 class="text-primary m-0 fw-bold"><?php echo $testimonial_name; ?> Testimonial Editing</h6>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <p class="m-0">Update Information You wish to Change..</p>
                                <form method="POST" action="../operations/update_testimonial.php?id=<?php echo $test_id; ?>" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="testimonial_name">
                                                    <strong>Testimonial Name</strong>
                                                </label>
                                                <input class="form-control" type="text" id="username" value="<?php echo $testimonial_name; ?>" placeholder="Testimonial Names" name="testimonial_name">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="testimonial_company">
                                                    <strong>Company</strong>
                                                </label>
                                                <input class="form-control" type="text" id="username-1"value="<?php echo $company; ?>" placeholder="Company" name="testimonial_company">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="first_name">
                                                    <strong>Testimony</strong>
                                                </label>
                                                <textarea class="form-control" placeholder="testimony" name="testimony"><?php echo $testimony; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 16px;">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="first_name">
                                                    <strong>Profile</strong>
                                                </label>
                                                <input class="form-control" type="file" id="first_name-1" placeholder="testimony" name="fileToUpload">
                                            </div>
                                        </div>
                                        <div class="col" style="text-align: center;">
                                            <img class="img-fluid" src="../assets/img/frontend_images/<?php echo $image_url; ?>" style="height: 108.328px;">
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-success btn-icon-split" name="update">
                                          <span class="text-white-50 icon">
                                            <i class="fas fa-check"></i>
                                          </span>
                                          <span class="text-center text-white text">Update Testimonial</span>
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