
<!DOCTYPE HTML>
<html>
	<head>
		<title>Update A Genre</title>
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
                            <a href="updateEntry.html">Update something else?</a>
                        </nav>
                    </header> 

				<!-- Main -->
					<div id="main">

						<!-- One -->
							<section id="one">
								<div class="inner">
									<header class="major">
										<h1>Update a Genre Entry</h1>
                                    </header>
                                    <form id="register" method="get" action="register.php">    
                                        <label><b>Select a Genre from this dropdown menu:    
                                        </b>    
                                        </label>    
                                        <select id="gID">
                                            <?php
											// connect to database
											$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres")
												or die('Could not connect: ' . pg_last_error());
											
											// postgres query : select gre id
											$query = 'SELECT genre.gid, genre.name FROM genre';
											$result = pg_query($query) or die('Query failed: ' . pg_last_error());
											
											// print results in html
											while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
												echo "<option value='" . $row['gid'] . "'>" . $row['aid'] . $row['name'] . "</option>";
											}
		
											// release result
											pg_free_result($result);
											
											// close connection
											pg_close($dbconn);
											?>
                                          </select>      
                                        <br><br>

                                        <!-- Artist Details to update below. -->
                                        <label><b>Genre Name    
                                        </b>    
                                        </label>    
                                        <input type="text" name="Title" id="Title" placeholder="e.g. Rock/Pop/EDM">    
                                        <br><br>       
                                        <input type="button" name="log" id="log" value="Update Entry">                      
                                    </form> 
									<!-- Database Code here -->
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