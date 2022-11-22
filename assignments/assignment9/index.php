<?php
$msg = "Display Notes";

require_once 'Classes/Date_time.php';
$dt = new Date_time();
$notes = $dt->checkSubmit();


?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Add Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <h1>Add Notes</h1>
   
    <nav><a href='displayNotes.php'>Display notes</a></nav><br>
    <p><?php echo $notes; ?></p>
      	<div class="form-group">
      		<label for="dateNote">Date and Time</label><br><br>
      		<input type="datetime-local" class="form-control" id="dateTime" name="dateTime"><br>
      	</div>
          <div class="form-group">
            <label for="FormControlTextarea1" size="5" class="form-label">Note</label><br>
            <textarea style="height: 500px;" class="form-control" id="noteContent" name="noteContent"></textarea>
        </div><br>
      	<div class="form-group">
          <form action="Class/Data_time.php" method="post">
      		  <input type="submit" class="btn btn-primary" name="noteUpload" value="Add Notes" />
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>