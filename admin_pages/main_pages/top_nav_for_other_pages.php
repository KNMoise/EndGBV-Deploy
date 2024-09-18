<!DOCTYPE html>
<html lang="en">

<head> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>     <?php
            $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($full_url, "dashboard") !== false) {
                echo "Dashboard :: Welcome to Fresh Ink Co. Management";
            }else if (strpos($full_url, "income") !== false || strpos($full_url, "job") !== false) {
                 echo "Incomes Tracking :: Fresh Ink Co.";

            }else if (strpos($full_url, "aboutus") !== false) {
                 echo "Front-end About us Editing :: Fresh Ink Co.";
            }else if (strpos($full_url, "email") !== false) {
                 echo "Customer E-mails :: Fresh Ink Co.";
            }else if (strpos($full_url, "report") !== false) {
                 echo "Generate Reports :: Fresh Ink Co.";
            }else if (strpos($full_url, "client") !== false) {
                 echo "Editing CLient-side Contents :: Fresh Ink Co.";
            }else if (strpos($full_url, "user") !== false) {
                 echo "System Users :: Fresh Ink Co.";
            }else if (strpos($full_url, "profile") !== false) {
                 echo "Profiles :: Fresh Ink Co.";
            }      
        ?></title>
    <meta name="theme-color" content="#992f2f">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon/favicowhite.png">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="../manifest.json">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="../assets/fonts/fontawesome-all.min.css">

    <!-- datatable css links -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: #0e453a;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="dashboard.php" style="margin-bottom: 15px;padding: 23px 16px 21px;padding-bottom: 22px;margin-right: 0px;height: 78px;">
                    <div class="sidebar-brand-icon rotate-n-15"><img src="../assets/img/Artboard%2019.png" style="height: 44px;width: 44;"></div>
                </a>
                <hr class="sidebar-divider my-0">
                 <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link" href="../dashboard.php"><span>&nbsp;Dashboard</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../incomes.php"><span>&nbsp;Incomes</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../expenses.php"><span>Expenses</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../emails.php"><span>&nbsp;E-mails</span></a><a class="nav-link" href="../reports.php">&nbsp;<span>Reports</span></a></li>
                    <li class="nav-item"><a class="nav-link" href="../client_side_pages.php"><span>&nbsp;Client-Side Pages</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">
                                     <?php 
                                            $query = "SELECT email_id FROM emails WHERE state='0';";
                                            $query2 = mysqli_query($conn, $query);
                                            $query3 = mysqli_num_rows($query2);

                                            echo $query3;

                                        ?>
                                </span><i class="fas fa-envelope fa-fw"></i></a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header">E-mail Received&nbsp;</h6>
                                        <?php 

                                            $query = "SELECT * FROM emails WHERE state = '0' LIMIT 7";
                                            $query2 = mysqli_query($conn, $query);

                                            while ($rows = mysqli_fetch_assoc($query2)) {
                                                $email_id = mysqli_escape_string($conn, $rows['email_id']);
                                                $sender_names = mysqli_escape_string($conn, $rows['sender_names']);
                                                $message = mysqli_escape_string($conn, $rows['message']);
                                           

                                        ?>
                                        <a class="dropdown-item d-flex align-items-center" href="../view_email.php?id=<?php echo $email_id; ?>">
                                            <div class="fw-bold">
                                                <div class="text-truncate">
                                                    <span><?php echo $message ?></span>
                                                </div>
                                                <p class="small text-gray-500 mb-0"><?php echo $sender_names; ?> - 58</p>
                                            </div>
                                        </a>
                                        <?php } ?>
                                        <a class="dropdown-item text-center small text-gray-500" href="../emails.php">Show All E-Mails</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">
                                Welcome: <?php echo $row['username']; ?>  </span><img class="border rounded-circle img-profile" src="../assets/img/users/<?php echo $row['image_url']; ?>"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in"><a class="dropdown-item" href="../profile.php"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile</a>
                                        <div class="dropdown-divider"></div><a class="dropdown-item" href="../logout.php"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav> 