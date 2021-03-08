
<!DOCTYPE HTML>
<html>
	<head>
		<title>View Admins</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Header -->
				<header id="header" class="alt">
					<a href="index.html" class="logo"><strong>Musicify</strong> <span>audio's new home</span></a>
					<nav>
                        <a href="admin.html">Back to Admin Home</a>
					</nav>
				</header>


				<!-- Main -->
					<div id="main">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>All Admins</h1>
									</header>
									<?php
// connect to database
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres")
    or die('Could not connect: ' . pg_last_error());

// postgres query : select all tracks
$query = 'SELECT DISTINCT ON (uid) uid, name, email, birthday, gender FROM admin';

$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// print results in html
echo "<table border=2>
	<tr>
		<th><b>" . "UserID" . "</b></th>
		<th><b>" . "Username" . "</b></th> 
		<th><b>" . "Email" . "</b></th> 
		<th><b>" . "Birthday" . "</b></th>
		<th><b>" . "Gender" . "</b></th>  
	</tr>
";
//puts results into table

while($row = pg_fetch_row($result))
{
	echo '<tr>';
	$count = count($row);
	$y = 0;
	while($y < $count)
	{
		$c_row = current($row);
		echo '<td style="padding:0 70px 0 0px;">'.$c_row.'</td>';
		next($row);
		$y = $y+1;
	}
	echo '</tr>';
	$i = $i+1;
}

echo "</table>\n";

// release result
pg_free_result($result);

// close connection
pg_close($dbconn);
?>
								</div>
							</section>

					</div>

				<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<ul class="icons">
							<li><a href="#" class="icon alt fa-twitter"><span class="label">Twitter</span></a></li>
							<li><a href="#" class="icon alt fa-facebook"><span class="label">Facebook</span></a></li>
							<li><a href="#" class="icon alt fa-instagram"><span class="label">Instagram</span></a></li>
						</ul>
						<ul class="copyright">
							<li>Copyright Â© 2020 Musicify, LLC.</li>
						</ul>
					</div>
				</footer>

			</div>

		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
			<script src="assets/js/jquery.scrolly.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>
