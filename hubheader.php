<?php

session_start();
//Loads a session

//Checks whether or not the person is logged in with their student ID
if ( !isset( $_SESSION[ 'studentid' ] ) ) {
	header( 'Location: login.php' );
	exit;
}

//If they are logged in, take the variable $id and store the studentid in that
if ( isset( $_SESSION[ 'studentid' ] ) ) {
	$id = $_SESSION[ 'studentid' ];

	?>
	<?php
} else {
	//echo "nothing yet";
}
include ( 'includes/dbh.inc.php' );
$sql = "SELECT * FROM students WHERE studentid = '$id'";
//echo $id;
$result = mysqli_query( $connection, $sql );
while ( $student = $result->fetch_assoc() ):
	



?>
			
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Student Media Services</title>
<!--    <meta name="description" content="Sufee Admin - HTML5 Admin Template">-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="assets/scss/style.css">
    <link href="assets/css/lib/vector-map/jqvmap.min.css" rel="stylesheet">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>


        <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./"><img src="images/logo.png" alt="Logo"></a>
                <a class="navbar-brand hidden" href="./"><img src="images/logo2.png" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="hub.php"> <i class="menu-icon fa fa-dashboard"></i>Hub  </a>
                    </li>
                    <h3 class="menu-title">Actions</h3><!-- /.menu-title -->
					<li>
                        <a href="searchproject.php"> <i class="menu-icon ti-search"></i>Search Project </a>
                    </li>
<!--                     <li>-->
<!--                        <a href="addselfproject.php"> <i class="menu-icon ti-paint-roller"></i>Add Myself to Project </a>-->
<!--                    </li>-->
					 <li>
                        <a href="createproject.php"> <i class="menu-icon ti-plus"></i>New Project Force </a>
                    </li>
					 <li>
                        <a href="labmonitor.php"> <i class="menu-icon ti-bolt-alt"></i>Tech EXP Level</a>
                    </li>
					 <li>
                        <a href="mygroups.php"> <i class="menu-icon ti-shine"></i>My Groups</a>
                    </li>
					 <li>
                        <a href="eqhandbook.php"> <i class="menu-icon ti-book"></i>Equipment Handbook</a>
                    </li>
					
					
				
					
					
	<?php
						if ( isset( $_SESSION[ 'is_leadership' ] ) ) {
							?>					
					
                    <h3 class="menu-title">SMS Leadership Actions</h3><!-- /.menu-title -->
					
					       <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Search For...</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="searchproject.php">Look Up Project</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="searchstudent.php">Look Up Student</a></li>
                        </ul>
                    </li>

                     <li>
                        <a href="searchproject.php"> <i class="menu-icon ti-rocket"></i>Alter Project </a>
                    </li>
                    <li>
                        <a href="searchsig.php"> <i class="menu-icon ti-envelope"></i>View SIG </a>
                    </li>
					
					<?php if ( isset( $_SESSION[ 'exec_rights' ] ) ) { ?>
					
                     <li>
                        <a href="execnotes.php"> <i class="menu-icon ti-write"></i>Update Exec Notes </a>
                    </li>
					<?php } ?>
					
			
             
					
<?php } ?>
                    <h3 class="menu-title">Others</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-glass"></i>Stuff</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-login.html">Login</a></li>
                            <li><i class="menu-icon fa fa-sign-in"></i><a href="page-register.html">Register</a></li>
                            <li><i class="menu-icon fa fa-paper-plane"></i><a href="pages-forget.html">Forget Pass</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->
		
	
    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">3</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                          </div>
                        </div>

                        <div class="dropdown for-message">
                          
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                <a class="nav-link" href="logout.php"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>	<a class="navbar-brand" href="#">Welcome <?= $student['name'] ?></a></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

		<br>
<br>
			<?php 	if ( isset( $_GET[ 'error' ] ) ) {
			$fmsg = $_GET[ 'error' ]; } ?>
		<?php 	if ( isset( $_GET[ 'success' ] ) ) {
			$smsg = $_GET[ 'success' ]; } ?>
		
							<?php if(isset($smsg)){ ?>
							<div class="alert alert-success" role="alert" style="margin-top: 20px;">
								<?php echo $smsg; ?> </div>
							<?php } ?>
							<?php if(isset($fmsg)){ ?>
							<div class="alert alert-danger" role="alert" style="margin-top: 20px;">
								<?php echo $fmsg; ?> </div>
							<?php } ?>
		
	
    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>


    <script src="assets/js/lib/chart-js/Chart.bundle.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.min.js"></script>
    <script src="assets/js/lib/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="assets/js/lib/vector-map/country/jquery.vmap.world.js"></script>
		<?php endwhile ?>
