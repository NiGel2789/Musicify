<?php
// parameters
if(isset($argc)){
$tid = $argv[1];
$aid = $argv[2];
$artid = $argv[3];

// connect to database
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres")
    or die('Could not connect: ' . pg_last_error());

// postgres query 
$query = 'INSERT INTO song VALUES (tid, aid, artid)';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

echo $result;

// release result
pg_free_result($result);

// close connection
pg_close($dbconn);
}
?>