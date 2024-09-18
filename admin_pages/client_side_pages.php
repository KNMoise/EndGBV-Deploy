<?php

require 'includes/db.php';
require 'session.php';

$result = mysqli_query($conn, "SELECT * FROM users WHERE user_id='$session_id'") or DIE('Error In Session');
$row = mysqli_fetch_array($result);

require 'main_pages/top_nav.php';

?>



<!-----------------------------------------------------  THIS IS THE START OF ABOUT US SECTION ------------------------------------------------>
<!-----------------------------------------------------  THIS IS THE START OF ABOUT US SECTION ------------------------------------------------>
<!-----------------------------------------------------  THIS IS THE START OF ABOUT US SECTION ------------------------------------------------>

<div class="container-fluid" style="margin-top: 0;">
    <h3 class="text-dark mb-4">LANDING PAGE VIEW</h3>
    <?php
    $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

    if (strpos($full_url, "error=deleteaboutsuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            About Us Content SuccessFully Deleted!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    ";
    } else if (strpos($full_url, "error=deletefaqssuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            FAQ question SuccessFully Deleted
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    ";
    } else if (strpos($full_url, "error=deleteservicesuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            Service SuccessFully Deleted
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    ";
    } elseif (strpos($full_url, "error=deleteportsuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            Portfolio SuccessFully Deleted
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    ";
    } else if (strpos($full_url, "error=aboutsuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            About Us Info SuccessFully Updated
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                    ";
    } elseif (strpos($full_url, "error=aboutfail") !== false) {
        echo "
                                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                            About Us Info Updating Failed
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=servicesuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            New Service Just Saved!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=servicefail") !== false) {
        echo "
                                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                            New Service Can't Be Saved At The Moment!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=noservice") !== false) {
        echo "
                                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                            Empty Fields!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=noquestions") !== false) {
        echo "
                                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                            Empty Fields!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=noaboutus") !== false) {
        echo "
                                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                            Empty Fields!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=wrongimagetype") !== false) {
        echo "
                                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                            Only JPG, JPEG, PNG images are allowed!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=testimonynodata") !== false) {
        echo "
                                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                            No Data In Testimony Data Boxes!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=testimonysuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            New Testimonial Saved SuccessFully!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=portfoliosuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            New Portfolio Saved SuccessFully!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=teamsuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            New Team Member Saved SuccessFully!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=faqssuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            New FAQ Saved SuccessFully!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=deleteteamsuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            Team Member SuccessFully Deleted!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=updateaboutsuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            About Us Status Updated SuccessFully!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=updateservicesuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                           Service Updated SuccessFully!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=deletetestsuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                           Testimonial Deletion Successfully!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=notestimonialdata") !== false) {
        echo "
                                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                            No Data In Testimony Updating Data Boxes!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=testupdateok") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            Testimony Updated SuccessFully!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=noportdata") !== false) {
        echo "
                                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                            No Data Entered In The Fields!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=portupdateok") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            Portfolio Item Updating Successfully!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=nomemberdata") !== false) {
        echo "
                                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                            Check Your Text Boxes;
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=testmemberok") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            Team Member Updated SuccessFully!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=updatefaqssuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            Question Updating Updated SuccessFully!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=nocontacts") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                            No contacts Information!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    } elseif (strpos($full_url, "error=updateontactsuccess") !== false) {
        echo "
                                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                             contacts Updated Successfully Information!!!
                                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                        </div>
                                        ";
    }
    ?>
    <div class="shadow card">
        <a class="btn btn-link text-start card-header fw-bold" data-bs-toggle="collapse" aria-expanded="false"
            aria-controls="collapse-3" href="#collapse-3" role="button">About Us Section</a>
        <div class="collapse" id="collapse-3">
            <div class="card-body">
                <p class="m-0">This is where you can manage and update the content on your About us Section. From here,
                    you have complete control over the information that your clients will see when they visit your
                    Website</p>
                <form method="POST" action="operations/new_about.php">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="question">
                                    <strong>About Us Description</strong>
                                </label>
                                <textarea class="form-control" name="desc_aboutus"
                                    placeholder="About Us Description In Details" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success btn-icon-split" name="save">
                            <span class="text-white-50 icon">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text-center text-white text">Save Stats</span>
                        </button>
                    </div>
                </form>
                <div class="table-responsive table mt-2" id="dataTable-4" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr class="text-start" style="border-top: 1px solid rgb(0,0,0);">
                                <th style="border-top-style: solid;">#</th>
                                <th>Desc</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <tr class="text-start" style="text-align: center;">
                                    <td><?php echo $about_id; ?></td>
                                    <td
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px">
                                        <?php echo $description; ?>
                                    </td>
                                    <td class="text-end" style="margin: 4px; margin-top: 10px;">
                                        <a class="btn btn-success btn-sm" role="button"
                                            href="view_aboutus.php?id=<?php echo $about_id ?>">
                                            <i class="fas fa-eye" style="font-size: 18px;"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm" role="button" style="margin-left: 3px;"
                                            href="other_pages/edit_aboutus.php?id=<?php echo $about_id ?>">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" role="button" style="margin-left: 3px;"
                                            href="operations/delete_about_us.php?id=<?php echo $about_id; ?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-start">
                                <td><strong>#</strong></td>
                                <td><strong>Question</strong></td>
                                <td><strong>Answer</strong></td>
                                <td class="text-center"><strong class="text-end">Actions</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-----------------------------------------------------  THIS IS THE END OF ABOUT US SECTION ------------------------------------------------>
    <!-----------------------------------------------------  THIS IS THE END OF ABOUT US SECTION ------------------------------------------------>
    <!-----------------------------------------------------  THIS IS THE END OF ABOUT US SECTION ------------------------------------------------>


    <!-----------------------------------------------------  THIS IS THE START OF Services SECTION ------------------------------------------------>
    <!-----------------------------------------------------  THIS IS THE START OF Services SECTION ------------------------------------------------>
    <!-----------------------------------------------------  THIS IS THE START OF Services SECTION ------------------------------------------------>
    <div class="shadow card"><a class="btn btn-link text-start card-header fw-bold" data-bs-toggle="collapse"
            aria-expanded="false" aria-controls="collapse-1" href="#collapse-1" role="button">Services Section</a>
        <div class="collapse" id="collapse-1">
            <div class="card-body">
                <p class="m-0">The Services section is an important part of your website that showcases your services
                    that you are capable of providing and a little explanation on each.</p>
                <form method="POST" action="operations/new_service.php">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="username">
                                    <strong>Service Title</strong>
                                </label>
                                <input class="form-control" type="text" id="username-2" placeholder="Title"
                                    name="service_title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="port_subtitle">
                                    <strong>Service Description</strong>
                                </label>
                                <textarea class="form-control" rows="3" name="service_desc"
                                    placeholder="Service Description"></textarea>

                            </div>

                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success btn-icon-split" name="save">
                            <span class="text-white-50 icon">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text-center text-white text">Save Service</span>
                        </button>
                    </div>
                </form>
                <div class="table-responsive table mt-2" id="dataTable-2" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr class="text-start" style="border-top: 1px solid rgb(0,0,0);">
                                <th style="border-top-style: solid;">#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM SERVICES;";
                            $query2 = mysqli_query($conn, $query);

                            while ($rows = mysqli_fetch_assoc($query2)) {

                                $service_id = mysqli_escape_string($conn, $rows['service_id']);
                                $service_title = mysqli_escape_string($conn, $rows['service_title']);
                                $service_desc = mysqli_escape_string($conn, $rows['service_desc']);
                                ?>
                                <tr class="text-start" style="text-align: center;">
                                    <td> <?php echo $service_id; ?></td>
                                    <td> <?php echo $service_title; ?></td>
                                    <td> <?php echo $service_desc; ?></td>
                                    <td class="text-end" style="margin: 4px;">
                                        <a class="btn btn-warning btn-sm" role="button" style="margin-left: 3px;"
                                            href="other_pages/edit_services.php?id=<?php echo $service_id ?>">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <a class="btn btn-danger btn-sm" role="button" style="margin-left: 3px;"
                                            href="operations/delete_service.php?id=<?php echo $service_id; ?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-start">
                                <td><strong>#</strong></td>
                                <td><strong>Title</strong></td>
                                <td><strong>Description</strong></td>
                                <td class="text-center"><strong class="text-end">Actions</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-----------------------------------------------------  THIS IS THE END OF Services SECTION ------------------------------------------------>
    <!-----------------------------------------------------  THIS IS THE END OF Services SECTION ------------------------------------------------>
    <!-----------------------------------------------------  THIS IS THE END OF Services SECTION ------------------------------------------------>

    <!-----------------------------------------------------  THIS IS THE START OF TESTIMONIAL SECTION ------------------------------------------------>
    <!-----------------------------------------------------  THIS IS THE START OF TESTIMONIAL SECTION ------------------------------------------------>
    <!-----------------------------------------------------  THIS IS THE START OF TESTIMONIAL SECTION ------------------------------------------------>
    <div class="shadow card"><a class="btn btn-link text-start card-header fw-bold" data-bs-toggle="collapse"
            aria-expanded="false" aria-controls="collapse-4" href="#collapse-4" role="button">Testimonials Sections</a>
        <div class="collapse" id="collapse-4">
            <div class="card-body">
                <p class="text-start m-0">This section is where you can add new testimonials to your client-side pages,
                    To show that other people have had positive experiences with your Services</p>
                <form action="operations/new_testimony.php" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="testimonial_name">
                                    <strong>Testimonial Name</strong>
                                </label>
                                <input class="form-control" type="text" id="username" placeholder="Testimonial Names"
                                    name="testimonial_name">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="Company">
                                    <strong>Company</strong>
                                </label>
                                <input class="form-control" type="text" id="username-1" placeholder="Company"
                                    name="testimonial_company">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="testimony">
                                    <strong>Testimony</strong>
                                </label>
                                <textarea class="form-control" placeholder="testimony" name="testimony"></textarea>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="profile">
                                    <strong>Profile</strong>
                                </label>
                                <input class="form-control" type="file" name="fileToUpload">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success btn-icon-split" name="save_testimony">
                        <span class="text-white-50 icon">
                            <i class="fas fa-check"></i>
                        </span>
                        <span class="text-center text-white text">Save Testimony</span>
                    </button>
                </form>
                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr class="text-start" style="border-top: 1px solid rgb(0,0,0);">
                                <th style="border-top-style: solid;">#</th>
                                <th>Name</th>
                                <th>Company</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT * FROM testimonials;";
                            $query2 = mysqli_query($conn, $query);

                            while ($rows = mysqli_fetch_assoc($query2)) {

                                $test_id = mysqli_escape_string($conn, $rows['test_id']);
                                $testimonial_name = mysqli_escape_string($conn, $rows['testimonial_name']);
                                $company = mysqli_escape_string($conn, $rows['company']);
                                $image_url = mysqli_escape_string($conn, $rows['image_url']);
                                ?>
                                <tr class="text-start" style="text-align: center;">
                                    <td><?php echo $test_id; ?></td>
                                    <td><?php echo $testimonial_name; ?></td>
                                    <td><?php echo $company; ?></td>
                                    <td class="text-end" style="margin: 4px; align-content: center;">
                                        <a class="btn btn-success btn-sm" role="button"
                                            href="view_single_testimony.php?id=<?php echo $test_id; ?>">
                                            <i class="fas fa-eye" style="font-size: 18px;"></i>
                                        </a>

                                        <a class="btn btn-warning btn-sm" role="button" style="margin-left: 3px;"
                                            href="other_pages/edit_testimonial.php?id=<?php echo $test_id; ?>">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <a class="btn btn-danger btn-sm" role="button"
                                            href="operations/delete_testimonial.php?id=<?php echo $test_id; ?>">
                                            <i class="fas fa-trash-alt" style="font-size: 18px;"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-start">
                                <td><strong>#</strong></td>
                                <td><strong>Name</strong></td>
                                <td><strong>Company</strong></td>
                                <td class="text-center"><strong class="text-end">Actions</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-----------------------------------------------------  THIS IS THE END OF TESTIMONIAL SECTION ------------------------------------------------>
    <!-----------------------------------------------------  THIS IS THE END OF TESTIMONIAL SECTION ------------------------------------------------>
    <!-----------------------------------------------------  THIS IS THE END OF TESTIMONIAL SECTION ------------------------------------------------>

    <!-----------------------------------------------------    THIS IS THE START OF portfolio SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE START OF portfolio SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE START OF portfolio SECTION ------------------------------------------------>
    <div class="shadow card"><a class="btn btn-link text-start card-header fw-bold" data-bs-toggle="collapse"
            aria-expanded="false" aria-controls="collapse-6" href="#collapse-6" role="button">Portfolio Section</a>
        <div class="collapse" id="collapse-6">
            <div class="card-body">
                <p class="m-0">The portfolio section is an important part of your website that showcases your work and
                    helps to build credibility with potential clients.</p>
                <form method="POST" action="operations/new_portfolio.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="username">
                                    <strong>Title</strong>
                                </label>
                                <input class="form-control" type="text" id="username-6" placeholder="Title"
                                    name="port_title">
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="port_subtitle">
                                    <strong>Description</strong>
                                </label>
                                <textarea name="port_subtitle" class="form-control"></textarea>

                            </div>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="first_name">
                                    <strong>Image</strong>
                                </label>
                                <input class="form-control" type="file" id="first_name-7" name="fileToUpload">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success btn-icon-split" name="save_portfolio">
                            <span class="text-white-50 icon">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text-center text-white text">Save To Portfolio</span>
                        </button>
                    </div>
                </form>
                <div class="table-responsive table mt-2" id="dataTable-6" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr class="text-start" style="border-top: 1px solid rgb(0,0,0);">
                                <th style="border-top-style: solid;">#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php

                            $query = "SELECT * FROM portfolio";
                            $query2 = mysqli_query($conn, $query);

                            while ($rows = mysqli_fetch_assoc($query2)) {

                                $port_id = mysqli_escape_string($conn, $rows['port_id']);
                                $title = mysqli_escape_string($conn, $rows['title']);
                                $sub_title = mysqli_escape_string($conn, $rows['sub_title']);
                                $image_url = mysqli_escape_string($conn, $rows['image_url']);
                                $date_done = mysqli_escape_string($conn, $rows['date_done']);
                                ?>
                                <tr class="text-start" style="text-align: center;">
                                    <td><?php echo $port_id; ?> </td>
                                    <td><?php echo $title; ?> </td>
                                    <td><?php echo $sub_title; ?> </td>
                                    <td class="text-end" style="margin: 4px;">

                                        <a class="btn btn-success btn-sm" role="button" style="margin-left: 3px;"
                                            href="view_single_portfolio.php?id=<?php echo $port_id; ?>">
                                            <i class="fas fa-eye"></i>
                                        </a>

                                        <a class="btn btn-warning btn-sm" role="button" style="margin-left: 3px;"
                                            href="other_pages/edit_portfolio.php?id=<?php echo $port_id; ?>">
                                            <i class="far fa-edit"></i>
                                        </a>

                                        <a class="btn btn-danger btn-sm" role="button" style="margin-left: 3px;"
                                            href="operations/delete_portfolio.php?id=<?php echo $port_id; ?>">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                        `
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-start">
                                <td><strong>#</strong></td>
                                <td><strong>Title</strong></td>
                                <td><strong>Description</strong></td>
                                <td class="text-center"><strong class="text-end">Actions</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-----------------------------------------------------    THIS IS THE END OF portfolio SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE END OF portfolio SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE END OF portfolio SECTION ------------------------------------------------>


    <!-----------------------------------------------------    THIS IS THE START OF TEAM SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE START OF TEAM SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE START OF TEAM SECTION ------------------------------------------------>

    <!--
                    <div class="shadow card"><a class="btn btn-link text-start card-header fw-bold" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-2" href="#collapse-2" role="button">Team Section</a>
                        <div class="collapse" id="collapse-2">
                            <div class="card-body">
                                <p class="m-0">This is where you can add, remove, or update information about the members of your team, including their names, job titles, social profiles, and images.</p>
                                <form action="operations/new_team.php" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="names">
                                                    <strong>Names</strong>
                                                </label>
                                                <input class="form-control" type="text" id="username-4" placeholder="Names" name="names">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label" for="position">
                                                    <strong>Position</strong>
                                                    <select class="form-select" name="position">
                                                        <optgroup label="Select Position">
                                                            <option>Founder</option>
                                                            <option>Co-Founder</option>
                                                        </optgroup>
                                                    </select>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="first_name">
                                                    <strong>Image</strong>
                                                </label>
                                                <input class="form-control" type="file" id="first_name-2" placeholder="testimony" name="fileToUpload">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3">
                                                <label class="form-label" for="first_name">
                                                    <strong>Social Medias</strong>
                                                </label>
                                                <input class="form-control" type="url" id="first_name-4" placeholder="Instagram URL" name="instagram">
                                                <input class="form-control" type="url" id="first_name-6" placeholder="Twitter URL" name="twitter">
                                                <input class="form-control" type="email" id="first_name-5" placeholder="E-mail" name="email">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-success btn-icon-split" name="save_team">
                                          <span class="text-white-50 icon">
                                            <i class="fas fa-check"></i>
                                          </span>
                                          <span class="text-center text-white text">Save Team Member</span>
                                        </button>
                                    </div>
                                </form>
                                <div class="table-responsive table mt-2" id="dataTable-3" role="grid" aria-describedby="dataTable_info">
                                    <table class="table my-0" id="dataTable">
                                        <thead>
                                            <tr class="text-start" style="border-top: 1px solid rgb(0,0,0);">
                                                <th style="border-top-style: solid;">#</th>
                                                <th>Names</th>
                                                <th>Position</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM team;";
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
                                            <tr class="text-start" style="text-align: center;">
                                                <td><?php echo $member_id; ?></td>
                                                <td><?php echo $names; ?></td>
                                                <td><?php echo $position; ?>r</td>
                                                <td class="text-end" style="margin: 4px;">


                                                    <a class="btn btn-success btn-sm" role="button" style="margin-left: 3px;" href="other_pages/view_user_team.php?id=<?php echo $member_id; ?>">
                                                        <i class="far fa-eye"></i>
                                                    </a>

                                                    <a class="btn btn-warning btn-sm" role="button" style="margin-left: 3px;" href="other_pages/edit_team.php?id=<?php echo $member_id; ?>">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" role="button" style="margin-left: 3px;" href="operations/delete_team.php?id=<?php echo $member_id; ?>">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>

                                                    </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-start">
                                                <td><strong>#</strong></td>
                                                <td><strong>Names</strong></td>
                                                <td><strong>Position</strong></td>
                                                <td class="text-center"><strong class="text-end">Actions</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                -->
    <!-----------------------------------------------------    THIS IS THE END OF TEAM SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE END OF TEAM SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE END OF TEAM SECTION ------------------------------------------------>







    <!-----------------------------------------------------    THIS IS THE START OF FAQS SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE START OF FAQS SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE START OF FAQS SECTION ------------------------------------------------>

    <!--
                    <div class="shadow card"><a class="btn btn-link text-start card-header fw-bold" data-bs-toggle="collapse" aria-expanded="false" aria-controls="collapse-7" href="#collapse-7" role="button">FAQs</a>
                        <div class="collapse" id="collapse-7">
                            <div class="card-body">
                                <p class="m-0">This is where you can manage and update the content on your client-side FAQ page. From here, you have complete control over the information that your clients will see when they visit your FAQ page!</p>
                                <form method="POST" action="operations/new_faqs.php">
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="question"><strong>Question</strong></label><input class="form-control" type="text" id="username-9" placeholder="Question" name="question"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="mb-3"><label class="form-label" for="answer"><strong>Answer</strong></label><input class="form-control" type="text" id="first_name-8" placeholder="answer" name="answer"></div>
                                        </div>
                                    </div>
                                   <div class="mb-3">
                                        <button class="btn btn-success btn-icon-split" type="submit" name="save_question">
                                            <span class="text-white-50 icon"><i class="fas fa-check"></i></span>
                                            <span class="text-center text-white text">Save Question</span>
                                        </button>
                                    </div>


                                </form>
                                <div class="table-responsive table mt-2" id="dataTable-7" role="grid" aria-describedby="dataTable_info">
                                    <table class="table my-0" id="dataTable">
                                        <thead>
                                            <tr class="text-start" style="border-top: 1px solid rgb(0,0,0);">
                                                <th style="border-top-style: solid;">#</th>
                                                <th>Question</th>
                                                <th>Answer</th>
                                                <th class="text-center">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php


                                            $query = "SELECT * FROM faqs ORDER BY question_id ASC;";
                                            $query2 = mysqli_query($conn, $query);

                                            while ($rows = mysqli_fetch_assoc($query2)) {
                                                $question_id = mysqli_escape_string($conn, $rows['question_id']);
                                                $question = mysqli_escape_string($conn, $rows['question']);
                                                $answer = mysqli_escape_string($conn, $rows['answer']);
                                                ?>
                                            <tr class="text-start" style="text-align: center;">
                                                <td><?php echo $question_id; ?></td>
                                                <td><?php echo $question; ?></td>
                                                <td><?php echo $answer; ?></td>
                                                <td class="text-end" style="margin: 4px;">
                                                    
                                                    <a class="btn btn-warning btn-sm" role="button" style="margin-left: 3px;" href="other_pages/edit_faqs.php?question_id=<?php echo $question_id; ?>">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a class="btn btn-danger btn-sm" role="button" style="margin-left: 3px;" href="operations/delete_faqs.php?question_id=<?php echo $question_id; ?>">
                                                      <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                   </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                        <tfoot>
                                            <tr class="text-start">
                                                <td><strong>#</strong></td>
                                                <td><strong>Question</strong></td>
                                                <td><strong>Answer</strong></td>
                                                <td class="text-center"><strong class="text-end">Actions</strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                -->

    <!-----------------------------------------------------    THIS IS THE END OF FAQS SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE END OF FAQS SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE END OF FAQS SECTION ------------------------------------------------>





    <!-----------------------------------------------------    THIS IS THE START OF CONTACTS SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE START OF CONTACTS SECTION ------------------------------------------------>
    <!-----------------------------------------------------    THIS IS THE START OF CONTACTS SECTION ------------------------------------------------>

    <div class="shadow card"><a class="btn btn-link text-start card-header fw-bold" data-bs-toggle="collapse"
            aria-expanded="false" aria-controls="collapse-5" href="#collapse-5" role="button">Contact Information</a>
        <div class="collapse" id="collapse-5">
            <div class="card-body">
                <p class="m-0">From this page, you can view and edit the contact and location information that your
                    clients will see on the website</p>
                <div class="table-responsive table mt-2" id="dataTable-5" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr class="text-start" style="border-top: 1px solid rgb(0,0,0);">
                                <th style="border-top-style: solid;">#</th>
                                <th>Phones</th>
                                <th>Location</th>
                                <th>E-mails</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM contacts WHERE id=1 ;";
                            $query2 = mysqli_query($conn, $query);

                            while ($rows = mysqli_fetch_assoc($query2)) {

                                $id = mysqli_escape_string($conn, $rows['id']);
                                $phones = mysqli_escape_string($conn, $rows['phones']);
                                $location = mysqli_escape_string($conn, $rows['location']);
                                $emails = mysqli_escape_string($conn, $rows['emails']);


                                ?>
                                <tr class="text-start" style="text-align: center;">
                                    <td> <?php echo $id; ?></td>
                                    <td> <?php echo $phones; ?></td>
                                    <td> <?php echo $location; ?></td>
                                    <td> <?php echo $emails; ?></td>
                                    <td class="text-end" style="margin: 4px;">

                                        <a class="btn btn-warning btn-sm" role="button" style="margin-left: 3px;"
                                            href="other_pages/edit_contacts.php">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" role="button" style="margin-left: 3px;"
                                            href="operations/delete_contact.php?contact_id=<?php echo $contact_id; ?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-start">
                                <td><strong>#</strong></td>
                                <td><strong>Phones</strong></td>
                                <td><strong>Location</strong></td>
                                <td><strong>E-mails</strong></td>
                                <td class="text-center"><strong class="text-end">Actions</strong></td>
                            </tr>
                        </tfoot>
                    </table>

                </div>
            </div>
        </div>
    </div>
    <!-- NEW FEATURES TESTING ON THE DATAS TO DIPLAY ON FRONTEND  -->
     <!-- FIRST  -->
    <div class="shadow card">
        <a class="btn btn-link text-start card-header fw-bold" data-bs-toggle="collapse" aria-expanded="false"
            aria-controls="collapse-3" href="#collapse-3" role="button">COMMENTS</a>
        <div class="collapse" id="collapse-3">
            <div class="card-body">
                <p class="m-0">This is where you can manage and update the content on your About us Section. From here,
                    you have complete control over the information that your clients will see when they visit your
                    Website</p>
                <form method="POST" action="operations/new_about.php">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="question">
                                    <strong>About Us Description</strong>
                                </label>
                                <textarea class="form-control" name="desc_aboutus"
                                    placeholder="About Us Description In Details" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success btn-icon-split" name="save">
                            <span class="text-white-50 icon">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text-center text-white text">Save Stats</span>
                        </button>
                    </div>
                </form>
                <div class="table-responsive table mt-2" id="dataTable-4" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr class="text-start" style="border-top: 1px solid rgb(0,0,0);">
                                <th style="border-top-style: solid;">#</th>
                                <th>Desc</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <tr class="text-start" style="text-align: center;">
                                    <td><?php echo $about_id; ?></td>
                                    <td
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px">
                                        <?php echo $description; ?>
                                    </td>
                                    <td class="text-end" style="margin: 4px; margin-top: 10px;">
                                        <a class="btn btn-success btn-sm" role="button"
                                            href="view_aboutus.php?id=<?php echo $about_id ?>">
                                            <i class="fas fa-eye" style="font-size: 18px;"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm" role="button" style="margin-left: 3px;"
                                            href="other_pages/edit_aboutus.php?id=<?php echo $about_id ?>">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" role="button" style="margin-left: 3px;"
                                            href="operations/delete_about_us.php?id=<?php echo $about_id; ?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-start">
                                <td><strong>#</strong></td>
                                <td><strong>Question</strong></td>
                                <td><strong>Answer</strong></td>
                                <td class="text-center"><strong class="text-end">Actions</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- SECOND -->
    <div class="shadow card">
        <a class="btn btn-link text-start card-header fw-bold" data-bs-toggle="collapse" aria-expanded="false"
            aria-controls="collapse-3" href="#collapse-3" role="button">TEAM</a>
        <div class="collapse" id="collapse-3">
            <div class="card-body">
                <p class="m-0">This is where you can manage and update the content on your About us Section. From here,
                    you have complete control over the information that your clients will see when they visit your
                    Website</p>
                <form method="POST" action="operations/new_about.php">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="question">
                                    <strong>About Us Description</strong>
                                </label>
                                <textarea class="form-control" name="desc_aboutus"
                                    placeholder="About Us Description In Details" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success btn-icon-split" name="save">
                            <span class="text-white-50 icon">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text-center text-white text">Save Stats</span>
                        </button>
                    </div>
                </form>
                <div class="table-responsive table mt-2" id="dataTable-4" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr class="text-start" style="border-top: 1px solid rgb(0,0,0);">
                                <th style="border-top-style: solid;">#</th>
                                <th>Desc</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <tr class="text-start" style="text-align: center;">
                                    <td><?php echo $about_id; ?></td>
                                    <td
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px">
                                        <?php echo $description; ?>
                                    </td>
                                    <td class="text-end" style="margin: 4px; margin-top: 10px;">
                                        <a class="btn btn-success btn-sm" role="button"
                                            href="view_aboutus.php?id=<?php echo $about_id ?>">
                                            <i class="fas fa-eye" style="font-size: 18px;"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm" role="button" style="margin-left: 3px;"
                                            href="other_pages/edit_aboutus.php?id=<?php echo $about_id ?>">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" role="button" style="margin-left: 3px;"
                                            href="operations/delete_about_us.php?id=<?php echo $about_id; ?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-start">
                                <td><strong>#</strong></td>
                                <td><strong>Question</strong></td>
                                <td><strong>Answer</strong></td>
                                <td class="text-center"><strong class="text-end">Actions</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- THIRD PART # -->
    <div class="shadow card">
        <a class="btn btn-link text-start card-header fw-bold" data-bs-toggle="collapse" aria-expanded="false"
            aria-controls="collapse-3" href="#collapse-3" role="button">BLOGS</a>
        <div class="collapse" id="collapse-3">
            <div class="card-body">
                <p class="m-0">This is where you can manage and update the content on your About us Section. From here,
                    you have complete control over the information that your clients will see when they visit your
                    Website</p>
                <form method="POST" action="operations/new_about.php">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="question">
                                    <strong>About Us Description</strong>
                                </label>
                                <textarea class="form-control" name="desc_aboutus"
                                    placeholder="About Us Description In Details" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success btn-icon-split" name="save">
                            <span class="text-white-50 icon">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text-center text-white text">Save Stats</span>
                        </button>
                    </div>
                </form>
                <div class="table-responsive table mt-2" id="dataTable-4" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr class="text-start" style="border-top: 1px solid rgb(0,0,0);">
                                <th style="border-top-style: solid;">#</th>
                                <th>Desc</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <tr class="text-start" style="text-align: center;">
                                    <td><?php echo $about_id; ?></td>
                                    <td
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px">
                                        <?php echo $description; ?>
                                    </td>
                                    <td class="text-end" style="margin: 4px; margin-top: 10px;">
                                        <a class="btn btn-success btn-sm" role="button"
                                            href="view_aboutus.php?id=<?php echo $about_id ?>">
                                            <i class="fas fa-eye" style="font-size: 18px;"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm" role="button" style="margin-left: 3px;"
                                            href="other_pages/edit_aboutus.php?id=<?php echo $about_id ?>">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" role="button" style="margin-left: 3px;"
                                            href="operations/delete_about_us.php?id=<?php echo $about_id; ?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-start">
                                <td><strong>#</strong></td>
                                <td><strong>Question</strong></td>
                                <td><strong>Answer</strong></td>
                                <td class="text-center"><strong class="text-end">Actions</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- FOURTH PART  -->
    <div class="shadow card">
        <a class="btn btn-link text-start card-header fw-bold" data-bs-toggle="collapse" aria-expanded="false"
            aria-controls="collapse-3" href="#collapse-3" role="button">CASES ON PAGES</a>
        <div class="collapse" id="collapse-3">
            <div class="card-body">
                <p class="m-0">This is where you can manage and update the content on your About us Section. From here,
                    you have complete control over the information that your clients will see when they visit your
                    Website</p>
                <form method="POST" action="operations/new_about.php">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="question">
                                    <strong>About Us Description</strong>
                                </label>
                                <textarea class="form-control" name="desc_aboutus"
                                    placeholder="About Us Description In Details" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success btn-icon-split" name="save">
                            <span class="text-white-50 icon">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text-center text-white text">Save Stats</span>
                        </button>
                    </div>
                </form>
                <div class="table-responsive table mt-2" id="dataTable-4" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr class="text-start" style="border-top: 1px solid rgb(0,0,0);">
                                <th style="border-top-style: solid;">#</th>
                                <th>Desc</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <tr class="text-start" style="text-align: center;">
                                    <td><?php echo $about_id; ?></td>
                                    <td
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px">
                                        <?php echo $description; ?>
                                    </td>
                                    <td class="text-end" style="margin: 4px; margin-top: 10px;">
                                        <a class="btn btn-success btn-sm" role="button"
                                            href="view_aboutus.php?id=<?php echo $about_id ?>">
                                            <i class="fas fa-eye" style="font-size: 18px;"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm" role="button" style="margin-left: 3px;"
                                            href="other_pages/edit_aboutus.php?id=<?php echo $about_id ?>">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" role="button" style="margin-left: 3px;"
                                            href="operations/delete_about_us.php?id=<?php echo $about_id; ?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-start">
                                <td><strong>#</strong></td>
                                <td><strong>Question</strong></td>
                                <td><strong>Answer</strong></td>
                                <td class="text-center"><strong class="text-end">Actions</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- FIFTH PART PAGE -->
    <div class="shadow card">
        <a class="btn btn-link text-start card-header fw-bold" data-bs-toggle="collapse" aria-expanded="false"
            aria-controls="collapse-3" href="#collapse-3" role="button">FUCK YOU CODES</a>
        <div class="collapse" id="collapse-3">
            <div class="card-body">
                <p class="m-0">This is where you can manage and update the content on your About us Section. From here,
                    you have complete control over the information that your clients will see when they visit your
                    Website</p>
                <form method="POST" action="operations/new_about.php">
                    <div class="row">
                        <div class="col">
                            <div class="mb-3">
                                <label class="form-label" for="question">
                                    <strong>About Us Description</strong>
                                </label>
                                <textarea class="form-control" name="desc_aboutus"
                                    placeholder="About Us Description In Details" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-success btn-icon-split" name="save">
                            <span class="text-white-50 icon">
                                <i class="fas fa-check"></i>
                            </span>
                            <span class="text-center text-white text">Save Stats</span>
                        </button>
                    </div>
                </form>
                <div class="table-responsive table mt-2" id="dataTable-4" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr class="text-start" style="border-top: 1px solid rgb(0,0,0);">
                                <th style="border-top-style: solid;">#</th>
                                <th>Desc</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                <tr class="text-start" style="text-align: center;">
                                    <td><?php echo $about_id; ?></td>
                                    <td
                                        style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis; max-width: 250px">
                                        <?php echo $description; ?>
                                    </td>
                                    <td class="text-end" style="margin: 4px; margin-top: 10px;">
                                        <a class="btn btn-success btn-sm" role="button"
                                            href="view_aboutus.php?id=<?php echo $about_id ?>">
                                            <i class="fas fa-eye" style="font-size: 18px;"></i>
                                        </a>
                                        <a class="btn btn-warning btn-sm" role="button" style="margin-left: 3px;"
                                            href="other_pages/edit_aboutus.php?id=<?php echo $about_id ?>">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a class="btn btn-danger btn-sm" role="button" style="margin-left: 3px;"
                                            href="operations/delete_about_us.php?id=<?php echo $about_id; ?>">
                                            <i class="far fa-trash-alt"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot>
                            <tr class="text-start">
                                <td><strong>#</strong></td>
                                <td><strong>Question</strong></td>
                                <td><strong>Answer</strong></td>
                                <td class="text-center"><strong class="text-end">Actions</strong></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
</div>
<!-----------------------------------------------------  THIS IS THE END OF CONTACTS SECTION ------------------------------------------------>
<!-----------------------------------------------------  THIS IS THE END OF CONTACTS SECTION ------------------------------------------------>
<!-----------------------------------------------------  THIS IS THE END OF CONTACTS SECTION ------------------------------------------------>
<?php
require 'main_pages/footer.php';

?>