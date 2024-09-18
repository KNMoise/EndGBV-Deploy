<?php 

    require 'includes/db.php';
    require 'session.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);

    require 'main_pages/top_nav.php';

?>


                <div class="container-fluid" style="margin-top: 0;">
                    <h3 class="text-dark mb-4">Single Testimonial Viewing</h3>
                    <div class="card shadow mb-4">
                        <?php
                            $id = mysqli_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM testimonials WHERE test_id = '$id';";
                            $query2 = mysqli_query($conn, $query);

                            while ($rows = mysqli_fetch_assoc($query2)) {

                                $test_id = mysqli_escape_string($conn, $rows['test_id']);
                                $testimonial_name = mysqli_escape_string($conn, $rows['testimonial_name']);
                                $company = mysqli_escape_string($conn, $rows['company']);
                                $image_url = mysqli_escape_string($conn, $rows['image_url']);
                                $testimony = mysqli_escape_string($conn, $rows['testimony']);
                        ?>
                        <div class="card-header py-3">
                            <h6 class="text-primary m-0 fw-bold"><?php echo $testimonial_name; ?> Testimonial Viewing</h6>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <p class="m-0" style="margin-bottom: 0;">Complete Description About Single Testimony</p>
                                <form>
                                    <div class="row" style="margin-top: 17px;">
                                        <div class="col" style="margin-top: 0;">
                                            <div class="mb-3">
                                                <div>
                                                    <label class="form-label" for="question">
                                                        <strong>Testimony Profile</strong>
                                                    </label>
                                                </div>
                                                <img class="img-fluid" src="assets/img/frontend_images/<?php echo $image_url; ?>">
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="mb-3">
                                                <label class="form-label" for="answer">
                                                    <strong>Testimonial Names</strong>
                                                </label>
                                                <input class="form-control" type="text" id="first_name-3" placeholder="Testimonial Name" disabled="" readonly="" value="<?php echo $testimonial_name; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="answer">
                                                    <strong>Company</strong>
                                                </label>
                                                <input class="form-control" type="text" id="first_name-1" placeholder="Company" disabled="" readonly="" value="<?php echo $company; ?>">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="port_desc">
                                                    <strong>Testimony</strong>
                                                </label>
                                                <textarea class="form-control" placeholder="Testimony" rows="10" disabled="" readonly=""><?php echo $testimony; ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <a class="btn btn-success btn-icon-split" role="button" href="client_side_pages.php">
                                            <span class="text-white-50 icon">
                                                <i class="fas fa-check"></i>
                                            </span>
                                            <span class="text-center text-white text">Back</span>
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
    require 'main_pages/footer.php';

?>