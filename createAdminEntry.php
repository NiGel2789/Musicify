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
            <a href="admin.html">Back to Admin Tools?</a>
        </nav>
    </header>

    <div class="login">
        <header class="major">
            <h1>Create an Admin Entry</h1>
        </header>
    <form id="insertAdmin" method="post" action="./php/insertAdmin.php">
        <label><b>Full Name:
        </b>
	</label>
	
	<input type="text" name="name" id="name" placeholder="eg.John Doe" >
	<br><br>
	<label><b>Gender (M,F,A,O,U,...):
        </b>
        </label>

        <input type="text" name="gender" id="gender" placeholder="" >
	<br><br>
	<label><b>UID:
        </b>
        </label>

        <input type="text" name="uID" id="uID" placeholder="0000" >
        <br><br>
	
	<label><b>Email:
        </b>
        </label>

        <input type="text" name="email" id="email" placeholder="eg.johndoe@mail.com" >
        <br><br>

	<label><b>Date (YYYY-MM-DD):
        </b>
        </label>

        <input type="text" name="date" id="date" placeholder="YYYY-MM-DD" >
        <br><br>

        <input type="submit" name="create" id="create" style="float:right">
	
    </form>
    </div>
    <div style="height:200px; width:100%; clear:both;"></div>
</body>
</html>
