<?php
// parameters
if(isset($argc)){
$name = $argv[1];
$artid = $argv[2];

// connect to database
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres")
    or die('Could not connect: ' . pg_last_error());

// postgres query 
$query = 'UPDATE artist SET name = '$name' WHERE artid =  '$artid'';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

echo $result;

// release result
pg_free_result($result);

// close connection
pg_close($dbconn);
}
?>