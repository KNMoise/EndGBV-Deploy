<?php 
    
    require "../includes/db.php";
    require '../session2.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);
    
    require '../main_pages/top_nav_for_other_pages.php';


    

 ?>
                <div class="container-fluid" style="margin-top: 0;">
                    <h3 class="text-dark mb-4">About Us Stats Editing</h3>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="text-primary m-0 fw-bold">xxx Stats Editing</h6>
                        </div>
                        <div class="card-body">
                            <div class="card-body">
                                <p class="m-0">Update Information You wish to Change..</p>
                                  <?php
                                                $query = "SELECT * FROM about_us LIMIT 1;";
                                                $query2 = mysqli_query($conn, $query);

                                                while ($rows = mysqli_fetch_assoc($query2)) {

                                                    $about_id = mysqli_escape_string($conn, $rows['about_id']);
                                                    $description = mysqli_escape_string($conn, $rows['description']);
                                                    //$happy_clients = mysqli_escape_string($conn, $rows['happy_clients']);
                                                    //$projects_done = mysqli_escape_string($conn, $rows['projects_done']);
                                                    //$experiance = mysqli_escape_string($conn, $rows['experiance']);
                                             
                                    ?>
                                <form method="POST" action="../operations/update_aboutus.php?id=<?php echo $about_id; ?>">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="question">
                                                    <strong>About Us Description</strong>
                                                </label>
                                                <textarea class="form-control" name="desc_aboutus" placeholder="About Us Description In Details" rows="10">
                                                <?php echo $description; ;?>
                                            </textarea>
                                        </div>
                                        </div>
                                    </div>
                            <!--       <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="answer">
                                                    <strong>Happy Clients</strong>
                                                </label>
                                                <input class="form-control" type="number" id="first_name-3" value="<?php echo $happy_clients; ;?>" placeholder="No of Happy Clients" name="happy_clients">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="answer">
                                                    <strong>Projects</strong>
                                                </label>
                                                <input class="form-control" type="number" id="first_name-10" value="<?php echo $projects_done; ;?>" placeholder="Projects" name="projects">
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="answer">
                                                    <strong>Experience</strong>
                                                </label>
                                                <input class="form-control" type="number" id="first_name-9" value="<?php echo $experiance; ;?>" placeholder="Experience" name="experience">
                                            </div>
                                        </div>
                                    </div>  -->
                                    <div class="mb-3">
                                         <button type="submit" class="btn btn-success btn-icon-split" name="update">
                                          <span class="text-white-50 icon">
                                            <i class="fas fa-check"></i>
                                          </span>
                                          <span class="text-center text-white text">Update Stats</span>
                                        </button>

                                        <a class="btn btn-danger btn-icon-split" role="button" style="margin-left: 8px;" href="../client_side_pages.php"><span class="text-white-50 icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-96 0 512 512" width="1em" height="1em" fill="currentColor">
                                                    <!--! Font Awesome Free 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) Copyright 2022 Fonticons, Inc. -->
                                                    <path d="M310.6 361.4c12.5 12.5 12.5 32.75 0 45.25C304.4 412.9 296.2 416 288 416s-16.38-3.125-22.62-9.375L160 301.3L54.63 406.6C48.38 412.9 40.19 416 32 416S15.63 412.9 9.375 406.6c-12.5-12.5-12.5-32.75 0-45.25l105.4-105.4L9.375 150.6c-12.5-12.5-12.5-32.75 0-45.25s32.75-12.5 45.25 0L160 210.8l105.4-105.4c12.5-12.5 32.75-12.5 45.25 0s12.5 32.75 0 45.25l-105.4 105.4L310.6 361.4z"></path>
                                                </svg></span><span class="text-white text">Cancel</span></a></div>
                                </form>
                               <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
    require '../main_pages/footer_for_other_pages.php';

?>