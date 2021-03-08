<?php
// connect to database
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres")
    or die('Could not connect: ' . pg_last_error());

// postgres query : select all tracks
$query = 'SELECT title.name, artist.name, album.name, album.release_year, song.publisher_name, genre.name, title.length_sec FROM title, artist, album, song, genre, has WHERE song.artid = artist.artid AND song.tid = title.tid AND song.aid = album.aid AND song.tid = has.tid AND has.gid = genre.gid';
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
?>