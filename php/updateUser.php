<!DOCTYPE html>
<html>
<head>
    <title>Successful Update</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <noscript><link rel="stylesheet" href="./assets/css/noscript.css" /></noscript>
</head>
<body>
<?php
// parameters
//if (isset($_POST['gID']))
//{
//    $gID = $_POST['gID'];
// connect to database
$dbconn = pg_connect("host=localhost dbname=postgres user=postgres password=postgres")
    or die('Could not connect: ' . pg_last_error());

// postgres query
//$sql = "DELETE FROM genre WHERE gid='" . $_POST["gID"] . "'";

$update = "UPDATE users SET name = '" . $_POST["Title"] . "', gender = '" . $_POST["Gender"] . "' WHERE uid = '" . $_POST["uID"] . "'";
$result = pg_query($update) or die('Query failed: ' . pg_last_error());

$update = "UPDATE users SET email = '" . $_POST["Email"] . "', birthday = '" . $_POST["bday"] . "' WHERE uid = '" . $_POST["uID"] . "'";
$result = pg_query($update) or die('Query failed: ' . pg_last_error());

// release result
pg_free_result($result);

// close connection
pg_close($dbconn);
//}
?>
    <!-- Header -->
    <header id="header" class="alt">
        <a href="index.html" class="logo"><strong>Musicify</strong> <span>audio's new home</span></a>
        <nav>
            <a href="../admin.html">Back to Admin Tools</a>
        </nav>
    </header>

    <div class="login">
        <header class="major">
            <h1>Update Successful</h1>
        </header>
        <input type="button" name="log" id="log" onclick="window.location.href='../admin.html';" value="Back to Admin Home">
    </div>
    <div style="height:200px; width:100%; clear:both;"></div>
</body>
</html>
