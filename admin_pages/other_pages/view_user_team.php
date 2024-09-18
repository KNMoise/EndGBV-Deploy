<?php 
 
    require "../includes/db.php";
    require '../session2.php';

    $result=mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") OR DIE('Error In Session');
    $row=mysqli_fetch_array($result);
    
    require '../main_pages/top_nav_for_other_pages.php';


 ?>                <div class="container-fluid">
                     <?php

                            $id = mysqli_escape_string($conn, $_GET['id']);
                            $query = "SELECT * FROM team WHERE member_id='$id';";
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
                    <h3 class="text-dark mb-4"><?php echo $names;?> 's Info</h3>
                    <div class="row mb-3" style="height: 294.656px;">
                        <div class="col-lg-4 col-xl-5">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow">
                                    <img class="img-thumbnail img-fluid mb-3 mt-4" src="../assets/img/frontend_images/<?php echo $image_url; ?>" width="300" height="300" style="height: 213.656px;">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xl-7" style="height: 478.656px;">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="m-0 fw-bold" style="color: rgb(14,69,58);">Team Member Info</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col text-center">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">Full Names</h4>
                                                        </div>
                                                        <p><?php echo $names;?></p>
                                                    </div>
                                                    <div class="col text-center">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">Position</h4>
                                                        </div>
                                                        <p><?php echo $position;?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-center" style="margin-top: 23px;">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">E-mail</h4>
                                                        </div>
                                                        <p><?php echo $email;?></p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-lg-8 col-xl-6">
                            <div class="row mb-3 d-none">
                                <div class="col-xl-8">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="m-0 fw-bold" style="color: rgb(14,69,58);">Instagram Profile</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">Full Names</h4>
                                                        </div>
                                                        <p>ndangizi Didiier</p>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">Position</h4>
                                                        </div>
                                                        <p>ndangizi Didiier</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">E-mail</h4>
                                                        </div>
                                                        <p>ndangizi Didiier</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col"><a class="btn btn-secondary btn-icon-split" role="button" style="background: rgb(14,69,58);"><span class="text-white-50 icon"><i class="fas fa-arrow-left"></i></span><span class="text-white text">Back</span></a></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-11 text-center">
                                    <div class="card shadow mb-3">
                                        <div class="card-header text-center py-3">
                                            <p class="m-0 fw-bold" style="color: rgb(14,69,58);">Instagram Profile</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">Full Names</h4>
                                                        </div>
                                                        <p>ndangizi Didiier</p>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">Position</h4>
                                                        </div>
                                                        <p>ndangizi Didiier</p>
                                                    </div>
                                                </div>
                                                <div class="row text-center">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">E-mail</h4>
                                                        </div>
                                                        <p>ndangizi Didiier</p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-xl-6">
                            <div class="row mb-3 d-none">
                                <div class="col-xl-8">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="m-0 fw-bold" style="color: rgb(14,69,58);">Instagram Profile</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">Full Names</h4>
                                                        </div>
                                                        <p>ndangizi Didiier</p>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">Position</h4>
                                                        </div>
                                                        <p>ndangizi Didiier</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">E-mail</h4>
                                                        </div>
                                                        <p>ndangizi Didiier</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col"><a class="btn btn-secondary btn-icon-split" role="button" style="background: rgb(14,69,58);"><span class="text-white-50 icon"><i class="fas fa-arrow-left"></i></span><span class="text-white text">Back</span></a></div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="card shadow mb-3">
                                        <div class="card-header text-center py-3">
                                            <p class="m-0 fw-bold" style="color: rgb(14,69,58);">Twitter Profile</p>
                                        </div>
                                        <div class="card-body text-center">
                                            <form>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">Full Names</h4>
                                                        </div>
                                                        <p>ndangizi Didiier</p>
                                                    </div>
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">Position</h4>
                                                        </div>
                                                        <p>ndangizi Didiier</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3">
                                                            <h4 style="color: #0e453a;margin-bottom: -6px;">E-mail</h4>
                                                        </div>
                                                        <p>ndangizi Didiier</p>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <div class="row">
                        <div class="col">
                            <a class="btn btn-secondary btn-icon-split" role="button" href="../client_side_pages.php" style="background: rgb(14,69,58);">
                                <span class="text-white-50 icon">
                                    <i class="fas fa-arrow-left"></i>
                                </span>
                                <span class="text-white text">Back</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
<?php
    require '../main_pages/footer_for_other_pages.php';

?>