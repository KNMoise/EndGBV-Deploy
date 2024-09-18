<?php 

    require "../includes/db.php";
    require '../session2.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);
    
    require '../main_pages/top_nav_for_other_pages.php';


 ?>
                <div class="container-fluid" style="margin-top: 0;">
                    <h3 class="text-dark mb-4">Service Editing</h3>
                    <div class="card shadow mb-4">
                         <?php 
                                        $service_id = mysqli_escape_string($conn, $_GET['id']);

                                        $query = "SELECT * FROM services WHERE service_id='$service_id';";
                                        $query2 = mysqli_query($conn, $query);

                                        while ($rows = mysqli_fetch_assoc($query2)) {
                                            
                                            $service_id = mysqli_escape_string($conn, $rows['service_id']);
                                            $service_title = mysqli_escape_string($conn, $rows['service_title']);
                                            $service_desc = mysqli_escape_string($conn, $rows['service_desc']);

                                    ?>
                        <div class="card-header py-3">
                            <h6 class="text-primary m-0 fw-bold"><?php echo $service_title; ?> Service Editing</h6>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <p class="m-0">Update Information You wish to Change..</p>
                                <form action="../operations/update_service.php?id=<?php echo $service_id; ?>" method="POST">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="username">
                                                    <strong>Service Title</strong>
                                                </label>
                                                <input class="form-control" type="text" id="username-1" placeholder="Title" value="<?php echo $service_title; ?>" name="service_title">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="port_subtitle">
                                                    <strong>Service Description</strong>
                                                </label>
                                                  <textarea class="form-control" rows="3" name="service_desc" placeholder="Service Description"><?php echo $service_desc; ?></textarea>
                                            </div>

                                            
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                          <button type="submit" class="btn btn-success btn-icon-split" name="update">
                                          <span class="text-white-50 icon">
                                            <i class="fas fa-check"></i>
                                          </span>
                                          <span class="text-center text-white text">Update Service</span>
                                        </button>

                                        <a class="btn btn-danger btn-icon-split" role="button" href="../client_side_pages.php">
                                            <span class="text-white-50 icon">
                                                <i class="fas fa-arrow-left"></i>
                                            </span>
                                            <span class="text-center text-white text">Cancel</span>
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
    require '../main_pages/footer_for_other_pages.php';

?>