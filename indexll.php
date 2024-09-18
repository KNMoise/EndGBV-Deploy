<?php
    require 'admin_pages/includes/db.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Welcome To Fresh Ink Co. - A screen Printing Shop Based in Rwanda</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&amp;display=swap">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favico.png">
</head>

<body>




    <!-- navigation bar starts -->
    <nav class="navbar navbar-light navbar-expand-md text-center navbar-shrink py-3" id="mainNav" style="background: rgba(14,69,58,0.93);color: rgb(255,255,255);">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="admin_pages/assets/img/Artboard%2019.png">&nbsp;
                <span style="color: rgb(245,245,245);">Fresh Ink Co.</span>
            </a>
            <button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1" style="border-radius: 0;">
                <span class="visually-hidden">Toggle navigation</span>
                <span class="navbar-toggler-icon text-danger" style="color: var(--bs-navbar-disabled-color);"></span>
            </button>
            <div class="collapse navbar-collapse" id="navcol-1" style="color: rgb(255, 255, 255);">
                <ul class="navbar-nav mx-auto" style="color: rgb(255,255,255);">
                    <li class="nav-item" style="color: rgb(255, 255, 255);">
                        <a class="nav-link" href="index.php" style="color: rgb(248,248,248);">Home</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#about" style="color: rgb(255,255,255);">About Us</a></li>
                    <li class="nav-item"><a class="nav-link" href="#services" style="color: rgb(251,251,251);">Services</a></li>
                    <li class="nav-item"><a class="nav-link" href="#portfolio" style="color: rgb(255,255,255);">Portfolio</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact" style="color: rgb(255,255,255);">Contact Us</a></li>
                </ul>
            </div>
        </div>
    </nav>
<!-- nav end -->



 <!-- amafoto abanza start -->
    <header class="bg-primary-gradient">

             <div class="container pt-4 pt-xl-5">
            <div class="row pt-5">
                <div class="col-md-8 col-xl-6 text-center text-md-start mx-auto">
                    <div class="text-center">
                        <p class="fw-bold text-success mb-2">Voted #1 Worldwide</p>
                        <h1 class="fw-bold">The best solution for your Branding kit..&nbsp;</h1>
                    </div>
                </div>
                <div class="col-12 col-lg-10 mx-auto">
                    <div class="position-relative" style="display: flex;flex-wrap: wrap;justify-content: flex-end;">
                        <div style="position: relative;flex: 0 0 45%;transform: translate3d(-15%, 35%, 0);">
                            <img class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.8" src="admin_pages/assets/img/frontend_about_images/img1.jpg">
                        </div>
                        <div style="position: relative;flex: 0 0 45%;transform: translate3d(-5%, 20%, 0);">
                            <img class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.4" src="admin_pages/assets/img/frontend_about_images/wallpaperflare.com_wallpaper.jpg">
                        </div>
                        <div style="position: relative;flex: 0 0 60%;transform: translate3d(0, 0%, 0);">
                            <img class="img-fluid" data-bss-parallax="" data-bss-parallax-speed="0.25" src="admin_pages/assets/img/frontend_about_images/irange.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- amafoto abanza end -->

        <!-- intro start -->
    </header>
    <section id="about" class="py-0">
        <div class="container py-4 py-xl-5">
            <div class="row gy-4 gy-md-0">
                <div class="col-md-6 text-center text-md-start d-flex d-sm-flex d-md-flex justify-content-center align-items-center justify-content-md-start align-items-md-center justify-content-xl-center">
                    <div style="max-width: 350px;">
                        <h1 class="display-5 fw-bold mb-4">Welcome Home</h1>
                        <p class="text-muted my-4">  
                            <?php
                                                $query = "SELECT * FROM about_us LIMIT 1;";
                                                $query2 = mysqli_query($conn, $query);

                                                while ($rows = mysqli_fetch_assoc($query2)) {

                                                    $about_id = mysqli_escape_string($conn, $rows['about_id']);
                                                    $description = mysqli_escape_string($conn, $rows['description']);
                                                     echo $description;}
                                             
                            ?>
                                                
                                            </p><a class="btn btn-outline-primary btn-lg" role="button" href="#services" style="color: var(--bs-btn-hover-color);background: #014d44;">More..</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div><img class="img-fluid w-100 fit-cover" style="min-height: 300px;" src="assets/img/hero-img.svg"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- intro end -->


 <!-- brands start -->
    <section class="py-0">
        <div class="container text-center py-5" style="background: #0e453a;">
            <p class="mb-4" style="font-size: 1.6rem;color: rgb(218,212,212);">Used by 10+ of the best companies in the world.</p>
            <a href="#"> 
                <img class="m-3" src="admin_pages/assets/img/brands/Artboard%204.png">
            </a>
            <a href="www.instagram.com/plp_ldk">
                <img class="m-3" src="admin_pages/assets/img/brands/Artboard%207.png">
            </a>
            <a href="#">
                <img class="m-3" src="admin_pages/assets/img/brands/Artboard%201.png">
            </a>
            <a href="#">
                <img class="m-3" src="admin_pages/assets/img/brands/Artboard%205.png">
            </a>
            <a href="#">
                <img class="m-3" src="admin_pages/assets/img/brands/Artboard%202.png">
            </a>
        </div>
    </section>
 <!-- brands end -->



 <!-- testimonials start -->

    <section data-aos="fade-left" data-aos-duration="400" data-aos-delay="300" id="testimonials" class="py-0 mt-1" style="border-color: var(--bs-blue);background: var(--bs-card-bg);">
        <!-- Start: Testimonials -->
        <div class="container py-5">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2">Testimonials</p>
                    <h2 class="fw-bold"><strong>What People Say About us</strong></h2>
                    <p class="text-muted">No matter the project, our team can handle it.&nbsp;</p>
                </div>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 d-sm-flex justify-content-sm-center">
                <?php 
                    $query = "SELECT * FROM testimonials;";
                    $query2 = mysqli_query($conn, $query);
                    while ($rows = mysqli_fetch_assoc($query2)) {
                        $testimonial_name = $rows['testimonial_name'];
                        $company = $rows['company'];
                        $testimony = $rows['testimony'];
                        $image_url = $rows['image_url'];
                ?>
                <div class="col mb-4">
                    <div class="d-flex flex-column align-items-center align-items-sm-start">
                        <p class="bg-light border rounded border-light p-4"><?php echo $testimony; ?></p>
                        <div class="d-flex"><img class="rounded-circle flex-shrink-0 me-3 fit-cover" width="50" height="50" src="admin_pages/assets/img/frontend_images/<?php echo $image_url; ?>">
                            <div>
                                <p class="fw-bold text-primary mb-0"><?php echo $testimonial_name; ?></p>
                                <p class="text-muted mb-0"><?php echo $company; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </section>

 <!-- testimonials end -->



 <!-- services start -->

    <section id="services" style="background: rgba(255,255,255,0.5);">
        <div class="container bg-primary-gradient py-5">
            <div class="row">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2">Our Services</p>
                    <h3 class="fw-bold">What we can do for you</h3>
                </div>
            </div>
            <div class="py-5 p-lg-5">
                <div class="row row-cols-1 row-cols-md-2 mx-auto" style="max-width: 900px;">
                    <?php 
                        $query = "SELECT * FROM services;";
                        $query2 = mysqli_query($conn, $query);

                        while ($rows = mysqli_fetch_assoc($query2)) {

                            $service_title = $rows['service_title'];
                            $service_desc = $rows['service_desc'];


                    ?>
                    <div class="col mb-5">
                        <div class="card shadow-sm">
                            <div class="card-body px-4 py-5 px-md-5">
                                <div class="bs-icon-lg d-flex justify-content-center align-items-center mb-3 bs-icon" style="top: 1rem;right: 1rem;position: absolute;"><svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pin-angle" style="color: rgb(14,69,58);">
                                        <path d="M9.828.722a.5.5 0 0 1 .354.146l4.95 4.95a.5.5 0 0 1 0 .707c-.48.48-1.072.588-1.503.588-.177 0-.335-.018-.46-.039l-3.134 3.134a5.927 5.927 0 0 1 .16 1.013c.046.702-.032 1.687-.72 2.375a.5.5 0 0 1-.707 0l-2.829-2.828-3.182 3.182c-.195.195-1.219.902-1.414.707-.195-.195.512-1.22.707-1.414l3.182-3.182-2.828-2.829a.5.5 0 0 1 0-.707c.688-.688 1.673-.767 2.375-.72a5.922 5.922 0 0 1 1.013.16l3.134-3.133a2.772 2.772 0 0 1-.04-.461c0-.43.108-1.022.589-1.503a.5.5 0 0 1 .353-.146zm.122 2.112v-.002.002zm0-.002v.002a.5.5 0 0 1-.122.51L6.293 6.878a.5.5 0 0 1-.511.12H5.78l-.014-.004a4.507 4.507 0 0 0-.288-.076 4.922 4.922 0 0 0-.765-.116c-.422-.028-.836.008-1.175.15l5.51 5.509c.141-.34.177-.753.149-1.175a4.924 4.924 0 0 0-.192-1.054l-.004-.013v-.001a.5.5 0 0 1 .12-.512l3.536-3.535a.5.5 0 0 1 .532-.115l.096.022c.087.017.208.034.344.034.114 0 .23-.011.343-.04L9.927 2.028c-.029.113-.04.23-.04.343a1.779 1.779 0 0 0 .062.46z"></path>
                                    </svg></div>
                                <h5 class="fw-bold card-title"><?php echo $service_title; ?></h5>
                                <p class="text-muted card-text mb-4"><?php echo $service_desc; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </section>

 <!-- services end -->



 <!-- portfolio start -->
    <section data-aos="fade-up" data-aos-duration="700" data-aos-delay="350" id="portfolio" class="py-4 py-xl-5">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md-8 col-xl-6 text-center mx-auto">
                    <p class="fw-bold text-success mb-2">Portfolio</p>
                    <h2 class="fw-bold"><strong>Wanna Check Out Our Works?</strong></h2>
                </div>
            </div><!-- Start: Photos -->

            <div class="row gx-2 gy-2 row-cols-1 row-cols-md-2 row-cols-xl-3 text-center" data-bss-baguettebox="" title="jjj">
                <?php 
                        $query = "SELECT * FROM portfolio;";
                        $query2 = mysqli_query($conn, $query);

                        while ($rows = mysqli_fetch_assoc($query2)) {

                            $title = $rows['title'];
                            $sub_title = $rows['sub_title'];
                            $category = $rows['category'];
                            $image_url = $rows['image_url'];

                ?>
                <div class="col text-center" data-bss-hover-animate="pulse" style="margin-left: auto;">
                    <a href="admin_pages/assets/img/frontend_images/<?php echo $image_url ?>">
                        <img class="img-fluid" src="admin_pages/assets/img/frontend_images/<?php echo $image_url ?>">
                        <h4><?php echo $title ?></h4>
                        <p class="text-break"><?php echo $sub_title ?></p>
                    </a>
                </div>
                <?php } ?>
                </div>
            </div>
        </div>
    </section>
 <!-- portfolio end -->



 <!-- contact us start -->
    <section id="contact">
        <p class="fw-bold text-center text-success mb-2 py-0" style="margin-top: 17px;">Contacts</p>
        <h2 class="fw-bold text-center" style="margin-bottom: 19px;">How you can reach us</h2>
        <div></div><!-- Start: Contact Over Map -->
        <section class="position-relative py-5">
            <div class="d-md-none"><iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA6dGBnz2zf_zug_sC0781WhIN9qa2fyKs&amp;q=Fresh+Ink+Apparel%2C+Opposite+Inkurunziza+Church%2C+KN+84+Street%2C+Kigali&amp;zoom=18" width="100%" height="100%"></iframe></div>
            <div class="d-none d-md-block position-absolute top-0 start-0 w-100 h-100"><iframe allowfullscreen="" frameborder="0" src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA6dGBnz2zf_zug_sC0781WhIN9qa2fyKs&amp;q=Fresh+Ink+Apparel%2C+Opposite+Inkurunziza+Church%2C+KN+84+Street%2C+Kigali&amp;zoom=20" width="100%" height="100%"></iframe></div>
            <div class="position-relative mx-2 my-5 m-md-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xl-5 col-xxl-4 offset-md-6 offset-xl-7 offset-xxl-8">
                            <div>
                                <form class="border rounded shadow p-3 p-md-4 p-lg-5" action="admin_pages/operations/send_mail_to_db.php" method="post" style="background: #0e453a;border-radius: 0;">
                                    <h3 class="text-center mb-3" style="color: rgb(255,253,253);">Contact us</h3><!-- Start: Success Example -->
                                    <div class="mb-3"><input class="form-control" type="text" name="name" placeholder="Name" style="border-radius: 0;"></div><!-- End: Success Example -->
                                    <!-- Start: Error Example -->
                                    <div class="mb-3"><input class="form-control" type="email" name="email" placeholder="Email" style="border-radius: 0;"></div><!-- End: Error Example -->
                                    <div class="mb-3"><textarea class="form-control" name="message" placeholder="Message" rows="6" style="border-radius: 0;"></textarea></div>
                                    <div class="mb-3"><button class="btn btn-primary" type="submit" style="border-radius: 0;--bs-primary: #008374;--bs-primary-rgb: 0,131,116;--bs-secondary: #f228a1;--bs-secondary-rgb: 242,40,161;background: #008374;border-color: #008374;">Send </button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

 <!-- contact us end -->



  <!-- footer start -->
    <footer class="bg-primary-gradient" style="background: #0e453a;color: rgb(255,255,255);">
        <div class="container py-4 py-lg-5">
            <div class="row justify-content-center">
                <div class="col-sm-4 col-md-3 col-lg-4 text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6 fw-bold">Contacts</h3>
                    <ul class="list-unstyled mb-0">
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" viewBox="0 0 24 24" fill="none">
                                <path d="M3 8L10.8906 13.2604C11.5624 13.7083 12.4376 13.7083 13.1094 13.2604L21 8M5 19H19C20.1046 19 21 18.1046 21 17V7C21 5.89543 20.1046 5 19 5H5C3.89543 5 3 5.89543 3 7V17C3 18.1046 3.89543 19 5 19Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    
                                </path>
                            </svg>&nbsp;
                            <?php

                                $sql = "SELECT emails FROM contacts;";
                                $sql2 = mysqli_query($conn, $sql);
                                while ($rows = mysqli_fetch_assoc($sql2)) {
                                     echo $rows['emails'];
                                 } 
                            ?>
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-telephone-fill">
                                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"></path>
                            </svg>&nbsp; <?php

                                $sql = "SELECT phones FROM contacts;";
                                $sql2 = mysqli_query($conn, $sql);
                                while ($rows = mysqli_fetch_assoc($sql2)) {
                                     echo $rows['phones'];
                                 } 
                            ?>
                        </li>
                        <li style="margin-bottom: 24px;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-pin-map-fill">
                                <path fill-rule="evenodd" d="M3.1 11.2a.5.5 0 0 1 .4-.2H6a.5.5 0 0 1 0 1H3.75L1.5 15h13l-2.25-3H10a.5.5 0 0 1 0-1h2.5a.5.5 0 0 1 .4.2l3 4a.5.5 0 0 1-.4.8H.5a.5.5 0 0 1-.4-.8l3-4z"></path>
                                <path fill-rule="evenodd" d="M4 4a4 4 0 1 1 4.5 3.969V13.5a.5.5 0 0 1-1 0V7.97A4 4 0 0 1 4 3.999z"></path>
                            </svg>&nbsp;
                             <?php

                                $sql = "SELECT location FROM contacts;";
                                $sql2 = mysqli_query($conn, $sql);
                                while ($rows = mysqli_fetch_assoc($sql2)) {
                                     echo $rows['location'];
                                 } 
                            ?>
                        </li>
                    </ul>
                    <ul class="list-unstyled mb-0" style="--bs-body-color: var(--bs-red);--bs-primary-rgb: 0,131,116;--bs-primary: #008374;"></ul>
                </div>
                <div class="col-sm-4 col-md-3 text-center text-lg-start d-flex flex-column">
                    <h3 class="fs-6 fw-bold">Useful Links</h3>
                    <ul class="list-unstyled">
                        <li style="color: rgb(255, 255, 255);"><a href="#" style="color: rgb(255,255,255);">Faqs</a></li>
                        <li><a href="#" data-bs-target="#login" data-bs-toggle="modal" style="color: rgb(255,255,255);">Admin</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 text-center text-lg-start d-flex flex-column align-items-center order-first align-items-lg-start order-lg-last">
                    <div class="fw-bold d-flex align-items-center mb-2"><img src="admin_pages/assets/img/favicon/favicowhite.png"><span>&nbsp;Fresh Ink Co.</span></div>
                    <p style="color: rgb(255,255,255);">A screen Printing Shop Based in Rwanda that thrive to provide quality services.</p>
                </div>
            </div>
            <hr>
            <div class="text-muted d-flex justify-content-between align-items-center pt-3">
                <p class="mb-0" style="color: rgb(255,255,255);">Copyright © 2023 Fresh Ink Co.</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-facebook" style="color: rgb(255,255,255);">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"></path>
                        </svg>
                    </li>
                    <li class="list-inline-item">
                        <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-twitter" style="color: rgb(255,255,255);">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"></path>
                        </svg>
                    </li>
                    <li class="list-inline-item">
                        <a href="www.instagram.com/fresh_ink_apparel/">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-instagram" style="color: rgb(241,241,241);">
                                <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"></path>
                            </svg>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </footer>
    <!-- footer end -->








<!-- moodel login start -->

<div class="modal fade" role="dialog" tabindex="-1" id="login">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Admin Login</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-5">
                    <div class="card-body p-sm-5">
                        <div class="bs-icon-xl bs-icon-circle bs-icon-primary shadow bs-icon my-4" style="margin: auto; background: #0e453a;">
                            <svg xmlns="https://www.svgrepo.com/show/475011/unlock.svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16" class="bi bi-person-circle">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"></path>
                                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"></path>
                            </svg>
                        </div>
                        <form data-bss-success-title="sdasda" action="admin_pages/operations/login.php" method="POST">
                            <div class="mb-3">
                                <input class="form-control" type="text" name="username" placeholder="Username" style="border-radius: 0;">
                            </div>
                            <div class="mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Password" style="border-radius: 0;">
                            </div>
                            <div class="mb-3">
                                <button class="btn btn-primary shadow d-block w-100" type="submit" style="border-radius: 0; background: rgb(14, 69, 58);">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="button" data-bs-dismiss="modal" style="border-radius: 0; background: rgb(14, 69, 58);">Close</button>
            </div>
        </div>
    </div>
</div>



<!-- moodel login end -->




    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
</body>

</html>