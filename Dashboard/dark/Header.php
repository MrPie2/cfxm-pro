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


<body class="header-fix fix-sidebar dark-nav-polish">
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
                        <li><a href="../AccountInsight.php"><i class="fas fa-chart-line"></i><span class="hide-menu">Account insight</span></a></li>
                        <li><a href="Account.php"><i class="fas fa-wallet"></i><span class="hide-menu">Wallet &amp; portfolio</span></a></li>
                        <li><a href="../Market.php"><i class="fas fa-chart-bar"></i><span class="hide-menu">Market</span></a></li>
                        <li class="nav-label">MONEY</li>
                        <li><a href="Deposit.php"><i class="fas fa-plus-circle"></i><span class="hide-menu">Deposit</span></a></li>
                        <li><a href="Withdrawal.php"><i class="fas fa-arrow-circle-up"></i><span class="hide-menu">Withdrawal</span></a></li>
                        <li><a href="Transfer.php"><i class="fas fa-exchange-alt"></i><span class="hide-menu">Peer to peer</span></a></li>
                        <li><a href="Referral.php"><i class="fas fa-user-friends"></i><span class="hide-menu">Referral earnings</span></a></li>
                        <li><a href="Earners.php"><i class="fas fa-users"></i><span class="hide-menu">Earners activity</span></a></li>
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
        <style>
        .dark-nav-polish .left-sidebar{background:var(--nav-bg,var(--card-bg,#fff));border-right:1px solid rgba(130,145,160,.16)}
        .dark-nav-polish .sidebar-nav{padding:16px 12px}
        .dark-nav-polish #sidebar-menu .nav-label{padding:18px 13px 8px;color:var(--vh-muted,#8795a2);font-size:9px;font-weight:850;letter-spacing:.15em;text-transform:uppercase}
        .dark-nav-polish #sidebar-menu>li:not(.nav-label):not(.nav-devider){margin:3px 0}
        .dark-nav-polish #sidebar-menu>li>a{display:flex;align-items:center;gap:12px;min-height:43px;padding:11px 13px;border:1px solid transparent;border-radius:12px;color:var(--text-color,#354451);font-size:12px;font-weight:650;letter-spacing:0;text-transform:none;transition:background .18s ease,color .18s ease}
        .dark-nav-polish #sidebar-menu>li>a i{width:18px;flex:0 0 18px;text-align:center;color:var(--vh-muted,#8493a0);font-size:15px}
        .dark-nav-polish #sidebar-menu>li>a:hover,.dark-nav-polish #sidebar-menu>li>a:focus-visible{background:rgba(119,72,188,.09);color:#7748bc;outline:none}
        .dark-nav-polish .page-wrapper{padding-bottom:90px}
        .dark-bottomnav{position:fixed;left:0;right:0;bottom:0;z-index:99999;display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:0;width:100%;padding:8px max(8px,env(safe-area-inset-left)) calc(8px + env(safe-area-inset-bottom)) max(8px,env(safe-area-inset-right));background:var(--nav-bg,rgba(255,255,255,.96));border-top:1px solid rgba(130,145,160,.22);box-shadow:0 -10px 30px rgba(15,25,45,.08);backdrop-filter:blur(18px);-webkit-backdrop-filter:blur(18px)}
        .dark-bottomnav a{display:flex;min-width:0;min-height:48px;flex-direction:column;align-items:center;justify-content:center;gap:5px;padding:5px 2px;border-radius:13px;color:var(--vh-muted,#81909b);text-decoration:none;font-size:10px;font-weight:700;line-height:1.1;white-space:nowrap}
        .dark-bottomnav a i{font-size:18px;color:inherit}.dark-bottomnav a span{font-size:10px;overflow:hidden;text-overflow:ellipsis;max-width:100%}
        .dark-bottomnav a:hover,.dark-bottomnav a:focus-visible{background:rgba(119,72,188,.09);color:#7748bc;outline:none}
        .dark-bottomnav a.dark-insight{background:linear-gradient(145deg,#49247e,#7748bc);color:#fff;box-shadow:0 5px 14px rgba(73,36,126,.25)}
        @media(min-width:768px){.dark-bottomnav{display:none}.dark-nav-polish .page-wrapper{padding-bottom:20px}}
        @media(max-width:380px){.dark-bottomnav{padding-left:4px;padding-right:4px}.dark-bottomnav a,.dark-bottomnav a span{font-size:9px}.dark-bottomnav a i{font-size:17px}}
        </style>
        <div class="dark-bottomnav" aria-label="Primary mobile navigation">
            <a href="Dashboard.php"><i class="fas fa-th-large"></i><span>Home</span></a>
            <a href="Account.php"><i class="fas fa-wallet"></i><span>Wallet</span></a>
            <a href="../AccountInsight.php" class="dark-insight"><i class="fas fa-chart-pie"></i><span>Insight</span></a>
            <a href="Deposit.php"><i class="fas fa-plus-circle"></i><span>Deposit</span></a>
            <a href="Profile.php"><i class="fas fa-user-circle"></i><span>Profile</span></a>
        </div>
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