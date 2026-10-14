<?php session_start();
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
    <title>Dashboard</title>
    <!-- Custom CSS -->
          <link href="css/style.css" rel="stylesheet">
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
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggle hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu" style="color: var(--liner-text-color)"></i></a> </li>
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
                        <li class="nav-label">Menu</li>
                        <li><a href="Dashboard.php"><i class='fa fa-laptop'></i> Dashboard</a></li>
                        <li><a href="../en/Index.php"><i class='fa fa-home'></i> Homepage</a></li>


                    <li> <a href="Account.php"><i class='fa fa-money'></i> Profit Record</a></li>
                    <li><a href="Deposit.php"><i class='fa fa-bank'></i> Deposit</a></li>
                    <li><a href="Withdrawal.php"><i class='fa fa-credit-card'></i> Withdrawal</a></li>
                    <li><a href="Transfer.php"><i class='fa fa-users'></i> Peer 2 Peer</a></li>
                    <li><a href="Referral.php"><i class='fa fa-share-alt'></i> Referral Earning</a></li>
                    <li><a href="../en/Index.php?#FAQ"><i class='fa fa-question-circle'></i> FAQ</a></li>
                    <li><a href="Verification.php"><i class='fa fa-lock'></i> Verification/Limit</a></li>
                    <li><a href="Profile.php"><i class='fa fa-user'></i> Profile</a></li>
                    <li><a href="Logout.php"><i class='fa fa-power-off'></i> Logout</a></li>
                            </ul>
                        </li>
                       
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>
        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <style>
            .top3nav{
                display: flex;
                justify-content: center;
            }
            .top3nav div{
                  display: flex;
                justify-content: center;
                padding: 10px;
            }
            
            .top3nav div a{
                font-size: 11pt;
                color: var(--text-color);
            }
            .top3nav div a i{
                padding: 20px;
                border-radius: 50%;
                background: var(--liner-text-color);
                color: var(--bg-color);
                font-size: 15pt;
            }
            
            .bottomnav{
                display: flex;
                justify-content: center;
                position: fixed;
                z-index: 99999;
                width: 100vw;
                bottom: 0px;
                background: var(--nav-bg);
                gap: 20px;
                text-align: center;
            }
            .bottomnav div{
                padding: 10px;
            }
            
            .bottomnav div a{
                font-size: 13pt;
                text-align: center;
                color: var(--text-color);
            }
            
            .bottomnav div a i{
                color: var(--liner-text-color);
                font-size: 25pt;
            }
            
            .bottomnav div a span{
             font-size: 9pt; 
             text-align: center;
             margin-top: -20px;
            }
        </style>
        <div class="page-wrapper" style="background: var(--body-bg)">
            <!-- Bread crumb -->
         
            
            <!-- End Bread crumb -->
            
            <div class="bottomnav">
                   <div><a href="Dashboard.php"><i class="fas fa-home"></i><br><span>Home</span></a></div>
                    <div><a href="Account.php"><i class="fas fa-wallet"></i><br><span>Wallet</span></a></div>
                    <div><a href="Account.php"><i class="fas fa-briefcase"></i><br><span>Portfolio</span></a></div>
                    <div><a href="Profile.php"><i class="fa fa-user"></i><br><span>Profile</span></a></div>
               </div>