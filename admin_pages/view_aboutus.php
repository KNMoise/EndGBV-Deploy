<?php

require 'includes/db.php';
require 'session.php';

$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") or DIE('Error In Session');
$row = mysqli_fetch_array($result);

require 'main_pages/top_nav.php';

?>


<div class="container-fluid" style="margin-top: 0;">
    <h3 class="text-dark mb-4">About Us Stats Editing</h3>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="text-primary m-0 fw-bold">xxx Stats Viewing</h6>
        </div>
        <div class="card-body">
            <div class="card-body">
                <p class="m-0" style="margin-bottom: 0;">About us Description And Stats Overview</p>
                <form>
                    <?php
                    $about_id = mysqli_escape_string($conn, $_GET['id']);
                    $query = "SELECT * FROM about_us WHERE about_id = '$about_id'";
                    $query2 = mysqli_query($conn, $query);

                    while ($rows = mysqli_fetch_assoc($query2)) {

                        $about_id = mysqli_escape_string($conn, $rows['about_id']);
                        $description = mysqli_escape_string($conn, $rows['description']);
                        //$happy_clients = mysqli_escape_string($conn, $rows['happy_clients']);
                        //$projects_done = mysqli_escape_string($conn, $rows['projects_done']);
                        //$experiance = mysqli_escape_string($conn, $rows['experiance']);
                    
                        ?>
                        <div class="row" style="margin-top: 17px;">
                            <div class="col" style="margin-top: 0;">
                                <div class="mb-3">
                                    <label class="form-label" for="question">
                                        <strong>About Us Description</strong>
                                    </label>
                                    <textarea class="form-control" name="desc_aboutus"
                                        placeholder="About Us Description In Details" rows="10"
                                        disabled=""><?php echo $description; ?></textarea>
                                </div>
                            </div>
                            <!--   <div class="col text-start">
                                            <div class="mb-3">
                                                <label class="form-label" for="answer">
                                                    <strong>Happy Clients</strong>
                                                </label>
                                                <input class="form-control" type="number" id="first_name-3" value = "<?php echo $happy_clients; ?>" placeholder="No of Happy Clients" name="happy_clients" disabled="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="answer">
                                                    <strong>Projects</strong>
                                                </label>
                                                <input class="form-control" type="number" id="first_name-10" value = "<?php echo $projects_done; ?>" placeholder="Projects" name="happy_clients" disabled="">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="answer">
                                                    <strong>Experience</strong>
                                                </label>
                                                <input class="form-control" type="number" id="first_name-9" value = "<?php echo $experiance; ?>" placeholder="Experience" name="experience" disabled="">
                                            </div>
                                        </div>  -->
                        </div>
                        <div class="mb-3">
                            <a class="btn btn-success btn-icon-split" role="button" href="client_side_pages.php">
                                <span class="text-white-50 icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text-center text-white text">Back</span>
                            </a>

                            <a class="btn btn-primary btn-icon-split" role="button"
                                href="other_pages/edit_aboutus.php?id=<?php echo $about_id; ?>">
                                <span class="text-white-50 icon">
                                    <i class="fas fa-check"></i>
                                </span>
                                <span class="text-center text-white text">Edit</span>
                            </a>
                        </div>

                    <?php } ?>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<?php
require 'main_pages/footer.php';

?>