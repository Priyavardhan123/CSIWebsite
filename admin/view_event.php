<html lang="en">

<head>
  <title>CSI DDU | Contact</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


  <link rel="stylesheet" href="../fonts/icomoon/style.css">

  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/jquery-ui.css">

  <link rel="stylesheet" href="../css/jquery.fancybox.min.css">

  <link rel="stylesheet" href="../css/bootstrap-datepicker.css">

  <link rel="stylesheet" href="../css/owl.carousel.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">
  <link rel="stylesheet" href="../css/owl.theme.default.min.css">

  <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="../css/aos.css">

  <link href="https://fonts.googleapis.com/css?family=Roboto:100i,300,400,500,700" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Allura" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">

</head>
<body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-brand">CSI Admin</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNav">
				<ul class="navbar-nav">
		  			<li class="nav-item">
						<a class="nav-link" href="admin_dashboard.php">Dashboard</a>
		  			</li>
		  			<li class="nav-item">
						<a class="nav-link" href="add_event.php">Add Event</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="view_event.php">Event List</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="add_blog.php">Add Blog</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="view_blog.php">Blog List</a>
					</li>
				</ul>
			</div>
		</nav>

		<section class="container site-section">
			<h1 class="text-center text-primary mt-5 mb-4"> Recorded Events</h1>
		</section>


		<div id="notification">
			<?php
			 	if(isset($_GET['msg']))
				{
					if($_GET['msg']=="del")
					{
						echo '<div class="alert alert-danger text-center">
  						Deleted! <strong> Event : '.$_GET['del_event'].' </strong>has been successfully deleted from the records.
 						<br><small class="text-muted"> If you deleted the event accidently, call site admin. </small>
						</div>';
					}
					else if($_GET['msg']=="error")
					{
						echo '<div class="alert alert-danger text-center">
  						<strong>Error!</strong> An error occured while deleteing event from database. Contact Admin.
						</div>';
					}
				}
			?>
		</div>

		<div class="container site-section mt-5 mb-5 col-md-6 justify-content-center">

				<table id="events" class="table table-hover table-responsive dt-responsive" style="width:100%;">
				<thead>
		            <tr>
		                <th scope="col">Name</th>
		                <th scope="col">Date</th>
		                <th scope="col">Type</th>
		                <th scope="col">Blog Link</th>
		                <th scope="col">Update</th>
						<th scope="col">Delete</th>
		            </tr>
		        </thead>
		        <tbody>

					<?php

		  			include("../db_connect.php");
		  			$sql = "SELECT * from Event_master ORDER BY date DESC";
		  			$event_list = $pdo->query($sql)->fetchAll();
		  			// now $event variable has list of events

		  			foreach($event_list as $event){
		  			?>

					<tr>
		                <td><?php echo $event['name']; ?></td>
		                <td><?php echo date("jS M, Y", strtotime($event['date'])); ?></td>
		                <td><?php echo $event['type']; ?></td>
						<td><?php echo $event['blog_link']; ?></td>
						<td>
							<?php echo
							'<form method="post" action="updateevent_db.php">
								<input type="hidden" name="event_id" value="'.$event['id'].'">
								<button class="btn btn-primary" type="submit"> Update </button>
							</form>';
							?>
					 	</td>
						<td>
							<?php echo
							'<form method="post" action="delevent_db.php">
								<input type="hidden" name="event_id" value="'.$event['id'].'">
								<input type="hidden" name="event_name" value="'.$event['name'].'">
								<button class="btn btn-danger" type="submit"> Delete </button>
							</form>';
							?>
					 	</td>
		            </tr>

					<?php
					}
					$pdo = null;
					?>


		        </tbody>

		    	</table>

		</div>
		<footer class="navbar fixed-bottom navbar-dark bg-dark text-center text-white">
		   <p class="mb-0"> Copyright &copy; 2019 | Designed & Developed by CSI DDU Student Branch </p>
	   </footer>


		<script src="../js/jquery-3.3.1.min.js"></script>
	    <script src="../js/jquery-ui.js"></script>
	    <script src="../js/popper.min.js"></script>
	    <script src="../js/bootstrap.min.js"></script>
	    <script src="../js/owl.carousel.min.js"></script>
	    <script src="../js/jquery.countdown.min.js"></script>
	    <script src="../js/jquery.easing.1.3.js"></script>
	    <script src="../js/aos.js"></script>
	    <script src="../js/jquery.fancybox.min.js"></script>
	    <script src="../js/jquery.sticky.js"></script>
	    <script src="../js/isotope.pkgd.min.js"></script>

		<script src="../js/main.js"></script>

		<script>
		$(document).ready( function () {
			$('#events').DataTable();
		} );
		</script>

		<!-- for datatables -->
	   	<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
	  	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	  	<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
	  	<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
	  	<script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap4.min.js" ></script>

</body>
</html>