
<!DOCTYPE HTML>
<html>
	<head>
		<title>Dashboard</title>
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
						<a href="#menu">Menu</a>
					</nav>
				</header>

				<!-- Menu -->
				<nav id="menu">
					<ul class="links">
						<li class="active"> <a href="listings.html">Dashboard</a> </li>

		                <li> <a href="createEntry.html">Create </a> </li>

		                <li> <a href="updateEntry.html">Update an Entry</a> </li>

		                <li> <a href="deleteEntry.html">Delete an Entry</a> </li>
		                
		                <li> <a href="loggedOut.html">Log Out</a> </li>
            		</ul>
				</nav>

				<!-- Main -->
					<div id="main">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>Music Library</h1>
									</header>
									<?php
// connect to database
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres")
    or die('Could not connect: ' . pg_last_error());

// postgres query : select all tracks
$query = 'SELECT title.name, artist.name, album.name, title.length_sec, genre.name  FROM title, song, artist, album, genre, has WHERE song.tid = title.tid AND song.artid = artist.artid AND song.aid = album.aid AND song.tid = has.tid AND has.gid = genre.gid;
';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// print results in html
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo $line['column_name']; // Print a single column data
    echo print_r($line);       // Print the entire row data
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
							<li>Copyright © 2020 Musicify, LLC.</li>
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