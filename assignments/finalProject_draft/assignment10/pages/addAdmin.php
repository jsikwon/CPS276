<?php

session_start();
if($_SESSION['access'] !== "accessGranted"){
  header('Location: index.php');
}

require_once 'routes.php';
$page = new Page();
echo $page->security();
echo $page->head("Encrypted Login - Add Admin");

$output = "";

class AddAdmin {
  public function addAdmin($post){
      $pdo = new PdoMethods();
      $sql = "SELECT username FROM admin WHERE username = :username";
      $bindings = array(
          array(':username', $post['username'], 'str')
      );
  
      $records = $pdo->selectBinded($sql, $bindings);
  
      /** IF THERE WAS AN RETURN ERROR STRING */
      if($records == 'error'){
          return 'There was an error processing your request';
      }
      
      /** CHECK FOR A DUPLICATE USERNAME IF FOUND THEN RETURN DUPLICATE OTHERWISE ADD USERNAME AND PASSWORD TO DATABASE */
      else{
          if(count($records) != 0){
              return "There is already someone with that username";
          }
          else {
              /** ENCRYPT THE PASSWORD USING PASSWORD_HASH */
              $password = password_hash($post['password'], PASSWORD_DEFAULT);
  
  
              $sql = "INSERT INTO admin (username, password, email, status) VALUES (:username, :password, :email, :status)";
              $bindings = array(
                  array(':username',$post['username'],'str'),
                  array(':password',$password,'str'),
                  array(':email',$post['email'],'str'),
                  array(':status',$post['status'],'str'),
              );
              $result = $pdo->otherBinded($sql, $bindings);
              if($result = 'noerror'){
                  return 'Admin added';
              }
              else {
                  return 'There was a problem adding this administrator';
              }
          }
      }
  
  
  }
}

if(isset($_POST['addAdmin'])){
  require_once 'routes.php';
  $admin = new Admin();
  $output = $admin->addAdmin($_POST);
}
?>
  <body class="container">
    <?php echo $page->nav($nav_admin); ?>  
     
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