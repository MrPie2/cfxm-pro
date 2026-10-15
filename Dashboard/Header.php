<?php
include('../Connect.php');

include('../Manager/SiteConfig.php');
$Investor_id=$_SESSION['User_id'];
$sql="select * from investors where Investor_id='$Investor_id'";
$query=mysqli_query($Conn, $sql);
$userDetails=mysqli_fetch_array($query, MYSQLI_ASSOC);

$exchangerate=$userDetails['exchangerate'];
$curName=$userDetails['curName'];
$curAbbr=$userDetails['curAbbr'];
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
    <link rel="icon" type="image/png" sizes="16x16" href="../home/favicon.png">
    <title><?php echo isset($PageTitle) ? htmlspecialchars($PageTitle, ENT_QUOTES, 'UTF-8') : 'Dashboard'; ?></title>
    <!-- Custom CSS -->
          <link href="css/style.css" rel="stylesheet">
    <link href="../en/site-theme.css?v=20261015-heading-colors1" rel="stylesheet">
    <link href="css/dashboard-modern.css?v=20261015-sidebarfix1" rel="stylesheet">
<link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
<link href="css/lib/toastr/toastr.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

<style>

.card{
    border-radius: 10px;
    background: var(--bg-color2);
    width: 98%;
}
li a i{
    color:  <?php echo $Background; ?>;

}
li a{
    text-transform: uppercase;

}
    .btn-oxblood{
        color: white;
        background:  <?php echo $Background; ?>;
        text-decoration: none;
        
    }
    
    label{
        color: #222;
    }
    
    .text-black{
        color: #222;
    }
    
    .text-oxblood{
      color: <?php echo $Background; ?>  ;
    }
    
     .badge-oxblood{
        color: white;
        background:  <?php echo $Background; ?>;

    }
    
    .table-responsive {
  overflow: auto;

  /* Firefox */
  scrollbar-width: none;

  /* IE & Edge */
  -ms-overflow-style: none;
}

/* Chrome, Safari */
.table-responsive::-webkit-scrollbar {
  display: none;
}

/* Keep one menu button on mobile: use the touch-sized mobile toggle only. */
@media (max-width: 767.98px) {
    .header .top-navbar .navbar-nav .sidebartoggle {
        display: none !important;
    }
    .header .top-navbar .navbar-nav .toggle-nav {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center !important;
    }

    /* Keep the top header controls aligned on one horizontal line on mobile. */
    .header .top-navbar {
        display: flex !important;
        align-items: center !important;
        min-height: 56px;
        padding: 0 10px;
    }
    .header .top-navbar .navbar-collapse {
        display: flex !important;
        flex: 1 1 auto;
        align-items: center !important;
        justify-content: space-between;
        min-width: 0;
        width: 100%;
    }
    .header .top-navbar .navbar-nav {
        display: flex !important;
        flex-direction: row !important;
        align-items: center !important;
        gap: 8px;
        margin: 0 !important;
        padding: 0;
    }
    .header .top-navbar .navbar-nav > li,
    .header .top-navbar .navbar-nav > li.nav-item {
        display: flex !important;
        align-items: center !important;
        justify-content: center;
        flex: 0 0 auto;
        margin: 0 !important;
        padding: 0 !important;
        line-height: 1;
    }
    /* Keep the notification signal attached to the bell, overlapping its top-right edge. */
    .header .top-navbar .navbar-nav > li.nav-item.dropdown > a.nav-link.dropdown-toggle {
        position: relative !important;
    }
    .header .top-navbar .navbar-nav > li.nav-item.dropdown > a.nav-link.dropdown-toggle .notify {
        position: absolute !important;
        top: 5px !important;
        right: 3px !important;
        transform: translate(35%, -20%);
        pointer-events: none;
        z-index: 2;
    }

    .header .top-navbar .navbar-nav > li > a.nav-link,
    .header .top-navbar .navbar-nav > li > .theme-switcher {
        display: inline-flex !important;
        align-items: center !important;
        justify-content: center;
        min-height: 42px;
        padding: 6px !important;
        margin: 0 !important;
        line-height: 1 !important;
    }
    .header .top-navbar .navbar-nav > li > a.nav-link i,
    .header .top-navbar .navbar-nav > li > a.nav-link .fa-bell {
        margin-top: 0 !important;
        vertical-align: middle;
        line-height: 1 !important;
    }
    .header .top-navbar .navbar-nav > li > img.thumbnail {
        display: block;
        width: 36px !important;
        height: 36px !important;
        margin: 0 !important;
        object-fit: cover;
        align-self: center;
    }
    .header .top-navbar .navbar-nav.my-lg-0 {
        flex: 0 0 auto;
        gap: 6px;
        margin-left: auto !important;
    }
}
</style>
</head>


<body class="header-fix fix-sidebar">
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <!-- header header  -->
        <div class="header" style="background: var(--body-bg); color: fff; ?> ">
                             <nav class="navbar top-navbar navbar-expand-md navbar-light">
             
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link toggle-nav hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu" style="color: var(--liner-text-color); font-size: 20pt"></i></a> </li>
                        <!-- Messages -->
                  
                        <!-- End Messages -->
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <li> <?php include('../en/theme_switcher.php'); ?>
                        </li>
                        <!-- Comment -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i style="color: var(--liner-text-color); margin-top: 10px; font-size: 20pt" class="fa fa-bell"></i>
                                <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right mailbox animated slideInRight">
                                <ul>
                                    <li>
                                        <div class="drop-title" >Notifications</div>
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
                      
                         <li><img class='thumbnail img-circle' style='width: 40px; height: 40px; border-radius: 50%; margin-top: 10px' src='<?php 
                         if($userDetails['Profile_Picture']==""){
                             echo '../BlankFace.png';
                             
                         }else{
                                 echo $userDetails['Profile_Picture'];
                         } ?>'/></li>
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
                        <li><a href="Dashboard.php"><i class="fas fa-th-large"></i><span>Overview</span></a></li>
                        <li><a href="AccountInsight.php"><i class="fas fa-chart-line"></i><span>Account insight</span><span class="nav-item-tag">NEW</span></a></li>
                        <li><a href="Account.php"><i class="fas fa-wallet"></i><span>Wallet &amp; portfolio</span></a></li>
                        <li class="nav-label">MONEY</li>
                        <li><a href="Deposit.php"><i class="fas fa-plus-circle"></i><span>Deposit</span></a></li>
                        <li><a href="Withdrawal.php"><i class="fas fa-arrow-circle-up"></i><span>Withdrawal</span></a></li>
                        <li><a href="Transfer.php"><i class="fas fa-exchange-alt"></i><span>Peer to peer</span></a></li>
                        <li><a href="Referral.php"><i class="fas fa-user-friends"></i><span>Referral earnings</span></a></li>
                        <li><a href="Earners.php"><i class="fas fa-users"></i><span>Earners activity</span></a></li>
                        <li class="nav-label">ACCOUNT</li>
                        <li><a href="Verification.php"><i class="fas fa-shield-alt"></i><span>Verification &amp; limits</span></a></li>
                        <li><a href="Profile.php"><i class="fas fa-user-circle"></i><span>Profile settings</span></a></li>
                        <li><a href="../en/Index.php#FAQ"><i class="fas fa-life-ring"></i><span>Help &amp; FAQ</span></a></li>
                        <li><a href="Logout.php" class="nav-logout"><i class="fas fa-sign-out-alt"></i><span>Sign out</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <style>
            .top3nav{display:flex;justify-content:center}
            .top3nav div{display:flex;justify-content:center;padding:10px}
            .top3nav div a{font-size:11pt;color:var(--text-color)}
            .top3nav div a i{padding:20px;border-radius:50%;background:var(--liner-text-color);color:var(--bg-color);font-size:15pt}
            /* Modern, full-width mobile navigation: five equal destinations stay visible. */
            .bottomnav{position:fixed;left:0;right:0;bottom:0;z-index:99999;display:grid;grid-template-columns:repeat(5,minmax(0,1fr));gap:0;width:100%;padding:8px max(8px,env(safe-area-inset-left)) calc(8px + env(safe-area-inset-bottom)) max(8px,env(safe-area-inset-right));background:var(--nav-bg,rgba(255,255,255,.96));border-top:1px solid rgba(130,145,160,.22);box-shadow:0 -10px 30px rgba(15,25,45,.08);backdrop-filter:blur(18px);-webkit-backdrop-filter:blur(18px)}
            .bottomnav .bottomnav-item{display:flex;min-width:0;min-height:48px;flex-direction:column;align-items:center;justify-content:center;gap:5px;padding:5px 2px;border-radius:13px;color:var(--vh-muted,#81909b);text-decoration:none;font-size:10px;font-weight:700;line-height:1.1;white-space:nowrap}
            .bottomnav .bottomnav-item i{font-size:18px;color:inherit;line-height:1}
            .bottomnav .bottomnav-item span{font-size:10px;overflow:hidden;text-overflow:ellipsis;max-width:100%}
            .bottomnav .bottomnav-item:hover,.bottomnav .bottomnav-item:focus-visible{background:rgba(119,72,188,.09);color:var(--vh-brand-secondary,#7748bc);outline:none}
            .bottomnav .bottomnav-insight{background:linear-gradient(145deg,#49247e,#7748bc);color:#fff;box-shadow:0 5px 14px rgba(73,36,126,.25)}
            .bottomnav .bottomnav-insight i{color:#fff}
            .left-sidebar{background:var(--nav-bg,var(--card-bg,#fff));border-right:1px solid rgba(130,145,160,.16)}
            .sidebar-nav{padding:16px 12px}
            .sidebar-nav #sidebar-menu{padding:0;margin:0}
            .sidebar-nav #sidebar-menu .nav-label{padding:18px 13px 8px;color:var(--vh-muted,#8795a2);font-size:9px;font-weight:850;letter-spacing:.15em;text-transform:uppercase}
            .sidebar-nav #sidebar-menu>li:not(.nav-label):not(.nav-devider){margin:3px 0}
            .sidebar-nav #sidebar-menu>li>a{position:relative;display:flex;align-items:center;gap:12px;min-height:44px;padding:11px 13px;border:1px solid transparent;border-radius:12px;color:var(--text-color,#354451);font-size:12px;font-weight:650;letter-spacing:0;text-transform:none;transition:background .18s ease,color .18s ease,transform .18s ease}
            .sidebar-nav #sidebar-menu>li>a i{width:18px;flex:0 0 18px;text-align:center;color:var(--vh-muted,#8493a0);font-size:15px}
            .sidebar-nav #sidebar-menu>li>a span{min-width:0}
            .sidebar-nav #sidebar-menu>li>a:hover,.sidebar-nav #sidebar-menu>li>a:focus-visible{background:rgba(119,72,188,.08);color:var(--vh-brand-secondary,#7748bc);outline:none}
            .sidebar-nav #sidebar-menu>li>a:hover i,.sidebar-nav #sidebar-menu>li>a:focus-visible i{color:var(--vh-brand-secondary,#7748bc)}
            .sidebar-nav #sidebar-menu>li>a.nav-logout{color:#c44d60}
            .sidebar-nav #sidebar-menu>li>a.nav-logout i{color:inherit}
            .sidebar-nav .nav-item-tag{margin-left:auto;padding:4px 6px;border-radius:6px;background:rgba(119,72,188,.1);color:#7748bc;font-size:8px;font-weight:850;letter-spacing:.05em}

            /* Shared navigation theme: use the same design tokens as the rest of the site. */
            .left-sidebar,
            .bottomnav{background:var(--cfxm-bg,var(--body-bg,#121f27));color:var(--cfxm-text,var(--text-color,#DFD0B8))}
            .left-sidebar{border-right-color:var(--cfxm-line,rgba(223,208,184,.14))}
            .sidebar-nav #sidebar-menu .nav-label{color:var(--cfxm-muted,var(--liner-text-color,#a5b1ba))}
            .sidebar-nav #sidebar-menu>li>a{color:var(--cfxm-text,var(--text-color,#DFD0B8))}
            .sidebar-nav #sidebar-menu>li>a i{color:var(--cfxm-muted,var(--liner-text-color,#a5b1ba))}
            .sidebar-nav #sidebar-menu>li>a:hover,
            .sidebar-nav #sidebar-menu>li>a:focus-visible,
            .sidebar-nav #sidebar-menu>li.active>a,
            .sidebar-nav #sidebar-menu>li>a.active{background:rgba(119,72,188,.16);color:var(--cfxm-purple-2,#c8a9f4)}
            .sidebar-nav #sidebar-menu>li>a:hover i,
            .sidebar-nav #sidebar-menu>li>a:focus-visible i,
            .sidebar-nav #sidebar-menu>li.active>a i,
            .sidebar-nav #sidebar-menu>li>a.active i{color:var(--cfxm-purple-2,#c8a9f4)}
            .sidebar-nav .nav-item-tag{background:rgba(119,72,188,.16);color:var(--cfxm-purple-2,#c8a9f4)}
            .bottomnav{border-top:1px solid var(--cfxm-line,rgba(223,208,184,.14));box-shadow:0 -10px 30px rgba(0,0,0,.16)}
            .bottomnav .bottomnav-item{color:var(--cfxm-muted,var(--liner-text-color,#a5b1ba))}
            .bottomnav .bottomnav-item:hover,
            .bottomnav .bottomnav-item:focus-visible{background:rgba(119,72,188,.16);color:var(--cfxm-purple-2,#c8a9f4)}
            .sidebar-nav #sidebar-menu>li>a.nav-logout{color:#ff8d9b}
            .sidebar-nav #sidebar-menu>li>a.nav-logout i{color:inherit}

            /* Light mode uses the same shared tokens, with a light surface and readable text. */
            html[data-theme="light"] .left-sidebar,
            html[data-theme="light"] .bottomnav{background:var(--cfxm-bg,#f5f6fa);color:var(--cfxm-text,#202438)}
            html[data-theme="light"] .left-sidebar{border-right-color:var(--cfxm-line,rgba(26,35,55,.12))}
            html[data-theme="light"] .sidebar-nav #sidebar-menu .nav-label,
            html[data-theme="light"] .sidebar-nav #sidebar-menu>li>a i,
            html[data-theme="light"] .bottomnav .bottomnav-item{color:var(--cfxm-muted,#687184)}
            html[data-theme="light"] .sidebar-nav #sidebar-menu>li>a{color:var(--cfxm-text,#202438)}
            html[data-theme="light"] .sidebar-nav #sidebar-menu>li>a:hover,
            html[data-theme="light"] .sidebar-nav #sidebar-menu>li>a:focus-visible,
            html[data-theme="light"] .sidebar-nav #sidebar-menu>li.active>a,
            html[data-theme="light"] .sidebar-nav #sidebar-menu>li>a.active{background:rgba(73,36,126,.08);color:var(--cfxm-purple,#49247e)}
            html[data-theme="light"] .sidebar-nav #sidebar-menu>li>a:hover i,
            html[data-theme="light"] .sidebar-nav #sidebar-menu>li>a:focus-visible i,
            html[data-theme="light"] .sidebar-nav #sidebar-menu>li.active>a i,
            html[data-theme="light"] .sidebar-nav #sidebar-menu>li>a.active i{color:var(--cfxm-purple,#49247e)}
            html[data-theme="light"] .sidebar-nav .nav-item-tag{background:rgba(73,36,126,.1);color:var(--cfxm-purple,#49247e)}
            html[data-theme="light"] .bottomnav{border-top-color:var(--cfxm-line,rgba(26,35,55,.12));box-shadow:0 -10px 30px rgba(23,27,44,.08)}
            html[data-theme="light"] .bottomnav .bottomnav-item:hover,
            html[data-theme="light"] .bottomnav .bottomnav-item:focus-visible{background:rgba(73,36,126,.08);color:var(--cfxm-purple,#49247e)}
            html[data-theme="light"] .sidebar-nav #sidebar-menu>li>a.nav-logout{color:#c44d60}

/* Hard override legacy CoinDash sidebar backgrounds after all legacy theme rules. */
html[data-theme="dark"] body .left-sidebar,
html[data-theme="dark"] body .left-sidebar .scroll-sidebar,
html[data-theme="dark"] body .left-sidebar .sidebar-nav,
html[data-theme="dark"] body .left-sidebar #sidebar-menu {
    background: #121f27 !important;
    background-color: #121f27 !important;
    color: #DFD0B8 !important;
}
html[data-theme="dark"] body .left-sidebar {
    border-right: 1px solid rgba(223,208,184,.14) !important;
}
html[data-theme="dark"] body .left-sidebar #sidebar-menu > li > a {
    background-color: transparent !important;
    color: #DFD0B8 !important;
}
html[data-theme="dark"] body .left-sidebar #sidebar-menu > li > a:hover,
html[data-theme="dark"] body .left-sidebar #sidebar-menu > li > a:focus-visible,
html[data-theme="dark"] body .left-sidebar #sidebar-menu > li.active > a,
html[data-theme="dark"] body .left-sidebar #sidebar-menu > li > a.active {
    background: rgba(119,72,188,.18) !important;
    color: #c8a9f4 !important;
}
html[data-theme="dark"] body .left-sidebar #sidebar-menu .nav-label,
html[data-theme="dark"] body .left-sidebar #sidebar-menu > li > a i {
    color: #a5b1ba !important;
}
html[data-theme="dark"] body .left-sidebar #sidebar-menu > li > a:hover i,
html[data-theme="dark"] body .left-sidebar #sidebar-menu > li.active > a i {
    color: #c8a9f4 !important;
}
html[data-theme="light"] body .left-sidebar,
html[data-theme="light"] body .left-sidebar .scroll-sidebar,
html[data-theme="light"] body .left-sidebar .sidebar-nav,
html[data-theme="light"] body .left-sidebar #sidebar-menu {
    background: #f5f6fa !important;
    background-color: #f5f6fa !important;
}
.page-wrapper{padding-bottom:92px}
            @media(min-width:768px){.bottomnav{display:none}.page-wrapper{padding-bottom:20px}}
            @media(max-width:380px){.bottomnav{padding-left:4px;padding-right:4px}.bottomnav .bottomnav-item{font-size:9px}.bottomnav .bottomnav-item i{font-size:17px}.bottomnav .bottomnav-item span{font-size:9px}}
        </style>
        <div class="page-wrapper" style="background: var(--body-bg)">
            <!-- Bread crumb -->
         
            
            <!-- End Bread crumb -->
            
            <nav class="bottomnav" aria-label="Primary mobile navigation">
                <a href="Dashboard.php" class="bottomnav-item"><i class="fas fa-th-large"></i><span>Home</span></a>
                <a href="Account.php" class="bottomnav-item"><i class="fas fa-wallet"></i><span>Wallet</span></a>
                <a href="AccountInsight.php" class="bottomnav-item bottomnav-insight"><i class="fas fa-chart-pie"></i><span>Insight</span></a>
                <a href="Profile.php" class="bottomnav-item"><i class="fas fa-user-circle"></i><span>Profile</span></a>
                <a href="Earners.php" class="bottomnav-item"><i class="fas fa-exchange-alt"></i><span>Earners</span></a>
            </nav>

<?php
// Shared dashboard activity toast: loaded once through the existing dashboard header.
include_once('../en/fakealert.php');
?>
