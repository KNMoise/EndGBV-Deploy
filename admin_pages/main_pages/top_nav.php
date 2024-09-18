
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>
        <?php
            $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if (strpos($full_url, "dashboard") !== false) {
                echo "Welcome to FightingGBV Co. Management";
            }else if (strpos($full_url, "income") !== false || strpos($full_url, "job") !== false) {
                 echo "Donations FightingGBV Co.";

            }else if (strpos($full_url, "expense") !== false) {
                 echo "Expenses Tracking FightingGBV Co.";
            }else if (strpos($full_url, "email") !== false) {
                 echo "Customer E-mails FightingGBV Co.";
            }else if (strpos($full_url, "report") !== false) {
                 echo "Generate Reports FightingGBV Co.";
            }else if (strpos($full_url, "client") !== false) {
                 echo "Editing CLient-side Contents FightingGBV Co.";
            }else if (strpos($full_url, "user") !== false) {
                 echo "System Users FightingGBV Co.";
            }else if (strpos($full_url, "profile") !== false) {
                 echo "Profiles FightingGBV Co.";
            }      
        ?>
    </title>
    <meta name="theme-color" content="#992f2f">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicowhite.png">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="manifest" href="manifest.json">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    
    
    <!-- datatable css links -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.6/css/buttons.dataTables.min.css">
    

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i&amp;display=swap">
    <link rel="stylesheet" href="assets/fonts/fontawesome-all.min.css">

    <!-- bar chart links -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
          google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Income'],
          <?php
            $query = "SELECT MONTH(job_date) AS mon, SUM(income) AS total_income FROM incomes GROUP BY MONTH(job_date);";
            $res = mysqli_query($conn, $query);
            while ($data = mysqli_fetch_array($res)) {
              $mon = date("F", mktime(0, 0, 0, $data['mon'], 1)); // Convert numeric month to month name
              $income = $data['total_income'];
           ?>
           ['<?php echo $mon; ?>', <?php echo $income; ?>],
           <?php   
            }
           ?> 
        ]);

        var options = {
          chart: {
            title: 'FightingGBV Co.',
            subtitle: 'Year: 2024',
          },
          bars: 'vertical', // Required for Material Bar Charts.
          colors: ['#0e453a'], // Specify the color of the bars
          tooltip: { // Customize the tooltip format
            trigger: 'hover',
            textStyle: {
              bold: true
            },
            isHtml: true
          },
          legend: { position: 'none' }, // Remove the legend section
          vAxis: { // Vertical axis configuration
            textStyle: {
              fontSize: 12
            }
          }
        };

        var formatter = new google.visualization.NumberFormat({ // Format the income values without abbreviations
          pattern: '#,### Rwf'
        });
        formatter.format(data, 1);

        var chart = new google.charts.Bar(document.getElementById('barchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
</script>


</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background: #0e453a;">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="dashboard.php" style="margin-bottom: 15px;padding: 23px 16px 21px;padding-bottom: 22px;margin-right: 0px;height: 78px;">
                    <div class="sidebar-brand-icon rotate-n-15"><img src="assets/img/Artboard%2019.png" style="height: 44px;width: 44;"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item">
                        <a class="nav-link 
                            <?php
                                       $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                       if (strpos($full_url, "dashboard") !== false) {
                                           echo "active";
                                        } 
                            ?>

                        " href="dashboard.php">
                            <span>&nbsp;Dashboard - Admin</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link 
                            <?php
                                       $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                       if (strpos($full_url, "income") !== false || strpos($full_url, "job") !== false) {
                                           echo "active";
                                        } 
                            ?>" 
                            href="incomes.php">
                            <span>&nbsp;Incomes</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link 
                            <?php
                                       $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                       if (strpos($full_url, "expense") !== false) {
                                           echo "active";
                                        } 
                            ?>" 
                            href="expenses.php">
                            <span>Expenses</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  
                            <?php
                                       $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                       if (strpos($full_url, "email") !== false) {
                                           echo "active";
                                        } 
                            ?>"
                             href="emails.php">
                            <span>&nbsp;E-mails</span>
                        </a>
                        <a class="nav-link
                            <?php
                                       $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                       if (strpos($full_url, "report") !== false) {
                                           echo "active";
                                        } 
                            ?>"
                             href="reports.php">&nbsp;
                            <span>Reports</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  
                            <?php
                                       $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                       if (strpos($full_url, "client") !== false || strpos($full_url, "about") !== false || strpos($full_url, "services") !== false || strpos($full_url, "testimonial") !== false) {
                                           echo "active";
                                        } 
                            ?>"
                             href="client_side_pages.php">
                            <span>&nbsp;Client-Side Pages</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link
                            <?php
                                       $full_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                                       if (strpos($full_url, "user") !== false || strpos($full_url, "about") !== false || strpos($full_url, "services") !== false || strpos($full_url, "testimonial") !== false || strpos($full_url, "profile") !== false) {
                                           echo "active";
                                        } 
                            ?>
                            " href="users.php">
                            <span>&nbsp;System Users</span></a>
                        </li>
                </ul>
                <div class="text-center d-none d-md-inline">
                    <button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button>
                </div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid">
                        <button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <li class="nav-item dropdown no-arrow mx-1">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="badge bg-danger badge-counter">
                                        <?php 
                                            $query = "SELECT email_id FROM emails  WHERE state= '0' ;";
                                            $query2 = mysqli_query($conn, $query);
                                            $query3 = mysqli_num_rows($query2);

                                            echo $query3;

                                        ?>


                                </span>
                                <i class="fas fa-envelope fa-fw"></i>
                            </a>
                                    <div class="dropdown-menu dropdown-menu-end dropdown-list animated--grow-in">
                                        <h6 class="dropdown-header" style="background: rgb(14,69,58)">E-mails Received </h6>
                                        <?php 
                                            $query = "SELECT * FROM emails WHERE state= '0' LIMIT 7;";
                                            $query2 = mysqli_query($conn, $query);

                                            while ($rows = mysqli_fetch_assoc($query2)) {
                                                $id = mysqli_escape_string($conn, $rows['email_id']);
                                                $sender_names = mysqli_escape_string($conn, $rows['sender_names']);
                                                $message = mysqli_escape_string($conn, $rows['message']);
                                           

                                        ?>
                                        <a class="dropdown-item d-flex align-items-center" href="view_email.php?id=<?php echo $id; ?>">
                                            <div class="fw-bold">
                                                <div class="text-truncate">
                                                    <span><?php echo $message ?></span>
                                                </div>
                                                <p class="small text-gray-500 mb-0"><?php echo $sender_names; ?> - 58</p>
                                            </div>
                                        </a>
                                    <?php } ?>

                                        <a class="dropdown-item text-center small text-gray-500" href="./emails.php">Show All E-mails</a>
                                    </div>
                                </div>
                                <div class="shadow dropdown-list dropdown-menu dropdown-menu-end" aria-labelledby="alertsDropdown"></div>
                            </li>
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow">
                                    <a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#">
                                        <span class="d-none d-lg-inline me-2 text-gray-600 small">
                                            Welcome: <?php echo $row['username']; ?>  
                                        </span>
                                        <img class="border rounded-circle img-profile" src="assets/img/users/<?php echo $row['image_url']; ?>"></a>

                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                        <a class="dropdown-item" href="profile.php">
                                            <i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Profile
                                        </a>
                                        <a class="dropdown-item" href="logout.php">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Logout
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>