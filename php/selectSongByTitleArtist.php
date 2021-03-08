<?php
// get parameters
if(isset($argc)){
$title = $argv[1];
$artist = $argv[2];

// connect to database
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres")
    or die('Could not connect: ' . pg_last_error());

// postgres query 
$query = 'SELECT song.* FROM title, song, artist WHERE title.name LIKE '%$title%' AND title.tid = song.tid AND artist.artid =  song.artid AND artist.name LIKE '%$artist%'';
$result = pg_query($query) or die('Query failed: ' . pg_last_error());

// print results in html
echo "<table>\n";
while ($line = pg_fetch_array($result, null, PGSQL_ASSOC)) {
    echo "\t<tr>\n";
    foreach ($line as $col_value) {
        echo "\t\t<td>$col_value</td>\n";
    }
    echo "\t</tr>\n";
}
echo "</table>\n";

// release result
pg_free_result($result);

// close connection
pg_close($dbconn);
}
?>