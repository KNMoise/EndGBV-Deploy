<?php 
    require "../includes/db.php";
    require '../session2.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);
    
    require '../main_pages/top_nav_for_other_pages.php';


 ?>
                <div class="container-fluid" style="margin-top: 0;">
                    <h3 class="text-dark mb-4">Portfolio Editing</h3>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary m-0 fw-bold">
                                    <?php
                                            $id = mysqli_escape_string($conn, $_GET['id']);
                                            $query = "SELECT * FROM portfolio WHERE port_id ='$id';";
                                            $query2 = mysqli_query($conn, $query);

                                            while ($rows = mysqli_fetch_assoc($query2)) {

                                                $port_id = mysqli_escape_string($conn, $rows['port_id']);
                                                $title = mysqli_escape_string($conn, $rows['title']);

                                            ?>





                             <?php  echo $title; ?> Portfolio Editing<?php } ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <p class="m-0">Update Information You wish to Change..</p>
                                 <?php
                                            $id = mysqli_escape_string($conn, $_GET['id']);
                                            $query = "SELECT * FROM portfolio WHERE port_id ='$id';";
                                            $query2 = mysqli_query($conn, $query);

                                            while ($rows = mysqli_fetch_assoc($query2)) {

                                                $port_id = mysqli_escape_string($conn, $rows['port_id']);
                                                $title = mysqli_escape_string($conn, $rows['title']);
                                                $sub_title = mysqli_escape_string($conn, $rows['sub_title']);
                                                $image_url = mysqli_escape_string($conn, $rows['image_url']);
                                                $date_done = mysqli_escape_string($conn, $rows['date_done']);
                                ?>
                                <form action="../operations/update_portfolio.php?id=<?php echo $port_id; ?>" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="username">
                                                    <strong>Title</strong>
                                                </label>
                                                <input class="form-control" type="text" id="username-6" placeholder="Title" value="<?php echo $title; ?> " name="port_title">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="port_subtitle">
                                                    <strong> Description</strong>
                                                </label>
                                                <textarea name="port_subtitle" class="form-control"><?php echo $sub_title; ?></textarea>
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="row" style="margin-bottom: 23px;">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label class="form-label" for="first_name">
                                                    <strong>Image</strong>
                                                </label>
                                                <input class="form-control" type="file" id="first_name-7" placeholder="testimony" name="fileToUpload">
                                            </div>
                                        </div>
                                        <div class="col" style="text-align: center;">
                                            <img class="img-fluid" src="../assets/img/frontend_images/<?php echo $image_url; ?>" style="height: 107.328px;">
                                        </div>
                                    </div>
                                    <div class="mb-3">

                                        <button type="submit" class="btn btn-success btn-icon-split" name="update">
                                          <span class="text-white-50 icon">
                                            <i class="fas fa-check"></i>
                                          </span>
                                          <span class="text-center text-white text">Update Portfolio</span>
                                        </button>

                                         <a href="../client_side_pages.php" class="btn btn-danger btn-icon-split" role="button">
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