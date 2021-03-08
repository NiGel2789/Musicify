<!DOCTYPE html>    
<html>    
<head>    
    <title>Delete a Song</title>    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>   
</head>    
<body> 
    <!-- Header -->
    <header id="header" class="alt">
        <a href="index.html" class="logo"><strong>Musicify</strong> <span>audio's new home</span></a>
        <nav>
            <a href="deleteEntry.html">Delete something else?</a>
        </nav>
    </header> 

    <div class="login"> 
        <header class="major">
            <h1>Delete a Song Entry</h1>
        </header>     
    <form id="deleteSong" method="post" action="./php/deleteSong.php">    
        <label><b>Select a track from this dropdown menu:    
        </b>    
        </label>    
        <select name="tID">
                                            <?php
											// connect to database
											$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres")
												or die('Could not connect: ' . pg_last_error());
											
											// postgres query : select song id
											$query = 'SELECT song.tid, title.name FROM song, title WHERE song.tid = title.tid';
											$result = pg_query($query) or die('Query failed: ' . pg_last_error());
											
											// print results in html
											while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
												echo "<option value='" . $row['tid'] . "'>" . $row['tid'] . ' - ' . $row['name'] . "</option>";
											}
											?>
        </select>        
        <br><br>       
        <input type="submit" name="delete" id="delete" style="float:right">               
    </form>     
    </div>   
    <div style="height:200px; width:100%; clear:both;"></div> 
</body>    
</html>     
