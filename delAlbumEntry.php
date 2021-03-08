<!DOCTYPE html>    
<html>    
<head>    
    <title>Delete an Album</title>    
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
            <h1>Delete an Album Entry</h1>
        </header>     
    <form id="deleteAlbum" method="post" action="./php/deleteAlbum.php">    
        <label><b>Select an Album from this dropdown menu:    
        </b>    
        </label>    
        <select name="aID">
        <?php
											// connect to database
											$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres")
												or die('Could not connect: ' . pg_last_error());
											
											// postgres query : select gre id
											$query = 'SELECT album.aid, album.name FROM album';
											$result = pg_query($query) or die('Query failed: ' . pg_last_error());
											
											// print results in html
											while ($row = pg_fetch_array($result, null, PGSQL_ASSOC)) {
												echo "<option value='" . $row['aid'] . "'>" . $row['aid'] . ' - ' . $row['name'] . "</option>";
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