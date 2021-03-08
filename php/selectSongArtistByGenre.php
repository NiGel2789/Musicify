<?php
// get parameter
if(isset($argc)){
$genre = $argv[1];

// connect to database
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres")
    or die('Could not connect: ' . pg_last_error());

// postgres query : select all tracks
$query = 'SELECT title.name, artist.name FROM genre, has, title, artist, song  WHERE genre.gid = has.gid AND has.tid = title.tid AND artist.artid = song.aid AND title.tid = song.tid AND genre.name LIKE '%$genre%'';
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