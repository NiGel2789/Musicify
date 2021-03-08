<!DOCTYPE html>
<html> 
<head>    
    <title>Song Added</title>    
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <noscript><link rel="stylesheet" href="./assets/css/noscript.css" /></noscript>   
</head> 
<body> 
<?php
// parameters
//if (isset($_POST['GenreID', 'Title']))
//{
// connect to database
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres")
    or die('Could not connect: ' . pg_last_error());

// postgres query 
$query = "INSERT INTO title VALUES ('" . $_POST["Title"] . "', '" . $_POST["tid"] . "' , '" . $_POST["SongLength"] ."')";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
$query = "INSERT INTO song VALUES (NULL, '" . $_POST["tid"] . "' , '" . $_POST["aid"] . "', '" . $_POST["artID"] ."')";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());
$query = "INSERT INTO has VALUES ('" . $_POST["gID"] . "', '" . $_POST["tid"] ."')";
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// release result
pg_free_result($result);

// close connection
pg_close($dbconn);
//}
?>

    <div class="login">
        <header class="major">
            <h1>Create Successful</h1>
        </header>
        <input type="button" name="log" id="log" onclick="window.location.href='../createEntry.html';" value="Back to Create Home">
    </div>
    <div style="height:200px; width:100%; clear:both;"></div>
</body> 
</html>

