<?php 

session_start();
include('../../../Connect.php');
$Investor_id=$_SESSION['User_id'];
$sql="select * from investors where Investor_id='$Investor_id'";
$query=mysqli_query($Conn, $sql);
$row=mysqli_fetch_array($query, MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <title>Dashboard</title>
    <!-- Custom CSS -->
          <link href="css/style.css" rel="stylesheet">
<link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
<link href="css/lib/toastr/toastr.min.css" rel="stylesheet">

</head>


<body class="header-fix fix-sidebar">
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header">
                             <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="Index.php">
                        <!-- Logo icon -->
                        <b><img src="blockchain-com-logo-freelogovectors.net_.png" alt="homepage"  /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link toggle-nav hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggle hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <!-- Messages -->
                        <li class="nav-item dropdown mega-menu"> <a class="nav-link dropdown-toggle text-muted  " href="Account.php"  aria-haspopup="true" aria-expanded="false"><i class="ti-wallet m-r-5"></i> Wallet</a>
                            
                        </li>
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Comment -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated slideInRight">
                                <ul>
                                    <li>
                                        <div class="drop-title">Notifications</div>
                                    </li>
                                    <li>
                                        <div class="header-notify">
                                            
                                            <?php 
                                            $sql="select * from notification where Investor_id='$Investor_id' and seen='0' order by seen DESC";
                                            $link=mysqli_query($Conn, $sql);
                                            while($not=mysqli_fetch_array($link, MYSQLI_ASSOC)){
                                               echo'<!-- Message -->
                                           <a href="Notification.php?id='.$not['id'].'">
                                          <div class="notification-contnet">
                                                    <h5>'.$not['Subject'].'</h5>
                                                </div>
                                            </a> <!-- Message -->';
                                           
                                            }
                                            ?>
                                           
                                           
                                        </div>
                                    </li>
                                    <li>
                                        <a class="nav-link text-center" href="Notification.php"> Check all notifications <i class="fa fa-angle-right"></i> </a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- End Comment -->
                   
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-user"></i></a>
                            <div class="dropdown-menu dropdown-menu-right animated slideInRight">
                                <ul class="dropdown-user">
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"> Profile</a></li>
                                    <li><a href="#"> Setting</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#"> Logout</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebar-menu">
                        <li class="nav-devider"></li>
                        <li class="nav-label">WORKSPACE</li>
                        <li><a href="Dashboard.php"><i class="fas fa-th-large"></i><span class="hide-menu">Overview</span></a></li>
                        <li><a href="AccountInsight.php"><i class="fas fa-chart-line"></i><span class="hide-menu">Account insight</span></a></li>
                        <li><a href="Account.php"><i class="fas fa-wallet"></i><span class="hide-menu">Wallet &amp; portfolio</span></a></li>
                        <li class="nav-label">MONEY</li>
                        <li><a href="Deposit.php"><i class="fas fa-plus-circle"></i><span class="hide-menu">Deposit</span></a></li>
                        <li><a href="Withdrawal.php"><i class="fas fa-arrow-circle-up"></i><span class="hide-menu">Withdrawal</span></a></li>
                        <li><a href="Transfer.php"><i class="fas fa-exchange-alt"></i><span class="hide-menu">Peer to peer</span></a></li>
                        <li><a href="Referral.php"><i class="fas fa-user-friends"></i><span class="hide-menu">Referral earnings</span></a></li>
                        <li class="nav-label">ACCOUNT</li>
                        <li><a href="Verification.php"><i class="fas fa-shield-alt"></i><span class="hide-menu">Verification &amp; limits</span></a></li>
                        <li><a href="Profile.php"><i class="fas fa-user-circle"></i><span class="hide-menu">Profile settings</span></a></li>
                        <li><a href="Support.php"><i class="fas fa-life-ring"></i><span class="hide-menu">Help &amp; support</span></a></li>
                        <li><a href="../../../Logout.php"><i class="fas fa-sign-out-alt"></i><span class="hide-menu">Sign out</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"><?php echo $row['First_Name']." - $".number_format($row['Fin_Asset'], 2, '.',','); ?></h3> </div>
                <div class="col-md-7 align-self-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
            <!-- End Bread crumb -->