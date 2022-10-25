<?php
$output = "";
if(count($_POST) > 0){
  require_once 'Directory.php';
  $addFile = new createDirectory();
  $output = $addFile->addFile();

}

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>File and Directory demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    <main class="container">
    <h1>File and Directory Assignment</h1>
    <p>Enter a folder name and the contents of a file. Folder names should contain alpha numeric characters only</p><br>
      <p><?php echo $output; ?></p><br>
        <div class="form-group">
            <label for="folderName">Folder Name</label>
            <input type="text" class="form-control" name="folderName" id="folderName" value="">
        </div><br>
        <div class="form-group">
            <label for="FormControlTextarea1" size="5" class="form-label">File Content</label>
            <textarea style="height: 500px;" class="form-control" id="fileContent" name="fileContent"></textarea>
        </div><br>
        <div class="form-group">
          <form action="Directory.php" method="post">
          <input type="submit" class="btn btn-primary" name="submitButton" id="submitbutton" value="Submit" />
          </form>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>