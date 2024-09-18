<?php 

    require 'includes/db.php';
    require 'session.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);

    require 'main_pages/top_nav.php';

?>


                <div class="container-fluid" style="margin-top: 0;">
                    <h3 class="text-dark mb-4">Single portfolio Viewing</h3>
                    <div class="card shadow mb-4">
                        <?php
                            $port_id = mysqli_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM portfolio WHERE port_id = '$port_id';";
                            $query2 = mysqli_query($conn, $query);

                            while ($rows = mysqli_fetch_assoc($query2)) {

                                $port_id = mysqli_escape_string($conn, $rows['port_id']);
                                $title = mysqli_escape_string($conn, $rows['title']);
                                $description = mysqli_escape_string($conn, $rows['sub_title']);
                                $image_url = mysqli_escape_string($conn, $rows['image_url']);
                                $date_done = mysqli_escape_string($conn, $rows['date_done']);
                        ?>
                        <div class="card-header py-3">
                            <h6 class="text-primary m-0 fw-bold"><?php echo $title; ?> Port Viewing</h6>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <p class="m-0" style="margin-bottom: 0;">Single Portfolio Item View</p>
                                <form>
                                    <div class="row" style="margin-top: 17px;">
                                        <div class="col" style="margin-top: 0;">
                                            <div class="mb-3">

                                                <div>
                                                    <label class="form-label" for="port_profile">
                                                        <strong>Portfolio Profile</strong>
                                                    </label>
                                                </div>
                                                <img class="img-fluid" src="assets/img/frontend_images/<?php echo $image_url; ?>">
                                            </div>
                                        </div>
                                        <div class="col text-start">
                                            <div class="mb-3">
                                                <label class="form-label" for="answer">
                                                <strong>Title</strong>
                                        </label>
                                            <input class="form-control" type="text" id="first_name-3" placeholder="Portfolio Title" name="port_title" disabled="" readonly="" value="<?php echo $title; ?>">
                                        </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="port_desc">
                                                <strong>Description</strong>
                                        </label>
                                            <textarea class="form-control" name="port_descr" placeholder="Portfolio Description" rows="10" disabled="" readonly=""><?php echo $description; ?></textarea>
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