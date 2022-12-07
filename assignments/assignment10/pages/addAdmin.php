<?php

session_start();
if($_SESSION['access'] !== "accessGranted"){
  header('Location: index.php');
}

require_once('routes.php');
$page = new Page();
echo $page->security();
echo $page->head("Encrypted Login - Add Admin");

$output = "";

if(isset($_POST['addAdmin'])){
  require_once 'routes.php';
  $admin = new Admin();
  $output = $admin->addAdmin($_POST);
}
?>
  <body class="container">
    <?php echo $page->nav(); ?>  
     
    <h1>Add Admin</h1>    
    <form method="post" action="index.php?page=addAdmin">
    <div class="form-group">
      <label for="name">Name (letters only)</label>
      <input type="text" class="form-control" id="name" name="name" value="Jun Won" >
    </div>
    <div class="form-group">
      <label for="email">Email </label>
      <input type="text" class="form-control" id="email" name="email" value="jwon1@admin.com" >
    </div>
    <div class="form-group">
      <label for="password">Password </label>
      <input type="password" class="form-control" id="password" name="password" value="password" >
    </div>
    <div class="form-group">
      <label for="status">Status</label>
      <select class="form-control" id="status" name="status">
        <option value=staff>Staff</option><option value=admin>Admin</option>
      </select>
    </div>

    
    <div>
    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>

  </body>
</html>