<?php 
session_start();
include('../Manager/Header.php');
?>
  <header>

   <meta name="viewport" content="width=device-width, user-scalable=no"/>

  <style>
.navbar-inverse{
background: #a49376;
color: white;

}
  .HasError{
	  border: 1px solid red;
	  background: #ff0;
  }
  .dark{
	  
	  background: #666;
	  color: #eee;
	  
  }
    body {
  font-family: IBM Plex Sans;
}
    @media screen and (min-width: 600px){
	 .navbar-collapse{
		 float: right;
		 margin-right: 1cm
	 } 
  }
    .display-7 {
  font-family: 'Jost', sans-serif;
  font-size: 1.5rem;
  line-height: 1.9;
}

.hasError{
background: #ff0;
border: 1px solid #f00;
}

.center{
	text-align: center;
}
.center1{
	float: center;

.bigText{
	font-size: 40pt;
}
.bigText1{
	font-size: 35pt;
}
.red{
	background:#f00;
}

  </style>
 
  </header>
    

<nav class="navbar-inverse" role="navigation">
 <div class="navbar-header">
 <button type="button" class="navbar-toggle" data-toggle="collapse"
 data-target="#example-navbar-collapse">
 <span class="sr-only">Toggle navigation</span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>
 <span class="icon-bar"></span>

 </button>
 <a class="navbar-brand" href="#" style="color: white">Modelio Equity</a>
 </div>
 <div class="collapse navbar-collapse" id="example-navbar-collapse">
 <ul class="nav navbar-nav">
 <li class=""><a href="Index.php">HOME</a></li>
 <?php if(isset($_SESSION['Agent_id'])){
	 echo '<li><a href="#Contract.php">MY CLIENTS</a></li>

 <li class="dropdown">
 <a href="#" class="dropdown-toggle" data-toggle="dropdown">
 OTHERS <b class="caret"></b>
 </a>
 <ul class="dropdown-menu">
 <li><a href="Logout.php">LOGOUT</a></li>
 </ul>
 </li>
 
	 
	 ';
 }else{
	 
	 echo '
	  <li><a data-toggle="modal" data-target="#myModal"href="#">LOGIN</a></li>
	 <li><a href="Index.php">SIGNUP</a></li>

	 ';
 } ?>

 </ul>
 </div>
</nav>

